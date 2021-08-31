<?php
session_start();
if(isset($_SESSION['user']) ){
require 'include/get_ques.inc.php';



}
else{
    header('location:index.php');
}
?>