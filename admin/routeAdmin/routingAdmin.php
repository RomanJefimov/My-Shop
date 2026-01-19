<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host,'/');
$path = explode('/', $host)[$num];

if ($path == '' OR $path == 'index.php'){
    //Главная страница - 
    $response = controllerAdmin::formLoginSite();
}
// Вход
elseif ($path == 'login'){
    //Форма входа
    $response = controllerAdmin::loginAction();
}
elseif ($path == 'logout') {
    //выход
    $response = controllerAdmin::logoutAction();
}
//-------------------listProducts
elseif($path=='productsAdmin'){
    $response=controllerAdminProducts::ProductsList();
}
//----------------add products
elseif($path=='productsAdd') {
    $response=controllerAdminProducts::productAddForm();
}
elseif($path == 'productsAddResult') {
    $response = controllerAdminProducts::productsAddResult();
}
//------------------edit products
elseif($path=='productsEdit' && isset($_GET['id'])) {
    $response=controllerAdminProducts::productsEditForm($_GET['id']);
}
elseif($path == 'productsEditResult' && isset($_GET['id'])) {
    $response = controllerAdminProducts::productsEditResult($_GET['id']);
}
//-----------------delete products
elseif($path=='productsDel' && isset($_GET['id'])) {
    $response=controllerAdminProducts::productsDeleteForm($_GET['id']);
}
elseif($path == 'productsDelResult' && isset($_GET['id'])) {
    $response = controllerAdminProducts::productsDelResult($_GET['id']);
}
else {
    //Страница не существует
    $response = controllerAdmin::error404();
}
?>