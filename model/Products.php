<?php
class Products{

    public static function getLast10Products() {
        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllProducts() {
        $query = "SELECT * FROM products ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getProductsByCategoryID($id) {
        $query = "SELECT * FROM products where category_id=".(string)$id." ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getProductsByID($id) {
        $query = "SELECT * FROM products where id=".(string)$id;
        $db = new Database();
        $n = $db->getOne($query);
        return $n;
    }
}
?>