<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\product;
use App\Models\order_items;
use App\Models\categories;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::with('category')->get();
        $orderedItem = null;
        if (session()->has('current_order_id')) {
            $currentOrderId = session('current_order_id');
            $orderedItem = orders::with('orderItems.product')->find($currentOrderId);
        }
        $orderedProducts = $orderedItem ? $orderedItem->orderItems : collect();
        return view('ordered.addOrder', compact('products', 'orderedProducts'));
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
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'number_phone' => 'required|string|max:255',
            'address' => 'required|string|max:500',
        ]);
        $order = new orders();
        $order->customer_name = $request->input('customer_name');
        $order->number_phone = $request->input('number_phone');
        $order->address = $request->input('address');
        $order->save();
        $newID = $order->order_id;
        session(['current_order_id' => $order->order_id]);
        return redirect()->route('order.add')->with('success', 'Data pemesan berhasil disimpan.');
    }

    public function storeStep2(Request $request) {
        $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
        ]);
        $products = product::find($request->input('product_id'));
        $price = $products->price * $request->input('quantity');
        $orderItem = new order_items();
        $orderItem->order_id = $request->input('order_id');
        $orderItem->product_id = $request->input('product_id');
        $orderItem->quantity = $request->input('quantity');
        $orderItem->price = $price;
        $orderItem->save();
        return redirect()->route('order.add')->with('success', 'Menu berhasil ditambahkan ke pesanan.');
    }
    public function storeStep3(Request $request) {
        $request->validate([
            'order_id' => 'required|exists:orders,order_id'
        ]);
        $order = orders::where('order_id', $request->input('order_id'))->first();
        $orderItems = order_items::where('order_id', $request->input('order_id'))->get();
        $order->total_price = $orderItems->sum('price') + 10000;
        $order->save();
        session()->forget('current_order_id');
        return redirect()->route('order.whatsapp', ['order_id' => $order->order_id])->with('success', 'Pesanan berhasil diselesaikan.');
    }

    public function sendToWhatsapp($order_id)
    {
        // 1. Ambil data order beserta items dan produknya
        $order = orders::with('orderItems')->findOrFail($order_id);
        
        // 2. Format Header Pesan
        $message = "*HALO BOROSKOPI!* ☕\n";
        $message .= "Saya ingin melakukan konfirmasi pesanan:\n\n";
        $message .= "*--- DATA PELANGGAN ---*\n";
        $message .= "Nama: " . $order->customer_name . "\n";
        $message .= "No. WA: " . $order->number_phone . "\n";
        $message .= "Alamat: " . $order->address . "\n\n";
        
        $message .= "*--- DETAIL PESANAN ---*\n";
        
        $subtotal = 0;
        foreach ($order->orderItems as $item) {
            $itemTotal = $item->price; // Karena sudah dikali qty di storeStep2
            $message .= "- " . $item->product->product_name . " (" . $item->quantity . "x) : Rp " . number_format($itemTotal, 0, ',', '.') . "\n";
            $subtotal += $itemTotal;
        }
        
        $total = $subtotal + 10000; // Plus ongkir
        
        $message .= "\n*Subtotal:* Rp " . number_format($subtotal, 0, ',', '.') . "\n";
        $message .= "*Ongkir:* Rp 10.000\n";
        $message .= "*TOTAL TAGIHAN: Rp " . number_format($total, 0, ',', '.') . "*\n\n";
        $message .= "Mohon segera diproses ya, terima kasih!";

        // 3. Encode pesan agar aman untuk URL
        $encodedMessage = urlencode($message);
        $waNumber = "6285283278467"; // GANTI DENGAN NOMOR WA KAMU (Gunakan format 62)

        $waUrl = "https://wa.me/" . $waNumber . "?text=" . $encodedMessage;

        return redirect()->away($waUrl);
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
