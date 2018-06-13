<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        tr > td {
            border: 1px solid #333333;
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th style="background:#1f4e78;color:#fff">CAUSA DE FALLA</th>
                <th style="background:#1f4e78;color:#fff">CANTIDAD</th>
                <th style="background:#1f4e78;color:#fff">%</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->porcentaje }}</td>
            </tr>
            @endforeach
            <tr></tr>
            <tr>
                <td style="background:#1f4e78;color:#fff">TOTAL</td>
                <td style="background:#1f4e78;color:#fff">{{ $cantidad }}</td>
                <td style="background:#1f4e78;color:#fff">100%</td>
            </tr>
        </tbody>
    </table>
</body>
</html>