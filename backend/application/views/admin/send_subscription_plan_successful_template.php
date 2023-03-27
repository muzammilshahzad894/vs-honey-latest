<?= showMsg(); ?>
<?php // getBredcrum(ADMIN, array('#' => 'Add/Update FAQ)); ?>
<div class="row margin-bottom-10">
    <div class="col-md-12">
        <h2 class="no-margin"><i class="entypo-list"></i> <?= $page_title?></h2>
    </div>
</div>
<div>
    <hr>
    <div class="row col-md-12">
        <form action="" name="frmFaq" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" for="status"> Heading <span class="symbol required">*</span></label>
                    <input type="text" name="heading" value="<?php if (isset($row->heading)) echo $row->heading; ?>" class="form-control" required autofocus>
                </div>
                <div class="col-md-6">
                    <label class="control-label"> Body <span class="symbol required">*</span></label>
                    <textarea name="body" class="form-control ckeditor" required><?php if (isset($row->body)) echo $row->body; ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="control-label"> Message <span class="symbol required">*</span></label>
                    <textarea name="message" class="form-control ckeditor" required><?php if (isset($row->message)) echo $row->message; ?></textarea>
                </div>
            </div>
            <hr class="hr-short">
            <div class="form-group text-right">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>