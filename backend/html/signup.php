<!doctype html>
<html>

<head>
    <title>Sign up - V & S</title>
    <?php require_once('includes/site-master.php'); ?>
    
</head>

<body id="home-page" class="home_add_page">
   
<?php require_once('includes/header.php'); ?>
    <main index>
        <section class="logon">
            <div class="contain">
                <div class="log_blk">
                    <form action="" method="">
                        <h3>Sign up</h3>
                        <p>Please fill this form</p>
                        <div class="txtGrp">
                            <label for="" class="move">First Name</label>
                            <input type="text" name="fname" id="fname" class="txtBox">
                        </div>
                        <div class="txtGrp">
                            <label for="" class="move">Last Name</label>
                            <input type="text" name="lname" id="lname" class="txtBox">
                        </div>
                        <div class="txtGrp">
                            <label for="" class="move">Email Address</label>
                            <input type="text" name="email" id="email" class="txtBox">
                        </div>
                        <div class="txtGrp pasDv">
                            <label for="" class="move">Password</label>
                            <input type="password" name="password" id="password" class="txtBox">
                            <i class="icon-eye" id="eye"></i>
                        </div>
                        <div class="txtGrp pasDv">
                            <label for="" class="move">Confirm Password</label>
                            <input type="password" name="cpswd" id="cpswd" class="txtBox">
                            <i class="icon-eye" id="eye"></i>
                        </div>
                        <div class="txtGrp flex">
                            <div class="lblBtn">
                                <input type="checkbox" name="confirm" id="confirm">
                                <label for="confirm">By signing up, I agree to V & S
                                    <a href="terms-and-conditions.php" target="_blank">Terms & Conditions</a>
                                    and
                                    <a href="privacy-policy.php" target="_blank">Privacy Policy.</a>
                                </label>
                            </div>
                        </div>
                        <div class="bTn text-center">
                            <button type="submit" class="webBtn blockBtn icoBtn"><img src="images/icon-pencil.svg" alt=""> Sign up <i class="spinner hidden"></i></button>
                        </div>
                    </form>
                    <div class="haveAccount text-center">
                        <span>Already have an account?</span>
                        <a href="login.php">Sign in</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once('includes/footer.php'); ?>
</body>

</html>