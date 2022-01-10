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
                To Do List - Create new Task
        </title>
</head>
<main> 
    <body> 
        <h1>Create a New Task</h1>

      <!--         Name 
                   Parent category
                        a. Another existing category which does not have a parent category
                        b. If the current category is already a parent category of another one, this attribute cannot be modified.-->  

        <form> <form action = "" method = "post">
            
        <label for="Task Description">Task Description:</label><br>
            <input type="text" id="fTaskDes" name="fTaskDes"><br>
            <br>
            <br>
              <!--Due Date-->
            <label for="Due Date">Due Date: (YYYY-MM-DD)</label><br>
            <input type="text" id="fdueDate" name="fdueDate">
            <br>
            <br>
              <!--Task Category-->
            <label for="Category">Category:</label>
            <select name="Category" id="Category">
                <option value = "Read In">Read in From SQL</option>
                <!-- here is where we put the code that reads in the categories from the sql database-->
                <?php
               //Step2
                $query = "SELECT cat_id, cat_description FROM Categories";
                mysqli_query($db, $query) or die('Error querying database.');
                //Step3
                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_array($result)):;?>
                <option value = "<?php echo $row['cat_id'] ?>"><?php echo $row['cat_description'] ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <br>
             <!--Priority-->
             <label for="Priority">Priority:</label>
             <select name="Priority" id="Priority">
                 <option value = "1">1</option>
                 <option value = "2">2</option>
                 <option value = "3">3</option>
                 <option value = "4">4</option>
             </select>
             <!--Stauts-->
             <br>
             <br>
             <label for = "Status"> Status: </label>
             <select name = "Status" id= "Status">
                 <option value="active">Active</option>
                 <option value="completed">completed</option>
             </select>
             <!--Submit Button-->
             <br>
             <br>
             <input type="submit" value = "Submit"> 
        </form>
        
        
        
        
        
        
        
       
    
    
    
    
    
    
    
          
          <br>
          <br>
          <br>
          <br>
         <a href="index.php"><div class = "center"><button class="button button1">Go Home</button></div></a>
    </body>
</main>



    <?php
$task_desc = mysqli_real_escape_string($db, $_REQUEST['fTaskDes']);
$due_date = mysqli_real_escape_string($db, $_REQUEST['fdueDate']);
$category = mysqli_real_escape_string($db, $_REQUEST['Category']);
$priority = mysqli_real_escape_string($db, $_REQUEST['Priority']);
$status = mysqli_real_escape_string($db, $_REQUEST['Status']);

$sql = "INSERT INTO Tasks (description, Category, date_due, completed, priority_level) VALUES ('$task_desc','$category','$due_date',0, '$priority');";

//$insert = mysqli_query($db,$sql);
if(mysqli_query($db, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?> 