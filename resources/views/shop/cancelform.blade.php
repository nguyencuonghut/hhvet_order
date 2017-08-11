  <p>Đơn hàng bị hủy:<b><i>{{ $order->name }} | {{  number_format($order->cart->totalPrice, 0, '.', ',') }} VNĐ</i></b></p>
  <p><b>Lý do:</b>{{ $order->reason }}</p>