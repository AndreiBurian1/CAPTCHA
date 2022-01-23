<?php 
session_start();

if(!empty($_POST['capcha']) && trim($_POST['capcha'])){

    if ($_POST['capcha'] == $_SESSION['capcha']) {
       echo 'Капча введена правильно'; 
    }else{
        echo 'Капча введена не верно';
    }

}
else
{
    unset($_SESSION['capcha']);
 
    exit();
}
?>



