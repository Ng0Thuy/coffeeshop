<?php 
$Stock = $this->model("StockModel");
?>

<!-- Hiển thị số lượng tồn kho -->
<div class="stock-info mt-3">
    <p class="stock-status" id="stockStatus">
        <?php
        if (isset($data['showSize']) && $data['showSize']) {
            $first_size = $data['showSize'][0];
            $stock_data = $Stock->getStock($data['showProductItem'][0]['product_id'], $first_size['size']);
            
            if ($stock_data && $stock_data['quantity'] > 0) {
                echo '<span class="text-success"><i class="fas fa-check-circle"></i> Còn hàng: ' . $stock_data['quantity'] . ' sản phẩm</span>';
            } else {
                echo '<span class="text-danger"><i class="fas fa-times-circle"></i> Hết hàng</span>';
            }
        }
        ?>
    </p>
</div>

<!-- Bổ sung script kiểm tra tồn kho khi chọn kích cỡ -->
<script>
$(document).ready(function() {
    // Khi người dùng chọn kích cỡ, cập nhật thông tin tồn kho
    $('input[name="size"]').change(function() {
        var product_id = <?php echo $data['showProductItem'][0]['product_id']; ?>;
        var size = $(this).val();
        
        $.ajax({
            url: './Stock/checkStock',
            type: 'POST',
            data: {
                product_id: product_id,
                size: size
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var quantity = response.quantity;
                    
                    if (quantity > 0) {
                        $('#stockStatus').html('<span class="text-success"><i class="fas fa-check-circle"></i> Còn hàng: ' + quantity + ' sản phẩm</span>');
                        $('#addToCartBtn').prop('disabled', false);
                    } else {
                        $('#stockStatus').html('<span class="text-danger"><i class="fas fa-times-circle"></i> Hết hàng</span>');
                        $('#addToCartBtn').prop('disabled', true);
                    }
                } else {
                    $('#stockStatus').html('<span class="text-warning"><i class="fas fa-exclamation-circle"></i> Không có thông tin tồn kho</span>');
                    $('#addToCartBtn').prop('disabled', false);
                }
            },
            error: function() {
                $('#stockStatus').html('<span class="text-warning"><i class="fas fa-exclamation-circle"></i> Lỗi kiểm tra tồn kho</span>');
            }
        });
    });
});
</script> 