 <?php

 if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confrim_password=$_POST['confrim_password'];

     $qry=$conn->prepare("SELECT * FROM users WHERE username=?");
     $qry->bind_param("s",$username);
     $qry->execute();
     $result=$qry->get_result();
     if($result->num_rows>0){
    echo"Username already exists!";
     exit();
     }
     
    if($password===$confrim_password){
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
    $stmt=$conn->prepare("INSERT INTO users(username,password)VALUES(?,?)");
    $stmt->bind_param("ss",$username,$hashed_password);
    $stmt->execute();
    $stmt->close();
    echo"Registration successful!";
    }else{
    echo"Passswords do not match!";
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
        <h1>REGISTER</h1>
        <label for="username">Username</label>
        <br>
        <input type="text" id="username" name="username" />
        <br>
        <label for="password">Password</label>
        <br>
        <input type="password" id="password" name="password" />
        <br>
        <label>comfirm password</label><br>
        <input type="password" id="confirm_password" name="confirm_password" />
        <br>
        <button type="submit">REGISTER</button>
        <br>
        <a href="login.html">dont have an account? click me to login</a>
    </div>
 
</body>
</html>