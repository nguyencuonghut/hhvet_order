<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
</head>

<br>

<body>
  <p>Đơn hàng bị hủy:<b><i>{{ $order->name }} | {{  number_format($order->cart->totalPrice, 0, '.', ',') }} VNĐ</i></b></p>
  <p><b>Lý do:</b>{{ $order->reason }}</p>
</body>
</html>