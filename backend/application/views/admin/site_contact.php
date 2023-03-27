<?php echo getBredcrum(ADMIN, array('#' => 'Contact Us')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Contact Us</strong></h2>
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
                            Banner Background Image
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
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="cu_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_heading" id="cu_heading" value="<?= $row['cu_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_desc" class="control-label">Short Description <span class="symbol required">*</span></label>
                        <textarea name="cu_desc" id="cu_desc" rows="5" class="form-control ckeditor" required=""><?= $row['cu_desc'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_address" class="control-label"> Address <span class="symbol required">*</span></label>
                        <input type="text" name="cu_address" id="cu_address" value="<?= $row['cu_address'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_email" class="control-label"> Email <span class="symbol required">*</span></label>
                        <input type="text" name="cu_email" id="cu_email" value="<?= $row['cu_email'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_phone" class="control-label"> Phone <span class="symbol required">*</span></label>
                        <input type="text" name="cu_phone" id="cu_phone" value="<?= $row['cu_phone'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_heading_11" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_heading_11" id="cu_heading_11" value="<?= $row['cu_heading_11'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cu_banner_button_title" class="control-label">Button Text <span class="symbol required">*</span></label>
                        <input type="text" name="cu_banner_button_title" id="cu_banner_button_title" value="<?= $row['cu_banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cu_banner_button_link" class="control-label">Button Link<span class="symbol required">*</span></label>
                        <select name="cu_banner_button_link" id="cu_banner_button_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['cu_banner_button_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="cu_form_1_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_1_heading" value="<?= $row['cu_form_1_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_1_field_heading" class="control-label"> First Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_1_field_heading" value="<?= $row['cu_form_1_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_1_field_placeholder" class="control-label"> First Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_1_field_placeholder" value="<?= $row['cu_form_1_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_2_field_heading" class="control-label"> Second Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_2_field_heading" value="<?= $row['cu_form_2_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_2_field_placeholder" class="control-label"> Second Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_2_field_placeholder" value="<?= $row['cu_form_2_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_3_field_heading" class="control-label"> Third Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_3_field_heading" value="<?= $row['cu_form_3_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_3_field_placeholder" class="control-label"> Third Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_3_field_placeholder" value="<?= $row['cu_form_3_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_4_field_heading" class="control-label"> Fourth Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_4_field_heading" value="<?= $row['cu_form_4_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_4_field_placeholder" class="control-label"> Fourth Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_4_field_placeholder" value="<?= $row['cu_form_4_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_5_field_heading" class="control-label"> Fifth Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_5_field_heading" value="<?= $row['cu_form_5_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_5_field_placeholder" class="control-label"> Fifth Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_5_field_placeholder" value="<?= $row['cu_form_5_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_button_text" class="control-label"> Button Text <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_button_text" value="<?= $row['cu_form_button_text'] ?>" class="form-control" required>
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