<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            font-family: arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #cacaca;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>
<div style="font-size: 23px; margin-block: 20px;">Door options</div>
<table>
    <tr>
        <td>paint colors</td>
        <td>{{$paint_colors}}</td>
    </tr>
    <tr>
        <td>film colors</td>
        <td>{{$film_colors}}</td>
    </tr>
    <tr>
        <td>handle colors</td>
        <td>{{$handle_colors}}</td>
    </tr>
    <tr>
        <td>widths</td>
        <td>{{$widths}}</td>
    </tr>
    <tr>
        <td>heights</td>
        <td>{{$heights}}</td>
    </tr>
    <tr>
        <td>opening</td>
        <td>{{$opening}}</td>
    </tr>
</table>
<div style="font-size: 23px; margin-block: 20px;">Total price: {{$total_price}} rub.</div>
</body>

</html>
