<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_items;
use App\Models\product;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use function Symfony\Component\Clock\now;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Mengambil tanggal hari ini
    $today = today();

    // 1. Data Statistik/Tab hanya untuk hari ini
    $OrdersActive     = orders::whereNot('status', 'Selesai')->whereDate('created_at', $today)->get();
    $WaitingOrders    = orders::where('status', 'Menunggu')->whereDate('created_at', $today)->get();
    $processingOrders = orders::where('status', 'Proses')->whereDate('created_at', $today)->get();
    $deliveredOrders  = orders::where('status', 'Diantar')->whereDate('created_at', $today)->get();
    $doneOrders       = orders::where('status', 'Selesai')->whereDate('created_at', $today)->get();

    // 2. Query untuk tabel utama (Filterable)
    $query = orders::query()->whereDate('created_at', $today);

    if ($request->has('status') && $request->status != 'all') {
        // Karena di atas sudah ada whereDate, kita cukup tambah filter status
        if ($request->status == 'menunggu') {
            $query->where('status', 'Menunggu');
        } else {
            // Gunakan ucfirst atau sesuaikan dengan case di database (contoh: Proses, Diantar)
            $query->where('status', ucfirst($request->status));
        }
    }

    $Orders = $query->orderBy('created_at', 'desc')->get();

    return view('ordered.order', compact(
        'OrdersActive',
        'Orders',
        'WaitingOrders',
        'processingOrders',
        'deliveredOrders',
        'doneOrders'
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
        $order = Orders::where('order_id', $id)->firstOrFail();
        $orderItems = order_items::where('order_id', $id)->get();
        foreach ($orderItems as $OI){
            $product = product::where('product_id', $OI->product_id)->first();
            if ($product) {
                $product->stock_quantity += $OI->quantity;
                $product->save();
            }
        }
        $orderItems->each->delete();
        $order->delete();
        return redirect()->route('order')->with('success', 'Pesanan berhasil dihapus!');
    }
    public function count(){
        $orderCount = orders::get()->count();
        return view('dashboard', compact('orderCount'));
    }
    public function Transaction() {

        $orderdone = Orders::where('status', 'Selesai')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->latest()
            ->get();

        $orderFail = orders::where('status', 'Dibatalkan')->get()->count();
        $target = product::get()->sum('price') * product::get()->sum('stock_quantity'); // Contoh target penjualan, bisa disesuaikan dengan kebutuhan

        return view('ordered.transaction', compact('orderdone', 'orderFail', 'target'));
    }
    public function exportPdf()
    {
        $data = [
            'title' => 'Laporan Pendapatan Boroskopi Harian',
            'date' => date('d/m/Y'),
            'products' => orders::where('status', 'Selesai')->where('created_at', '>=', today())->get(),
            // Hitung total seperti yang kita bahas tadi
            'total_value' => orders::where('status', 'Selesai')->where('created_at', '>=', today())->sum('total_price')
        ];

        $pdf = Pdf::loadView('ordered.report', $data);
        return $pdf->download('laporan-boroskopi.pdf');
    }
}
