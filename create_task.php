<?php
$task_desc = mysqli_real_escape_string($db, $_REQUEST['fTaskDes']);
$due_date = mysqli_real_escape_string($db, $_REQUEST['fdueDate']);
$category = mysqli_real_escape_string($db, $_REQUEST['Category']);
$priority = mysqli_real_escape_string($db, $_REQUEST['Priority']);
$status = mysqli_real_escape_string($db, $_REQUEST['Status']);

$sql = "INSERT INTO Tasks (description, Category, date_due, completed, priority_level) VALUES ('$task_desc','$category','$due_date',0, '$priority');";

$insert = mysqli_query($db,$sql);
if(mysqli_query($db, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?>