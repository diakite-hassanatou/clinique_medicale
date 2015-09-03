<?php
/**
 * Created by PhpStorm.
 * User: hdiakite
 * Date: 2015-09-03
 * Time: 15:08
 */
define('LOGGED', 'logged');
if (!array_key_exists("username", $_COOKIE) && !array_key_exists("psw", $_COOKIE)){
    setcookie("username", "hassan", time() + 3600 * 24 * 30);
    setcookie("psw", "123456", time() + 3600 * 24 * 30);
    setcookie(LOGGED, "0", time() + 3600 * 24 * 30);
}

if (array_key_exists("username", $_POST) && array_key_exists("psw", $_POST)){

    if($_POST["username"] == $_COOKIE["username"] && $_POST["psw"] == $_COOKIE["psw"]){
        setcookie(LOGGED, "1", time() + 3600 * 24 * 30);
    } else {
        setcookie(LOGGED, "0", time() + 3600 * 24 * 30);
    }

}
if(array_key_exists(LOGGED, $_COOKIE)) {
    if($_COOKIE[LOGGED] == "1"){

        echo "You are logged";
        echo "<form method='post'>
    <input type='submit' value='Deconnecter'>
</form>";

    }else {

        echo "NOT LOGGED";

        echo "<form method='post'>
    User name:
    <input type='text' name='username'>
    User password:
    <input type='password' name='psw'>
    <input type='submit' value='Soumettre'>
</form>";
    }

}



?>

