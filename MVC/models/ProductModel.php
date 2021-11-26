<?php
class ProductModel extends DB
{

    public function ListAll()
    {
        $sql = "SELECT * FROM product";
        return mysqli_query($this->con, $sql);
    }
    public function ListItem($id)
    {
        $sql = "SELECT * FROM product where product_id = $id";
        return mysqli_query($this->con, $sql);
    }
    
}
