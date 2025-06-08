<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shortener;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // Middleware is already set up, so create and store methods are protected
        $this->middleware(['auth', 'role:super admin'])->except(['index', 'show', 'showcase']);
    }

    public function index()
    {
        return view('products.index', [
            'products' => Product::query()->latest()->paginate(4), // Increased pagination for better view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * This method returns the create product view.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     * This method handles the form submission from create.blade.php
     */
    public function store(Request $request)
    {
        // 1. Validasi request. Aturan 'boolean' sekarang akan bekerja karena view mengirimkan "1".
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'short_url_key' => ['nullable', 'string', 'alpha_dash', 'max:255', 'unique:products,short_url_key'],
            'is_shortened' => ['nullable', 'boolean'], // Aturan ini sudah benar
        ]);

        // 2. Buat produk
        $product = Product::create([
            'name' => $validated['name'],
            'slug' => str($validated['name'])->slug(),
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        // 3. Logika URL Shortener (Sekarang dijamin bekerja)
        // Cek jika: (A) short_url_key diisi, ATAU (B) checkbox is_shortened dicentang (bernilai true/1).
        if ($request->filled('short_url_key') || $request->boolean('is_shortened')) {

            // Jika key diisi, gunakan. Jika tidak (berarti checkbox yang aktif), buat random key.
            $uniqueKey = $request->filled('short_url_key')
                ? $request->short_url_key
                : str()->random(5) . $product->id;

            // Buat record di tabel Shortener
            Shortener::create([
                'original' => route('products.show', $product),
                'unique_key' => $uniqueKey,
                'short' => config('app.domain_shortener') . '/' . $uniqueKey,
            ]);

            // Simpan key ke produk yang baru dibuat
            $product->forceFill(['short_url_key' => $uniqueKey])->save();
        }

        // 4. Redirect dengan pesan sukses
        return to_route('products.show', $product)->with('success', 'Product created successfully!');
    }

    public function showcase()
    {
        return view('products.showcase');
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'short_url_key' => ['nullable', 'unique:products,short_url_key,' . $product->id],
        ]);

        $product->update([
            'name' => $name = $validated['name'],
            'slug' => str($name)->slug(),
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);

        $uniqueKey = $request->short_url_key ?? str()->random(5) . $product->id;

        if ($request->is_shortened || $request->short_url_key) {
            if ($product->short_url_key) {

                Shortener::query()->where('unique_key', $product->short_url_key)->update([
                    'unique_key' => $uniqueKey,
                    'short' => config('app.domain_shortener') . '/' . $uniqueKey,
                ]);

                $product->forceFill(['short_url_key' => $uniqueKey])->save();
            } else {
                tap(Shortener::query()->create([
                    'original' => route('products.show', $product),
                    'unique_key' => $uniqueKey,
                    'short' => config('app.domain_shortener') . '/' . $uniqueKey,
                ]), function ($shortener) use ($product, $uniqueKey) {
                    $product->forceFill(['short_url_key' => $uniqueKey])->save();
                });
            }
        }

        return to_route('products.show', $product)->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete the product and its associated shortener record
        $product->delete();
        Shortener::query()->where('unique_key', $product->short_url_key)->delete();

        return to_route('products.index')->with('success', 'Product deleted successfully!');
    }
}
