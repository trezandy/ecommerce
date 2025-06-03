<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $perDay = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        $platforms = Visitor::select('platform', DB::raw('count(*) as total'))
            ->groupBy('platform')
            ->pluck('total', 'platform');

        $deviceTypes = Visitor::select('device_type', DB::raw('count(*) as total'))
            ->groupBy('device_type')
            ->pluck('total', 'device_type');

        $browsers = Visitor::select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->pluck('total', 'browser');

        $formattedPerDay = $perDay->mapWithKeys(function ($value, $key) {
            $formattedDate = Carbon::parse($key)->translatedFormat('d F');
            return [$formattedDate => $value];
        });

        $perProvince = DB::table('visitors')
            ->where('country', 'Indonesia')
            ->select('region_code', DB::raw('COUNT(*) as total'))
            ->groupBy('region_code')
            ->pluck('total', 'region_code');

        return view('dashboard', [
            'perDay' => $perDay,
            'platforms' => $platforms,
            'deviceTypes' => collect($deviceTypes)->mapWithKeys(function ($count, $type) {
                return [ucfirst($type) => $count];
            }),
            'browsers' => $browsers,
            'formattedPerDay' => $formattedPerDay,
            'perProvince' => $perProvince,
        ]);
    }
}
