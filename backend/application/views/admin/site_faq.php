<?php echo getBredcrum(ADMIN, array('#' => 'FAQs')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>FAQs</strong></h2>
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
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable" isCkeditor="true">
                            <tr style="background-color: #eee">
                                <th width="25%">Heading</th>
                                <th>Detail</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $sec2s = getMultiText('faqs', $this->session->userdata('site_lang')); ?>
                            <?php if (count($sec2s) > 0) { $sec2s_count = 1; ?>
                            <?php foreach ($sec2s as $sec2) { ?>
                                <tr>
                                    <td>
                                        <input type="text" name="sec2_title[]" id="sec2_title" value="<?= $sec2->title; ?>" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="sec2_detail[]" id="sec2_detail" class="form-control ckeditor" placeholder="Text" rows="4"><?= $sec2->detail; ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_order_no[]" id="sec2_order_no" value="<?= $sec2->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($sec2s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $sec2s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <input type="text" name="sec2_title[]" id="sec2_title" value="" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="sec2_detail[]" id="sec2_detail" class="form-control ckeditor" placeholder="Text" rows="4"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_order_no[]" id="sec2_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
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