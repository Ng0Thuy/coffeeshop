<main class="pt-3 container">
  <section class="name-pages">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <h5>Thêm/Sửa danh mục</h5>
        </li>
      </ol>
    </nav>
  </section>
  <section class="category">
    <form method="POST" action="">
      <?php
      $row = mysqli_fetch_assoc($data['ShowEdit']);
      if (mysqli_num_rows($data['ShowEdit']) < 1) {
        $row['category_name'] = "";
        echo '
        <script>
            alert("Danh mục không tồn tại!")
            window.location.assign("../Category");
        </script>
        ';
      }
      ?>
      <div class="form-group">
        <label for="formGroupExampleInput">Tên danh mục</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Tên danh mục..." value="<?= $row['category_name'] ?>">
      </div>
      <button class="btn btn-success">Lưu</button>
    </form>
  </section>
</main>