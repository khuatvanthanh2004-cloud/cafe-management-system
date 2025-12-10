<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }
    #hero {
        background-image: url('background.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 30px 0;
	}
	
    #hero .btn {
        display: inline-block;
        background-color: #333;
        color: white;
        text-decoration: none;
        padding: 10px 30px;
        border-radius: 2px;
        font-size: 18px;
    }
    #products {
        padding: 50px 0;
    }
    .product-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .product {
        text-align: center;
        width: 48%;
        margin-bottom: 30px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .product img {
        border-radius: 10px;
        display: block;
        margin: 0 auto; /* Căn giữa ảnh */
    }
    .product h3 {
        font-size: 24px;
        margin: 20px 0;
    }
    .product p {
        font-size: 16px;
        color: #666;
        margin: 0 20px 20px;
    }
	h2 {
    color: #F90; /* Màu vàng nhạt */
}
  </style>
</head>
<body>
<h2 style="text-align:center">Chào mừng đến với cửa hàng ThanhThao coffe của chúng tôi</h2>
        <p>Chúng tôi bán coffe có xuất xứ từ những vùng trồng cà phê nổi tiếng trên khắp thế giới.</p>
        <img src="image/Screenshot 2024-04-15 122509.png" width="700" />
        <img src="image/Screenshot 2024-04-15 124748.png" height="490" width="316">
<section id="hero">
    <div class="container">
        <a href="index2.php?action=product" class="btn">Xem Sản Phẩm</a>
    </div>
</section>

<section id="products">
    <div class="container">
        <h2 style="text-align:center">Một số nguyên liệu đặc trưng tạo ra caffe</h2>
        <div class="product-container">
            <div class="product">
                <img src="image/OIP (3).jpg" height="400" width="400" alt="Cà phê 1">
                <h3>Cà Phê Robusta</h3>
                <p>Loại cà phê được trồng ở vùng cao nguyên, mang lại hương vị đậm đà và đắng.</p>
            </div>
            <div class="product">
                <img src="image/OIP (4).jpg" height="400" width="400" alt="Cà phê 2">
                <h3>Cà Phê Arabica</h3>
                <p>Cà phê Arabica mang lại hương vị êm ái, độ chua nhẹ và hương thơm đặc trưng.</p>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div>
        <h2 style="text-align:center">Truyền thuyết về cây cà phê</h2>
        <p>Ngày xưa, anh chàng chăn cừu tên là Kaldi trong quá trình chăn cừu đã chứng kiến cảnh những con cừu ăn một loại trái cây màu đỏ, sau đó chúng nhảy nhót một cách vui vẻ lạ thường. Anh nếm thử xem vị trái cây lạ này như thế nào, bỗng anh cảm thấy tràn đầy năng lượng, tinh thần sảng khoái vô cùng. 

        Anh chăn cừu đã báo phát hiện mới này cho các tu sĩ. Tuy nhiên, thoạt đầu mọi người cho rằng đây là trái cấm nên quyết định đốt loại hạt này. Ngạc nhiên là một mùi hương thoang thoảng tỏa ra đã kích thích mọi giác quan, thôi thúc cảm giác muốn nếm thử nơi các vị tu sĩ. Cuối cùng, họ cảm thấy dồi dào sức sống và quyết định biến cà phê trở thành một thứ thức uống trước khi hành lễ.  

        Thực chất, đây chỉ là truyền thuyết và chưa có chứng cứ nào xác minh. Sự thật thì cà phê có nguồn gốc từ Ethiopia (Kaffa) và được lưu chuyển sang Ai Cập khi những nô lệ Ethiopia bị bắt sang quốc gia này. Từ đó, cà phê trở thành thức uống phổ biến được nhiều người dân Ai Cập yêu thích. 

        Mãi đến thế kỷ 18, một số người Hà Lan đã mang hạt cà phê ra ngoài lãnh thổ Ai Cập và trồng trọt tại Martinique. Tiếp đó, người Brazil và người Pháp cũng mang loại hạt này trở về quên hương của họ, đặt nền móng cho sự phát triển toàn cầu của cây cà phê. </p>
        <img src="image/cac-nuoc-trong-ca-phe-tren-the-gioi-1536x1152.png" height="600" width="1000
        " class="center-image" alt="Cây cà phê trên thế giới">
    </div>
</div>
</body>
</html>