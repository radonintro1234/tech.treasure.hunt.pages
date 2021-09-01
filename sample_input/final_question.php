<?php 
session_start();
if($_SESSION['user'] && $_SESSION['final']){


echo'this is final ques';



}
else{
    header('location:index.html');
}


