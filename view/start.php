<?php
global $t;
ob_start();
?>
<h1 style="margin-right:60%;"><?= $t['top_products'] ?></h1>
<br>
<?php
ViewProducts::ProductsByCategory($arr);

$content = ob_get_clean();

include_once 'view/layout.php';

?>