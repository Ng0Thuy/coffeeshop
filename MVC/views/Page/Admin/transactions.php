<div class="container-fluid">
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lịch sử giao dịch tồn kho</h6>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm giao dịch...">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="transactionTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng</th>
                            <th>Loại giao dịch</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data["ShowTransactions"]) && count($data["ShowTransactions"]) > 0) {
                            foreach ($data["ShowTransactions"] as $transaction) {
                        ?>
                                <tr>
                                    <td><?php echo $transaction["id"]; ?></td>
                                    <td><?php echo $transaction["product_name"]; ?></td>
                                    <td><?php echo $transaction["size"]; ?></td>
                                    <td><?php echo $transaction["quantity"]; ?></td>
                                    <td>
                                        <?php
                                        if ($transaction["type"] == "Nhập kho" || $transaction["type"] == "Nhập kho mới") {
                                            echo '<span class="badge badge-success">' . $transaction["type"] . '</span>';
                                        } elseif ($transaction["type"] == "Bán hàng") {
                                            echo '<span class="badge badge-info">' . $transaction["type"] . '</span>';
                                        } else {
                                            echo '<span class="badge badge-warning">' . $transaction["type"] . '</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($transaction["date"])); ?></td>
                                    <td>
                                        <?php
                                        if ($transaction["status"] == "Thành công") {
                                            echo '<span class="badge badge-success">Thành công</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Thất bại</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="7" class="text-center">Không có dữ liệu giao dịch</td></tr>';
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
            $("#transactionTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script> 