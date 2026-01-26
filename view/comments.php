<?php
class ViewComments{

    public static function CommentsForm(){
        global $t;
        echo '<form action="insertcomment" style="margin-left:23%; margin-top:10%;">
        <input type="hidden" name="id" value="' .$_GET['id']. '">
        ' . $t['comment_your'] . ': <input type="text" name="comment">
        <input type="submit" value="' . $t['send'] . '">
        </form>';
    }

    public static function CommentsByProducts($arr) {
        if($arr!=null) {
            echo '<table id="table" ><th>Kommentaar</th><th>Kuupaev</th>';
            foreach($arr as $value) {
                echo '<tr><td>'.$value['text']."</td><td>".$value['date']."</td></tr>";
            }
            echo '</table>';
        }
    }

    public static function CommentsCountWithAncor($value) {
        if ($value['count']>0)
            echo '<b><a href="#table"/> ('.$value['count'].') </a></b>';
    }

    public static function CommentsCount($value) {
        if ($value['count']>0) {
            echo '<b><font color="red">('.$value['count'].') </font></b>';
        }
    }
}
?>