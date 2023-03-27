<!doctype html>
<html>

<head>
    <title>Login - V & S</title>
    <?php require_once('includes/site-master.php'); ?>
    
</head>

<body id="home-page" class="home_add_page">
   
<?php require_once('includes/header.php'); ?>
    <main index>
        <section class="logon">
            <div class="contain">
                <div class="log_blk">
                    <form action="" method="">
                        <h3>Sign in</h3>
                        <p>Enter your details below</p>
                        <div class="txtGrp">
                            <label for="" class="move">Email Address</label>
                            <input type="text" name="email" id="" class="txtBox" required="">
                        </div>
                        <div class="txtGrp pasDv">
                            <label for="" class="move">Password</label>
                            <input type="password" name="password" id="" class="txtBox" required="">
                            <i class="icon-eye" id="eye"></i>
                        </div>
                        <div class="txtGrp flex">
                            <div class="lblBtn">
                                <input type="checkbox" name="remeberMe" id="remember" checked="">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="forgot-password.php" id="pass">Forgot Password?</a>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn blockBtn icoBtn"><img src="images/icon-pencil.svg" alt=""> Sign in <i class="spinner hidden"></i></button>
                        </div>
                    </form>
                    <div class="haveAccount text-center">
                        <span>Don’t have an account?</span>
                        <a href="signup.php">Sign up</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once('includes/footer.php'); ?>
</body>

</html>