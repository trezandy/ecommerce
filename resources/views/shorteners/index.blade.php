<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shorteners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($shorteners as $shortener)
                <x-card>
                    <span
                        class="hover:text-gray-950 font-mono text-sm font-medium tracking-widest text-pretty text-gray-600">
                        {{ $shortener->short }}
                    </span>
                    <p class="line-clamp-1 mb-4 text-lg font-semibold text-pretty tracking-tight">
                        {{ $shortener->original }}
                    </p>

                    <x-primary-anchor href="{{ route('shorteners.stats', $shortener) }}">
                        Stats
                    </x-primary-anchor>
                </x-card>
                @endforeach
            </div>

            @if($shorteners->hasPages())
            <div class="mt-8">
                {{ $shorteners->links() }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>