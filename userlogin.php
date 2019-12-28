<?php
require_once('config.php');
?>

<?php 
session_start();

if(isset($_POST)){
    $useremail = $_POST['useremail'];
    $userpassword = sha1($_POST['userpassword']);
    $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1 ";

    $stmselect = $db->prepare($sql);
    $result  = $stmselect->execute([$useremail , $userpassword ]);
    if($result){
        $user = $stmselect->fetch(PDO::FETCH_ASSOC);
        if($stmselect->rowCount() > 0 ){
            $_SESSION['userlogin'] = $user;
            echo 'success';
        }else{
            echo 'No User Found';
        }
    }else{
        echo 'There is error in connecting to database';
    }
}

?>