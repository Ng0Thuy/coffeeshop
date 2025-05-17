<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?php echo isset($data["StockData"]) ? "Cập nhật tồn kho" : "Thêm mới tồn kho"; ?>
            </h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo isset($data["StockData"]) ? BASE_URL . "/Admin/stockUpdate" : BASE_URL . "/Admin/stockAdd"; ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sản phẩm:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="product_id" id="product_id" <?php echo isset($data["StockData"]) ? "readonly" : ""; ?> required>
                            <option value="">-- Chọn sản phẩm --</option>
                            <?php
                            if (isset($data["ShowAllProduct"])) {
                                foreach ($data["ShowAllProduct"] as $product) {
                                    $selected = isset($data["StockData"]) && $data["StockData"]["product_id"] == $product["product_id"] ? "selected" : "";
                                    echo '<option value="' . $product["product_id"] . '" ' . $selected . '>' . $product["product_name"] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kích cỡ:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="size" id="size" <?php echo isset($data["StockData"]) ? "readonly" : ""; ?> required>
                            <option value="">-- Chọn kích cỡ --</option>
                            <?php
                            if (isset($data["ShowAllSizes"])) {
                                foreach ($data["ShowAllSizes"] as $size) {
                                    $selected = isset($data["StockData"]) && $data["StockData"]["size"] == $size["size"] ? "selected" : "";
                                    echo '<option value="' . $size["size"] . '" ' . $selected . '>' . $size["size"] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Số lượng tồn:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="quantity" value="<?php echo isset($data["StockData"]) ? $data["StockData"]["quantity"] : ""; ?>" min="0" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <?php echo isset($data["StockData"]) ? "Cập nhật" : "Thêm mới"; ?>
                        </button>
                        <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Khi chọn sản phẩm, lấy danh sách kích cỡ
        $('#product_id').change(function() {
            var product_id = $(this).val();
            if (product_id !== '') {
                $.ajax({
                    url: '<?= BASE_URL ?>/Admin/getSizes',
                    type: 'POST',
                    data: {
                        product_id: product_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            var sizes = response.sizes;
                            var options = '<option value="">-- Chọn kích cỡ --</option>';
                            
                            for (var i = 0; i < sizes.length; i++) {
                                options += '<option value="' + sizes[i].size + '">' + sizes[i].size + '</option>';
                            }
                            
                            $('#size').html(options);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi khi lấy danh sách kích cỡ!');
                    }
                });
            } else {
                $('#size').html('<option value="">-- Chọn kích cỡ --</option>');
            }
        });
    });
</script> 