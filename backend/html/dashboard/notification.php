<!doctype html>
<html>

<head>
    <title>Notifications - V & S</title>
    <?php require_once('../includes/site-master.php'); ?>
    
</head>

<body id="home-page" class="home_add_page">
   
<?php require_once('../includes/header-loged.php'); ?>
    <main dashboard>
        <section class="dash_outer">
            <div class="inner_dash">
                <div class="side_bar">
                    <?php require_once('../includes/side-bar.php'); ?>
                </div>
                <div class="content_area">
                    <div class="dash_header">
                        <h3>Dashboard <span>/ Notifications</span></h3>
                        
                    </div>
                    <div class="dash_body">
                       
                        <div class="dash_heading_sec">
                            <h2>Notifications</h2>
                        </div>
                        <div class="dash_blk_box notiBlk">
                            <div class="inner">
                                <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                                <div class="txt">
                                    <p>You have a new order request from Jennifer K. <a href="javascript:void(0)" class="popBtn" data-popup="request-detail">click here</a> to view detail.</p>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                                <div class="txt">
                                    <p>You have a new notification. Order completed by Aleena. <a href="javascript:void(0)" class="popBtn" data-popup="request-detail">click here</a> to view detail.</p>
                                    <span class="time">3 hours ago</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="ico"><img src="<?=$baseurl?>images/new1.jpg" alt=""></div>
                                <div class="txt">
                                    <p>You have a new notification. Your ticket has been expired. <a href="javascript:void(0)" class="popBtn" data-popup="request-detail">click here</a> to view detail.</p>
                                    <span class="time">3 hours ago</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                                <div class="txt">
                                    <p>You have a new order request from Jennifer K. <a href="javascript:void(0)" class="popBtn" data-popup="request-detail">click here</a> to view detail.</p>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                                <div class="txt">
                                    <p>You have a new notification. Order completed by Aleena. <a href="javascript:void(0)" class="popBtn" data-popup="request-detail">click here</a> to view detail.</p>
                                    <span class="time">3 hours ago</span>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="ico"><img src="<?=$baseurl?>images/new1.jpg" alt=""></div>
                                <div class="txt">
                                    <p>You have a new notification. Your ticket has been expired. <a href="javascript:void(0)" class="popBtn" data-popup="request-detail">click here</a> to view detail.</p>
                                    <span class="time">3 hours ago</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once('../includes/commonjs.php'); ?>
</body>

</html>