<?PHP
//connection

include('connect.php');
//--------------
$name = $_POST['name'];
$adge = $_POST['adge'];
$phone = $_POST['phone'];
$code = $_POST['code'];
//validation
if(!empty($_POST['skills'])){
    $skills = $_POST['skills'];

    $alldata = implode("", $skills);
    echo ($alldata);
}else{
    $skills = "empty";
    
}
if(!empty($code)){
    
$in= $connection->prepare("SELECT  `code` FROM `students` WHERE  `code`=$code ");
$in->execute();
$r=$in->rowCount();
if($r==0){
    $sql= $connection->prepare("INSERT INTO `students`(`name`, `age`, `phone`, `code`)
    VALUES ('$name','$adge','$phone','$code')");
    $sql->execute();
    
    header("Location:show.php");
}else{
    $error = "البيانات التي تحاول ادخالها موجوده فعليا";
    header("Location:show.php");
    echo ($error);
}
$quere=$connection->prepare("INSERT INTO `skill`(`code_student`, `skill_name`) VALUES ('$code','$alldata')");
$quere->execute();
echo ("INSERT INTO `skill`(`code_student`, `skill_name`) VALUES ('$code','$alldata')");

}else{
    $error_code = "code موجود قبل كدا ";
    header("Location:show.php");
}



?>