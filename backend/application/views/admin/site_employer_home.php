<?php echo getBredcrum(ADMIN, array('#' => 'Employer Home')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Employer Home</strong></h2>
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
                <label for="sec2_heading_tag" class="control-label"> Heading Tag <span class="symbol required">*</span></label>
                <input type="text" name="sec2_heading_tag" value="<?= $row['sec2_heading_tag'] ?>" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="sec2_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                <input type="text" name="sec2_heading" value="<?= $row['sec2_heading'] ?>" class="form-control" required>
            </div>
            <br/>
            <div class="col-md-12">
                <table class="table table-bordered newTable" id="newTable">
                    <tr style="background-color: #eee">
                        <th width="20%">Heading</th>
                        <th width="15%">Order#</th>
                        <th width="15%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                    </tr>
                    <?php $sec2_1s = getMultiText('home-sec2_1', $this->session->userdata('site_lang')); ?>
                    <?php if (count($sec2_1s) > 0) { $sec2_1s_count = 1; ?>
                    <?php foreach ($sec2_1s as $sec2_1) { ?>
                        <tr>
                            <td>
                                <input type="text" name="sec2_1_title[]" id="sec2_1_title" value="<?= $sec2_1->title; ?>" class="form-control" placeholder="Heading">
                            </td>
                            <td>
                                <input type="number" name="sec2_1_order_no[]" id="sec2_1_order_no" value="<?= $sec2_1->order_no; ?>" class="form-control" placeholder="Order#">
                            </td>

                            <td class="text-center">
                                <?php if ($sec2_1s_count > 1) { ?>
                                    <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $sec2_1s_count++; ?>
                    <?php } ?>
                    <?php }else{ ?>
                        <tr>
                            <td>
                                <input type="text" name="sec2_1_title[]" id="sec2_1_title" value="" class="form-control" placeholder="Heading">
                            </td>
                            <td>
                                <input type="number" name="sec2_1_order_no[]" id="sec2_1_order_no" value="" class="form-control" placeholder="Order#">
                            </td>
                            <td class="text-center">
                            </td>
                        </tr>  
                    <?php } ?>                  
                </table>
            </div>
            <br/>
            <div class="col-md-12">
                <table class="table table-bordered newTable" id="newTable">
                    <tr style="background-color: #eee">
                        <th width="20%">Heading</th>
                        <th width="20%">Detail</th>
                        <th width="15%">Order#</th>
                        <th width="15%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                    </tr>
                    <?php $sec2_2s = getMultiText('home-sec2_2', $this->session->userdata('site_lang')); ?>
                    <?php if (count($sec2_2s) > 0) { $sec2_2s_count = 1; ?>
                    <?php foreach ($sec2_2s as $sec2_2) { ?>
                        <tr>
                            <td>
                                <input type="text" name="sec2_2_title[]" id="sec2_2_title" value="<?= $sec2_2->title; ?>" class="form-control" placeholder="Heading">
                            </td>
                            <td>
                                <textarea name="sec2_2_detail[]" id="sec2_2_detail" class="form-control" placeholder="Text" rows="3"><?= $sec2_2->detail; ?></textarea>
                            </td>
                            <td>
                                <input type="number" name="sec2_2_order_no[]" id="sec2_2_order_no" value="<?= $sec2_2->order_no; ?>" class="form-control" placeholder="Order#">
                            </td>

                            <td class="text-center">
                                <?php if ($sec2_2s_count > 1) { ?>
                                    <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $sec2_2s_count++; ?>
                    <?php } ?>
                    <?php }else{ ?>
                        <tr>
                            <td>
                                <input type="text" name="sec2_2_title[]" id="sec2_2_title" value="" class="form-control" placeholder="Heading">
                            </td>
                            <td>
                                <textarea name="sec2_2_detail[]" id="sec2_2_detail" class="form-control" placeholder="Text" rows="3"></textarea>
                            </td>
                            <td>
                                <input type="number" name="sec2_2_order_no[]" id="sec2_2_order_no" value="" class="form-control" placeholder="Order#">
                            </td>
                            <td class="text-center">
                            </td>
                        </tr>  
                    <?php } ?>                  
                </table>
            </div>
        </div>

        <h3>Section 3</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="dop_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="dop_heading" value="<?= $row['dop_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="dop_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="dop_detail" rows="4" class="form-control" ><?= $row['dop_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="dop_button_title_left" class="control-label">Button Text <span class="symbol required">*</span></label>
                        <input type="text" name="dop_button_title_left" id="dop_button_title_left" value="<?= $row['dop_button_title_left'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dop_button_link_left" class="control-label">Button Link<span class="symbol required">*</span></label>
                        <select name="dop_button_link_left" id="dop_button_link_left" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['dop_button_link_left'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
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
                                <img src="<?= !empty($row['image2']) ? base_url().UPLOAD_PATH.'images/'.$row['image2'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image2" accept="image/*" <?php if(empty($row['image2'])){echo 'required=""';}?>>
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
            <?php for($i = 1; $i <= 2; $i++):?>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Card <?=$i?> background Image 
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?=get_site_image_src("images", $row['image'.($i+2)]) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image<?=($i+2)?>" accept="image/*" <?php if(empty($row['image'.($i+2)])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="sec4_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="sec4_heading<?=$i?>" value="<?= $row['sec4_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="sec4_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="sec4_detail<?=$i?>" id="sec4_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['sec4_detail'.$i] ?></textarea>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>

        <h3>Section 5</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="sec5_1_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="sec5_1_heading" value="<?= $row['sec5_1_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="sec5_1_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="sec5_1_detail" rows="4" class="form-control" ><?= $row['sec5_1_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="sec5_1_button_title_left" class="control-label">Button Text <span class="symbol required">*</span></label>
                        <input type="text" name="sec5_1_button_title_left" id="sec5_1_button_title_left" value="<?= $row['sec5_1_button_title_left'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="sec5_1_button_link_left" class="control-label">Button Link<span class="symbol required">*</span></label>
                        <select name="sec5_1_button_link_left" id="sec5_1_button_link_left" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['sec5_1_button_link_left'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="sec5_2_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="sec5_2_heading" value="<?= $row['sec5_2_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="sec5_2_heading_2" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="sec5_2_heading_2" value="<?= $row['sec5_2_heading_2'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="sec5_2_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="sec5_2_detail" rows="4" class="form-control" ><?= $row['sec5_2_detail'] ?></textarea>
                    </div>
                </div>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="sec5_right_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                                <textarea name="sec5_right_detail" rows="4" class="form-control ckeditor" ><?= $row['sec5_right_detail'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="sec5_3_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="sec5_3_heading" value="<?= $row['sec5_3_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="sec5_3_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="sec5_3_detail" rows="4" class="form-control" ><?= $row['sec5_3_detail'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="sec5_4_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="sec5_4_heading" value="<?= $row['sec5_4_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="sec5_4_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="sec5_4_detail" rows="4" class="form-control" ><?= $row['sec5_4_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="sec5_4_button_title_left" class="control-label">Button Text <span class="symbol required">*</span></label>
                        <input type="text" name="sec5_4_button_title_left" id="sec5_4_button_title_left" value="<?= $row['sec5_4_button_title_left'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="sec5_4_button_link_left" class="control-label">Button Link<span class="symbol required">*</span></label>
                        <select name="sec5_4_button_link_left" id="sec5_4_button_link_left" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['sec5_4_button_link_left'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <h3>Section 6</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="sec6_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="sec6_heading" value="<?= $row['sec6_heading'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Image
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