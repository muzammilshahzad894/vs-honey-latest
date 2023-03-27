<?php echo getBredcrum(ADMIN, array('#' => 'Pricing Page')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Pricing Page</strong></h2>
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
                            <label for="banner_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <textarea name="banner_detail" rows="4" class="form-control ckeditor" ><?= $row['banner_detail'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Section 2</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="sec_heading_1" class="control-label"> Heading<span class="symbol required">*</span></label>
                            <input type="text" name="sec_heading_1" value="<?= $row['sec_heading_1'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="sec2_heading_2" class="control-label"> Tagline <span class="symbol required">*</span></label>
                            <input type="text" name="sec2_heading_2" value="<?= $row['sec2_heading_2'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="sec2_button_text" class="control-label"> Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="sec2_button_text" value="<?= $row['sec2_button_text'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="sec2_right_tag" class="control-label"> Right Tag <span class="symbol required">*</span></label>
                            <input type="text" name="sec2_right_tag" value="<?= $row['sec2_right_tag'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Section 3</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <table class="table table-bordered newTable" id="newTable">
                        <tr style="background-color: #eee">
                            <th width="20%">Heading</th>
                            <th width="20%">Detail</th>
                            <th width="15%">Order#</th>
                            <th width="15%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        <?php $sec3s = getMultiText('pricing-sec3', $this->session->userdata('site_lang')); ?>
                        <?php if (count($sec3s) > 0) { $sec3s_count = 1; ?>
                        <?php foreach ($sec3s as $sec3) { ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec3_title[]" id="sec3_title" value="<?= $sec3->title; ?>" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec3_detail[]" id="sec3_detail" class="form-control" placeholder="Text" rows="3"><?= $sec3->detail; ?></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec3_order_no[]" id="sec3_order_no" value="<?= $sec3->order_no; ?>" class="form-control" placeholder="Order#">
                                </td>

                                <td class="text-center">
                                    <?php if ($sec3s_count > 1) { ?>
                                        <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $sec3s_count++; ?>
                        <?php } ?>
                        <?php }else{ ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec3_title[]" id="sec3_title" value="" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec3_detail[]" id="sec3_detail" class="form-control" placeholder="Text" rows="3"></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec3_order_no[]" id="sec3_order_no" value="" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>  
                        <?php } ?>                  
                    </table>
                </div>
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