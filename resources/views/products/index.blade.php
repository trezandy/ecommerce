@php
$staticData = [
['name' => 'Basic Tee', 'color' => 'Black', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-01.jpg'],
['name' => 'Basic Tee', 'color' => 'Cream', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-02.jpg'],
['name' => 'Basic Tee', 'color' => 'Gray', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-03.jpg'],
['name' => 'Basic Tee', 'color' => 'Peach', 'image' =>
'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-01-related-product-04.jpg'],
];
@endphp

<x-app-layout>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach ($products as $index => $product)
                @php
                $static = $staticData[$index % count($staticData)];
                @endphp

                <div class="group relative">
                    <img src="{{ $static['image'] }}" alt="Front of men&#039;s Basic Tee in black." loading="lazy"
                        class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="{{ route('products.show', $product) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $static['name'] }}
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