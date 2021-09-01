<?php

 function db_get_ques_data($currentLetter){
     require_once 'dbconfig.php';
    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        echo 'Cannot connect to database';
    }
    else{
        $query='Select * from questions WHERE initial = ?';
        $stmt= mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query))
    {
        print "Failed to prepare statement\n";
    }
    $p='s';
    mysqli_stmt_bind_param($stmt,$p, $currentLetter, );
        
    mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        $numOfRows=mysqli_num_rows($result);
        
       if($numOfRows != 0){
           if($numOfRows==1){
            $qIndex=0;    
           }
           else{
           $qIndex=random_int(0,$numOfRows-1);}
           $quesData=mysqli_fetch_all($result,MYSQLI_ASSOC);
           return $quesData[$qIndex];
       }
       else{
           echo '<script>Alert("Specified letter not found in db");</script>';
       }
    
    }
    
}

?>