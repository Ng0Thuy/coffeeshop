<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý tồn kho</h6>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <a href="./Stock/edit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm mới tồn kho
                    </a>
                    <a href="./Stock/transactions" class="btn btn-info ml-2">
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
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng tồn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data["ShowAllStock"]) && count($data["ShowAllStock"]) > 0) {
                            foreach ($data["ShowAllStock"] as $stock) {
                        ?>
                                <tr>
                                    <td><?php echo $stock["id"]; ?></td>
                                    <td><?php echo $stock["product_name"]; ?></td>
                                    <td><?php echo $stock["size"]; ?></td>
                                    <td><?php echo $stock["quantity"]; ?></td>
                                    <td>
                                        <?php
                                        if ($stock["quantity"] <= 0) {
                                            echo '<span class="badge badge-danger">Hết hàng</span>';
                                        } elseif ($stock["quantity"] <= 10) {
                                            echo '<span class="badge badge-warning">Sắp hết</span>';
                                        } else {
                                            echo '<span class="badge badge-success">Còn hàng</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="./Stock/edit/<?php echo $stock["product_id"]; ?>/<?php echo urlencode($stock["size"]); ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $stock['id']; ?>)" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="6" class="text-center">Không có dữ liệu tồn kho</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa thông tin tồn kho này?")) {
            window.location.href = "./Stock/delete/" + id;
        }
    }

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