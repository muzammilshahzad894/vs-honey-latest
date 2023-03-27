<?php echo getBredcrum(ADMIN, array('#' => 'Cv And Cover Letter')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Cv And Cover Letter</strong></h2>
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
        <h3> Main Banner</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>

        </div>

        <h3>Section 2</h3>
        <div class="form-group">
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
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="left_sec_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="left_sec_heading" value="<?= $row['left_sec_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="left_sec_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="left_sec_detail" rows="4" class="form-control ckeditor" ><?= $row['left_sec_detail'] ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="left_sec_card_link" class="control-label">Card Link<span class="symbol required">*</span></label>
                        <select name="left_sec_card_link" id="left_sec_card_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['left_sec_card_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
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
                            Image
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
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="right_sec_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="right_sec_heading" value="<?= $row['right_sec_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="right_sec_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="right_sec_detail" rows="4" class="form-control ckeditor" ><?= $row['right_sec_detail'] ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="right_sec_card_link" class="control-label">Card Link<span class="symbol required">*</span></label>
                        <select name="right_sec_card_link" id="right_sec_card_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['right_sec_card_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
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
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>