<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_items;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesData = \App\Models\orders::selectRaw('DAYNAME(created_at) as day, SUM(total_price) as total')
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('day')
        ->get()
        ->pluck('total', 'day'); // Hasil: ["Monday" => 500000, "Tuesday" => 300000, ...]

        // Menyesuaikan urutan hari agar sesuai dengan grafik (Sun-Sat)
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $data = [];
        foreach ($days as $day) {
            $data[] = $salesData->get($day, 0); // Jika hari kosong, isi 0
        }
        $orderCount = orders::get()->count();
        $Orders = orders::all();
        $orderTotalPrice = orders::where('status', 'Selesai');
        $orderItemsSell = order_items::get()->count();
        $newOrders = orders::whereNot('status', 'Selesai')->get();
        return view('dashboard', compact('orderCount', 'Orders', 'orderTotalPrice', 'orderItemsSell', 'newOrders', 'data'));
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
