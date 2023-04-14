<?PHP

include_once("connect.php");
$code=$_GET['code'];

if(isset($code)){
    $sql=$connection->prepare("DELETE FROM `skill` WHERE `code_student`=$code");

  
    if(  $sql->execute()){
        echo ('good');
    }else{
        echo ("fuck");
    }
    $query = $connection->prepare("DELETE FROM `students` WHERE `code`=$code");
    $query->execute();

    header("Location:tables.php");
}

?>