<header class="ease logged_header">
    <div class="contain-custom">
        <div class="logo">
            <a href="index.php">
                <img src="<?=$baseurl?>images/logo.png" alt="">
            </a>
        </div>
        <div class="toggle"><span></span></div>
        <nav class="ease">
           
            <ul id="nav" class="loged-nav">
                <li>
                    <a href="notification.php">
                        <span class="active"></span>
                        <img src="<?=$baseurl?>images/dashboard/bell.svg" alt="" class="ring_bell">
                    </a>
                </li>
                <li>
                    <a href="chat.php">
                        <span class="active chat_box"></span>
                        <img src="<?=$baseurl?>images/dashboard/chat.svg" alt="">
                    </a>
                </li>
            </ul>
            <?php
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($actual_link,'employer') == false) {?>
            <ul id="nav" nav class="hide_ds">
               
                <li class="<?php if ($page == "cv") {
                                echo 'active';
                            } ?>">
                    <a href="cv.php">My CV</a>
                </li>
                
                
                <li class="<?php if ($page == "applied-jobs") {
                                echo 'active';
                            } ?>">
                    <a href="applied-jobs.php">Applied Jobs</a>
                </li>
                <li class="<?php if ($page == "") {
                                echo 'active';
                            } ?>">
                    <a href="?">Offers</a>
                </li>
                <li class="<?php if ($page == "payment-method") {
                                echo 'active';
                            } ?>">
                    <a href="payment-method.php">Payment Method</a>
                </li>
                <li class="<?php if ($page == "pricing-plan") {
                                echo 'active';
                            } ?>">
                    <a href="pricing-plan.php">Pricing Plans</a>
                </li>
            </ul>
            <?php
            } else {
                ?>
                <ul id="nav" nav class="hide_ds">
                    <li class="<?php if ($page == "my-jobs.php") {
                                    echo 'active';
                                } ?>">
                        <a href="my-jobs.php">My Jobs</a>
                    </li>
                    <li class="<?php if ($page == "") {
                                    echo 'active';
                                } ?>">
                        <a href="?">View Offers</a>
                    </li>
                    <li class="<?php if ($page == "payment-method") {
                                    echo 'active';
                                } ?>">
                        <a href="payment-method.php">Payment Method</a>
                    </li>
                    <li class="<?php if ($page == "pricing-plan") {
                                    echo 'active';
                                } ?>">
                        <a href="pricing-plan.php">Pricing Plans</a>
                    </li>
                </ul>
                <?php
                }
                ?>
            <div class="proIco dropDown">
                <div class="inside dropBtn">
                    <div class="ico">
                        <img src="<?=$baseurl?>images/1.png" alt="">
                    </div>
                    
                </div>
                <ul class="proDrop dropCnt">
                    <li>
                        <div class="user_header">
                            <h5>Aleena Gilbert</h5>
                            <p>Software Engineer</p>
                        </div>
                    </li>
                        <li>
                            <a href="index.php">
                            <div class="small_icon">
                                <img src="<?=$baseurl?>images/dashboard/dashboard.svg" alt="">
                            </div><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="notification.php">
                            <div class="small_icon">
                                <img src="<?=$baseurl?>images/dashboard/bell.svg" alt="">
                            </div><span>Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                            <div class="small_icon">
                                <img src="<?=$baseurl?>images/dashboard/chat.svg" alt="">
                            </div><span>Chat</span>
                            </a>
                        </li>
                        
                    <li>
                        <a href="account-settings.php">
                        <div class="small_icon">
                            <img src="<?=$baseurl?>images/dashboard/settings.svg" alt="">
                        </div><span>Profile Settings</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="login.php"><div class="small_icon">
                            <img src="<?=$baseurl?>images/dashboard/sign-out-alt.svg" alt="">
                        </div><span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            
        </nav>
        
        <div class="clearfix"></div>
    </div>
</header>
<!-- header -->
<div class="pBar hidden"><span id="myBar" style="width:0%"></span></div>