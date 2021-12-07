<main class="pt-3 container-fluid">
  <section>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <h5>Thống kê</h5>
        </li>
      </ol>
    </nav>
  </section>
  <section>
    <div class="row">
      <div class="col col-4 pb-4">
        <a href="" class="card border-0 rounded">
          <div class="card-body text-center">
            <h6 class="card-title text-uppercase">Danh Mục</h6>
            <h1 class="card-text text-dark">
              <?php 
                if(isset($data['countCategory'])){
                  $row=mysqli_fetch_assoc($data['countCategory']);
                  echo $row['count(*)'];
                }
              ?>
            </h1>
            <p class="text-danger">
              <i class="fas fa-caret-down"></i> 5.05%
            </p>
          </div>
        </a>
      </div>
      <div class="col col-4 pb-4">
        <a href="" class="card border-0 rounded">
          <div class="card-body text-center">
            <h6 class="card-title text-uppercase">Sản phẩm</h6>
            <h1 class="card-text text-dark">
            <?php 
                if(isset($data['countProduct'])){
                  $row=mysqli_fetch_assoc($data['countProduct']);
                  echo $row['count(*)'];
                }
              ?>
            </h1>
            <p class="text-success">
              <i class="fas fa-caret-up"></i> 5.05%
            </p>
          </div>
        </a>
      </div>
      <div class="col col-4 pb-4">
        <a href="" class="card border-0 rounded">
          <div class="card-body text-center">
            <h6 class="card-title text-uppercase">Người dùng</h6>
            <h1 class="card-text text-dark">
            <?php 
                if(isset($data['countUser'])){
                  $row=mysqli_fetch_assoc($data['countUser']);
                  echo $row['count(*)'];
                }
              ?>
            </h1>
            <p class="text-danger">
              <i class="fas fa-caret-down"></i> 5.05%
            </p>
          </div>
        </a>
      </div>
      <div class="col col-4 pb-4">
        <a href="" class="card border-0 rounded">
          <div class="card-body text-center">
            <h6 class="card-title text-uppercase">Đơn hàng</h6>
            <h1 class="card-text text-dark">
            <?php 
                if(isset($data['countOrder'])){
                  $row=mysqli_fetch_assoc($data['countOrder']);
                  echo $row['count(*)'];
                }
              ?>
            </h1>
            <p class="text-success">
              <i class="fas fa-caret-up"></i> 5.05%
            </p>
          </div>
        </a>
      </div>
      <div class="col col-4 pb-4">
        <a href="" class="card border-0 rounded">
          <div class="card-body text-center">
            <h6 class="card-title text-uppercase">Bình luận</h6>
            <h1 class="card-text text-dark">
            <?php 
                if(isset($data['countComment'])){
                  $row=mysqli_fetch_assoc($data['countComment']);
                  echo $row['count(*)'];
                }
              ?>
            </h1>
            <p class="text-danger">
              <i class="fas fa-caret-down"></i> 5.05%
            </p>
          </div>
        </a>
      </div>
    </div>
  </section>
  <section class="chart row pt-5">
    <div class="chart-line col-6">
      <h4>Biểu đồ thống kê</h4>
      <canvas class="col-12" id="myChartLine"></canvas>
    </div>
    <div class="chart-line col-6">
      <h4>Biểu đồ thống kê</h4>
      <canvas class="col-12" id="myChartLine2"></canvas>
    </div>
  </section>
  <section class="pt-5">
    <h4>Bảng thống kê</h4>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </section>
</main>