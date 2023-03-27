<?php echo getBredcrum(ADMIN, array('#' => 'Sign Up Candidate')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Sign Up Candidate</strong></h2>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="sub_title" class="control-label">Sub Title<span class="symbol required">*</span></label>
                            <input type="text" name="sub_title" value="<?= $row['sub_title'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        <h3>Section 1 Left</h3>
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

        <h3>Section 1 Right</h3>
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

        <h3>Form Fields</h3>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="first_field_placeholder" class="control-label">First Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="first_field_placeholder" value="<?= $row['first_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="second_field_placeholder" class="control-label">Second Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="second_field_placeholder" value="<?= $row['second_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="third_field_placeholder" class="control-label">Third Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="third_field_placeholder" value="<?= $row['third_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="fourth_field_placeholder" class="control-label">Fourth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="fourth_field_placeholder" value="<?= $row['fourth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="fifth_field_placeholder" class="control-label">Fifth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="fifth_field_placeholder" value="<?= $row['fifth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="sixth_field_placeholder" class="control-label">Sixth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="sixth_field_placeholder" value="<?= $row['sixth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="seventh_field_placeholder" class="control-label">Seventh Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="seventh_field_placeholder" value="<?= $row['seventh_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="eighth_field_placeholder" class="control-label">Eighth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="eighth_field_placeholder" value="<?= $row['eighth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="ninth_field_placeholder" class="control-label">Ninth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="ninth_field_placeholder" value="<?= $row['ninth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="tenth_field_placeholder" class="control-label">Tenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="tenth_field_placeholder" value="<?= $row['tenth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="eleventh_field_placeholder" class="control-label">Eleventh Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="eleventh_field_placeholder" value="<?= $row['eleventh_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="twelfth_field_placeholder" class="control-label">Twelfth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="twelfth_field_placeholder" value="<?= $row['twelfth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="thirteenth_field_placeholder" class="control-label">Thirteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="thirteenth_field_placeholder" value="<?= $row['thirteenth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="fourteenth_field_placeholder" class="control-label">Fourteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="fourteenth_field_placeholder" value="<?= $row['fourteenth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="fifteenth_field_placeholder" class="control-label">Fifteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="fifteenth_field_placeholder" value="<?= $row['fifteenth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="skills_placeholder" class="control-label">Skills Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="skills_placeholder" value="<?= $row['skills_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                    <label for="sixteenth_field_placeholder" class="control-label">Sixteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="sixteenth_field_placeholder" value="<?= $row['sixteenth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="seventeenth_field_placeholder" class="control-label">Seventeenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="seventeenth_field_placeholder" value="<?= $row['seventeenth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="eighteenth_field_placeholder" class="control-label">Eighteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="eighteenth_field_placeholder" value="<?= $row['eighteenth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="nineteenth_field_placeholder" class="control-label">Nineteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="nineteenth_field_placeholder" value="<?= $row['nineteenth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="save_button_text" class="control-label">Save Button Text <span class="symbol required">*</span></label>
                    <input type="text" name="save_button_text" value="<?= $row['save_button_text'] ?>" class="form-control" required>
                </div>
            </div>
        </div>
        <h3>DropDown Options</h3>
        <div class="tab-pane" id="dropdown_options">
            <div class="row">
                <div class="col-md-6">
                    <label for="first_dropdown_option" class="control-label">First Dropdown Option <span class="symbol required">*</span></label>
                    <input type="text" name="first_dropdown_option" value="<?= $row['first_dropdown_option'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="second_dropdown_option" class="control-label">Second Dropdown Option <span class="symbol required">*</span></label>
                    <input type="text" name="second_dropdown_option" value="<?= $row['second_dropdown_option'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="third_dropdown_option" class="control-label">Third Dropdown Option <span class="symbol required">*</span></label>
                    <input type="text" name="third_dropdown_option" value="<?= $row['third_dropdown_option'] ?>" class="form-control" required>
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