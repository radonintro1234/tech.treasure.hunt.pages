<?

 function db_get_ques_data($con,$currentLetter){
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
    mysqli_stmt_bind_param($stmt, $currentLetter, 's');
        
    mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        $numOfRows=mysqli_num_rows($result);
       if($numOfRows>0){
           $qIndex=random_int(0,$numOfRows);
           $quesData=mysqli_fetch_array($result)[$qIndex];
           return $quesData;
       }
       else{
           echo '<script>Alert("Specified letter not found in db");</script>';
       }
    
    }
    
}

?>