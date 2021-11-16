<?php
class CategoryModel extends DB
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
}
