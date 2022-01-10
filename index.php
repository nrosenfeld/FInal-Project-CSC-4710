<!DOCTYPE html>

<?php
//Step1
 $db = mysqli_connect('localHost','id16482109_thegroup','Project1234!','id16482109_tasks')
 or die('Error connecting to MySQL server.');
?>

</html>



<style> 
h1{color: teal;
text-align: center; 
font-family: Arial, Helvetica, sans-serif;
font-size: 72px;}
h2{color: orange;
    font-family: Arial, Helvetica, sans-serif;}
 p{color: black;}
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
table {
border-collapse: collapse;
width: 100%;
color: black;
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
text-align: left;
}
th {
background-color: teal;
color: white;
}
aside {
  width: 30%;
  padding-left: 15px;
  margin-left: 15px;
  float: right;
  font-family: Arial, Helvetica, sans-serif;
  background-color: orange;
}
div {
    text-align: center;
}
h4{color: teal;
    font-family: Arial, Helvetica, sans-serif;}

.button1 {background-color: orange;} 
.button2 {background-color: teal;} 
</style>

    <head>
        <meta charset="UTF-8">
	
        <!--This is where the title goes-->
            <title>
                    To Do List
            </title>
    </head>
    
    <!--Body starts here -->
    <body> 
        <h1>To Do List </h1>
        <hr> <!--Line across-->
        <hr> <!--Line across-->
        <h2>General Description</h2>
        <p>This online To-Do list application allows users to make tasks and check them off their lists!</p>
        <hr> <!--Line across-->
        <hr> <!--Line across-->

        <aside> 
            <h4>Navigate to Table</h4>
            <ul> 
                
                <li><a href="#Display_Overdue"> Display Overdue Tasks</a></li>
                <li><a href="#Display_Due_Today"> Display Due Today Tasks</a></li>
                <li> <a href = "#Display_Report"> Display Report</a></li>
            </ul>
         </aside>

        <!--BUTTONS -->
        <a href="createNewTask.php"><div><button class="button button1">Create Task</button></div></a>
         
        <a href="createNewCategory.php"><div><button class="button button2">Create Category</button></button></div></a>
       
        <a href="editCategory.php"><div><button class ="button button1">Edit Category</button></div></a>
        
        
        <hr> <!--Line across-->
        <hr> <!--Line across-->
        <main>
    <section> 
        <a id = "Display_Overdue">
            <h2>Display Overdue and Due-Today Tasks</h2></a>
        <table>
            <tr>
            <th>Completed</th>
            <th>Task Description</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>Task Category</th>
            <th>Parent Category</th>
            
            </tr>
         <!--   <tr> 
            <td><input type="checkbox" value="Completed"></td>
            <td>imported from db</td>  
            <td>imported from db</td>  
            <td>imported from db</td>  
            <td>imported from db</td>  
            <td>imported from db</td> 
            </tr>  -->
              
              <?php
               //Step2
                $query = "SELECT Description, priority_level, completed, date_due, cat_id, cat_description, GET_PARENT(parent_cat)  FROM Tasks JOIN Categories ON (Tasks.Category = Categories.cat_id) WHERE date_due <= CURDATE() ORDER BY priority_level";
                mysqli_query($db, $query) or die('Error querying database.');
                
                
                
                
                //Step3
                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_array($result)):;?>
            <tr>
                
                <td><input type="checkbox" name="tag_1" id="tag_1" value="Completed" 
                <?php 
                $t = $row['completed'];

                if ($t) {
                  echo "checked";
                }
                ?>
                ></td>
                <td><?php echo $row['Description'] ?></td>
                <td><?php echo $row['priority_level'] ?></td>
                <td><?php echo $row['date_due'] ?></td>
                <td><?php echo $row['cat_description'] ?></td>
                <td><?php echo $row['GET_PARENT(parent_cat)'] ?></td>
        
                
            </tr>
            
            <?php endwhile;?>
        </table>
        
        
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <form> <!--form action = "name_of_php.php" method = "post"-->
            
        <br><br>
              <!--Task Category-->
            <label for="description">This task is completed:</label>
           <select name="description" id="description">
                <option value = null>none</option>
                <!-- here is where we put the code that reads in the Parent categories from the sql Database-->
                 <?php
               //Step2
                $query = "SELECT Task_id, description FROM Tasks WHERE completed = 0";
                mysqli_query($db, $query) or die('Error querying database.');
                //Step3
                $result = mysqli_query($db, $query);
                
                
                $task_desc = mysqli_real_escape_string($db, $_REQUEST['description']);
                $task_id = mysqli_real_escape_string($db, $_REQUEST['Task_id']);
                
                
                $sql = "UPDATE Tasks SET completed = 1 WHERE Task_id=$task_desc;";
                
                $insert = mysqli_query($db,$sql);
                if(mysqli_query($db, $sql)){
                    echo "Records inserted successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                }
                
                
                
                

                while($row = mysqli_fetch_array($result)):;?>
                <option value = "<?php echo $row['Task_id'] ?>"><?php echo $row['description'] ?></option>
                <?php endwhile; ?>
                
            
                
            </select>
            
        
            
            
            
             <br>
             <input type="submit"> 
        </form>
    
    
    
    
    
    
    
    
    
    
    

    <hr> <!--Line across-->
    <hr> <!--Line across-->

    <section2>
        <a id = "Display_Due_Today">
        <h2>Display Completed Tasks</h2></a>
        <table>
            <tr>
                
                <th>Task Description</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Task Category</th>
                <th>Parent Category</th>
                
                </tr>
                <!--<tr> 
                <td><input type="checkbox" value="Completed"></td>
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                </tr>  -->
                <?php
               //Step2
                $query = "SELECT Description, priority_level, completed, date_due, cat_id, cat_description, GET_PARENT(parent_cat)  FROM Tasks JOIN Categories ON (Tasks.Category = Categories.cat_id) WHERE completed = 1 ORDER BY date_due";
                mysqli_query($db, $query) or die('Error querying database.');
                //Step3
                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_array($result)):;?>
            <tr>
            
                <td><?php echo $row['Description'] ?></td>
                <td><?php echo $row['priority_level'] ?></td>
                <td><?php echo $row['date_due'] ?></td>
                <td><?php echo $row['cat_description'] ?></td>
                <td><?php echo $row['GET_PARENT(parent_cat)'] ?></td>
               
            </tr>
            
            <?php endwhile;?>
            </table>
    </section2>

    <hr> <!--Line across-->
    <hr> <!--Line across-->


    <section3>
         
        <a id = "Display_Report By Week">
        <h2>Display Report</h2></a>
        
        <!--Drop down box-->
        <form action = "" method ="post">
    <label for="week">Due Date:</label>
             <select id ="week" name="week" default = 0>
                <option value= 1 selected>This Last Week</option>
                <option value= 2>The Preceding Week</option>
                <option value = 3>Over 2 Weeks Ago</option>
            </select>
            <input type="submit" value="Submit">
        </form>
        
        <?php
        $date = $_POST['week'];
        if ($date==1) 
           echo "Showing this last week's tasks";
        else if ($date ==2)
           echo "Showing the previous week's tasks";
        else if ($date ==3)
           echo "Showing tasks from over two weeks ago";
        else echo "Select a week to display";
        $date = $date * -7;
        if ($date != -21) 
          $qw = "SELECT date_due, COUNT(*) AS Tasks_Total, SUM(completed) AS Completed_Tasks FROM Tasks GROUP BY date_due HAVING date_due > DATE_ADD(CURDATE(), INTERVAL '$date' DAY) AND date_due < DATE_ADD(CURDATE(), INTERVAL ('$date'+7) DAY) ORDER BY date_due";
        else
          $qw = "SELECT date_due, COUNT(*) AS Tasks_Total, SUM(completed) AS Completed_Tasks FROM Tasks GROUP BY date_due HAVING date_due < DATE_ADD(CURDATE(), INTERVAL -14 DAY) ORDER BY date_due";
        
        
        //if(Blah blah blah)
            //then return corresponding table 
        //esle if(blah blah)
        ?>
        </form>
        
         <table>
            <tr>
                
                <th>Due Date</th>
                <th>Number Of Tasks</th>
                <th>Number Completed</th>
             
                </tr>
                <!--<tr> 
                <td><input type="checkbox" value="Completed"></td>
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                  <td>imported from db</td>  
                </tr>  -->
                <?php
               //Step2
                mysqli_query($db, $qw) or die('Error querying database.');
                //Step3
                $result = mysqli_query($db, $qw);

                while($row = mysqli_fetch_array($result)):;?>
            <tr>
                
                <td><?php echo $row['date_due'] ?></td>
                <td><?php echo $row['Tasks_Total'] ?></td>
                <td><?php echo $row['Completed_Tasks'] ?></td>
                
            </tr>
            
            <?php endwhile;?>
            </table>
    </section3>

    <hr> <!--Line across-->
    <hr> <!--Line across-->

    <!--This button takes users to the authors page-->
    <a href="authors.html"><div><button class ="button button1">About the Authors</button></div></a>          
</main>

<footer>
    <hr> <!--Line across-->
    <hr> <!--Line across-->
        <h4>To Do List</h4>
		<p>This site was created for CSC 4710 on March 27, 2021. </p>
        <time datetime = "03-27-2021"></time>
       
    </footer>    
        
    </body>        
</html>



<!--MS010903282199-->