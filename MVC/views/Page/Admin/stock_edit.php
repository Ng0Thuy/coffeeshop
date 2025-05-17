<div class="container-fluid">
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?php echo isset($data["StockData"]) ? "Cập nhật tồn kho" : "Thêm mới tồn kho"; ?>
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset($data["StockData"])) { ?>
                <!-- Form cập nhật tồn kho -->
                <form method="post" action="<?php echo BASE_URL . "/Admin/stockUpdate"; ?>">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sản phẩm:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="product_id" id="product_id" readonly required>
                                <?php
                                if (isset($data["ShowAllProduct"])) {
                                    foreach ($data["ShowAllProduct"] as $product) {
                                        $selected = $data["StockData"]["product_id"] == $product["product_id"] ? "selected" : "";
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
                            <select class="form-control" name="size" id="size" readonly required>
                                <?php
                                if (isset($data["ShowAllSizes"])) {
                                    foreach ($data["ShowAllSizes"] as $size) {
                                        $selected = $data["StockData"]["size"] == $size["size"] ? "selected" : "";
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
                            <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo $data["StockData"]["quantity"]; ?>" min="0" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Cập nhật
                            </button>
                            <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </a>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <!-- Form thêm mới tồn kho (nhiều size) -->
                <form method="post" action="<?php echo BASE_URL . "/Admin/stockAddBatch"; ?>" id="stockAddForm">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sản phẩm:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="product_id" id="product_id" required>
                                <option value="">-- Chọn sản phẩm --</option>
                                <?php
                                if (isset($data["ShowAllProduct"])) {
                                    foreach ($data["ShowAllProduct"] as $product) {
                                        echo '<option value="' . $product["product_id"] . '">' . $product["product_name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <div id="product_message" class="text-info mt-2"></div>
                        </div>
                    </div>

                    <div id="sizes_container" style="display: none;">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="m-0 font-weight-bold text-primary">Nhập số lượng tồn kho cho từng kích cỡ</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="sizes_table">
                                        <thead>
                                            <tr>
                                                <th>Kích cỡ</th>
                                                <th width="200px">Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sizes_body">
                                            <!-- Các hàng size sẽ được thêm ở đây -->
                                        </tbody>
                                    </table>
                                </div>
                                <div id="size_message" class="text-danger mt-2"></div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <i class="fas fa-save"></i> Thêm mới tồn kho
                                </button>
                                <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Khi chọn sản phẩm, lấy danh sách kích cỡ
        $('#product_id').change(function() {
            var product_id = $(this).val();
            $('#sizes_body').empty();
            $('#size_message').text('');
            $('#product_message').text('');
            
            if (product_id !== '') {
                $('#product_message').text('Đang tải danh sách kích cỡ...');
                
                // Tải thông tin tồn kho hiện có cho sản phẩm này
                $.ajax({
                    url: '<?= BASE_URL ?>/Admin/getStockInfo',
                    type: 'POST',
                    data: {
                        product_id: product_id
                    },
                    dataType: 'json',
                    success: function(stockResponse) {
                        console.log('Stock Response:', stockResponse);
                        
                        // Bắt đầu bằng việc tạo một mảng dữ liệu size mặc định cho tất cả các sản phẩm
                        var defaultSizes = [
                            { size: 'Nhỏ', price: 0 },
                            { size: 'Vừa', price: 0 },
                            { size: 'Lớn', price: 0 }
                        ];
                        
                        // Tạo hàng cho mỗi kích cỡ mặc định
                        $('#sizes_container').show();
                        $('#product_message').text('Hãy cập nhật số lượng tồn kho cho các kích cỡ');
                        
                        for (var i = 0; i < defaultSizes.length; i++) {
                            var size = defaultSizes[i];
                            var stockInfo = findStockInfo(stockResponse, size.size);
                            var row = '<tr>';
                            
                            if (stockInfo) {
                                row += '<td>' + size.size + ' <span class="badge badge-info">Đã tồn tại</span></td>';
                                row += '<td><input type="number" class="form-control" name="quantities[]" value="' + stockInfo.quantity + '" min="0"><input type="hidden" name="sizes[]" value="' + size.size + '"><small class="text-info">Số lượng hiện tại: ' + stockInfo.quantity + '</small></td>';
                            } else {
                                row += '<td>' + size.size + '</td>';
                                row += '<td><input type="number" class="form-control" name="quantities[]" value="0" min="0"><input type="hidden" name="sizes[]" value="' + size.size + '"></td>';
                            }
                            
                            row += '</tr>';
                            $('#sizes_body').append(row);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Stock ajax error:', error);
                        
                        // Nếu không lấy được thông tin tồn kho, vẫn hiển thị form mặc định
                        var defaultSizes = [
                            { size: 'Nhỏ', price: 0 },
                            { size: 'Vừa', price: 0 },
                            { size: 'Lớn', price: 0 }
                        ];
                        
                        $('#sizes_container').show();
                        $('#product_message').text('Hãy nhập số lượng cho các kích cỡ cần thêm vào kho');
                        
                        for (var i = 0; i < defaultSizes.length; i++) {
                            var size = defaultSizes[i];
                            var row = '<tr>';
                            row += '<td>' + size.size + '</td>';
                            row += '<td><input type="number" class="form-control" name="quantities[]" value="0" min="0"><input type="hidden" name="sizes[]" value="' + size.size + '"></td>';
                            row += '</tr>';
                            $('#sizes_body').append(row);
                        }
                    }
                });
            } else {
                $('#sizes_container').hide();
            }
        });
        
        // Hàm tìm thông tin tồn kho theo size
        function findStockInfo(stockData, size) {
            if (!stockData || !stockData.stock) return null;
            
            for (var i = 0; i < stockData.stock.length; i++) {
                if (stockData.stock[i].size === size) {
                    return stockData.stock[i];
                }
            }
            return null;
        }
        
        // Kiểm tra form trước khi submit
        $('#stockAddForm').submit(function(e) {
            var product_id = $('#product_id').val();
            
            if (product_id === '') {
                e.preventDefault();
                alert('Vui lòng chọn sản phẩm!');
                return false;
            }
            
            return true;
        });
    });
</script> 
</script> 