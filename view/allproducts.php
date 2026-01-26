<?php
global $t;
ob_start();
?>
<h1 style="margin-right:80%;"><?= $t['all_products'] ?></h1>
<br>

<?php
ViewProducts::AllProducts($arr);
$content = ob_get_clean();
include_once 'view/layout.php';
?>