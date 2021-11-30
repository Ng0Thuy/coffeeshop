<div id="regsiter">
      <i class="far fa-times-circle close-regsiter"></i>
      <h3 class="regsiter-title">Đăng ký hệ thống</h3>
      <p>Bạn đã có tài khoản? <span class="login-show">Đăng nhập</span></p>
      <form action="" method="POST" id="form_regsiter">
        <div class="form-group-regsiter">
          <label for="">Họ tên</label>
          <input type="text" name="name" id="" class="email-ip" placeholder=" " />
        </div>
        <div class="form-group-regsiter">
          <label for="">Email</label>
          <input type="text" name="email" id="" class="email-ip" placeholder=" " />
        </div>
        <div class="form-group-regsiter">
          <label for="">Số điện thoại</label>
          <input type="text" name="phone" id="" class="email-ip" placeholder=" " />
        </div>
        <div class="form-group-regsiter">
          <label for="">Mật khẩu</label>
          <input type="text" name="password" id="" placeholder=" " />
        </div>
        <div class="forgot-pass"><span class="forgot-show">Quên mật khẩu?</span></div>
        <div class="btn-regsiter pt-2">
          <button>Đăng ký</button>
        </div>
      </form>
    </div>
    <script>
      $.ajax({
  type: "POST",
  url: './Home/RegisterAction',
  data: $(form).serializeArray(),
  success: function(response) {
      response = JSON.parse(response);
      if (response.status == 0) { 
          swal("Thất bại!", response.message, "error");
      } else {
          swal("Thành công!", response.message, "success");
          setTimeout("location.href = './login';", 2000);
      }
  }
});
    </script>