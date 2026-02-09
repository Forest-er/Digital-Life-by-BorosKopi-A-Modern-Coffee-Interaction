<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #4A4947;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #B17457;
            padding-bottom: 10px;
        }
        .header h1 {
            text-transform: uppercase;
            margin: 0;
            color: #B17457;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 12px;
            color: #666;
        }
        .info-table {
            width: 100%;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .main-table th {
            background-color: #B17457;
            color: white;
            text-align: left;
            padding: 10px;
            font-size: 13px;
        }
        .main-table td {
            padding: 10px;
            border-bottom: 1px solid #D8D2C2;
            font-size: 12px;
        }
        .main-table tr:nth-child(even) {
            background-color: #FAF7F0;
        }
        .total-section {
            text-align: right;
            margin-top: 20px;
            padding-right: 10px;
        }
        .total-box {
            display: inline-block;
            background-color: #4A4947;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 10px;
            text-align: center;
            color: #999;
            padding-bottom: 20px;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
    </style>
</head>
<body>

    <div class="header">
        <h1>LAPORAN PENJUALAN HARIAN</h1>
        <p>BorosKopi Coffee Shop.</p>
    </div>

    <table class="info-table">
        <tr>
            <td><strong>Judul Laporan:</strong> {{ $title }}</td>
            <td class="text-right"><strong>Tanggal Cetak:</strong> {{ $date }}</td>
        </tr>
    </table>



    <table class="main-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="40%">Nama Produk</th>
                <th width="20%" class="text-right">Harga Satuan</th>
                <th width="15%" class="text-center">Stok</th>
                <th width="20%" class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $p)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $p->customer_name }}</td>
                <td class="text-right">Rp {{ number_format($p->total_price, 0, ',', '.') }}</td>
                <td class="text-center">{{ $p->stock_quantity }}</td>
                <td class="text-right">Rp {{ number_format($p->number_phone, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-section">
        <div class="total-box">
            <span style="font-size: 12px; opacity: 0.8;">TOTAL PENDAPATAN:</span><br>
            <span style="font-size: 18px; font-weight: bold;">Rp {{ number_format($total_value, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="footer">
        Laporan ini digenerate secara otomatis oleh Sistem Manajemen BorosKopi pada {{ date('d/m/Y H:i') }}
    </div>

</body>
</html>
