<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Visitors per Day -->
                <div class="bg-white p-4 rounded-2xl shadow">
                    <h2 class="text-lg font-semibold mb-2">Pengunjung</h2>
                    <div id="chartVisitorsPerDay"></div>
                </div>

                <!-- Platform Distribution -->
                <div class="bg-white p-4 rounded-2xl shadow">
                    <h2 class="text-lg font-semibold mb-2">Platform</h2>
                    <div id="chartPlatforms"></div>
                </div>

                <!-- Device Type Distribution -->
                <div class="bg-white p-4 rounded-2xl shadow">
                    <h2 class="text-lg font-semibold mb-2">Perangkat</h2>
                    <div id="chartDevices"></div>
                </div>

                <!-- Browser Distribution -->
                <div class="bg-white p-4 rounded-2xl shadow">
                    <h2 class="text-lg font-semibold mb-2">Browser</h2>
                    <div id="chartBrowsers"></div>
                </div>

                <!-- Indonesian Visitors Map -->
                <div class="bg-white p-4 rounded-2xl shadow md:col-span-2">
                    <h2 class="text-lg font-semibold mb-2">Sebaran Pengunjung Indonesia</h2>
                    <div id="indoMap" class="w-full h-96"></div>
                </div>
            </div>

            <script>
                // Visitors per Day
                new ApexCharts(document.querySelector("#chartVisitorsPerDay"), {
                    chart: { type: 'area', height: 300 },
                    series: [{
                        name: 'Pengunjung',
                        data: {{ $perDay->values() }}
                    }],
                    xaxis: {
                        categories: {!! json_encode($formattedPerDay->keys()) !!}
                    },
                    stroke: { curve: 'smooth', width: 3 },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.5,
                            opacityTo: 0.1,
                            stops: [0, 90, 100]
                        }
                    },
                    markers: {
                        size: 5,
                        strokeWidth: 2
                    },
                    colors: ['#3B82F6']
                }).render();
            
                // Platform Distribution
                new ApexCharts(document.querySelector("#chartPlatforms"), {
                    chart: { type: 'donut', height: 300 },
                    series: {{ $platforms->values() }},
                    labels: {!! json_encode($platforms->keys()) !!}
                }).render();
            
                // Device Types
                new ApexCharts(document.querySelector("#chartDevices"), {
                    chart: { type: 'pie', height: 300 },
                    series: {{ $deviceTypes->values() }},
                    labels: {!! json_encode($deviceTypes->keys()) !!}
                }).render();
            
                // Browser
                new ApexCharts(document.querySelector("#chartBrowsers"), {
                    chart: { type: 'bar', height: 300, horizontal: true },
                    series: [{
                        name: 'Pengunjung',
                        data: {{ $browsers->values() }}
                    }],
                    xaxis: {
                        categories: {!! json_encode($browsers->keys()) !!}
                    }
                }).render();
            </script>

            <script>
                // Indonesian Visitor Distribution
                document.addEventListener('DOMContentLoaded', function () {
                    fetch('https://code.highcharts.com/mapdata/countries/id/id-all.geo.json')
                        .then(response => response.json())
                        .then(indoGeoJSON => {
                            Highcharts.mapChart('indoMap', {
                                chart: {
                                    map: indoGeoJSON
                                },
                                title: {
                                    text: ''
                                },
                                colorAxis: {
                                    min: 0,
                                    stops: [
                                        [0, '#E0F2FE'],
                                        [0.5, '#3B82F6'],
                                        [1, '#1D4ED8']
                                    ]
                                },
                                series: [{
                                    data: {!! json_encode($perProvince->map(function($v, $k){ return [$k, $v]; })->values()) !!},
                                    name: 'Pengunjung',
                                    states: {
                                        hover: {
                                            color: '#A5D6A7'
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.name}'
                                    }
                                }]
                            });
                        });
                });
            </script>
        </div>
    </div>
</x-app-layout>