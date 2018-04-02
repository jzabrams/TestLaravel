<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Charts;

class ChartTestController extends Controller
{
    public function index()
    {
//        $chart = Charts::multi('bar', 'chartjs')
//            // Setup the chart settings
//            ->title("My Cool Chart")
//            // A dimension of 0 means it will take 100% of the space
//            ->dimensions(0, 400) // Width x Height
//            // This defines a preset of colors already done:)
////            ->template("google")
//            // You could always set them manually
//             ->colors(['#2196F3', '#F44336', '#FFC107'])
//            // Setup the diferent datasets (this is a multi chart)
//            ->dataset('Element 1', [5,20,100])
//            ->dataset('Element 2', [15,30,80])
//            ->dataset('Element 3', [25,10,40])
//            // Setup what the values mean
//            ->labels(['One', 'Two', 'Three']);

        $chart = Charts::database(\App\TestTimeSeries::all(), 'bar', 'highcharts')
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('ts');

        return view('charts.test', ['chart' => $chart]);
    }
}

