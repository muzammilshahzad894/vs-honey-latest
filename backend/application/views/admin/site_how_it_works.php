<?php echo getBredcrum(ADMIN, array('#' => 'How It Works')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>How It Works</strong></h2>
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

        <h3>Section 2</h3>
        <div class="form-group"> 
            <div class="col-md-12">
                <label for="wcu_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                <input type="text" name="wcu_heading_tag" value="<?= $row['wcu_heading_tag'] ?>" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="wcu_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                <input type="text" name="wcu_heading" value="<?= $row['wcu_heading'] ?>" class="form-control" required>
            </div>
            <br/>
            <?php for($i = 1; $i <= 4; $i++):?>
                <div class="col-md-3">
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
                            <label for="wcu_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="wcu_card_heading<?=$i?>" value="<?= $row['wcu_card_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="wcu_card_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="wcu_card_detail<?=$i?>" id="wcu_card_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['wcu_card_detail'.$i] ?></textarea>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>

        <h3>Section 3</h3>
        <div class="form-group">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="hiw_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                        <input type="text" name="hiw_heading_tag" value="<?= $row['hiw_heading_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="hiw_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="hiw_heading" value="<?= $row['hiw_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="hiw_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="hiw_detail" rows="4" class="form-control ckeditor" ><?= $row['hiw_detail'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 4</h3>
        <div class="form-group"> 
            <div class="col-md-12">
                <label for="cand_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                <input type="text" name="cand_heading_tag" value="<?= $row['cand_heading_tag'] ?>" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="cand_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                <input type="text" name="cand_heading" value="<?= $row['cand_heading'] ?>" class="form-control" required>
            </div>
            <br/>
            <?php for($i = 1; $i <= 4; $i++):?>
                <div class="col-md-3">
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
                                            <img src="<?=get_site_image_src("images", $row['image'.($i+6)]) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image<?=($i+6)?>" accept="image/*" <?php if(empty($row['image'.($i+6)])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="cand_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="cand_card_heading<?=$i?>" value="<?= $row['cand_card_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="cand_card_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="cand_card_detail<?=$i?>" id="cand_card_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['cand_card_detail'.$i] ?></textarea>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>

        <h3>Section 5</h3>
        <div class="form-group"> 
            <div class="col-md-12">
                <label for="emp_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                <input type="text" name="emp_heading_tag" value="<?= $row['emp_heading_tag'] ?>" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="emp_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                <input type="text" name="emp_heading" value="<?= $row['emp_heading'] ?>" class="form-control" required>
            </div>
            <br/>
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
                                            <img src="<?=get_site_image_src("images", $row['image'.($i+10)]) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image<?=($i+10)?>" accept="image/*" <?php if(empty($row['image'.($i+10)])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="emp_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="emp_card_heading<?=$i?>" value="<?= $row['emp_card_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="emp_card_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="emp_card_detail<?=$i?>" id="emp_card_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['emp_card_detail'.$i] ?></textarea>
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
                                    <img src="<?= !empty($row['image14']) ? base_url().UPLOAD_PATH.'images/'.$row['image14'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image14" accept="image/*" <?php if(empty($row['image14'])){echo 'required=""';}?>>
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