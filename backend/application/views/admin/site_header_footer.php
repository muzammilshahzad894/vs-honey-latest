<?php echo getBredcrum(ADMIN, array('#' => 'Header And Footer')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Header And Footer</strong></h2>
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
        <h3><i class="fa fa-bars"></i> Header Settings</h3>
        <hr class="hr-short">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="link_1">Link<span class="symbol required">*</span></label>
                            <input type="text" name="link_1" value="<?php if (isset($row['link_1'])) echo $row['link_1']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="drop_1">Drop Down 1<span class="symbol required">*</span></label>
                            <input type="text" name="drop_1" value="<?php if (isset($row['drop_1'])) echo $row['drop_1']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="drop_1_link_1">Link 1<span class="symbol required">*</span></label>
                            <input type="text" name="drop_1_link_1" value="<?php if (isset($row['drop_1_link_1'])) echo $row['drop_1_link_1']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="drop_1_link_2">Link 2<span class="symbol required">*</span></label>
                            <input type="text" name="drop_1_link_2" value="<?php if (isset($row['drop_1_link_2'])) echo $row['drop_1_link_2']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="drop_2">Drop Down 2<span class="symbol required">*</span></label>
                            <input type="text" name="drop_2" value="<?php if (isset($row['drop_2'])) echo $row['drop_2']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="drop_2_link_1">Link 1<span class="symbol required">*</span></label>
                            <input type="text" name="drop_2_link_1" value="<?php if (isset($row['drop_2_link_1'])) echo $row['drop_2_link_1']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="drop_2_link_2">Link 2<span class="symbol required">*</span></label>
                            <input type="text" name="drop_2_link_2" value="<?php if (isset($row['drop_2_link_2'])) echo $row['drop_2_link_2']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="drop_2_link_3">Link 3<span class="symbol required">*</span></label>
                            <input type="text" name="drop_2_link_3" value="<?php if (isset($row['drop_2_link_3'])) echo $row['drop_2_link_3']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="drop_2_link_4">Link 4<span class="symbol required">*</span></label>
                            <input type="text" name="drop_2_link_4" value="<?php if (isset($row['drop_2_link_4'])) echo $row['drop_2_link_4']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="drop_2_link_5">Link 5<span class="symbol required">*</span></label>
                            <input type="text" name="drop_2_link_5" value="<?php if (isset($row['drop_2_link_5'])) echo $row['drop_2_link_5']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="link_2">Link<span class="symbol required">*</span></label>
                            <input type="text" name="link_2" value="<?php if (isset($row['link_2'])) echo $row['link_2']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="link_3">Link<span class="symbol required">*</span></label>
                            <input type="text" name="link_3" value="<?php if (isset($row['link_3'])) echo $row['link_3']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="site_second_section_heading">Button Link<span class="symbol required">*</span></label>
                            <input type="text" name="site_second_section_heading" value="<?php if (isset($row['site_second_section_heading'])) echo $row['site_second_section_heading']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3><i class="fa fa-bars"></i> Footer Settings</h3>
        <hr class="hr-short">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="seaction_1_heading">Section 1 Heading<span class="symbol required">*</span></label>
                            <input type="text" name="seaction_1_heading" value="<?php if (isset($row['seaction_1_heading'])) echo $row['seaction_1_heading']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_1_link_1">Link 1<span class="symbol required">*</span></label>
                            <input type="text" name="section_1_link_1" value="<?php if (isset($row['section_1_link_1'])) echo $row['section_1_link_1']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_1_link_2">Link 2<span class="symbol required">*</span></label>
                            <input type="text" name="section_1_link_2" value="<?php if (isset($row['section_1_link_2'])) echo $row['section_1_link_2']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_1_link_3">Link 3<span class="symbol required">*</span></label>
                            <input type="text" name="section_1_link_3" value="<?php if (isset($row['section_1_link_3'])) echo $row['section_1_link_3']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_1_link_4">Link 4<span class="symbol required">*</span></label>
                            <input type="text" name="section_1_link_4" value="<?php if (isset($row['section_1_link_4'])) echo $row['section_1_link_4']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_1_link_5">Link 5<span class="symbol required">*</span></label>
                            <input type="text" name="section_1_link_5" value="<?php if (isset($row['section_1_link_5'])) echo $row['section_1_link_5']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_1_link_6">Link 6<span class="symbol required">*</span></label>
                            <input type="text" name="section_1_link_6" value="<?php if (isset($row['section_1_link_6'])) echo $row['section_1_link_6']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="seaction_2_heading">Section 2 Heading<span class="symbol required">*</span></label>
                            <input type="text" name="seaction_2_heading" value="<?php if (isset($row['seaction_2_heading'])) echo $row['seaction_2_heading']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_2_link_1">Link 1<span class="symbol required">*</span></label>
                            <input type="text" name="section_2_link_1" value="<?php if (isset($row['section_2_link_1'])) echo $row['section_2_link_1']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_2_link_2">Link 2<span class="symbol required">*</span></label>
                            <input type="text" name="section_2_link_2" value="<?php if (isset($row['section_2_link_2'])) echo $row['section_2_link_2']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_2_link_3">Link 3<span class="symbol required">*</span></label>
                            <input type="text" name="section_2_link_3" value="<?php if (isset($row['section_2_link_3'])) echo $row['section_2_link_3']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_2_link_4">Link 4<span class="symbol required">*</span></label>
                            <input type="text" name="section_2_link_4" value="<?php if (isset($row['section_2_link_4'])) echo $row['section_2_link_4']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="seaction_3_heading">Section 3 Heading<span class="symbol required">*</span></label>
                            <input type="text" name="seaction_3_heading" value="<?php if (isset($row['seaction_3_heading'])) echo $row['seaction_3_heading']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_3_link_1">Heading 1<span class="symbol required">*</span></label>
                            <input type="text" name="section_3_link_1" value="<?php if (isset($row['section_3_link_1'])) echo $row['section_3_link_1']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_3_link_2">Heading 2<span class="symbol required">*</span></label>
                            <input type="text" name="section_3_link_2" value="<?php if (isset($row['section_3_link_2'])) echo $row['section_3_link_2']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_3_link_3">heading 3<span class="symbol required">*</span></label>
                            <input type="text" name="section_3_link_3" value="<?php if (isset($row['section_3_link_3'])) echo $row['section_3_link_3']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="seaction_4_heading">Section 4 Heading<span class="symbol required">*</span></label>
                            <input type="text" name="seaction_4_heading" value="<?php if (isset($row['seaction_4_heading'])) echo $row['seaction_4_heading']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_4_link_1">Field Heading <span class="symbol required">*</span></label>
                            <input type="text" name="section_4_link_1" value="<?php if (isset($row['section_4_link_1'])) echo $row['section_4_link_1']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_4_link_2">Field Placeholder<span class="symbol required">*</span></label>
                            <input type="text" name="section_4_link_2" value="<?php if (isset($row['section_4_link_2'])) echo $row['section_4_link_2']; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label" for="section_4_link_3">Heading<span class="symbol required">*</span></label>
                            <input type="text" name="section_4_link_3" value="<?php if (isset($row['section_4_link_3'])) echo $row['section_4_link_3']; ?>"  class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="copyright_text">Copyright Text<span class="symbol required">*</span></label>
                            <input type="text" name="copyright_text" value="<?php if (isset($row['copyright_text'])) echo $row['copyright_text']; ?>"  class="form-control" required>
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