@php
$staticData = [
['name' => 'Basic Tee', 'color' => 'Black Charcoal', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-01.jpg'],
['name' => 'Basic Tee', 'color' => 'Cream Soda', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-02.jpg'],
['name' => 'Basic Tee', 'color' => 'Gray Matter', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-03.jpg'],
['name' => 'Basic Tee', 'color' => 'Peach Fuzz', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-04.jpg'],
];
@endphp

<x-app-layout>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            @if (session('success'))
            {{--
            Komponen notifikasi ini menggunakan Alpine.js (bawaan Breeze)
            untuk interaktivitas.
            - x-data="{ show: true }": Menginisialisasi status agar notifikasi terlihat.
            - x-show="show": Notifikasi hanya akan tampil jika 'show' bernilai true.
            - x-transition: Memberikan animasi fade-in/out yang halus.
            - x-init="setTimeout...": Notifikasi akan hilang otomatis setelah 5 detik.
            --}}
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-4" {{--
                x-init="setTimeout(() => show = false, 5000)" class="mb-6"> --}}
                >
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-md mb-3"
                    role="alert">
                    <div class="flex">
                        <div class="py-0">
                            <svg class="h-6 w-6 text-green-500 mr-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            {{-- <p class="font-bold">Success!</p> --}}
                            {{-- Menampilkan pesan dari session --}}
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                        {{-- Tombol untuk menutup notifikasi --}}
                        <div class="ml-auto pl-3">
                            <button @click="show = false" class="text-green-500 hover:text-green-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Updated section: Added a flex container to align title and button -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>

                <!-- Added button: This button will only be visible to authenticated super admins -->
                @auth
                @if(auth()->user()->hasRole('super admin'))
                <a href="{{ route('products.create') }}"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    New Product
                </a>
                @endif
                @endauth
            </div>


            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach ($products as $index => $product)
                @php
                $static = $staticData[$index % count($staticData)];
                @endphp

                <div class="group relative">
                    {{-- Edit link for admin --}}
                    @auth
                    @if(auth()->user()->hasRole('super admin'))
                    <a href="{{ route('products.edit', $product) }}"
                        class="absolute top-2 right-2 z-10 bg-white p-1.5 rounded-full shadow-md hover:bg-gray-100">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z">
                            </path>
                        </svg>
                    </a>
                    @endif
                    @endauth

                    <img src="{{ $static['image'] }}" alt="Front of men&#039;s Basic Tee in black." loading="lazy"
                        class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700 font-semibold">
                                {{-- The main link now points to the admin edit page for convenience --}}
                                <a href="{{ route('products.show', $product) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $static['color'] }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">
                            <span class="text-gray-600">
                                <sup>Rp</sup>
                                {{number_format($product->price, 0,0, '.')}}
                            </span>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>


    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
            <h2 class="mb-6 text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg"
                        alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                        loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Earthen Bottle</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(480000, 0,0, '.')
                            }}</span>
                    </p>

                </a>
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-02.jpg"
                        alt="Olive drab green insulated bottle with flared screw lid and flat top." loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(350000, 0,0, '.')
                            }}</span>
                    </p>
                </a>
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg"
                        alt="Person using a pen to cross a task off a productivity paper card." loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(890000, 0,0, '.')
                            }}</span>
                    </p>
                </a>
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg"
                        alt="Hand holding black machined steel mechanical pencil with brass tip and top." loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(350000, 0,0, '.')
                            }}</span>
                    </p>
                </a>
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-05.jpg"
                        alt="Paper card sitting upright in walnut card holder on desk." loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Focus Card Tray</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(640000, 0,0, '.')
                            }}</span>
                    </p>
                </a>
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-06.jpg"
                        alt="Stack of 3 small drab green cardboard paper card refill boxes with white text."
                        loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Focus Multi-Pack</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(390000, 0,0, '.')
                            }}</span>
                    </p>
                </a>
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-07.jpg"
                        alt="Brass scissors with geometric design, black steel finger holes, and included upright brass stand."
                        loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Brass Scissors</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(500000, 0,0, '.')
                            }}</span>
                    </p>
                </a>
                <a href="{{ route('products.showcase') }}" class="group">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-08.jpg"
                        alt="Textured gray felt pouch for paper cards with snap button flap and elastic pen holder loop."
                        loading="lazy"
                        class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
                    <h3 class="mt-4 text-sm text-gray-700">Focus Carry Pouch</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        <span class="text-gray-600"><sup>Rp</sup> {{
                            number_format(320000, 0,0, '.')
                            }}</span>
                    </p>
                </a>

            </div>

        </div>
    </div>


    <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-12">
                <h2 class="text-2xl font-bold text-gray-900">Best Collections</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    <div class="group relative">
                        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-02-edition-01.jpg"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            loading="lazy"
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="{{ route('products.showcase') }}" class="group">
                                <span class="absolute inset-0"></span>
                                Desk and Office
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Work from home accessories</p>
                    </div>
                    <div class="group relative">
                        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-02-edition-02.jpg"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            loading="lazy"
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="{{ route('products.showcase') }}" class="group">
                                <span class="absolute inset-0"></span>
                                Self-Improvement
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Journals and note-taking</p>
                    </div>
                    <div class="group relative">
                        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-02-edition-03.jpg"
                            alt="Collection of four insulated travel bottles on wooden shelf." loading="lazy"
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="{{ route('products.showcase') }}" class="group">
                                <span class="absolute inset-0"></span>
                                Travel
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Daily commute essentials</p>
                    </div>
                </div>
            </div>
        </div>
        <p
            class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
            <span>Get free delivery on orders over IDR 1 million</span>
        </p>
    </div>
</x-app-layout>