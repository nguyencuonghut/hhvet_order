<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'code'          => 'KDT001',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'O.T.C - LA inj',
            'description'   => 'Phòng và điều trị các bệnh do vi khuẩn Gram âm và Gram dương mẫn cảm với Oxytetracyclline gây ra, bệnh do spilocheles và rickettsia.
Đối với lợn: Điều trị viêm phổi, viêm khớp, viêm vú, viêm nội mạc tử cung, viêm ruột do vi khuẩn, nhiễm trùng vết thương, bệnh xoắn khuẩn, đóng dấu lợn, tụ huyết trùng, lợn con bị tiêu chảy, nhiễm trùng thứ phát sau khi phẫu thuật hoặc sau đẻ',
            'price'         => 182729,
            'format'        => 'Chai 100ml',
            'pro_major'     => 10,
            'pro_minor'     => 2
        ]);

        $product->save();

        $product = new \App\Product([
            'code'          => 'KDT002',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'TYFUL inj',
            'description'   => 'Hiệu quả vượt trội. 
Từ kết quả thực nghiệm, khi điều trị thuốc trong 6 ngày, tỷ lệ khỏi đạt 75% (70% với bệnh đường hô hấp, 80% với bệnh đường tiêu hoá); trong 13 ngày đạt 95%(90% với bênh đường hô hấp, 100% với bênh đường tiêu hoá). 
Tăng tỷ lệ tăng trọng trên ngày: Không những tăng trọng trên ngày, mà còn tăng tốc độ lớn, do tăng hiệu quả tiêu hoá thức ăn. 
Mức độ an toàn cao. Không có kết quả gây chết ở liều gấp 5 lên điều trị. 
Trị bệnh do vi khuẩn nhạy cảm với Tylosin gây ra. 
Đối với lợn, điều trị viêm phổi, lỵ, tiêu chảy, đóng dấu, viêm khớp, nhiễm trùng thứ phát từ các bệnh truyền nhiễm do virus.',
            'price'         => 409279,
            'format'        => 'Chai 100ml',
            'pro_major'     => 10,
            'pro_minor'     => 2
        ]);

        $product->save();

        $product = new \App\Product([
            'code'          => 'KDT007',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'GENTA - 50 inj',
            'description'   => 'Phòng và điều trị các bệnh như sau:
Đối với lợn: Điều trị bệnh tiêu chảy cấp tính ở lợn con, bệnh kiết lỵ, nhiễm trùng máu do E.coli, viêm ruột, viêm phổi, viêm teo mũi, viêm phế quản.',
            'price'         => 136219,
            'format'        => 'Chai 100ml',
            'pro_major'     => 10,
            'pro_minor'     => 2
        ]);

        $product->save();

        $product = new \App\Product([
            'code'          => 'KDT004',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'LINCOMYCIN inj',
            'description'   => 'Đặc trị các bệnh đường hô hấp và đường tiêu hóa, viêm khớp, áp se, nhiễm trùng thứ phát sau khi làm phẫu thuật và viêm tai ngoài.',
            'price'         => 148230,
            'format'        => 'Chai 100ml',
            'pro_major'     => 10,
            'pro_minor'     => 2
        ]);

        $product->save();

        $product = new \App\Product([
            'code'          => 'KDT005',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'Tylosin 200 inj',
            'description'   => 'Thành phần hoạt động của Tylosin 200 là Tylosin, đây là một kháng sinh mạnh được tạo ra trong quá trình lên men củ vi khuẩn Streptomyces fradiae. Kháng sinh này không những có hiệu quả với vi khuẩn Gram + và Gram – mà còn cá tác dụng với xoắn khuẩn và Mycoplasma. Do phổ kháng khuẩn rộng, Tylosin 200 mang lại hiệu quả tuyệt với trong điều trị CRD trên gà, hồng lỵ và hô hấp trên gia súc.
Đối với trâu bò, dê, cừu: Chữa viêm phổi, viêm tử cung, viêm niệu đạo, viêm vú, thối móng, bệnh do xoắn khuẩn (Lepto), sốt vận chuyển, nhiễm trùng kế phát say các bệnh do virus.
Đối với lợn: Viêm phổi, hồng lỵ, đóng dấu, viêm khớp, nhiễm trùng kế phát sau do các bệnh virus.
 Gia cầm: CRD, CCRD, nhiễm trùng kế phát sau các bệnh do virus. ',
            'price'         => 216700,
            'format'        => 'Chai 100ml',
            'pro_major'     => 10,
            'pro_minor'     => 2
        ]);

        $product->save();

        $product = new \App\Product([
            'code'          => 'KDT006',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'ENPRO inj',
            'description'   => 'Thuốc có phổ kháng khuẩn rộng, hoạt động chống lại cả vi khuẩn Gram (+), Gram (-) và Mycoplasma.
Sau khi tiêm, thuốc nhanh chóng hấp thu vào các mô cơ quan và đạt nồng độ điều trị cao.
Thuốc có độ an toàn cao và hầu như không có tác dụng phụ.

Phòng và điều trị các bệnh về đường hô hấp và tiêu hóa, bao gồm bệnh tiêu chảy trên lợn, bê và chó do E.coli và Salmonella; bệnh viêm phổi do Mycoplasma và Pasteurella.',
            'price'         => 164812,
            'format'        => 'Chai 100ml',
            'pro_major'     => 10,
            'pro_minor'     => 2
        ]);

        $product->save();

        $product = new \App\Product([
            'code'          => 'KDT003',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'FLOCOL-300 inj',
            'description'   => 'Thuốc có tác dụng mạnh với các bệnh:
– Tiêu chảy phân trắng, phân xanh, phân vàng nhớt do Thương hàn (Samonella), bệnh Ecoli, bệnh
viêm ruột hoại tử do (Clostridium).
– Phân nhày vàng, có bọt và không bọt.
– Tím tai, tím mõm.
– Điều trị cho bệnh tai xanh trên heo( PRRS)
– Sưng đầu, phù mặt.
– Bệnh hô hấp phức hợp.
– Bệnh viêm phổi, màng phổi, viêm da.',
            'price'         => 335565,
            'format'        => 'Chai 100ml',
            'pro_major'     => 5,
            'pro_minor'     => 1
        ]);

        $product->save();

        $product = new \App\Product([
            'code'          => 'KDT008',
            'image'         => 'http://honghafeed.com.vn/Uploads/images/Sanpham/1.jpg',
            'title'         => 'Amoxicillin - LA inj',
            'description'   => 'Thuốc làm tăng cường quá trình trao đổi chất, thúc đẩy các phản ứng sinh hoá trong cơ thể, tạp một chế độ dinh dưỡng tốt, giúp cải thiện sức khoẻ vật nuôi.',
            'price'         => 294400,
            'format'        => 'Chai 100ml',
            'pro_major'     => 10,
            'pro_minor'     => 2
        ]);

        $product->save();

    }
}
