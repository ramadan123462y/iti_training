<?PHP
session_start();
if(!isset($_SESSION['email'])){
  header("Location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=number] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<?PHP




  ?>
<h3>add _students</h3>

<div class="container">
  <form action="add.php" style="width: 70%;" method="post" enctype="multipart/form-data">
    <label for="fname"> Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name..">
    <label for="lname"> adge</label>
    <input type="number" id="lname" name="adge" placeholder="Your last adge... ..">
    <label for="lname"> phone</label>
    <input type="number" id="lname" name="phone" placeholder="Your last phone... ..">
    <label for="lname"> code</label>
    <input type="number" id="lname" name="code" placeholder="Your last code... ..">
   

    <label for="degree"> skills</label>
    <br>
    <?PHP
  include('connect.php');
$sql = $connection->prepare("SELECT `code_student`, `skill_name` FROM `skill` WHERE 1");
$sql->execute();
$data= $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $ss) {
        ?>
  <input type="checkbox" id="vehicle1" name="skills[]" value="<?PHP echo ($ss['code_student']);   ?>">
  <label for="vehicle1"> <?PHP echo ($ss['skill_name']);   ?></label><br>
  
  <?PHP

    }
  ?>
  
<br>
    <input type="submit" name="submit" value="Submit">
  </form>
</div>
<?PHP

?>
</body>
</html>