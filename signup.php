<?php


if(isset($_POST["submit"])){

    $username = mysql_real_escape_string($conn, $_POST["username"]);
    $email = mysql_real_escape_string($conn, $_POST["email"]);
    $idno = mysql_real_escape_string($conn, $_POST["idno"]);
    $phoneno = mysql_real_escape_string($conn, $_POST["phoneno"]);
    $pass= md5($_POST["password"]);
    $cpass = md5($_POST["cpassword"]);
    $user_type = $_POST["user_type"];

    $select = "SELECT * FROM  user_form WHERE email = '$email' && password='$pass' ";

    $result = mysql_query($conn,$select);

    if(mysql_num_rows($result)>0){

        $error[] = "user already exist!";

    }else{
        if($pass !=$cpass){
            $error[] = "password not matched";
        }
        else{
            $insert = "INSERT INTO user_form(username,	email,	idno,	phoneno,	password,	user_type) values('$username','$email','$idno','$phoneno','$pass','$user_type');
            mysql_query($conn, $insert)";
            header('location:login.php');
        
        }
    }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Create account</title>
    
</head>
<body>
    <section>
        <div class="container">
            <div class="promotext">
                <h3>Lend,Loan with Us</h3>
                <h2>Welcome back!</h2>
                
                <p>Your One time Financial Solution </p>
             </div>
             <div class="login">
                <h4>Create Your Account</h4>
                <div class="logbox">
                    <form action="" method="post">
                     <div class="inputbox">
                            <input type= "text" name="username" required placeholder ="Username">
                            <span></span>
                        </div>   
                        <div class="inputbox">
                            <input type="email" name="email" required placeholder="Email">
                            <span></span>
                        </div>   
                        <div class="inputbox">
                            <input type="text" name="idno" required placeholder="ID Number">
                            <span></span>
                        </div>   
                        <div class="inputbox">
                            <input type="text" name="phoneno" required placeholder="Phone Number">
                            <span></span>
                        </div>   
                        <div class="inputbox">
                            <input type="password" name="password" required placeholder="Password">
                            <span></span>
                        </div>
                        <div class="inputbox">
                            <input type="text" name="password" required placeholder="Confirm Password">
                            <span></span>
                        </div>
                        <div class="select">
                        <select type="user_type">
                            <option value="Lender">Lender</option>
                            <option value="Agent">Agent</option>
                            <option value="Customer">Customer</option>
                        </select>   
                    
                    </div>
                    <button type="submit" class="button">Submit</button> 

                    <p>Already have an Account? <a href="login.php">Login Now</a></p>
                </div>
            </form>    
                    
                       
                </div>
                <div class="bcgimage"></div>

             </div>



        </div>
    </section>
    
</body>
</html>