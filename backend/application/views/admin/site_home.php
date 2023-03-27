<?php echo getBredcrum(ADMIN, array('#' => 'Home Page')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Home Page</strong></h2>
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
                            <label for="banner_heading_animated" class="control-label"> Animated Heading <span class="symbol required">*</span></label>
                            <input type="text" name="banner_heading_animated" value="<?= $row['banner_heading_animated'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_heading_2" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="banner_heading_2" value="<?= $row['banner_heading_2'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_tagline" class="control-label"> Tagline <span class="symbol required">*</span></label>
                            <input type="text" name="banner_tagline" value="<?= $row['banner_tagline'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_field_heading" class="control-label"> Field Heading <span class="symbol required">*</span></label>
                            <input type="text" name="banner_field_heading" value="<?= $row['banner_field_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_button_text" class="control-label"> Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="banner_button_text" value="<?= $row['banner_button_text'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_search_tagline" class="control-label"> Banner Search Tagline <span class="symbol required">*</span></label>
                            <input type="text" name="banner_search_tagline" value="<?= $row['banner_search_tagline'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Banner Background Image 
                            </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                    <img src="<?=get_site_image_src("images", $row['image1']) ?>" alt="--">
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
            <h3>Banner Images</h3>
            <div class="form-group">
                <?php for($i = 1; $i <= 4; $i++):?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="panel panel-primary" data-collapsed="0">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            Image <?=$i?> 
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
                        </div>
                    </div>
                <?php endfor?>
            </div>

            <h3>Section 2</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="wwu_heading_1" class="control-label"> Heading 1 <span class="symbol required">*</span></label>
                            <input type="text" name="wwu_heading_1" value="<?= $row['wwu_heading_1'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="wwu_heading_2" class="control-label"> Heading 2 <span class="symbol required">*</span></label>
                            <input type="text" name="wwu_heading_2" value="<?= $row['wwu_heading_2'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <?php for($i = 1; $i <= 4; $i++):?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="wwu_heading<?=$i?>" class="control-label"> Card Heading <span class="symbol required">*</span></label>
                                <input type="text" name="wwu_heading<?=$i?>" value="<?= $row['wwu_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="wwu_detail<?=$i?>" class="control-label"> Card Detail <span class="symbol required">*</span></label>
                                <input type="text" name="wwu_detail<?=$i?>" value="<?= $row['wwu_detail'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="wwu_link<?=$i?>" class="control-label">Left Button Link<span class="symbol required">*</span></label>
                                <select name="wwu_link<?=$i?>" id="wwu_link<?=$i?>" class="form-control" required>
                                    <option value=''>-- Select --</option>
                                    <?php $pages = get_pages();
                                    foreach ($pages as $index => $page) { ?>
                                        <option value="<?= $index ?>" <?= ($row['wwu_link'.$i] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            </div>

            <h3>Section 3</h3>
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
                                                <img src="<?=get_site_image_src("images", $row['image'.($i+8)]) ?>" alt="--">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image<?=($i+8)?>" accept="image/*" <?php if(empty($row['image'.($i+8)])){echo 'required=""';}?>>
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="enl_card_home_heading<?=$i?>" value="<?= $row['enl_card_home_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="enl_card_home_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                                <textarea name="enl_card_home_detail<?=$i?>" id="enl_card_home_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['enl_card_home_detail'.$i] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="enl_home_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                        <input type="text" name="enl_home_heading_tag" value="<?= $row['enl_home_heading_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="enl_home_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="enl_home_heading" value="<?= $row['enl_home_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="enl_home_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="enl_home_detail" rows="4" class="form-control ckeditor" ><?= $row['enl_home_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                            <label for="enl_home_button_title_right" class="control-label">Right Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="enl_home_button_title_right" id="enl_home_button_title_right" value="<?= $row['enl_home_button_title_right'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="enl_home_button_link_right" class="control-label">Right Button Link<span class="symbol required">*</span></label>
                            <select name="enl_home_button_link_right" id="enl_home_button_link_right" class="form-control" required>
                                <option value=''>-- Select --</option>
                                <?php $pages = get_pages();
                                foreach ($pages as $index => $page) { ?>
                                    <option value="<?= $index ?>" <?= ($row['enl_home_button_link_right'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                </div>
            </div>

        </div>



            <h3>Section 4</h3>
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

            <h3>Section 5 Left</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="hiw_heading" class="control-label"> Heading 1<span class="symbol required">*</span></label>
                            <input type="text" name="hiw_heading" value="<?= $row['hiw_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="hiw_heading_2" class="control-label"> Heading 2<span class="symbol required">*</span></label>
                            <input type="text" name="hiw_heading_2" value="<?= $row['hiw_heading_2'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="hiw_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <textarea name="hiw_detail" rows="4" class="form-control ckeditor" ><?= $row['hiw_detail'] ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="hiw_button_title_left" class="control-label">Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="hiw_button_title_left" id="hiw_button_title_left" value="<?= $row['hiw_button_title_left'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hiw_button_link_left" class="control-label">Button Link<span class="symbol required">*</span></label>
                            <select name="hiw_button_link_left" id="hiw_button_link_left" class="form-control" required>
                                <option value=''>-- Select --</option>
                                <?php $pages = get_pages();
                                foreach ($pages as $index => $page) { ?>
                                    <option value="<?= $index ?>" <?= ($row['hiw_button_link_left'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>Section 5 Mid</h3>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="hiw_mid_heading" class="control-label"> Heading<span class="symbol required">*</span></label>
                            <input type="text" name="hiw_mid_heading" value="<?= $row['hiw_mid_heading'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered newTable" id="newTable">
                        <tr style="background-color: #eee">
                            <th width="20%">Step No</th>
                            <th width="20%">Icon</th>
                            <th width="20%">Hading</th>
                            <th width="20%">Detail</th>
                            <th width="15%">Order#</th>
                            <th width="15%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        <?php $sec5ls = getMultiText('home-sec5l', $this->session->userdata('site_lang')); ?>
                        <?php if (count($sec5ls) > 0) { $sec5ls_count = 1; ?>
                        <?php foreach ($sec5ls as $sec5l) { ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec5l_txt1[]" id="sec5l_txt1" value="<?= $sec5l->txt1; ?>" class="form-control" placeholder="Step No">
                                </td>
                                <td>
                                    <input type="text" name="sec5l_txt2[]" id="sec5l_txt2" value="<?= $sec5l->txt2; ?>" class="form-control" placeholder="Icon">
                                </td>
                                <td>
                                    <input type="text" name="sec5l_title[]" id="sec5l_title" value="<?= $sec5l->title; ?>" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec5l_detail[]" id="sec5l_detail" class="form-control" placeholder="Text" rows="3"><?= $sec5l->detail; ?></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec5l_order_no[]" id="sec5l_order_no" value="<?= $sec5l->order_no; ?>" class="form-control" placeholder="Order#">
                                </td>

                                <td class="text-center">
                                    <?php if ($sec5ls_count > 1) { ?>
                                        <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $sec5ls_count++; ?>
                        <?php } ?>
                        <?php }else{ ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec5l_txt1[]" id="sec5l_txt1" value="" class="form-control" placeholder="Step No">
                                </td>
                                <td>
                                    <input type="text" name="sec5l_txt2[]" id="sec5l_txt2" value="" class="form-control" placeholder="Icon">
                                </td>
                                <td>
                                    <input type="text" name="sec5l_title[]" id="sec5l_title" value="" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec5l_detail[]" id="sec5l_detail" class="form-control" placeholder="Text" rows="3"></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec5l_order_no[]" id="sec5l_order_no" value="" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>  
                        <?php } ?>                  
                    </table>
                </div>
                <div class="col-md-12">
                    <h3>Section 5 Right</h3>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="hiw_right_heading" class="control-label"> Heading<span class="symbol required">*</span></label>
                            <input type="text" name="hiw_right_heading" value="<?= $row['hiw_right_heading'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered newTable" id="newTable">
                        <tr style="background-color: #eee">
                            <th width="20%">Step No</th>
                            <th width="20%">Icon</th>
                            <th width="20%">Heading</th>
                            <th width="20%">Detail</th>
                            <th width="15%">Order#</th>
                            <th width="15%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        <?php $sec5rs = getMultiText('home-sec5r', $this->session->userdata('site_lang')); ?>
                        <?php if (count($sec5rs) > 0) { $sec5rs_count = 1; ?>
                        <?php foreach ($sec5rs as $sec5r) { ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec5r_txt1[]" id="sec5r_txt1" value="<?= $sec5r->txt1; ?>" class="form-control" placeholder="Step No">
                                </td>
                                <td>
                                    <input type="text" name="sec5r_txt2[]" id="sec5r_txt2" value="<?= $sec5r->txt2; ?>" class="form-control" placeholder="Icon">
                                </td>
                                <td>
                                    <input type="text" name="sec5r_title[]" id="sec5r_title" value="<?= $sec5r->title; ?>" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec5r_detail[]" id="sec5r_detail" class="form-control" placeholder="Text" rows="3"><?= $sec5r->detail; ?></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec5r_order_no[]" id="sec5r_order_no" value="<?= $sec5r->order_no; ?>" class="form-control" placeholder="Order#">
                                </td>

                                <td class="text-center">
                                    <?php if ($sec5rs_count > 1) { ?>
                                        <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $sec5rs_count++; ?>
                        <?php } ?>
                        <?php }else{ ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec5r_txt1[]" id="sec5r_txt1" value="" class="form-control" placeholder="Step No">
                                </td>
                                <td>
                                    <input type="text" name="sec5r_txt2[]" id="sec5r_txt2" value="" class="form-control" placeholder="Icon">
                                </td>
                                <td>
                                    <input type="text" name="sec5r_title[]" id="sec5r_title" value="" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec5r_detail[]" id="sec5r_detail" class="form-control" placeholder="Text" rows="3"></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec5r_order_no[]" id="sec5r_order_no" value="" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>  
                        <?php } ?>                  
                    </table>
                </div>
            </div>

            
            <h3>Section 6</h3>
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
                                    <img src="<?= !empty($row['image8']) ? base_url().UPLOAD_PATH.'images/'.$row['image8'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image8" accept="image/*" <?php if(empty($row['image8'])){echo 'required=""';}?>>
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
                            <label for="enl_heading_tagline" class="control-label"> Heading Tagline<span class="symbol required">*</span></label>
                            <input type="text" name="enl_heading_tagline" value="<?= $row['enl_heading_tagline'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="enl_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="enl_heading" value="<?= $row['enl_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="enl_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <textarea name="enl_detail" rows="4" class="form-control" ><?= $row['enl_detail'] ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="enl_button_title_left" class="control-label">Left Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="enl_button_title_left" id="enl_button_title_left" value="<?= $row['enl_button_title_left'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="enl_button_link_left" class="control-label">Left Button Link<span class="symbol required">*</span></label>
                            <select name="enl_button_link_left" id="enl_button_link_left" class="form-control" required>
                                <option value=''>-- Select --</option>
                                <?php $pages = get_pages();
                                foreach ($pages as $index => $page) { ?>
                                    <option value="<?= $index ?>" <?= ($row['enl_button_link_left'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                                <?php
                                }
                                ?>
                            </select>
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
                <?php for($i = 1; $i <= 3; $i++):?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="enl_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="enl_card_heading<?=$i?>" value="<?= $row['enl_card_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="enl_card_detail<?=$i?>" class="control-label"> Detail <span class="symbol required">*</span></label>
                                <input type="text" name="enl_card_detail<?=$i?>" value="<?= $row['enl_card_detail'.$i] ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            </div>
            

            <h3>Section 7</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="testi_tag" class="control-label"> Tag<span class="symbol required">*</span></label>
                            <input type="text" name="testi_tag" value="<?= $row['testi_tag'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="testi_heading" class="control-label"> Heading<span class="symbol required">*</span></label>
                            <input type="text" name="testi_heading" value="<?= $row['testi_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="testi_tagline" class="control-label"> Tagline <span class="symbol required">*</span></label>
                            <textarea name="testi_tagline" rows="4" class="form-control" ><?= $row['testi_tagline'] ?></textarea>
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