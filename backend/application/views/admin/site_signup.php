<?php echo getBredcrum(ADMIN, array('#' => 'Sign Up')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Sign Up</strong></h2>
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
        <h3>Main Section</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="right_heading" class="control-label">Section Heading <span class="symbol required">*</span></label>
                        <input type="text" name="right_heading" value="<?= $row['right_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="right_tagline" class="control-label">Section Tagline <span class="symbol required">*</span></label>
                        <input type="text" name="right_tagline" value="<?= $row['right_tagline'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="first_field_placeholder" class="control-label">First Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="first_field_placeholder" value="<?= $row['first_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="second_field_placeholder" class="control-label">Second Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="second_field_placeholder" value="<?= $row['second_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="third_field_placeholder" class="control-label">Third Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="third_field_placeholder" value="<?= $row['third_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="fourth_field_placeholder" class="control-label">Fourth Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="fourth_field_placeholder" value="<?= $row['fourth_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="fifth_field_placeholder" class="control-label">Fifth Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="fifth_field_placeholder" value="<?= $row['fifth_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="submit_text" class="control-label">Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="submit_text" value="<?= $row['submit_text'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="last_heading" class="control-label">Link Text<span class="symbol required">*</span></label>
                        <input type="text" name="last_heading" value="<?= $row['last_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="last_link" class="control-label">Link<span class="symbol required">*</span></label>
                        <select name="last_link" id="last_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['last_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
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