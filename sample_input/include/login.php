<?php 
    session_start();

    require './dbconfig.php';
    
    if( isset($_POST['submit']) ){
        
        # data-retrieval
        $team_name = mysqli_real_escape_string($con, $_POST['team-name']);
        $passcode = mysqli_real_escape_string($con, $_POST['passcode']);
        $curr_time = time();

        # fetch-credentials
        $login_query = "SELECT * FROM `credentials` WHERE `team_name`='$team_name' AND `passcode`='$passcode';";
        echo $login_query;
        $result = mysqli_query($con, $login_query);
        //echo "<br> row " + mysqli_num_rows($result);
        
        if( mysqli_num_rows($result) == 0 ){
            echo "
            <script>
                alert('Error! Invalid Credentials!');
            </script>";
        }
        else{
            echo "reached 4";
            $_SESSION['user'] = $team_name;
            require_once './initial_config.inc.php';
            header('location: ../question.php');
        }
    }
?>