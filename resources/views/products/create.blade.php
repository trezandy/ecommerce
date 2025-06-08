<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <header class="mb-4">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Product Information') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Fill in the product details below and click save.") }}
                    </p>
                </header>

                <form action="{{ route('products.store') }}" method="post">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                            :value="old('price')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="short_url_key" :value="__('Short URL Key (Optional)')" />
                        <div
                            class="focus-within:ring-1 focus-within:border-indigo-500 overflow-hidden rounded-md shadow-sm focus-within:ring-indigo-500 border border-slate-300 mt-1 flex items-stretch divide-x divide-slate-300">
                            <div class="px-2 bg-slate-50 flex items-center justify-center">
                                <span class="text-slate-500">{{ config('app.domain_shortener') }}/</span>
                            </div>
                            <input id="short_url_key"
                                class="block w-full border-0 focus:ring-offset-0 focus:ring-0 focus:outline-none"
                                type="text" name="short_url_key" value="{{ old('short_url_key') }}" />
                        </div>
                        <x-input-error :messages="$errors->get('short_url_key')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1 w-full" type="text" name="description"
                            :value="old('description')" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="block mt-4">
                        <label for="is_shortened" class="inline-flex items-center">
                            {{-- PERBAIKAN DI SINI: tambahkan value="1" --}}
                            <input id="is_shortened" type="checkbox"
                                class="rounded border-gray-300 text-slate-600 shadow-sm focus:ring-slate-500"
                                name="is_shortened" value="1" {{ old('is_shortened') ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">{{ __('Generate short url automatically if key is
                                empty') }}</span>
                        </label>
                        {{-- Tambahkan ini untuk menampilkan error jika ada --}}
                        <x-input-error :messages="$errors->get('is_shortened')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a type="button" href="{{ route('products.index') }}"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</a>

                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                            </svg>
                            Create
                        </button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>