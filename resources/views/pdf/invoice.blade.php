<?php
use Carbon\Carbon;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .invoice-box {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        .invoice-box table td {
            padding: 8px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .title img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .title h2 {
            font-size: 24px;
            margin: 0;
        }
        .information {
            margin-bottom: 40px;
        }
        .information td {
            padding: 5px 0;
        }
        .invoice-box table tr.heading td {
            background: #000000;
            color: #fff;
            font-weight: bold;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #ddd;
        }
        .invoice-box table tr.total td {
            font-weight: bold;
        }
        .total-line {
            text-align: right;
            border-top: 2px solid #ddd;
            padding-top: 10px;
        }
        .total-value {
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{-- <img src="https://images.vexels.com/media/users/3/314289/isolated/preview/71c65bccc8fefd1ba687a3bbad900672-a-hand-holding-a-spanner-wrench.png" alt="Company Logo"> --}}
                                <img src="https://images.vexels.com/media/users/3/304449/isolated/preview/a0bd79977e33945e73863d5e341e3861-cartoon-image-of-a-worker-with-a-wrench.png" alt="Company Logo">
                                <h2>El-Morabet Mechanics</h2>
                                <p>Barbourine Hay DarMoursia Rue n° 3, Tetouan, Morocco</p>
                                <p>Email: emgarage@gmail.com</p>
                                <p>Phone: +212 618 64 02 96</p>
                            </td>
                            <td>
                                <p><strong>Invoice Number:</strong> {{ $invoice->id }}</p>
                                <p><strong>Invoice Date:</strong> {{ Carbon::now() }}</p>
                                <p><strong>From:</strong> {{ $invoice->repair->date_start }}</p>
                                <p><strong>To:</strong> {{ $invoice->repair->date_end }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>Client Information:</strong><br>
                                Name: {{ $invoice->repair->car->client->name }}<br>
                                Address: {{ $invoice->repair->car->client->adress }}<br>
                                Email: {{ $invoice->repair->car->client->email }}<br>
                                Phone: {{ $invoice->repair->car->client->phone }}
                            </td>
                            <td>
                                <strong>Car Information:</strong><br>
                                Make: {{ $invoice->repair->car->make }}<br>
                                Model: {{ $invoice->repair->car->model }}<br>
                                Fuel Type: {{ $invoice->repair->car->fuel_type }}<br>
                                Registration: {{ $invoice->repair->car->registration }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Charge</td>
                <td>Price</td>
            </tr>
            @foreach($invoice->charges as $charge)
            <tr class="item">
                <td>{{ $charge->charge_name }}</td>
                <td>${{ number_format($charge->price, 2) }}</td>
            </tr>
            @endforeach
            <br><br><br>
            <tr class="total">
                <td colspan="2" class="total-line">
                    <div class="total-value">Total: ${{ number_format($invoice->total_price, 2) }}</div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
