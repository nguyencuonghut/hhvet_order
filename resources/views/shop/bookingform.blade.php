<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
</head>

<br>

<style>
    table, td, th {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 1000px;
    }

    th {
        text-align: center;
    }
    td {
        text-align: center;
    }

</style>

<body>
<table style="border: 1px solid black;border-collapse: collapse;width: 1000px;">
    <tr>
        <td style="text-align: left;border: 1px solid black;"><b>Tên khách hàng</b></td>
        <td style="text-align: left;border: 1px solid black;">{{ $order->name }}</td>
    </tr>
    <tr>
        <td style="text-align: left;border: 1px solid black;"><b>Địa chỉ giao hàng</b></td>
        <td style="text-align: left;border: 1px solid black;">{{ $order->address }}</td>
    </tr>
    <tr>
        <td style="text-align: left;border: 1px solid black;"><b>Địa chỉ hóa đơn</b></td>
        <td style="text-align: left;border: 1px solid black;">{{ $order->bill_addr }}</td>
    </tr>
    <tr>
        <td style="text-align: left;border: 1px solid black;"><b>Người liên hệ</b></td>
        <td style="text-align: left;border: 1px solid black;">{{ $order->contact }}</td>
    </tr>
</table>
<br>
<table style="border: 1px solid black;border-collapse: collapse;width: 1000px;">
    <tr>
        <th style="border: 1px solid black;text-align: center;">STT</th>
        <th style="border: 1px solid black;text-align: center;">Mã SP</th>
        <th style="border: 1px solid black;text-align: center;">Tên SP</th>
        <th style="border: 1px solid black;text-align: center;">Quy cách</th>
        <th style="border: 1px solid black;text-align: center;">Đơn giá</th>
        <th style="border: 1px solid black;text-align: center;">Số lượng bán</th>
        <th style="border: 1px solid black;text-align: center;">Số lượng khuyến mại</th>
        <th style="border: 1px solid black;text-align: center;">Tổng tiền</th>
    </tr>
    <?php $i = 1 ?>
    @foreach($order->cart->items as $item)
        @if($item['qty'])
            <tr>
                <td style="border: 1px solid black;text-align: center;">{{ $i }}</td>
                <td style="border: 1px solid black;text-align: center;">{{ $item['item']['code'] }}</td>
                <td style="border: 1px solid black;text-align: center;">{{ $item['item']['title'] }}</td>
                <td style="border: 1px solid black;text-align: center;">{{ $item['item']['format'] }}</td>
                <td style="border: 1px solid black;text-align: center;">{{ number_format($item['item']['price'], 0, '.', ',') }}</td>
                <td style="border: 1px solid black;text-align: center;">{{ $item['qty'] }}</td>
                <td style="border: 1px solid black;text-align: center;">{{ floor($item['qty']/$item['item']['pro_major']) * $item['item']['pro_minor'] }}</td>
                <td style="border: 1px solid black;text-align: center;">{{ number_format($item['qty'] * $item['item']['price'], 0, '.', ',') }}</td>
            </tr>
            <?php $i++ ?>
        @endif
    @endforeach
</table>

@if($order->note)
    <p><b>Ghi chú:</b> {{ $order->note }}</p>
@endif
<hr>
<p>Tổng tiền trước VAT:<b style="color:red"> {{ number_format($order->cart->totalPrice, 0, '.', ',') }} </b>VNĐ</p>
<p>Tổng tiền sau VAT:<b style="color:red"> {{ number_format($order->cart->totalPrice * 1.05, 0, '.', ',') }} </b>VNĐ</p>
</body>
</html>