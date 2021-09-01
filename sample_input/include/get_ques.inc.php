<?php
if($_SESSION['newQuesFlag']){
require 'db_query.inc.php';
$letterArrLength = count($_SESSION['letterArr']) -1;// because random func is inclusive
$currentLetterIndex=random_int(0,$letterArrLength); //select 1 letter from final ans
$currentLetter= $_SESSION['letterArr'][$currentLetterIndex];
$currentQuesData=db_get_ques_data($currentLetter);
if(count($_SESSION['displayedQuestionArr']) && in_array($_SESSION['displayedQuestionArr'],$currentQuesData['sr']))
{
echo '<script>alert("found repeat question");</script>';
}
$_SESSION['currentQues']=$currentQuesData['quesImgName'];
$_SESSION['currentAns']=$currentQuesData['ans'];
\array_splice($_SESSION['letterArr'],$currentLetterIndex,1); //remove the used letter from final
$_SESSION['quesNo']+=1;
$_SESSION['newQuesFlag']=0;
}
else{
    header('location:../question.php');
}
?>