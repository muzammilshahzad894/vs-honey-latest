<!doctype html>
<html>

<head>
    <title>Forgot Password - V & S</title>
    <?php require_once('includes/site-master.php'); ?>
    
</head>

<body id="home-page" class="home_add_page">
   
<?php require_once('includes/header.php'); ?>
    <main index>
        <section class="logon">
            <div class="contain">
                <div class="log_blk">
                    <form action="" method="">
                        <h3>Reset your password here!</h3>
                        <p>Don’t worry. Just enter the email address you registered with and we’ll email you instructions to reset your password.</p>
                        <div class="txtGrp">
                            <label for="" class="move">Email Address</label>
                            <input type="text" name="email" id="email" class="txtBox" required="">
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn blockBtn icoBtn"><img src="images/icon-pencil.svg" alt=""> Reset Password <i class="spinner hidden"></i></button>
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