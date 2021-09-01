<?php 
    session_start();

    require './dbconfig.php';
    
    if( isset($_POST['submit']) ){
        
        # data-retrieval
        $team_name = mysqli_real_escape_string($con, $_POST['team-name']);
        $passcode = mysqli_real_escape_string($con, $_POST['passcode']);

        # fetch-credentials
        $login_query = "SELECT * FROM `credentials` WHERE `team_name`='$team_name' AND `passcode`='$passcode';";
        echo $login_query;
        $result = mysqli_query($con, $login_query);
        
        if( mysqli_num_rows($result) == 0 ){
            echo "
            <script>
                alert('Error! Invalid Credentials!');
            </script>";
        }
        else{
            # records registration time
            $curr_time = time();
            $reg_time_query = "INSERT INTO `records`(`team_name`, `reg_time`) VALUES('$team_name', NOW());";
            $result = mysqli_query($con, $reg_time_query);

            $_SESSION['user'] = $team_name;
            require_once './initial_config.inc.php';
            header('location: ../question.php');
        }
    }
?>