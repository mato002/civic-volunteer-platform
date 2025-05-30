<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Registration;
use App\Models\Organization;
use App\Models\Opportunity;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        /* ───────────── 1. Basic counts for the four stat-cards ───────────── */
        $organizationsCount = Organization::count();
        $opportunitiesCount = Opportunity::count();
        $registrationsCount = Registration::count();

        /* ───────────── 2. Registration status summary (pie/bar) ──────────── */
        $summary = Registration::select(DB::raw('status, COUNT(*) AS total'))
                    ->groupBy('status')
                    ->pluck('total', 'status');   // e.g. ['pending' => 10, 'approved' => 42]

        /* ───────────── 3. Monthly trend data for the Chart.js line chart ─── */
        // last 6 months, including the current
        $months = collect(range(0, 5))->map(fn ($i) => Carbon::now()->subMonths($i)->format('M Y'))->reverse();

        $monthlyRegistrations = Registration::select(
                DB::raw("DATE_FORMAT(created_at, '%b %Y') AS month"),
                DB::raw('COUNT(*) AS total')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())
            ->groupBy('month')
            ->pluck('total', 'month');            // e.g. ['Jan 2025' => 18, 'Feb 2025' => 32]

        $reportLabels = $months->values();        // ['Dec 2024', 'Jan 2025', …]
        $reportData   = $months->map(fn ($m) => $monthlyRegistrations->get($m, 0)); // fill gaps with 0

        /* ───────────── 4. Full registration list (optional table) ────────── */
        $registrations = Registration::with(['volunteer', 'opportunity'])->latest()->get();

        return view('admin.reports.index', compact(
            'organizationsCount',
            'opportunitiesCount',
            'registrationsCount',
            'summary',
            'reportLabels',
            'reportData',
            'registrations'
        ));
    }
}
