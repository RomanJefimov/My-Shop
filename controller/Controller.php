<?php

class Controller {

    public static function StartSite(){
        $arr = Products::getLast10Products();
        include_once 'view/start.php';
    }

    public static function AllCategory() {
        $arr = Category::getAllCategory();
        include_once 'view/category.php';
    }

    public static function AllProducts() {
        $arr = Products::getAllProducts();
        include_once 'view/allproducts.php';
    }

    public static function ProductsByCatID($id) {
        $arr = Products::getProductsByCategoryID($id);
        include_once 'view/catproducts.php';
    }

    public static function ProductsByID($id) {
        $n = Products::getProductsByID($id);
        include_once 'view/readproducts.php';
    }

    public static function error404() {
        include_once 'view/error404.php';
    }

    public static function InsertComment($c,$id) {
        Comments::InsertComment($c,$id);
        //self::ProductsByID($id);
        header('Location::products?id='.$id.'#ctable');
    }

    //список комментариев
    public static function Comments($productsid) {
        $arr = Comments::getCommentByProductId($productsid);
        ViewComments::CommentsByProducts($arr);
    }
    //Количество комментариев к новости
    public static function CommentsCount($productsid) {
        $arr = Comments::getCommentsCountByProductID($productsid);
        ViewComments::CommentsCount($arr);
    }
    //ссылкка - переход к списку комментариев
    public static function CommentsCountWithAncor($productsid) {
        $arr = Comments::getCommentsCountByProductID($productsid);
        ViewComments::CommentsCountWithAncor($arr);
    }

    //-----------------------------РЕГИСТРАЦИЯ
    public static function registerForm() {
        include_once('view/formRegister.php');
    }
    public static function registerUser() {
        $result = Register::registerUser();

        include_once('view/answerRegister.php');
    }
}//class
?>