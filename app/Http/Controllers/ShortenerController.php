<?php

namespace App\Http\Controllers;

use App\Jobs\RecordVisitor;
use App\Models\Shortener;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class ShortenerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:super admin'])->only(['index', 'stats']);
    }

    public function show(Request $request, Shortener $shortener)
    {
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

        $this->dispatch(new RecordVisitor($shortener, $agent));

        return redirect($shortener->original);
    }

    public function index()
    {
        return view('shorteners.index', [
            'shorteners' => Shortener::query()->latest()->paginate(10),
        ]);
    }

    public function stats(Shortener $shortener)
    {
        return view('shorteners.stats', [
            'shortener' => $shortener,
            'devices' => Visitor::query()
                ->whereBelongsTo($shortener)
                ->groupByType('device')
                ->get(),
            'device_types' => Visitor::query()
                ->whereBelongsTo($shortener)
                ->groupByType('device_type')
                ->get(),
            'browsers' => Visitor::query()
                ->whereBelongsTo($shortener)
                ->groupByType('browser')
                ->get(),
            'platforms' => Visitor::query()
                ->whereBelongsTo($shortener)
                ->groupByType('platform')
                ->get(),
            'referrers' => Visitor::query()
                ->whereBelongsTo($shortener)
                ->groupByType('referrer')
                ->get()
                ->filter(fn($item) => $item->name !== null),
            'cities' => Visitor::query()
                ->whereBelongsTo($shortener)
                ->whereNotNull('city')
                ->select('city as name', DB::raw('COUNT(*) as total'))
                ->groupBy('city')
                ->orderByDesc('total')
                ->limit(5)
                ->get(),
        ]);
    }
}
