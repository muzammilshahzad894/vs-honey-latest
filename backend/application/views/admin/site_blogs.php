<?php echo getBredcrum(ADMIN, array('#' => 'Blogs')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Blogs</strong></h2>
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
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                            <label for="banner_detail" class="control-label"> Short Description <span class="symbol required">*</span></label>
                            <textarea name="banner_detail" id="banner_detail" rows="3" class="form-control" required=""><?= $row['banner_detail'] ?></textarea>
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