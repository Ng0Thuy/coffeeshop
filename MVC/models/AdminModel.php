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

    

   
}
