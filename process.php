<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
    $firstname    = $_POST['firstname'];
    $lastname     = $_POST['lastname'];
    $email        = $_POST['email'];
    $phonenumber  = $_POST['phonenumber'];
    $password     = sha1($_POST['password']);
   

    $sql = "INSERT INTO users (firstname , lastname, email,phonenumber, password ) VALUE (?,?,?,?,?)";
    $startinsert = $db->prepare($sql);
    $result = $startinsert->execute([$firstname, $lastname, $email , $phonenumber, $password]);
    if($result){
        echo'sucessfully save';
    }else{
        echo 'there were error while save';
    }
}else{
    echo 'No data';
}

?>