<!doctype html>
<html>

<head>
    <title>Dashboard - V & S</title>
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
                        <h3>Dashboard <span>/ Overview</span></h3>
                        
                    </div>
                    <div class="dash_body">
                        <div class="tiles_blk flex">
                            <div class="col">
                                <div class="inner">
                                    <div class="cntnt">
                                        <p>Applied Jobs</p>
                                        <h5>20</h5>
                                    </div>
                                    <div class="tile_icon">
                                        <img src="<?=$baseurl?>images/dashboard/briefcase.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inner">
                                    <div class="cntnt">
                                        <p>Received Offers</p>
                                        <h5>15</h5>
                                    </div>
                                    <div class="tile_icon">
                                        <img src="<?=$baseurl?>images/dashboard/document.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inner">
                                    <div class="cntnt">
                                        <p>Messages</p>
                                        <h5>22</h5>
                                    </div>
                                    <div class="tile_icon">
                                        <img src="<?=$baseurl?>images/dashboard/chat.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inner">
                                    <div class="cntnt">
                                        <p>Notifications</p>
                                        <h5>12</h5>
                                    </div>
                                    <div class="tile_icon">
                                        <img src="<?=$baseurl?>images/dashboard/bell.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="dash_heading_sec">
                            <h2>Recently Applied Jobs</h2>
                            <a href="applied-jobs.php">View all jobs</a>
                        </div>
                        <div class="flex job_flex job_flex_100">
                            <div class="col">
                                <div class="inner">
                                    <div class="book_mark"><i class="fi fi-rr-bookmark"></i></div>
                                    <div class="head_job">
                                        <div class="img_ico">
                                            <img src="<?=$baseurl?>images/3-2.png" alt="">
                                        </div>
                                        <div class="cntnt">
                                            <h4><a href="?">Software Engineer (Android)</a></h4>
                                            <ul>
                                                <li><i class="fi fi-rr-marker"></i> <span>New York, NY</span></li>
                                                <li><i class="fi fi-rr-briefcase"></i> <span>Full time</span></li>
                                                <li><i class="fi fi-rr-clock-two"></i> <span>3 mins ago</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job_footer">
                                        <div class="job_price">
                                            $500<span>/Hour</span>
                                        </div>
                                        <a href="?" class="webBtn mdBtn">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inner">
                                    <div class="book_mark"><i class="fi fi-rr-bookmark"></i></div>
                                    <div class="head_job">
                                        <div class="img_ico">
                                            <img src="<?=$baseurl?>images/3-1.png" alt="">
                                        </div>
                                        <div class="cntnt">
                                            <h4><a href="?">Software Engineer (Android)</a></h4>
                                            <ul>
                                                <li><i class="fi fi-rr-marker"></i> <span>New York, NY</span></li>
                                                <li><i class="fi fi-rr-briefcase"></i> <span>Full time</span></li>
                                                <li><i class="fi fi-rr-clock-two"></i> <span>3 mins ago</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job_footer">
                                        <div class="job_price">
                                            $500<span>/Hour</span>
                                        </div>
                                        <a href="?" class="webBtn mdBtn">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inner">
                                    <div class="book_mark"><i class="fi fi-rr-bookmark"></i></div>
                                    <div class="head_job">
                                        <div class="img_ico">
                                            <img src="<?=$baseurl?>images/3-3.png" alt="">
                                        </div>
                                        <div class="cntnt">
                                            <h4><a href="?">Software Engineer (Android)</a></h4>
                                            <ul>
                                                <li><i class="fi fi-rr-marker"></i> <span>New York, NY</span></li>
                                                <li><i class="fi fi-rr-briefcase"></i> <span>Full time</span></li>
                                                <li><i class="fi fi-rr-clock-two"></i> <span>3 mins ago</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job_footer">
                                        <div class="job_price">
                                            $500<span>/Hour</span>
                                        </div>
                                        <a href="?" class="webBtn mdBtn">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="inner">
                                    <div class="book_mark"><i class="fi fi-rr-bookmark"></i></div>
                                    <div class="head_job">
                                        <div class="img_ico">
                                            <img src="<?=$baseurl?>images/3-5.png" alt="">
                                        </div>
                                        <div class="cntnt">
                                            <h4><a href="?">Software Engineer (Android)</a></h4>
                                            <ul>
                                                <li><i class="fi fi-rr-marker"></i> <span>New York, NY</span></li>
                                                <li><i class="fi fi-rr-briefcase"></i> <span>Full time</span></li>
                                                <li><i class="fi fi-rr-clock-two"></i> <span>3 mins ago</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job_footer">
                                        <div class="job_price">
                                            $500<span>/Hour</span>
                                        </div>
                                        <a href="?" class="webBtn mdBtn">View Details</a>
                                    </div>
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