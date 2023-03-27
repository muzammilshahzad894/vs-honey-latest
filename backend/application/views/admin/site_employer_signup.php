<?php echo getBredcrum(ADMIN, array('#' => 'Employer Signup')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Employer Signup</strong></h2>
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
        <h3> Main</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_tagline" class="control-label"> Tagline <span class="symbol required">*</span></label>
                        <textarea name="banner_tagline" rows="4" class="form-control" ><?= $row['banner_tagline'] ?></textarea>
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
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="first_heading" class="control-label">First Heading <span class="symbol required">*</span></label>
                    <input type="text" name="first_heading" value="<?= $row['first_heading'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="first_sub_heading" class="control-label">First Sub Heading <span class="symbol required">*</span></label>
                    <input type="text" name="first_sub_heading" value="<?= $row['first_sub_heading'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="second_field_placeholder" class="control-label">Second Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="second_field_placeholder" value="<?= $row['second_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="third_field_placeholder" class="control-label">Third Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="third_field_placeholder" value="<?= $row['third_field_placeholder'] ?>" class="form-control" required>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="fourth_field_placeholder" class="control-label">Fourth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="fourth_field_placeholder" value="<?= $row['fourth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="fifth_field_placeholder" class="control-label">Fifth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="fifth_field_placeholder" value="<?= $row['fifth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="sixth_field_placeholder" class="control-label">Sixth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="sixth_field_placeholder" value="<?= $row['sixth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="seventh_field_placeholder" class="control-label">Seventh Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="seventh_field_placeholder" value="<?= $row['seventh_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="second_heading" class="control-label">Second Heading <span class="symbol required">*</span></label>
                    <input type="text" name="second_heading" value="<?= $row['second_heading'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="second_sub_heading" class="control-label">Second Sub Heading <span class="symbol required">*</span></label>
                    <input type="text" name="second_sub_heading" value="<?= $row['second_sub_heading'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="eighth_field_placeholder" class="control-label">Eighth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="eighth_field_placeholder" value="<?= $row['eighth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="ninth_field_placeholder" class="control-label">Ninth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="ninth_field_placeholder" value="<?= $row['ninth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="tenth_field_placeholder" class="control-label">Tenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="tenth_field_placeholder" value="<?= $row['tenth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="eleventh_field_placeholder" class="control-label">Eleventh Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="eleventh_field_placeholder" value="<?= $row['eleventh_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="third_heading" class="control-label">Third Heading <span class="symbol required">*</span></label>
                    <input type="text" name="third_heading" value="<?= $row['third_heading'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="third_sub_heading" class="control-label">Third Sub Heading <span class="symbol required">*</span></label>
                    <input type="text" name="third_sub_heading" value="<?= $row['third_sub_heading'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="twelveth_field_placeholder" class="control-label">Twelveth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="twelveth_field_placeholder" value="<?= $row['twelveth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="fourth_heading" class="control-label">Fourth Heading <span class="symbol required">*</span></label>
                    <input type="text" name="fourth_heading" value="<?= $row['fourth_heading'] ?>" class="form-control" required>
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
                    <label for="sixteenth_field_placeholder" class="control-label">Sixteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="sixteenth_field_placeholder" value="<?= $row['sixteenth_field_placeholder'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="fifth_heading" class="control-label">Fifth Heading <span class="symbol required">*</span></label>
                    <input type="text" name="fifth_heading" value="<?= $row['fifth_heading'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="seventeenth_field_placeholder" class="control-label">Seventeenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="seventeenth_field_placeholder" value="<?= $row['seventeenth_field_placeholder'] ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="eighteenth_field_placeholder" class="control-label">Eighteenth Field Placeholder <span class="symbol required">*</span></label>
                    <input type="text" name="eighteenth_field_placeholder" value="<?= $row['eighteenth_field_placeholder'] ?>" class="form-control" required>
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