<?php
    
    require './include/dbconfig.php';
    require './include/check_login.php';

    if( isset($_POST['submit']) ){
        
        # data-retrieval
        $lead_name = mysqli_real_escape_string($connection, $_POST['']);
        $mob_no = mysqli_real_escape_string($connection, $_POST['']);
        $branch = mysqli_real_escape_string($connection, $_POST['']);
        $year = mysqli_real_escape_string($connection, $_POST['']);
        $curr_time = time();

        # query-processing
        $login_query = "INSERT INTO `users` (`lead_name`, `mob_no`, `branch`, `year`, `reg_time`) VALUES('$lead_name', '$mob_no', '$branch', '$year', '$curr_time')";
        $result = mysqli_query($connection, $login_query);
        
        if( !$result ){
            echo "
            <script>
                alert('Error! There was error will logging you in. Please try again!');
            </script>";
        }
        else{
            session_start();
            $_SESSION['user'] = $result;
            echo "
            <script>
                window.location.href= './question.php';
            <script>";
        }
    }
?>