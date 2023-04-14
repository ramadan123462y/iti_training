<?PHP
$code = $_GET['code'];
//--------connection-----
include_once("connect.php");

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $age = $_POST['adge'];
    $phone = $_POST['phone'];
    $code2 = $_POST['code'];
    $update = $connection->prepare("UPDATE `students` SET 
    `name`='$name',`age`='$age',`phone`='$phone',`code`='$code2' WHERE code=$code ");
    
    if($update->execute()){
        echo ("GOOOD");
        header("Location:tables.php");

    }else{
        echo ("   retrie.....eror ");
    }
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

<h3>add _students</h3>
<?PHP
 $ss=$connection->prepare("SELECT `name`, `age`, `phone`, `code`, `dept`, `degree` FROM `students` WHERE `code`=$code");
$ss->execute();
 $show_data=$ss->fetchAll(PDO::FETCH_ASSOC);

 
foreach ($show_data as $disblay) {
 
    
    ?>
<div class="container">
  <form action="" style="width: 70%;" method="post" enctype="multipart/form-data">
    <label for="fname"> Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name.." value="<?PHP echo $disblay['name']; ?>" >
    <label for="age"> adge</label>
    <input type="number" id="age" name="adge" placeholder="Your last adge... .."  value="<?PHP echo $disblay['age']; ?>" >
    <label for="" > phone</label>
    <input type="number" id="lname" name="phone" placeholder="Your last phone... .."  value="<?PHP echo $disblay['phone']; ?>" >
    <label for="lname"> code</label>
    <input type="number" id="lname" name="code" placeholder="Your last code... .."  value="<?PHP echo $disblay['code']; ?>" >
   
<?PHP
}
?>
    <label for="degree"> skills</label>
    <br>
    <?PHP
  include('connect.php');
$sql = $connection->prepare("SELECT `code_student`, `skill_name` FROM `skill` WHERE code_student=$code ");
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
  <button type="submit" name="update" >update  </button>
  </form>
</div>

</body>
</html>
