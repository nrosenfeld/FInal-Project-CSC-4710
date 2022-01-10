<!DOCTYPE html>

</html>

<?php
//Step1
 $db = mysqli_connect('localHost','id16482109_thegroup','Project1234!','id16482109_tasks')
 or die('Error connecting to MySQL server.');
?>

<style> 
h1{color:teal;
text-align: center; 
font-family: Arial, Helvetica, sans-serif;
font-size: 72px;}
h2{color: orange;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 56px;
    text-align: center;}
 p{color: teal;
 font-family: Arial, Helvetica, sans-serif;
 margin: 40px 2px; 
 padding: 1em 20px 2em;
 text-align: center;}
.button {
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
body{background-color: white;}
div {
    text-align: center;
}
h4{color: teal;
    font-family: Arial, Helvetica, sans-serif;}
img {display: block;margin-left: auto; margin-right: auto;}
.button1 {background-color: orange;} 
.button2 {background-color: teal;} 
.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

</style>

<head>
    <meta charset="UTF-8">

    <!--This is where the title goes-->
        <title>
                To Do List - Create new Category
        </title>
</head>
<main> 
    <body> 
        <h1>Create a New Category</h1>

      <!--         Name 
                   Parent category
                        a. Another existing category which does not have a parent category
                        b. If the current category is already a parent category of another one, this attribute cannot be modified.-->  

          <form> <form action = "" method = "post">
            
            <!--Name-->
            <label for="Name">Name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <br>
            <br>
            <!--Parent Category-->
            <label for="Parent Category">Parent Category:</label>
            <select name="Parent_Category" id="Parent_Category">
                <option value = -1>none</option>
                <!-- here is where we put the code that reads in the Parent categories from the sql Database-->
                 <?php
               //Step2
                $query = "SELECT cat_id, cat_description FROM Categories ORDER BY cat_description";
                mysqli_query($db, $query) or die('Error querying database.');
                //Step3
                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_array($result)):;?>
                <option value = "<?php echo $row['cat_id'] ?>"><?php echo $row['cat_description'] ?></option>
                <?php endwhile; ?>
            </select>

            <input type="submit" name = "Submit"> 
          </form>
          
          <br>
          <br>
          <br>
          <br>
         <a href="index.php"><div class = "center"><button class="button button1">Go Home</button></div></a>
    </body>
</main>
<?php

 
if(isset($_REQUEST['Submit'])) 
{
    $cat_name = mysqli_real_escape_string($db, $_REQUEST['fname']);
    $p_cat = mysqli_real_escape_string($db, $_REQUEST['Parent_Category']);
    if ($p_cat == -1)
        $sql = "INSERT INTO Categories (cat_description) VALUES ('$cat_name')";
    else 
        $sql = "INSERT INTO Categories (cat_description, parent_cat) VALUES ('$cat_name', '$p_cat')";
    //$insert = mysqli_query($db,$sql);
    if(mysqli_query($db, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
}
?>



