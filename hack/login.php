<?php
    require_once 'common.php';

    $dao = new UserDAO;
    session_start();

?>

<html>

<body>
    <center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <img src="./images/lunar.jpg" width="200">
    <form action="login.php" method="post">
        <table border ="1">
        <tr>
            <th>Username</th>
            <td> <input name="username" value = '' /> </td>
        </tr>
        <tr>
            <th>Password</th>
            <td> <input type="password" name="password" /> </td>
        </tr>
        </table>
        <br/>
        <input type="submit" value="Login" name = "login"/>
        <br/>
    </form>
    
    <?php 
        if (isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $dao->get($username);

            $pass = true;
            if (! isset($user)){
                echo "Username does not exist!";
                $pass = false;
            }

            if ($pass){
                $userpassword = $user->getPassword();
                if ($userpassword == $password){
                    $_SESSION['user'] = $user;
                    header("Location: client_view.php");
                }
                else{
                    echo "Password is not valid!";
                }
            }
        }

    ?>
    </center>
</body>
</html>