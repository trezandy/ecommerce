<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stats: <span
                class="hover:text-gray-950 font-mono text-lg font-medium tracking-widest text-pretty text-gray-600">{{
                $shortener->short }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <x-shortener-stats name="Devices" :data="$devices" />
                <x-shortener-stats name="Device Types" :data="$device_types" />
                <x-shortener-stats name="Platforms" :data="$platforms" />
                <x-shortener-stats name="Browsers" :data="$browsers" />
                @if ($referrers->count() > 0)
                <x-shortener-stats name="Referrers" :data="$referrers" />
                @endif
                <x-shortener-stats name="Top Cities" :data="$cities" />
            </div>
        </div>
    </div>
</x-app-layout>