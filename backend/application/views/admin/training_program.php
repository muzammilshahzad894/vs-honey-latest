<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Add/Update Team')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Training Program</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/training_program'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div> 
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmTestimonial" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading col-md-12" style="padding: 5.5px 10px"><i class="fa fa-eye" aria-hidden="true"></i> Display Options</div>
                            <div class="panel-body" style="padding: 15.5px 0px">
                                <div class="col-md-3">
                                    <h5>Status</h5>
                                </div>
                                <div class="col-md-7">
                                    <div class="btn-group" id="status" data-toggle="buttons">
                                        <label class="btn btn-default btn-off btn-sm <?php if($row->status == 0){echo 'active';}?>">
                                        <input type="radio" value="0" name="status" <?php if($row->status == 0){echo 'checked';}?>><i class="fa fa-times" aria-hidden="true"></i></label>

                                        <label class="btn btn-default btn-on btn-sm <?php if($row->status == 1){echo 'active';}?>">
                                        <input type="radio" value="1" name="status"<?php if($row->status == 1){echo 'checked';}?>><i class="fa fa-check" aria-hidden="true"></i></label>
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div style="margin:45px 0px" class="">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                 Image
                            </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <?php
                        get_site_image_src("images", $row->image);
                    ?>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row->image) ? get_site_image_src("training_program", $row->image) : 'http://placehold.it/700x620' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                        <div>
                        <span class="btn btn-black btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="image" accept="image/*" <?php if(empty($row->image)){echo 'required=""';}?>>
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="heading">Heading</label>
                        <input type="text" name="heading" id="heading" value="<?php if (isset($row->heading)) echo $row->heading; ?>" class="form-control" autofocus required>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="sub_heading"> Sub Heading</label>
                        <input type="text" name="sub_heading" id="sub_heading" value="<?php if (isset($row->sub_heading)) echo $row->sub_heading; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="designation"> Badge Text</label>
                        <input type="text" name="badge_text" id="badge_text" value="<?php if (isset($row->badge_text)) echo $row->badge_text; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="price">Price</label>
                        <input type="number" name="price" id="price" value="<?php if (isset($row->price)) echo $row->price; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="link">Link</label>
                        <input type="text" name="link" id="link" value="<?php if (isset($row->link)) echo $row->link; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" value="<?php if (isset($row->start_date)) echo $row->start_date; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" value="<?php if (isset($row->end_date)) echo $row->end_date; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="detail">Detail</label>
                        <textarea name="detail" id="detail" rows="8" class="form-control ckeditor" required><?= $row->detail ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">                
                    <hr class="hr-short">
                    <div class="form-group text-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage team')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Training Program</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/training_program/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Image</th>
                <th>Heading</th>
                <th>Sub-Heading</th>
                <th>Details</th>
                <th>Price</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class=""><?= ++$count; ?></td>
                        <td class="">
                            <div class="icoRound">
                                <img src = "<?= get_site_image_src('training_program', $row->image, 'thumb_', true); ?>" height = "60">
                            </div>
                        </td>
                        <td class=""><?=$row->heading ?></td>
                        <td><b><?= $row->sub_heading; ?></b></td>
                        <td class=""><?= $row->detail ?></td>
                        <td class=""><?= $row->price ?></td>
                        <td class=""><?= $row->start_date ?></td>
                        <td class=""><?= $row->end_date ?></td>
                        <td class=""><?= get_member_active_status($row->status); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/training_program/manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/training_program/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>