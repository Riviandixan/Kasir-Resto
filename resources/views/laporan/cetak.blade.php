<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pegawai</title>
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535
        }
    </style>
</head>
<body>
    <div class="form-group">
        <p align="center">Laporan</p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pelanggan</th>
                <th class="text-center">Menu</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Total Harga</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Tanggal</th>
            </tr>
            @foreach ($transaksis as $transaksi)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td class="text-center">{{ $transaksi->nama_pelanggan }}</td>
                <td class="text-center">{{ $transaksi->menu->nama_menu }}</td>
                <td class="text-center">{{ $transaksi->jumlah }}</td>
                <td class="text-center">Rp. {{ $transaksi->total_harga }}</td>
                <td class="text-center">{{ $transaksi->pegawai->nama }}</td>
                <td class="text-center">{{ date('Y-m-d', strtotime($transaksi->created_at)) }}</td>
            </tr>
            @endforeach
        </table>
    </div>

<script type="text/javascript">
    window.print();
</script>    
</body>
</html>