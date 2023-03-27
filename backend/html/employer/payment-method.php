<!doctype html>
<html>

<head>
    <title>Payment Summary - V & S</title>
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
                        <h3>Dashboard <span>/ Payment Method</span></h3>
                        <div class="bTn">
                                <a href="add-payment-method.php" class="webBtn">Add new payment method</a>
                            </div>
                    </div>
                    <div class="dash_body">
                            
                        <div class="dash_blk_box blockLst">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Bank Name</th>
                                        <th>Account Title</th>
                                        <th>Account Number</th>
                                        <th>Swift/Routing #</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>HSBC </td>
                                        <td>John Doe</td>
                                        <td>************3345</td>
                                        <td>138742947283</td>
                                        <td><span class="badge green">Default</span></td>
                                        <td class="dash_actions">
                                            <a href="add-payment-method.php" class="webBtn labelBtn blue-color">Edit</a>
                                            <a href="payment-method.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HSBC</td>
                                        <td>John Doe</td>
                                        <td>************3345</td>
                                        <td>138742947283</td>
                                        <td><span class="badge">Make Default</span></td>
                                        <td class="dash_actions">
                                            <a href="add-payment-method.php" class="webBtn labelBtn blue-color">Edit</a>
                                            <a href="payment-method.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HSBC</td>
                                        <td>John Doe</td>
                                        <td>************3345</td>
                                        <td>138742947283</td>
                                        <td><span class="badge">Make Default</span></td>
                                        <td class="dash_actions">
                                            <a href="add-payment-method.php" class="webBtn labelBtn blue-color">Edit</a>
                                            <a href="payment-method.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HSBC</td>
                                        <td>John Doe</td>
                                        <td>************3345</td>
                                        <td>138742947283</td>
                                        <td><span class="badge">Make Default</span></td>
                                        <td class="dash_actions">
                                            <a href="add-payment-method.php" class="webBtn labelBtn blue-color">Edit</a>
                                            <a href="payment-method.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HSBC</td>
                                        <td>John Doe</td>
                                        <td>************3345</td>
                                        <td>138742947283</td>
                                        <td><span class="badge">Make Default</span></td>
                                        <td class="dash_actions">
                                            <a href="add-payment-method.php" class="webBtn labelBtn blue-color">Edit</a>
                                            <a href="payment-method.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HSBC</td>
                                        <td>John Doe</td>
                                        <td>************3345</td>
                                        <td>138742947283</td>
                                        <td><span class="badge">Make Default</span></td>
                                        <td class="dash_actions">
                                            <a href="add-payment-method.php" class="webBtn labelBtn blue-color">Edit</a>
                                            <a href="payment-method.php" onclick="return confirm('Are you sure?');" class="webBtn labelBtn red-color">Delete</a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once('../includes/commonjs.php'); ?>
</body>

</html>