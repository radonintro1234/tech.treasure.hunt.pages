<?php
if($_SESSION['user']&&$_SESSION['heist_solved']){
    require 'db_query.inc.php';
    update_treasure_winner();
    // header();
}


?>