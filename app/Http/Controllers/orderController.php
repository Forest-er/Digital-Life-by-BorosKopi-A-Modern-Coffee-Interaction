<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_items;
use App\Models\product;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $OrdersActive = orders::whereNot('status', 'Selesai')->get();
        $Orders = orders::all();
        $WaitingOrders = orders::where('status', 'Menunggu')->get();
        $processingOrders = orders::where('status', 'Proses')->get();
        $deliveredOrders = orders::where('status', 'Diantar')->get();
        $doneOrders = orders::where('status', 'Selesai')->get();
        return view('ordered.order', compact('OrdersActive', 'Orders', 'WaitingOrders', 'processingOrders', 'deliveredOrders', 'doneOrders'));
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
        $OrdersProduct = order_items::with('product')->where('order_id', $id)->get();
        $Orders = orders::where('order_id', $id)->first();
        return view('ordered.detail', compact('Orders', 'OrdersProduct'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,proses,selesai,dibatalkan'
        ]);
        $order = Orders::where('order_id', $id)->firstOrFail();
        $order->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function count(){
        $orderCount = orders::get()->count();
        return view('dashboard', compact('orderCount'));
    }
    public function Transaction(){
        $orderdone = Orders::where('status', 'selesai')->get();
        $target = Orders::all();
        return view('ordered.transaction', compact('orderdone', 'target'));
    }
}
