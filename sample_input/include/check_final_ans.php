<?php
    require './dbconfig.php';

    if(isset($POST['submit'])){

        $answer = mysqli_real_escape_string($connection, $POST['']);
        $answer = strtolower($answer);                                  # converts to lowercase
        if( ! strcmp($answer, 'stealthy')){                             # compares with stealthy
            return true;
        }
        else{
            echo "
            <script>
                alert('Wrong answer, please try again!');
            </script>";
            return false;
        }
    }
    else{
        return false;
    }
?>