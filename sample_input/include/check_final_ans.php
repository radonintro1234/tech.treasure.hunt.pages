<?php
session_start();
    include './dbconfig.php';

    if(isset($POST['submit'])){

        $answer = mysqli_real_escape_string($connection, $_POST['']);
        $answer = strtolower($answer);                                  # converts to lowercase
        if( ! strcmp($answer, 'stealthy')){                             # compares with stealthy
           $_SESSION['heist_solved']=1;
            header('location:../heist_completed.php');
        }
        else{
            echo "
            <script>
                alert('Wrong answer, please try again!');
                document.location='../final_question.php';
            </script>";
            return false;
        }
    }
    else{
        return false;
    }
?>