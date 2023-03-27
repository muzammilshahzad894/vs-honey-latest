<!doctype html>
<html>

<head>
    <title>Add Payment Method - V & S</title>
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
                        <h3>Dashboard <span>/ Payment Methods</span> <em>/ Add Payment Method</em></h3>
                        
                    </div>
                    <div class="dash_body">
                        <div class="dash_heading_sec">
                            <h2>Add New Payment Method</h2>
                            <a href="payment-method.php">Back to page >></a>
                        </div>
                        <div class="dash_blk_box">
                            <form action="" method="post" class="frmAjax" id="frmTopic">
                                <div class="formRow row">
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Name On Card</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Card Number</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">Expiration</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="txtGrp">
                                            <label for="" class="move move_important">CVC</label>
                                            <input type="text" name="" id="" value="" class="txtBox">
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