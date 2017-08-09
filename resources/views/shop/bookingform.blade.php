<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
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
<p><b>Ngày:</b> {{ date('Y-m-d') }}</p>
<p><b>Tên khách hàng:</b> {{ $name }}</p>
<p><b>Địa chỉ giao hàng:</b> {{ $address }}</p>
<p style="color: blue;"><b>Người liên hệ</b></p>
<p><b>Họ & tên:</b> {{ $contact }}</p>
<table>
    <tr>
        <th bgcolor = "blue">STT</th>
        <th bgcolor = "blue">Mã SP</th>
        <th bgcolor = "blue">Tên SP</th>
        <th bgcolor = "blue">Quy cách</th>
        <th bgcolor = "blue">Đơn giá (trước VAT)</th>
        <th bgcolor = "blue">Đơn giá (trước VAT đã CK 8%)</th>
        <th bgcolor = "blue">Số lượng</th>
        <th bgcolor = "blue">Tổng giá</th>
        <th bgcolor = "blue">Ghi chú</th>
    </tr>
    <tr>
        <!-- Kháng sinh dạng tiêm -->
        <td bgcolor = "yellow">1</td>
        <td bgcolor = "yellow">KDT006</td>
        <td bgcolor = "yellow">ENPRO 100</td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow">162,857 VNĐ</td>
        <td bgcolor = "yellow">149,829 VNĐ</td>
    </tr>

    <tr>
        <td bgcolor = "yellow">2</td>
        <td bgcolor = "yellow">KDT003</td>
        <td bgcolor = "yellow">FLOCOL 300 inj</td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow">348,571 VNĐ</td>
        <td bgcolor = "yellow">320,685 VNĐ</td>
    </tr>

    <tr>
        <td bgcolor = "yellow">3</td>
        <td bgcolor = "yellow">KDT007</td>
        <td bgcolor = "yellow">GENTA- 50 inj</td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow">141,905 VNĐ</td>
        <td bgcolor = "yellow">130,552 VNĐ</td>
    </tr>

    <tr>
        <td bgcolor = "yellow">4</td>
        <td bgcolor = "yellow">KDT004</td>
        <td bgcolor = "yellow">LINCOMYCIN inj</td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow"> 151,429 VNĐ</td>
        <td bgcolor = "yellow"> 139,314 VNĐ</td>
    </tr>

    <tr>
        <td bgcolor = "yellow">5</td>
        <td bgcolor = "yellow">KDT001</td>
        <td bgcolor = "yellow">O.T.C LA inj </td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow"> 180,000 VNĐ</td>
        <td bgcolor = "yellow"> 165,600 VNĐ</td>
    </tr>

    <tr>
        <td bgcolor = "yellow">6</td>
        <td bgcolor = "yellow">KDT002</td>
        <td bgcolor = "yellow">TYFUL inj</td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow"> 398,629 VNĐ</td>
        <td bgcolor = "yellow"> 366,739 VNĐ</td>
    </tr>

    <tr>
        <td bgcolor = "yellow">7</td>
        <td bgcolor = "yellow">KDT005</td>
        <td bgcolor = "yellow">TYLOSIN 200 inj</td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow"> 218,095 VNĐ</td>
        <td bgcolor = "yellow"> 200,648 VNĐ</td>
    </tr>

    <tr>
        <td bgcolor = "yellow">8</td>
        <td bgcolor = "yellow">KDT008</td>
        <td bgcolor = "yellow">AMOXYCILLIN - LA inj</td>
        <td bgcolor = "yellow">Chai 100ml</td>
        <td bgcolor = "yellow"> 320,000 VNĐ</td>
        <td bgcolor = "yellow"> 294,400 VNĐ</td>
    </tr>
    <!-- Kháng sinh dạng tiêm -->

    <!-- Kháng sinh dạng bột nước -->

</table>

<p>Tổng tiền trước VAT: <b  style="color:red">{{ number_format(10000, 0, '.', '.') . ' ' . 'VNĐ' }}</b></p>
<p>VAT (5%): <b  style="color:red">{{ number_format(10000, 0, '.', '.') . ' ' . 'VNĐ' }}</b></p>
<p>TỔNG GIÁ BAO GỒM VAT: <b  style="color:red">{{ number_format(10000, 0, '.', '.') . ' ' . 'VNĐ' }}</b></p>

</tr>
</body>
</html>