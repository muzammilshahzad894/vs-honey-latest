<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($actual_link,'employer') == false) {?>
    <ul>
        <li class="<?php if ($page == "index") {
                echo 'active';
            } ?>">
            <a href="index.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/dashboard.svg" alt="">
            </div><span>Dashboard</span>
            </a>
        </li>
        <li class="<?php if ($page == "cv") {
                echo 'active';
            } ?>">
            <a href="cv.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/file.svg" alt="">
            </div><span>My CV</span>
            </a>
        </li>
        <li class="<?php if ($page == "applied-jobs") {
                echo 'active';
            } ?>">
            <a href="applied-jobs.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/briefcase.svg" alt="">
            </div><span>Applied Jobs</span>
            </a>
        </li>
        <li class="<?php if ($page == "") {
                echo 'active';
            } ?>">
            <a href="">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/document.svg" alt="">
            </div><span>Offers</span>
            </a>
        </li>
        <li class="<?php if ($page == "payment-method") {
                echo 'active';
            } ?>">
            <a href="payment-method.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/wallet.svg" alt="">
            </div><span>Payment Method</span>
            </a>
        </li>
        <li class="<?php if ($page == "pricing-plan") {
                echo 'active';
            } ?>">
            <a href="pricing-plan.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/tags.svg" alt="">
            </div><span>Pricing Plans</span>
            </a>
        </li>
        
    </ul>
    <?php
} else {
    ?>
    <ul>
        <li class="<?php if ($page == "index") {
                echo 'active';
            } ?>">
            <a href="index.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/dashboard.svg" alt="">
            </div><span>Dashboard</span>
            </a>
        </li>
        <li class="<?php if ($page == "my-jobs") {
                echo 'active';
            } ?>">
            <a href="my-jobs.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/briefcase.svg" alt="">
            </div><span>My Jobs</span>
            </a>
        </li>
        <li class="<?php if ($page == "") {
                echo 'active';
            } ?>">
            <a href="">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/document.svg" alt="">
            </div><span>View Offers</span>
            </a>
        </li>
        <li class="<?php if ($page == "payment-method") {
                echo 'active';
            } ?>">
            <a href="payment-method.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/wallet.svg" alt="">
            </div><span>Payment Method</span>
            </a>
        </li>
        <li class="<?php if ($page == "pricing-plan") {
                echo 'active';
            } ?>">
            <a href="pricing-plan.php">
            <div class="small_icon">
                <img src="<?=$baseurl?>images/dashboard/tags.svg" alt="">
            </div><span>Pricing Plans</span>
            </a>
        </li>
        
    </ul>
    <?php
}


?>
<!-- <ul>
    <li class="<?php if ($page == "index") {
            echo 'active';
        } ?>">
        <a href="index.php">
        <div class="small_icon">
            <img src="<?=$baseurl?>images/dashboard/dashboard.svg" alt="">
        </div><span>Dashboard</span>
        </a>
    </li>
    <li class="<?php if ($page == "cv") {
            echo 'active';
        } ?>">
        <a href="cv.php">
        <div class="small_icon">
            <img src="<?=$baseurl?>images/dashboard/file.svg" alt="">
        </div><span>My CV</span>
        </a>
    </li>
    <li class="<?php if ($page == "applied-jobs") {
            echo 'active';
        } ?>">
        <a href="applied-jobs.php">
        <div class="small_icon">
            <img src="<?=$baseurl?>images/dashboard/briefcase.svg" alt="">
        </div><span>Applied Jobs</span>
        </a>
    </li>
    <li class="<?php if ($page == "") {
            echo 'active';
        } ?>">
        <a href="">
        <div class="small_icon">
            <img src="<?=$baseurl?>images/dashboard/document.svg" alt="">
        </div><span>Offers</span>
        </a>
    </li>
    <li class="<?php if ($page == "payment-method") {
            echo 'active';
        } ?>">
        <a href="payment-method.php">
        <div class="small_icon">
            <img src="<?=$baseurl?>images/dashboard/wallet.svg" alt="">
        </div><span>Payment Method</span>
        </a>
    </li>
    <li class="<?php if ($page == "pricing-plan") {
            echo 'active';
        } ?>">
        <a href="pricing-plan.php">
        <div class="small_icon">
            <img src="<?=$baseurl?>images/dashboard/tags.svg" alt="">
        </div><span>Pricing Plans</span>
        </a>
    </li>
    
</ul> -->