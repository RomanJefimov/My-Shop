<?php
class ViewProducts{

    public static function ProductsByCategory($arr) {
        foreach($arr as $value) {
            echo '<div class="card">';
            echo '<img src="data:image/jpeg;base64, '.base64_encode( $value['picture'] ).'"
            width=150 /><br>';

            echo "<h2>".$value['title']."</h2>";
            echo "<h3>".$value['price']." €</h3>";
            echo '<p>Arvustuste arv: ';
            Controller::CommentsCount($value['id']);
            echo '</p>';
            echo "<a href='products?id=".$value['id']."'>Edasi</a><br>";
            echo '</div>';
        }
    }

    public static function AllProducts($arr) {
        foreach($arr as $value) {
            echo '<div class="card">';
            echo '<img src="data:image/jpeg;base64, '.base64_encode( $value['picture'] ).'"
            width=150 /><br>';
            echo "<h2>".$value['title']."</h2>";
            echo "<h3>".$value['price']." €</h3>";
            Controller::CommentsCount($value['id']);
            echo "<a href='products?id=".$value['id']."'>Edasi</a></li><br>";
            echo '</div>';
        }
    }

    public static function ReadProducts($n) {
        echo '<div class="info">';
        echo "<h2>".$n['title']."</h2>";
        Controller::CommentsCountWithAncor($n['id']);
        echo '<br>
        <img src="data:image/jpeg;base64,'.base64_encode($n['picture']).'" 
        style="
            width: 500px; 
            height: auto; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
            border: 1px solid #ccc; 
            display: block; 
            margin: 20px auto;
        "/>
        <br>';

        echo '<p style="width:70%; margin-left: 15%;">'.$n['text'].'</p>';
        echo '</div>';
    }
// добавить методы для других видов представлений новостей
}
?>