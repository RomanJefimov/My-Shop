<?php
class modelAdminProducts{

    public static function getProductsList() {
        $query = "SELECT products.*, category.name, users.username from products, 
        category, users WHERE products.category_id=category.id";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    //-----------------Add
    public static function getProductsAdd() {
        $test=false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory']) ) {

                $title=$_POST['title'];
                $text=$_POST['text'];
                $idCategory=$_POST['idCategory'];

                //--------------images type blob
                    $image = addslashes (file_get_contents($_FILES['picture']['tmp_name']));
                //-----------------------------------------
                $sql="INSERT INTO `products` (`id`, `title`, `text`, `picture`, `category_id`, `user_id`) 
                VALUES (NULL, '$title', '$text', '$image', '$idCategory', '1')";
                        $db = new Database();
                        $item = $db->executeRun($sql);
                    if($item==true) {
                        $test=true;
                    }
            }
        }
        return $test;
    }
    //-----------------------------products detail id
    public static function getProductsDetail($id) {
        $query = "SELECT products.*, category.name, users.username FROM products, category, users
        WHERE products.category_id = category.id AND products.id = ".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }
    //----------------------products edit
    public static function getProductsEdit($id) {
        $test=false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])) {
                $title=$_POST['title'];
                $text=$_POST['text'];
                $idCategory=$_POST['idCategory'];
            //----------------------images type blob
            $image=$_FILES['picture']['name'];
            if($image!="") {
                $image =addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                /* //--------------------images type text
                $uploaddir = '../images/';
                $uploadfile = $uploaddir . basename($_FILES['picture']['name']);
                copy($_FILES['picture']['tmp_name'], $uploadfile); */
            }
            //-----------------------
            if($image=="") {
                $sql="UPDATE `products` SET `title` = '$title', `text` = '$text',
                `category_id` = '$idCategory' WHERE `productws`.`id` = ".$id;
            }
            else{
                $sql="UPDATE `products` SET `title` = '$title', `text` = '$text', `picture`='
                $image', `category_id` = '$idCategory' WHERE `products`.`id` = ".$id;
            }
            $db = new Database();
            $item = $db->executeRun($sql);
            if($item==true){
                $test=true;
            }
            }
        }
        return $test;
    }
    //-----------------------------products delete

    public static function getProductsDelete($id) {
        $test = false;
        if(isset($_POST['save'])) {
            $sql = "DELETE FROM `products` WHERE `products`.`id` = ".$id;
            $db = new Database();
            $item = $db->executeRun($sql);
            if($item==true) {
                $test=true;
            }
        }
        return $test;
    }
}
?>