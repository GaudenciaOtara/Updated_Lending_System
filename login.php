<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">

    <title>login</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="promotext">
                <h3>Welcome</h3>
                <h3>Back</h3>
                <p>Your One time Financial Solution</p>
             </div>
             <div class="login2">
                <h4>Create Your Account</h4>
                <div class="logbox">
                    <form action="" method="post">
                    <?php
            if(isset($error))
            {
                foreach($error as $error )
                {
                    echo '<span class="error-msg"> "$error" </span>';
                };
            };
            ?>
                     
                        <div class="inputbox">
                            <input type="email" name="email" required placeholder="Email">
                            <span></span>
                        </div>   
                        
                        </div>   
                        <div class="inputbox">
                            <input type="password" name="password" required placeholder="Password">
                            <span></span>
                        </div>
                       
                    
                        <button type="submit" class="button">Submit</button> 

                        <p>Don't have an Account? <a href="signup.php">Signup Now</a></p>
                   
                    </form>
                </div>   
                       
                </div>
                <div class="bcgimage"></div>

             </div>



        </div>
    </section>
    
    
</body>
</html>