<!DOCTYPE html>
<html>
    <head>
        <title>Data User</title>
    </head>
    <body>
        <h1>Transaksi Penjualan</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>Penjualan_Id</th>
                <th>User_Id</th>
                <th>Pembeli</th>
                <th>Penjualan_Kode</th>
                <th>Penjualan_Tanggal</th>

            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->penjualan_id }}</td>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->pembeli }}</td>
                <td>{{ $d->penjualan_kode }}</td>
                <td>{{ $d->penjualan_tanggal }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
