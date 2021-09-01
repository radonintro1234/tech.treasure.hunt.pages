<?php 
session_start();
if(isset($user)&& $_SESSION['heist_solved']){

}
else{
    header('location:index.html');


}