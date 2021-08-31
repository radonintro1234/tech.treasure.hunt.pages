<?php
require 'db_query.inc.php';
$letterArrLength = count($_SESSION['letterArr']);
$currentLetterIndex=random_int(0,$letterArrLength);
$currentLetter= $_SESSION['letterArr'][$currentLetterIndex];
$currentQuesData=db_get_ques_data($currentLetter);
$currentQues=$currentQuesData['quesImgName'];
$currentAns=$currentQuesData['ans'];
\array_splice($_SESSION['letterArr'],$currentLetterIndex,1);
$_SESSION['quesNo']+=1;

?>