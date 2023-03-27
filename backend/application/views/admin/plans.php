<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Update Plan')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Plan</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/plans'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmPromos" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading col-md-12" style="padding: 5.5px 10px">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                Display Options
                            </div>
                            <div class="panel-body" style="padding: 15.5px 0px">
                                <div class="col-md-1">
                                    <h5>Status</h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="btn-group" id="status" data-toggle="buttons">
                                        <label class="btn btn-default btn-on btn-sm <?php if($row->status == 1){echo 'active';}?>">
                                        <input type="radio"  value="1" name="status"<?php if($row->status == 1){echo 'checked';}?>><i class="fa fa-check" aria-hidden="true"></i></label>
                                        
                                        <label class="btn btn-default btn-off btn-sm <?php if($row->status == 0){echo 'active';}?>">
                                        <input type="radio" value="0" name="status" <?php if($row->status == 0){echo 'checked';}?>><i class="fa fa-times" aria-hidden="true"></i></label>
                                    </div>
                                </div>
                                <!-- <div class="col-md-1">
                                    <h5>Is Featured</h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="btn-group" id="is_featured" data-toggle="buttons">
                                        <label class="btn btn-default btn-on btn-sm <?php if($row->is_featured == 1){echo 'active';}?>">
                                        <input type="radio" class="is_featured" value="1" name="is_featured"<?php if($row->is_featured == 1){echo 'checked';}?>><i class="fa fa-check" aria-hidden="true"></i></label>
                                        
                                        <label class="btn btn-default btn-off btn-sm <?php if($row->is_featured == 0){echo 'active';}?>">
                                        <input type="radio" class="is_featured" value="0" name="is_featured" <?php if($row->is_featured == 0){echo 'checked';}?>><i class="fa fa-times" aria-hidden="true"></i></label>
                                    </div>
                                </div> -->
                                <div class="col-md-1">
                                    <h5>Sort Order <span class="symbol required">*</span></h5>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="sort_order" id="sort_order" value="<?php if (isset($row->sort_order)) echo $row->sort_order; ?>" class="form-control" autofocus required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="form-group" id="stripe_id">
                    <div class="col-md-12">
                        <label class="control-label" for="stripe_id"> Stripe ID <span class="symbol required">*</span></label>
                        <input type="text" name="stripe_id" id="stripe_id" value="<?php if (isset($row->stripe_id)) echo $row->stripe_id; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group" id="plan_name">
                    <div class="col-md-12">
                        <label class="control-label" for="plan_name"> Plan Name <span class="symbol required">*</span></label>
                        <input type="text" name="plan_name" id="plan_name" value="<?php if (isset($row->plan_name)) echo $row->plan_name; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group" id="interval">
                    <div class="col-md-12">
                        <label class="control-label" for="interval"> Interval <span class="symbol required">*</span></label>
                        <input type="text" name="interval" id="interval" value="<?php if (isset($row->interval)) echo $row->interval; ?>" class="form-control" readonly required>
                    </div>
                </div>
                <div class="form-group" id="no_of_days">
                    <div class="col-md-12">
                        <label class="control-label" for="no_of_days"> No Of Days <span class="symbol required">*</span></label>
                        <input type="number" name="no_of_days" id="no_of_days" value="<?php if (isset($row->no_of_days)) echo $row->no_of_days; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group" id="no_of_jobs">
                    <div class="col-md-12">
                        <label class="control-label" for="no_of_jobs"> No Of Jobs <span class="symbol required">*</span></label>
                        <input type="number" name="no_of_jobs" id="no_of_jobs" value="<?php if (isset($row->no_of_jobs)) echo $row->no_of_jobs; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group" id="no_of_push">
                    <div class="col-md-12">
                        <label class="control-label" for="no_of_push"> No Of Push <span class="symbol required">*</span></label>
                        <input type="number" name="no_of_push" id="no_of_push" value="<?php if (isset($row->no_of_push)) echo $row->no_of_push; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="price"> Price Starts From <span class="symbol required">*</span></label>
                        <input type="number" name="price" id="price" value="<?php if (isset($row->price)) echo $row->price; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="tax_amount"> Tax Amount In Percentage <span class="symbol required">*</span></label>
                        <input type="number" name="tax_amount" id="tax_amount" value="<?php if (isset($row->tax_amount)) echo $row->tax_amount; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label" for="heading"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="heading" id="heading" value="<?php if (isset($row->heading)) echo $row->heading; ?>" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="detail" rows="3" class="form-control ckeditor" required=""><?= $row->detail ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="included_in_the_plan" class="control-label"> Included In The Plan <span class="symbol required">*</span></label>
                        <textarea name="included_in_the_plan" rows="3" class="form-control ckeditor" required=""><?= $row->included_in_the_plan ?></textarea>
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
    <?= getBredcrum(ADMIN, array('#' => 'Manage Plans')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Plans</strong></h2>
        </div> 
        <div class="col-md-6 text-right">
            <a href="<?= base_url(ADMIN . '/plans/manage'); ?>" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th>Plan Name</th>
                <th>Stripe ID</th>
                <th>Interval</th>
                <th>Price Starts From</th>
                <th>Tax Amount</th>
                <th>Sort Order</th>
                <th>Display</th>
                <th width="12%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td class=""><?= $row->plan_name  ?></td>
                        <td class=""><?= $row->stripe_id  ?></td>
                        <td class=""><?= $row->interval  ?></td>
                        <td class=""><?=$row->price ?></td>
                        <td class=""><?=$row->tax_amount ?>%</td>
                        <td class="text-center"><?= $row->sort_order ?></td>
                        <td class="text-center"><?= get_member_active_status($row->status); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= site_url(ADMIN.'/plans/manage/'.$row->id); ?>">Edit</a></li>
                                    <li><a href="<?= site_url(ADMIN.'/plans/delete/'.$row->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

<!-- <script type="text/javascript">
    jQuery(document).click('.is_featured', function(){
        var is_featured = this;
        alert(this.val());
    });
</script> -->