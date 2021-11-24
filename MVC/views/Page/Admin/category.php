      <main class="pt-3 container">
        <section class="name-pages">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <h5>Danh mục</h5>
              </li>
            </ol>
          </nav>
        </section>
        <section class="row display-flex justify-content-between ml-0 mr-0">
          <button
            class="btn btn-success mb-3"
            data-toggle="modal"
            data-target="#tabCategory"
          >
            <i class="fas fa-plus-circle"></i> Thêm danh mục
          </button>

          <!-- Load Tab -->
          <div
            class="modal fade"
            id="tabCategory"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>Thêm/Sửa danh mục</h4>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="formGroupExampleInput">Tên danh mục</label>
                      <input
                        type="text"
                        class="form-control"
                        id="formGroupExampleInput"
                        placeholder="Tên danh mục..."
                      />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-default"
                      data-dismiss="modal"
                    >
                      Đóng
                    </button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Load Tab-->

          <select class="form-control col-4" id="mySelect">
            <option>Sắp xếp theo</option>
            <option class="sortbyAz">Theo A-Z</option>
            <option>Theo Z-A</option>
          </select>
        </section>
        <section class="category">
          <table class="table border-0 rounded">
            <thead class="thead-dark">
              <tr>
                <th style="width: 10px" scope="col">STT</th>
                <th scope="col">Tên</th>
                <th style="width: 10px" scope="col"></th>
                <th style="width: 10px" scope="col"></th>
              </tr>
            </thead>
            <tbody id="tableCategory">
              <tr>
                <th scope="row">1</th>
                <td>Trà sữa</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Sửa</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Trà sữa</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Sửa</button></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Cà phê</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Sửa</button></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Thức ăn nhanh</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Sửa</button></td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Bánh mì</td>
                <td><button class="btn btn-warning">Sửa</button></td>
                <td><button class="btn btn-danger">Sửa</button></td>
              </tr>
            </tbody>
          </table>
        </section>
      </main>
