<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $product->name }}
            </h2>

            @if(auth()->user()?->isAdmin)
            <x-primary-anchor :href="route('products.edit', $product)">
                Edit
            </x-primary-anchor>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
                <div class="pt-6">
                    <nav aria-label="Breadcrumb">
                        <ol role="list"
                            class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                            <li>
                                <div class="flex items-center">
                                    <a href="#" class="mr-2 text-sm font-medium text-gray-900">Men</a>
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                                        aria-hidden="true" class="h-5 w-4 text-gray-300">
                                        <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <a href="#" class="mr-2 text-sm font-medium text-gray-900">Clothing</a>
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                                        aria-hidden="true" class="h-5 w-4 text-gray-300">
                                        <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                    </svg>
                                </div>
                            </li>

                            <li class="text-sm">
                                <a href="#" aria-current="page"
                                    class="font-medium text-gray-500 hover:text-gray-600">Basic
                                    Tee 6-Pack</a>
                            </li>
                        </ol>
                    </nav>

                    <!-- Image gallery -->
                    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-02-secondary-product-shot.jpg"
                            alt="Two each of gray, white, and black shirts laying flat."
                            class="hidden size-full rounded-lg object-cover lg:block">
                        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                            <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg"
                                alt="Model wearing plain black basic tee."
                                class="aspect-[3/2] w-full rounded-lg object-cover">
                            <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                                alt="Model wearing plain gray basic tee."
                                class="aspect-[3/2] w-full rounded-lg object-cover">
                        </div>
                        <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-02-featured-product-shot.jpg"
                            alt="Model wearing plain white basic tee."
                            class="aspect-[4/5] size-full object-cover sm:rounded-lg lg:aspect-auto">
                    </div>

                    <!-- Product info -->
                    <div
                        class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Basic Tee 6-Pack
                            </h1>
                        </div>

                        <!-- Options -->
                        <div class="mt-4 lg:row-span-3 lg:mt-0">
                            <h2 class="sr-only">Product information</h2>
                            <p class="text-3xl tracking-tight text-gray-900">
                                <span class="text-gray-600"><sup>Rp</sup> {{ number_format($product->price, 0, 0, '.')
                                    }}</span>
                            </p>

                            <!-- Reviews -->
                            <div class="mt-6">
                                <h3 class="sr-only">Reviews</h3>
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <svg class="size-5 shrink-0 text-gray-900" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <svg class="size-5 shrink-0 text-gray-200" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <p class="sr-only">4 out of 5 stars</p>
                                    <a href="#"
                                        class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117
                                        reviews</a>
                                </div>
                            </div>

                            <form class="mt-10">
                                <!-- Colors -->
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Color</h3>

                                    <fieldset aria-label="Choose a color" class="mt-4">
                                        <div class="flex items-center gap-x-3">
                                            <!-- Active and Checked: "ring ring-offset-1" -->
                                            <label aria-label="White"
                                                class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                                                <input type="radio" name="color-choice" value="White" class="sr-only">
                                                <span aria-hidden="true"
                                                    class="size-8 rounded-full border border-black/10 bg-white"></span>
                                            </label>
                                            <!-- Active and Checked: "ring ring-offset-1" -->
                                            <label aria-label="Gray"
                                                class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                                                <input type="radio" name="color-choice" value="Gray" class="sr-only">
                                                <span aria-hidden="true"
                                                    class="size-8 rounded-full border border-black/10 bg-gray-200"></span>
                                            </label>
                                            <!-- Active and Checked: "ring ring-offset-1" -->
                                            <label aria-label="Black"
                                                class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-900 focus:outline-none">
                                                <input type="radio" name="color-choice" value="Black" class="sr-only">
                                                <span aria-hidden="true"
                                                    class="size-8 rounded-full border border-black/10 bg-gray-900"></span>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- Sizes -->
                                <div class="mt-10">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium text-gray-900">Size</h3>
                                        <a href="#"
                                            class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size
                                            guide</a>
                                    </div>

                                    <fieldset aria-label="Choose a size" class="mt-4">
                                        <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium uppercase text-gray-200 hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="XXS" disabled
                                                    class="sr-only">
                                                <span>XXS</span>
                                                <span aria-hidden="true"
                                                    class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                                                    <svg class="absolute inset-0 size-full stroke-2 text-gray-200"
                                                        viewBox="0 0 100 100" preserveAspectRatio="none"
                                                        stroke="currentColor">
                                                        <line x1="0" y1="100" x2="100" y2="0"
                                                            vector-effect="non-scaling-stroke" />
                                                    </svg>
                                                </span>
                                            </label>
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="XS" class="sr-only">
                                                <span>XS</span>
                                                <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                                                <span class="pointer-events-none absolute -inset-px rounded-md"
                                                    aria-hidden="true"></span>
                                            </label>
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="S" class="sr-only">
                                                <span>S</span>
                                                <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                                                <span class="pointer-events-none absolute -inset-px rounded-md"
                                                    aria-hidden="true"></span>
                                            </label>
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="M" class="sr-only">
                                                <span>M</span>
                                                <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                                                <span class="pointer-events-none absolute -inset-px rounded-md"
                                                    aria-hidden="true"></span>
                                            </label>
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="L" class="sr-only">
                                                <span>L</span>
                                                <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                                                <span class="pointer-events-none absolute -inset-px rounded-md"
                                                    aria-hidden="true"></span>
                                            </label>
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="ring-2 ring-indigo-500 group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="XL" class="sr-only">
                                                <span>XL</span>
                                                <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                                                <span class="pointer-events-none absolute -inset-px rounded-md"
                                                    aria-hidden="true"></span>
                                            </label>
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="2XL" class="sr-only">
                                                <span>2XL</span>
                                                <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                                                <span class="pointer-events-none absolute -inset-px rounded-md"
                                                    aria-hidden="true"></span>
                                            </label>
                                            <!-- Active: "ring-2 ring-indigo-500" -->
                                            <label
                                                class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6">
                                                <input type="radio" name="size-choice" value="3XL" class="sr-only">
                                                <span>3XL</span>
                                                <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                                                <span class="pointer-events-none absolute -inset-px rounded-md"
                                                    aria-hidden="true"></span>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="flex items-center gap-4 mt-4">
                                    <button type="button"
                                        class="mt-10 w-full flex items-center justify-center gap-x-2 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>

                                        Add to bag
                                    </button>

                                    <button type="button"
                                        class="mt-10 flex items-center justify-center gap-x-2 rounded-md bg-indigo-50 px-3.5 py-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                                        </svg>

                                        Share
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class=" py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8
                                        lg:pt-6">
                            <!-- Description and details -->
                            <div>
                                <h3 class="sr-only">Description</h3>

                                <div class="space-y-6">
                                    <p class="text-base text-gray-900">The Basic Tee 6-Pack allows you to
                                        fully express
                                        your
                                        vibrant personality with three grayscale options. Feeling
                                        adventurous? Put on a
                                        heather gray tee. Want to be a trendsetter? Try our exclusive
                                        colorway:
                                        &quot;Black&quot;. Need to add an extra pop of color to your outfit?
                                        Our white
                                        tee
                                        has you covered.</p>
                                </div>
                            </div>

                            <div class="mt-10">
                                <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

                                <div class="mt-4">
                                    <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                        <li class="text-gray-400"><span class="text-gray-600">Hand cut and
                                                sewn
                                                locally</span></li>
                                        <li class="text-gray-400"><span class="text-gray-600">Dyed with our
                                                proprietary
                                                colors</span></li>
                                        <li class="text-gray-400"><span class="text-gray-600">Pre-washed
                                                &amp;
                                                pre-shrunk</span></li>
                                        <li class="text-gray-400"><span class="text-gray-600">Ultra-soft
                                                100%
                                                cotton</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-10">
                                <h2 class="text-sm font-medium text-gray-900">Details</h2>

                                <div class="mt-4 space-y-6">
                                    <p class="text-sm text-gray-600">The 6-Pack includes two black, two
                                        white, and two
                                        heather gray Basic Tees. Sign up for our subscription service and be
                                        the first
                                        to
                                        get new, exciting colors, like our upcoming &quot;Charcoal
                                        Gray&quot; limited
                                        release.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>