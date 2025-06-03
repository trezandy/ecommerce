<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shortener;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:super admin'])->except(['index', 'show', 'showcase']);
    }

    public function index()
    {
        return view('products.index', [
            'products' => Product::query()->latest()->paginate(4),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

        return to_route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        //
    }
}
