<?php echo getBredcrum(ADMIN, array('#' => 'About Us')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>About Us</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <!--        <a href="<?php echo base_url('admin/services'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>-->
    </div>
</div>
<div>
    <hr>
    <div class="clearfix"></div>
    <div class="panel-body">
        <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
        <h3> Page Title </h3>
            <div class="form-group">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="page_title" class="control-label">Page Title<span class="symbol required">*</span></label>
                            <input type="text" name="page_title" value="<?= $row['page_title'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        <h3> Main Banner</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="banner_detail" rows="4" class="form-control ckeditor" ><?= $row['banner_detail'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                           Background Image
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row['image1']) ? base_url().UPLOAD_PATH.'images/'.$row['image1'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image1" accept="image/*" <?php if(empty($row['image1'])){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 2 Left</h3>
        <div class="form-group"> 
            <?php for($i = 1; $i <= 3; $i++):?>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Card <?=$i?> Image 
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?=get_site_image_src("images", $row['image'.($i+1)]) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image<?=($i+1)?>" accept="image/*" <?php if(empty($row['image'.($i+1)])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="au_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="au_card_heading<?=$i?>" value="<?= $row['au_card_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="au_card_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="au_card_detail<?=$i?>" id="au_card_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['au_card_detail'.$i] ?></textarea>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>

        <h3>Section 2 Right</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="ov_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                        <input type="text" name="ov_heading_tag" value="<?= $row['ov_heading_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="ov_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="ov_heading" value="<?= $row['ov_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="au_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="au_detail" rows="4" class="form-control ckeditor" ><?= $row['au_detail'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 3</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="wwa_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                        <input type="text" name="wwa_heading_tag" value="<?= $row['wwa_heading_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="wwa_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="wwa_heading" value="<?= $row['wwa_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="wwa_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="wwa_detail" rows="4" class="form-control ckeditor" ><?= $row['wwa_detail'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Right Image
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row['image5']) ? base_url().UPLOAD_PATH.'images/'.$row['image5'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image5" accept="image/*" <?php if(empty($row['image5'])){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Upper Left Image
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row['image6']) ? base_url().UPLOAD_PATH.'images/'.$row['image6'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image6" accept="image/*" <?php if(empty($row['image6'])){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Bottom Right Image
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row['image7']) ? base_url().UPLOAD_PATH.'images/'.$row['image7'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image7" accept="image/*" <?php if(empty($row['image7'])){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 4</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Left Image
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row['image11']) ? base_url().UPLOAD_PATH.'images/'.$row['image11'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image11" accept="image/*" <?php if(empty($row['image11'])){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Left Image Overlay
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row['image12']) ? base_url().UPLOAD_PATH.'images/'.$row['image12'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image12" accept="image/*" <?php if(empty($row['image12'])){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-12">
                    <label for="enl_mid_heading" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                    <input type="text" name="enl_mid_heading" value="<?= $row['enl_mid_heading'] ?>" class="form-control" required>
                </div>
                <br/>
                <?php for($i = 1; $i <= 3; $i++):?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="panel panel-primary" data-collapsed="0">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            Card <?=$i?> Image 
                                        </div>
                                        <div class="panel-options">
                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                <img src="<?=get_site_image_src("images", $row['image'.($i+12)]) ?>" alt="--">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image<?=($i+12)?>" accept="image/*" <?php if(empty($row['image'.($i+12)])){echo 'required=""';}?>>
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="enl_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="enl_card_heading<?=$i?>" value="<?= $row['enl_card_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="enl_card_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                                <textarea name="enl_card_detail<?=$i?>" id="enl_card_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['enl_card_detail'.$i] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="enl_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                        <input type="text" name="enl_heading_tag" value="<?= $row['enl_heading_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="enl_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="enl_heading" value="<?= $row['enl_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="enl_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="enl_detail" rows="4" class="form-control ckeditor" ><?= $row['enl_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                            <label for="enl_button_title_right" class="control-label">Right Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="enl_button_title_right" id="enl_button_title_right" value="<?= $row['enl_button_title_right'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="enl_button_link_right" class="control-label">Right Button Link<span class="symbol required">*</span></label>
                            <select name="enl_button_link_right" id="enl_button_link_right" class="form-control" required>
                                <option value=''>-- Select --</option>
                                <?php $pages = get_pages();
                                foreach ($pages as $index => $page) { ?>
                                    <option value="<?= $index ?>" <?= ($row['enl_button_link_right'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                </div>
            </div>

        </div>

        <h3>Section 5</h3>
        <div class="form-group"> 
            <?php for($i = 1; $i <= 2; $i++):?>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Card <?=$i?> Right Image 
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?=get_site_image_src("images", $row['image'.($i+7)]) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image<?=($i+7)?>" accept="image/*" <?php if(empty($row['image'.($i+7)])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="sec5_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="sec5_heading<?=$i?>" value="<?= $row['sec5_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="sec5_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="sec5_detail<?=$i?>" id="sec5_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['sec5_detail'.$i] ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="sec5_button_title<?=$i?>" class="control-label">Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="sec5_button_title<?=$i?>" id="sec5_button_title<?=$i?>" value="<?= $row['sec5_button_title'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="sec5_button_link<?=$i?>" class="control-label">Button Link<span class="symbol required">*</span></label>
                            <select name="sec5_button_link<?=$i?>" id="sec5_button_link<?=$i?>" class="form-control" required>
                                <option value=''>-- Select --</option>
                                <?php $pages = get_pages();
                                foreach ($pages as $index => $page) { ?>
                                    <option value="<?= $index ?>" <?= ($row['sec5_button_link'.$i] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>

        <h3>Section 6</h3>
            <div class="form-group">
                <div class="col-md-6">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Background Image
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?= !empty($row['image10']) ? base_url().UPLOAD_PATH.'images/'.$row['image10'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image10" accept="image/*" <?php if(empty($row['image10'])){echo 'required=""';}?>>
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="bchb_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="bchb_heading" value="<?= $row['bchb_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="bchb_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <textarea name="bchb_detail" rows="4" class="form-control" ><?= $row['bchb_detail'] ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="bchb_button_title_left" class="control-label">Left Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="bchb_button_title_left" id="bchb_button_title_left" value="<?= $row['bchb_button_title_left'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bchb_button_link_left" class="control-label">Left Button Link<span class="symbol required">*</span></label>
                            <select name="bchb_button_link_left" id="bchb_button_link_left" class="form-control" required>
                                <option value=''>-- Select --</option>
                                <?php $pages = get_pages();
                                foreach ($pages as $index => $page) { ?>
                                    <option value="<?= $index ?>" <?= ($row['bchb_button_link_left'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="bchb_button_title_right" class="control-label">Right Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="bchb_button_title_right" id="bchb_button_title_right" value="<?= $row['bchb_button_title_right'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bchb_button_link_right" class="control-label">Right Button Link<span class="symbol required">*</span></label>
                            <select name="bchb_button_link_right" id="bchb_button_link_right" class="form-control" required>
                                <option value=''>-- Select --</option>
                                <?php $pages = get_pages();
                                foreach ($pages as $index => $page) { ?>
                                    <option value="<?= $index ?>" <?= ($row['bchb_button_link_right'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-2 control-label "></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save As <?= $this->session->userdata('site_lang') == 'french' ? 'French' : 'English'; ?></button>
                </div>
            </div>
        </form>
    </div>
</div>