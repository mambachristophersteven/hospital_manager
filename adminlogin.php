<?php

include 'connection.php';
$username="";
$password="";
$error="";

if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    if(empty($username)){
        $error = "Invalid Login Credentials";
    }
    else{
        if(empty($password)){
            $error = "Invalid login Credentials";
        }
        else{
            $sql= "SELECT * FROM `admins` WHERE username='$username'";
            $result= mysqli_query($con,$sql);
            $nums= mysqli_num_rows($result);
            if($nums>0){
                $row= mysqli_fetch_assoc($result);
                $passwordinDb =$row['password'];
                $position=$row['position'];
                //$checkpassword=password_verify($password,$hashedpasswordinDb);
                if($passwordinDb===$password){
                    if($position==="Doctor"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./doctor/overviewdoctor.php');
                    }
                    if($position==="Developer"){
                        session_start();
                        $_SESSION['username']= $username;
                        header('location: ./developer/overviewdeveloper.php');
                    }
                }
                else{
                    $error= "Invalid Login Credentials";
                }
            }          
            else{
                $error= "Invalid Login Credentials";
            }
        }
    }


    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. Andrew's Hospital - Admin Login Page</title>
    <link rel="stylesheet" href="css/in.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="./developerimages/logo.png" alt="">
            </div>
        </div>
        <div class="body">
            <h2>Admin Login</h2>
            <h3 id="error"><?php echo $error;?></h3>
            <form action="./adminlogin.php" method="post" id="form">
                <input type="text" name="username" id="username" placeholder="enter username" value=<?php echo $username?>>
                <br>
                <input type="password" name="password" id="password" placeholder="enter password">
                <br>
                <input type="submit" value="Validate" name="submit" id="submit">
            </form>
            <div class="company">
                <h1>St. Andrew's Hospital Management System</h1>
            </div>
        </div>
    </div>
    

    <script>

        const form = document.getElementById('form');
        const username = document.getElementById('username');
        const password = document.getElementById('password');
        const errorMessage = document.getElementById('error');
        const submitButton = document.getElementById('submit');

        const listener = function (e) {
            e.preventDefault();
            checkInputs();
        };

        form.addEventListener('submit', listener);

        function checkInputs(){
            //get the values from the inputs           
            const usernameValue = username.value.trim();
            const passwordValue = password.value.trim();
            if(passwordValue === ''){
                //show error
                //add error class
                setErrorFor(password, 'Enter a password');
            }
            else{
                //add success class
                setSuccessFor(password);
            }
            if(usernameValue === ''){
                //show error
                //add error class
                setErrorFor(username, 'Enter a username');
            }
            else{
                //add success class
                setSuccessFor(username);
            }
            if(usernameValue !='' && passwordValue !=''){
                errorMessage.style.color = "#2ecc71";
                errorMessage.innerText = "All Input Fields Validated";
                submitButton.style.background = "rgb(109, 109, 241)";
                submitButton.value = "Login";
                form.removeEventListener("submit", listener);
            }

        }





        function setErrorFor(input, message){
            errorMessage.innerText = message;
            input.style.border = "2px solid #e74c3c";
        }

        function setSuccessFor(input){
            input.style.border = "none";
        }
    </script>
</body>
</html>