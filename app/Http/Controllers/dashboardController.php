<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_items;
use App\Models\product;

use function Symfony\Component\Clock\now;

class dashboardController extends Controller
{
    public function welcome() {
        $products = product::with('category')->get();
        return view('welcome', compact('products'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastSevenDays = \Carbon\Carbon::now()->subDays(7)->startOfDay();
        $menus = order_items::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(3)
            ->get();

        $startDate = \Carbon\Carbon::today()->subDays(6);

        $salesData = orders::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->get()
            ->pluck('total', 'date');
        $labels = [];
        $dataValues = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = \Carbon\Carbon::today()->subDays($i);
            $dateString = $date->format('Y-m-d');
            $labels[] = $date->format('l');
            $dataValues[] = $salesData->get($dateString, 0);
        }
        $orderCount = orders::where('created_at', '>=', today())->count();
        $orderItemsSell = order_items::where('created_at', '>=', today())->sum('quantity');
        $orderTotalPrice = orders::where('status', 'Selesai')
            ->where('created_at', '>=', today());
        $Orders = orders::where('created_at', '>=', today())->latest()->get();
        $newOrders = orders::where('status', '!=', 'Selesai')->get();
        $lowerStockProducts = product::where('stock_quantity', '<=', 5)->get();

        return view('dashboard', compact(
            'orderCount',
            'Orders',
            'orderTotalPrice',
            'orderItemsSell',
            'newOrders',
            'menus',
            'labels',
            'dataValues',
            'lowerStockProducts'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
