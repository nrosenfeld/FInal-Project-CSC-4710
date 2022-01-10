
<?php
$db = mysqli_connect('localHost','id16482109_thegroup','Project1234!','id16482109_tasks')
 or die('Error connecting to MySQL server.');

$cat_name = mysqli_real_escape_string($db, $_REQUEST['fname']);
$cat_id = mysqli_real_escape_string($db, $_REQUEST['Category']);

$sql = "UPDATE Categories SET cat_description = '$cat_name' WHERE cat_id = '$cat_id'";
$insert = mysqli_query($db,$sql);
if(mysqli_query($db, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?>
