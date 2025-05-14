<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .contact-container {
        max-width: 800px;
        margin: 100px auto 50px;
        /* Đẩy form xuống xa hơn header */
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 10%;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .contact-header h2 {
        color: brown;
        font-size: 28px;
        font-weight: bold;
    }

    .contact-header p {
        color: #777;
        font-size: 16px;
    }

    .form-group label {
        font-weight: bold;
        color: #555;
    }

    .form-group input,
    .form-group textarea {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
    }

    .form-group textarea {
        resize: none;
    }

    .btn-submit {
        margin-top: 20px;
        background-color: burlywood;
        /* Thay đổi màu nút */
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #d2b48c;
        /* Màu sáng hơn khi hover */
        cursor: pointer;
    }

    .contact-info {
        margin-top: 40px;
        text-align: center;
    }

    .contact-info h4 {
        color: #555;
        font-size: 18px;
    }

    .contact-info p {
        color: #777;
        font-size: 14px;
    }
</style>





<div class="contact-container">
    <div class="contact-header">
        <h2>Liên hệ với chúng tôi</h2>
        <p>Gửi yêu cầu của bạn, chúng tôi sẽ phản hồi sớm nhất có thể!</p>
    </div>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Tên của bạn:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên của bạn" required>
        </div>
        <div class="form-group">
            <label for="email">Email của bạn:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email của bạn" required>
        </div>
        <div class="form-group">
            <label for="subject">Tiêu đề yêu cầu:</label>
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Nhập tiêu đề" required>
        </div>
        <div class="form-group">
            <label for="message">Nội dung mail:</label>
            <textarea name="message" class="form-control" id="message" rows="5" placeholder="Nhập nội dung" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" name="send" class="btn-submit">Gửi yêu cầu</button>
        </div>
    </form>
    <div class="contact-info">
        <h4>Thông tin liên hệ</h4>
        <p>Email: support@Mee Coffee.com</p>
        <p>Điện thoại: 0123-456-789</p>
        <p>Địa chỉ: 123 Đường ABC, Quận XYZ, TP. Hà Nội</p>
    </div>
</div>