<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scele=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DB Facade</title>
    </head>
    <body>
        <h1>Level pengguna</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Kodel Level</th>
                <th>nama level</th>
            </tr>

            @foreach ($data as $d )
            <tr>
                <td> {{ $d->level_id}}</td>
                <td> {{ $d->level_kode}}</td>
                <td> {{ $d->level_nama}}</td>
            </tr>

            @endforeach
        </table>
    </body>
</html>
