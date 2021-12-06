<?php
class AdminModel extends DB
{
    public function ListAll()
    {
        $sql = "SELECT * FROM category";
        return mysqli_query($this->con, $sql);
    }
    public function ListItem($id)
    {
        $sql = "SELECT * FROM product where category_id=$id";
        return mysqli_query($this->con, $sql);
    }

    public function showCommentAd()
    {
        $sql = "SELECT * FROM comment, product, user
        WHERE comment.product_id=product.product_id 
        AND comment.user_id=user.user_id";
        return mysqli_query($this->con, $sql);
    }

    public function showOrder()
    {
        $sql = "SELECT * FROM user,orders WHERE orders.user_id=user.user_id";
        return mysqli_query($this->con, $sql);
    }

    public function thongke()
    {
        $sql = "SELECT category.category_id as category_id, category.category_name as category_name,
        COUNT(product.product_id) as numProduct,
        MIN(product.price) as priceMin,
        MAX(product.price) as priceMax,
        AVG(product.price) as priceAvg
        FROM 
        product left JOIN category on category.category_id =product.category_id
        product left JOIN varivant on category.category_id =product.category_id
        GROUP by category.category_id ORDER BY category.category_id DESC";
        return mysqli_query($this->con, $sql);
    }

    

   
}
