<?php
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'et';
$allowed = ['et', 'ru'];

if (!in_array($lang, $allowed)) {
    $lang = 'et';
}

$_SESSION['lang'] = $lang;

$t = require __DIR__ . "/lang/$lang.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyShop</title>
            <link rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity ="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
            <link rel="stylesheet" type ="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
        <meta charset="utf-8">

    </head>
    <body>
        <nav class="one">
            <ul class="topmenu">
                <li><a href="#"><?= $t['categories'] ?><i class="fa fa-angle-down"></i></a>
                    <ul class="submenu">
                        <?php
                            Controller::AllCategory();
                        ?>
                    </ul>
                </li>
                <li><a href="testError"><?= $t['info'] ?></a></li>
                <li><a href="./"><?= $t['home'] ?></a></li>
                <li><a href="registerForm"><?= $t['register'] ?></a></li>
                <li style="margin-left:30%; width:5%;">
                    <a href="?lang=et">ET</a> 
                </li>
                <li style="margin-left:0%; width:5%;">
                    <a href="?lang=ru">RU</a>
                </li>
            </ul>
        </nav>
        <section>
            <div class = 'divBox'>
                <?php
                if(isset($content)){
                    echo $content;
                }
                else{
                    echo '<h1>Content is gone!</h1>';
                }
                ?>
            </div>
        </section>
        <hr>
        <p style="display:block; text-align:center;">JKTV24 2026 a. &copy</p>
    </body>

</html> 

