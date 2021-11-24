      <main class="pt-3 container">
        <section class="name-pages">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <h5>Sản phẩm</h5>
              </li>
            </ol>
          </nav>
        </section>
        <section class="row display-flex justify-content-between ml-0 mr-0">
          <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tabProduct">
            <i class="fas fa-plus-circle"></i>Thêm sản phẩm
          </button>

          <!-- Load Tab -->
          <div class="modal fade" id="tabProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>Thêm/Sửa sản phẩm</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="" method="">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="formGroupExampleInput">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tên sản phẩm...">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Ảnh</label>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Danh mục</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Giá</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tên danh mục...">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Sizw</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tên danh mục...">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Load Tab-->

          <select class="form-control col-4">
            <option>Sắp xếp theo</option>
            <option>Theo ngày mới nhất</option>
            <option>Theo ngày cũ nhất</option>
            <option>Theo giá cao nhất</option>
            <option>Theo giá thấp nhất</option>
          </select>
        </section>
        <section class="Product">
          <table class="table border-0 rounded">
            <thead class="thead-dark">
              <tr>
                <th style="width: 10px" scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Sale</th>
                <th scope="col">Nội dung</th>
                <th style="width: 10px" scope="col"></th>
                <th style="width: 10px" scope="col"></th>
              </tr>
            </thead>
            <tbody id="tableProduct">
              <tr>
                <th scope="row">1</th>
                <td>
                  <img
                    style="width: 70px"
                    src="http://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-TR%C3%80-S%E1%BB%AEA.png"
                    alt=""
                  />
                </td>
                <td>Trà sữa trân châu đường đen</td>
                <td>20.000 VNĐ</td>
                <td>20%</td>
                <td>Trà sữa trân châu đường đen</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Xóa</button></td>
              </tr>
              <!-- <tr>
                <th scope="row">2</th>
                <td>
                  <img
                    style="width: 70px"
                    src="http://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-TR%C3%80-S%E1%BB%AEA.png"
                    alt=""
                  />
                </td>
                <td>Cafe sữa Sài Gòn</td>
                <td>20.000 VNĐ</td>
                <td>Cafe sữa Sài Gòn</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Xóa</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>
                  <img
                    style="width: 70px"
                    src="http://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-TR%C3%80-S%E1%BB%AEA.png"
                    alt=""
                  />
                </td>
                <td>Bánh tráng trộn</td>
                <td>20.000 VNĐ</td>
                <td>tráng trộn</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Xóa</button></td>
              </tr> -->
            </tbody>
          </table>
        </section>
      </main>