<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function analytics()
    {

        $eventsCount = DB::table('events')->select(
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('created_by');

        $eventsCountAverage = DB::table(DB::raw("({$eventsCount->toSql()}) as sub"))
        ->mergeBindings($eventsCount)
        ->select(DB::raw('ROUND(AVG(sub.count)) as average'))
        ->value('average');

        $eventsCountByUser = DB::table('events')->select(
            'users.id',
            DB::raw("CONCAT(users.first_name, ' ', users.last_name) as full_name"),
            DB::raw('COUNT(*) as count')
        )
        ->join('users', 'users.id', 'events.created_by')
        ->groupBy('events.created_by')
        ->get();

        return view('pages.analytics.list', compact('eventsCountAverage', 'eventsCountByUser'));
    }
}
