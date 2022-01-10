<?php
$cat_name = mysqli_real_escape_string($db, $_REQUEST['fname']);
$p_cat = mysqli_real_escape_string($db, $_REQUEST['Parent_Category']);

$sql = "INSERT INTO Categories (cat_description, parent_cat) VALUES ('$cat_name', '$p_cat')";
$insert = mysqli_query($db,$sql);
if(mysqli_query($db, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?>