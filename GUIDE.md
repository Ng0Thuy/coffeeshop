- sau khi tải code về, chú ý đường dẫn locahost máy mỗi người mà thay đổi đường
link ở Core/URL.php (Mọi người để code mặc định ở C://localhost/DuAn1)

= Nếu muốn code giao diện cho trang web, thì vào Controllers
Rồi thêm trang web mình cần code

VD: Trang product . thì sẽ tạo 1 funciton có tên là product 
Có view là:
function product()
  {
    $Models = $this->model("Models");
    $this->view("master", [
      "Page" => "product",  // Code html sẽ code ở đây
    ]);
  }

