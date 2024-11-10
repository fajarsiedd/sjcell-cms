<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use marineusde\LarapexCharts\Charts\BarChart;
use marineusde\LarapexCharts\Charts\DonutChart;
use marineusde\LarapexCharts\Options\XAxisOption;

class DashboardController extends Controller
{
    public function index()
    {
        $published = Product::with('category')->where('status', 1);
        $unpublished = Product::with('category')->where('status', 0);
        $summary = (object) [
            'total' => $published->count() + $unpublished->count(),
            'published' => $published->count(),
            'nopublished' => $unpublished->count()
        ];

        $pieChart = (new DonutChart)
            ->setDataset([$published->count(), $unpublished->count()])
            ->setLabels(['Published', 'Unpublished'])
            ->setColors(['#FACA15', '#1A1946']);

        $categories = Category::all();
        $categoryNames = $categories->pluck('name')->toArray();
        $products = [];

        foreach ($categories as $category) {
            $filteredProducts = Product::where('category_id', $category->id);

            array_push($products, $filteredProducts->count());
        }

        $barChart = (new BarChart)
            ->setXAxisOption(new XAxisOption($categoryNames))
            ->setColors(['#1A1946'])
            ->setDataset([
                [
                    'name'  =>  'Total',
                    'data'  =>  $products
                ]
            ]);

        return view('dashboard', ['title' => 'Dashboard', 'pieChart' => $pieChart, 'barChart' => $barChart, 'summary' => $summary]);
    }
}
