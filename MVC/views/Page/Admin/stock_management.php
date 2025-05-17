<div class="container-fluid">
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý tồn kho</h6>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <a href="<?= BASE_URL ?>/Admin/stockEdit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm mới tồn kho
                    </a>
                    <a href="<?= BASE_URL ?>/Admin/stockTransactions" class="btn btn-info ml-2">
                        <i class="fas fa-history"></i> Lịch sử giao dịch
                    </a>
                </div>
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="stockTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="15%">Hình ảnh</th>
                            <th width="30%">Tên sản phẩm</th>
                            <th width="10%">Số size</th>
                            <th width="15%">Tổng tồn kho</th>
                            <th width="15%">Trạng thái</th>
                            <th width="10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data["ShowAllStock"]) && count($data["ShowAllStock"]) > 0) {
                            foreach ($data["ShowAllStock"] as $product) {
                                // Kiểm tra trạng thái tồn kho
                                $hasLowStock = false;
                                $hasOutOfStock = false;
                                
                                if ($product["total_quantity"] <= 0) {
                                    $hasOutOfStock = true;
                                } elseif ($product["total_quantity"] <= 10) {
                                    $hasLowStock = true;
                                }
                        ?>
                                <tr>
                                    <td><?php echo $product["product_id"]; ?></td>
                                    <td>
                                        <img src="<?= BASE_URL ?>/<?php echo $product["thumbnail"]; ?>" alt="<?php echo $product["product_name"]; ?>" class="img-thumbnail" style="max-height: 50px;">
                                    </td>
                                    <td><?php echo $product["product_name"]; ?></td>
                                    <td><?php echo $product["size_count"]; ?> kích thước</td>
                                    <td><?php echo $product["total_quantity"]; ?> sản phẩm</td>
                                    <td>
                                        <?php
                                        if ($hasOutOfStock) {
                                            echo '<span class="badge badge-danger">Có size hết hàng</span>';
                                        } elseif ($hasLowStock) {
                                            echo '<span class="badge badge-warning">Có size sắp hết</span>';
                                        } else {
                                            echo '<span class="badge badge-success">Còn hàng</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_URL ?>/Admin/stockDetail/<?php echo $product["product_id"]; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Chi tiết
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="7" class="text-center">Không có dữ liệu tồn kho</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Tìm kiếm trong bảng
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#stockTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script> 