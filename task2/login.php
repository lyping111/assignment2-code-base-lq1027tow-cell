<?php
     if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
        
        $qry=$conn->prepare("SELECT * FROM users WHERE Username=?");
        $qry->bind_param("s",$username);
        $qry->execute();
        $result=$qry->get_result();
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
            
             if(password_verify($password,$user['Password'])){
                $_SESSION["username"]=$user["Username"];
                echo "<script>alert('Login successful');
                window.location.href='main.php';
                </script>";
            } else {
                echo "Login failed";
            }
        }
    }
       
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .container{
            width: 300px;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
            box-shadow:0 0 10px black;
            
        }
    </style>
    <div class="container">
        <h1>LOGIN</h1>
        <label for="username">Username</label>
        <br>
        <input type="text" id="username" name="username" />
        <br>
        <label for="password">Password</label>
        <br>
        <input type="text" id="password" name="password" />
        <br>
        <button type="submit">LOGIN</button>
        <br>
        <a href="register.html">dont have an account? click me to register</a>
    </div>
</body>
</html>
