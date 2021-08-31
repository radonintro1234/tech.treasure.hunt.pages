<?php
if(isset($_POST['submit'])){
  $userAns=password_hash(strtolower(strip_tags($_POST['answer'])),PASSWORD_DEFAULT);
    if($userAns==$_SESSION['currentAns']){
$_SESSION['newQuesFlag']=1; //new ques will be fetched
    }
}
else{
    header('location: ../question.php?msg="wrong"');
}
?>