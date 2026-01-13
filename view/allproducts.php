<?php
ob_start();
?>
<h1 style="margin-right:80%;">Koik uudised</h1>
<br>

<?php
ViewProducts::AllProducts($arr);
$content = ob_get_clean();
include_once 'view/layout.php';
?>