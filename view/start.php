<?php
ob_start();
?>
<h1 style="margin-right:60%;">TOP 3 PRODUCTS</h1>
<br>
<?php
ViewProducts::ProductsByCategory($arr);

$content = ob_get_clean();

include_once 'view/layout.php';

?>