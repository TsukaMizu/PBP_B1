<?php
session_start();

require_once('./lib/db_login.php');

if (isset($_POST['submit'])) {
    $valid = true;

    $email = test_input($_POST['email']);
    if($email == ''){
        $error_email = "Email is Required";
        $valid = false;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "Invalid Email";
        $valid = false;
    }

    $password = test_input($_POST["password"]);
    if($password == ''){
        $error_password = "Password is Required";
        $valid = false; 
    }
    if($valid){
        $query ="SELECT *FROM admin WHERE email='".$email ."'AND password='".md5($password)."'";
        $result = $db->query($query);

        if(!$result){
            die ("Could no query the database: <br />".$db->error);
        }else{
            if($result->num_rows > 0){
                $_SESSION['username'] = $email;
                header('Location: view_customer.php');
                exit;
            }else{
                echo '<div class="alert alert-danger" role="alert">Combination if username and password are not correct.</div>';
            }
        }
        $db->close();
    }
}
?>
<?php include('./header.php');?>
<br>
<div class="card mt-5">
    <div class="card-header text-center"><b>Login Page</b></div>
    <div class="card-body">
        <form method="post" autocomplete="on" action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)) echo $email;?>">
                <div class="error text-danger">
                    <?php if(isset($error_email)) echo $error_email; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" value="">
                <div class="error text-danger">
                    <?php if(isset($error_password)) echo $error_password;?>
                </div>
            </div>
            <br>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
<?php include('./foother.php')?>