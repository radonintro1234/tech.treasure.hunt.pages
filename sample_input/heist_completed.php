<?php 
session_start();
if(isset($_SESSION['user'])&& $_SESSION['heist_solved']){
    
echo ' solved';
}
else{
    header('location:index.php');


}