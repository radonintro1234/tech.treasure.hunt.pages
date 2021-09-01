<?php 
session_start();
    
    require './include/dbconfig.php';
    require './include/check_login.php';

    if( isset($_POST['submit']) ){
        
        # data-retrieval
        $team_name = mysqli_real_escape_string($connection, $_POST['']);
        $passcode = mysqli_real_escape_string($connection, $_POST['']);
        $curr_time = time();

        # fetch-credentials
        $login_query = "SELECT `team_name`, `passcode` FROM `credentials` WHERE `team_name`='$team_name' AND `passcode`='$passcode';";
        $result = mysqli_query($connection, $login_query);
        
        if( mysqli_num_rows($result) == 0 ){
            echo "
            <script>
                alert('Error! Invalid Credentials!');
            </script>";
        }
        else{
           
            $_SESSION['user'] = $team_name;
            require_once 'include/initial_config.inc.php';
            echo "
            <script>
                window.location.href= './question.php';
            <script>";
        }
    }
?>