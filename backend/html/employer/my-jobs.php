<!doctype html>
<html>

<head>
    <title>My Jobs - V & S</title>
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
                        <h3>Dashboard <span>/ My Jobs</span></h3>
                        <div class="bTn">
                            <a href="post-job.php" class="webBtn">Post New Job</a>
                        </div>
                    </div>
                    <div class="dash_body">
                        <div class="flex job_flex applied_job_flex">
                            <div class="col">
                                <div class="inner">
                                    <div class="dropDown dash_actions absolute_action">
                                        <span class="dropBtn"><i class="fi fi-rr-menu-dots"></i></span>
                                        <div class="dropCnt">
                                            <ul class="dropLst">
                                                <li><a href="post-job.php" class="webBtn labelBtn blue-color">Edit</a></li>
                                                <li><a href="posted-jobs.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
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
                                    <div class="job_bdy">
                                        <p>We want someone who has been doing this for a solid 2-3 years. We want someone who can demonstrate an extremely strong portfolio. Create deliverables for your product area (for example competitive analyses, user flows.</p>
                                        <div class="skils">
                                            <span>Adobe XD</span><span>Figma</span>
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
                                    <div class="dropDown dash_actions absolute_action">
                                        <span class="dropBtn"><i class="fi fi-rr-menu-dots"></i></span>
                                        <div class="dropCnt">
                                            <ul class="dropLst">
                                                <li><a href="post-job.php" class="webBtn labelBtn blue-color">Edit</a></li>
                                                <li><a href="posted-jobs.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
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
                                    <div class="job_bdy">
                                        <p>We want someone who has been doing this for a solid 2-3 years. We want someone who can demonstrate an extremely strong portfolio. Create deliverables for your product area (for example competitive analyses, user flows.</p>
                                        <div class="skils">
                                            <span>Adobe XD</span><span>Figma</span>
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
                                    <div class="dropDown dash_actions absolute_action">
                                        <span class="dropBtn"><i class="fi fi-rr-menu-dots"></i></span>
                                        <div class="dropCnt">
                                            <ul class="dropLst">
                                                <li><a href="post-job.php" class="webBtn labelBtn blue-color">Edit</a></li>
                                                <li><a href="posted-jobs.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
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
                                    <div class="job_bdy">
                                        <p>We want someone who has been doing this for a solid 2-3 years. We want someone who can demonstrate an extremely strong portfolio. Create deliverables for your product area (for example competitive analyses, user flows.</p>
                                        <div class="skils">
                                            <span>Adobe XD</span><span>Figma</span>
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
                                    <div class="dropDown dash_actions absolute_action">
                                        <span class="dropBtn"><i class="fi fi-rr-menu-dots"></i></span>
                                        <div class="dropCnt">
                                            <ul class="dropLst">
                                                <li><a href="post-job.php" class="webBtn labelBtn blue-color">Edit</a></li>
                                                <li><a href="posted-jobs.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="head_job">
                                        <div class="img_ico">
                                            <img src="<?=$baseurl?>images/3-4.png" alt="">
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
                                    <div class="job_bdy">
                                        <p>We want someone who has been doing this for a solid 2-3 years. We want someone who can demonstrate an extremely strong portfolio. Create deliverables for your product area (for example competitive analyses, user flows.</p>
                                        <div class="skils">
                                            <span>Adobe XD</span><span>Figma</span>
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
                                    <div class="dropDown dash_actions absolute_action">
                                        <span class="dropBtn"><i class="fi fi-rr-menu-dots"></i></span>
                                        <div class="dropCnt">
                                            <ul class="dropLst">
                                                <li><a href="post-job.php" class="webBtn labelBtn blue-color">Edit</a></li>
                                                <li><a href="posted-jobs.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="head_job">
                                        <div class="img_ico">
                                            <img src="<?=$baseurl?>images/3-6.png" alt="">
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
                                    <div class="job_bdy">
                                        <p>We want someone who has been doing this for a solid 2-3 years. We want someone who can demonstrate an extremely strong portfolio. Create deliverables for your product area (for example competitive analyses, user flows.</p>
                                        <div class="skils">
                                            <span>Adobe XD</span><span>Figma</span>
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
                                    <div class="dropDown dash_actions absolute_action">
                                        <span class="dropBtn"><i class="fi fi-rr-menu-dots"></i></span>
                                        <div class="dropCnt">
                                            <ul class="dropLst">
                                                <li><a href="post-job.php" class="webBtn labelBtn blue-color">Edit</a></li>
                                                <li><a href="posted-jobs.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
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
                                    <div class="job_bdy">
                                        <p>We want someone who has been doing this for a solid 2-3 years. We want someone who can demonstrate an extremely strong portfolio. Create deliverables for your product area (for example competitive analyses, user flows.</p>
                                        <div class="skils">
                                            <span>Adobe XD</span><span>Figma</span>
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
                        <div class="text-center">
                            <ul class="pagination">
                                <li><a href="?">«</a></li>
                                <li><a href="?">1</a></li>
                                <li><a href="?" class="active">2</a></li>
                                <li><a href="?">3</a></li>
                                <li><a href="?">4</a></li>
                                <li><a href="?">5</a></li>
                                <li><a href="?">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once('../includes/commonjs.php'); ?>
</body>

</html>