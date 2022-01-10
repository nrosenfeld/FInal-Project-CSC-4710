<!DOCTYPE html>

</html>

<?php
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
                To Do List - Edit Category
        </title>
</head>
<main> 
    <body> 
        <h1>Edit a Category</h1>

      <!-- edit categories (and subcategories)..-->  

          <form action = submitEditCat.php method = "post">
            
            <!--Parent Category-->
            <label for="Categories">Choose a Category:</label>
            <select name="Category" id="Category">
                <option value = "Read In Categories from SQL">Read in From SQL</option>
                <!-- HERE is where we put the code that reads in the Parent categories from the sql database-->
                <?php $query = "SELECT cat_id, cat_description FROM Categories";
                mysqli_query($db, $query) or die('Error querying database.');
                //Step3
                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_array($result)):;?>
                <option value = "<?php echo $row['cat_id'] ?>"><?php echo $row['cat_description'] ?></option>
                <?php endwhile; ?>
            </select>
             <!--Name-->
             <p>Enter the new name of the category below.</p>
             <label for="Name">Name:</label><br>
             <input type="text" id="fname" name="fname"><br>
             <!-- change the name of the category in the database HERE -->
             <br>
             <br>

            <input type="submit" value="Submit"> 
          </form>
          
          <br>
          <br>
          <br>
          <br>
         <a href="index.php"><div class = "center"><button class="button button1">Go Home</button></div></a>
    </body>
    
</main>