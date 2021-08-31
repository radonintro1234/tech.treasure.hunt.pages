<?php
session_start();
if(isset($_SESSION['user'])){
if($_SESSION['newQuesFlag']){    
require 'include/get_ques.inc.php'; //new ques taken only if flag is set
}




}
else{
    header('location:index.php');
}
?>