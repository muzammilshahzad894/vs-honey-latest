<!doctype html>
<html>

<head>
    <title>Post New Job - V & S</title>
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
                        <h3>Dashboard <span>/ My Jobs</span> <em>/ Post New Job</em></h3>
                        
                    </div>
                    <div class="dash_body">
                        <div class="dash_heading_sec">
                            <h2>Post New Job</h2>
                            <a href="my-jobs.php">Back to page >></a>
                        </div>
                        <div class="dash_blk_box">
                            <form action="" method="post" class="frmAjax" id="frmTopic">
                                <div class="formRow row">
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Title</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Category</label>
                                            <select name="" id="" class="txtBox selectpicker">
                                                <option value="">Banking</option>
                                                <option value="">Digital & Creative</option>
                                                <option value="">Retail</option>
                                                <option value="">Human Resources</option>
                                                <option value="">Management</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Sub Category</label>
                                            <select name="" id="" class="txtBox selectpicker">
                                                <option value="">Accountant</option>
                                                <option value="">Digital & Creative</option>
                                                <option value="">Retail</option>
                                                <option value="">Human Resources</option>
                                                <option value="">Management</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Job Type</label>
                                            <select name="" id="" class="selectpicker txtBox">
                                                <option value="">Freelance</option>
                                                <option value="">Full Time</option>
                                                <option value="">Internship</option>
                                                <option value="">Part Time</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Offered Salary</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Avg. Working Hours</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Tags</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Location</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Description</label>
                                            <textarea name="" id="" class="txtBox"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bTn formBtn text-center">
                                    <button type="submit" class="webBtn">Submit <i class="spinner hidden"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once('../includes/commonjs.php'); ?>
</body>

</html>