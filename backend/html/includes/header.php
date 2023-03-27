<header class="ease">
    <div class="contain">
        <div class="logo">
            <a href="index.php">
                <img src="<?=$baseurl?>images/logo.png" alt="">
            </a>
        </div>
        <div class="toggle"><span></span></div>
        <nav class="ease">
            
            <ul id="nav" nav>
                <!-- <li class="<?php if ($page == "index") {
                                echo 'active';
                            } ?>">
                    <a href="index.php">Home</a>
                </li> -->
                <li class="<?php if ($page == "search-job") {
                                echo 'active';
                            } ?>">
                    <a href="search-job.php">Find Job</a>
                </li>
                
                <li class="<?php if ($page == "candidates") {
                                echo 'active';
                            } ?> dropDown">
                    <a href="javascript:void(0)" class="dropBtn">Candidates <i class="chevron"></i></a>
                    <div class="dropCnt">
                        <ul class="dropLst">
                            <li>
                                <a href="candidates.php">Candidates Account</a>
                            </li>
                            <li>
                                <a href="signup-candidate.php">Sign up</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="<?php if ($page == "employer") {
                                echo 'active';
                            } ?> dropDown">
                    <a href="javascript:void(0)" class="dropBtn">Employers <i class="chevron"></i></a>
                    <div class="dropCnt">
                        <ul class="dropLst">
                            <li>
                                <a href="employer-home.php">Employers Home</a>
                            </li>
                            <li>
                                <a href="pricing.php">Sign up</a>
                            </li>
                            <li>
                                <a href="post-job.php">Job posting & pricing</a>
                            </li>
                            <li>
                                <a href="candidates.php">Find candidates</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="<?php if ($page == "training.php") {
                                echo 'active';
                            } ?>">
                    <a href="training.php">Trainings</a>
                </li>
                <!-- <li class="<?php if ($page == "about") {
                                echo 'active';
                            } ?>">
                    <a href="about.php">About Us</a>
                </li> -->
                
                
                
            </ul>
            <ul id="cta">
                <li class="">
                    <a href="signup.php">Sign Up</a>
                </li>
                <li class="">
                    <a href="login.php" class="webBtn mdBtn">Log In</a>
                </li>
            </ul>
            
        </nav>
        
        <div class="clearfix"></div>
    </div>
</header>
<!-- header -->
<div class="pBar hidden"><span id="myBar" style="width:0%"></span></div>