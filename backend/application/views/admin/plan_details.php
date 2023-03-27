
<?= showMsg(); ?>
<?= getBredcrum(ADMIN, array('#' => 'Add/Update Members')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-users"></i> Plan <strong>Details</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="<?= site_url(ADMIN . '/members'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
</div>
<div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="10%" class="text-center">Plan Name</th>  
                <th width="10%" class="text-center">Interval</th>
                <th width="10%" class="text-center">No of Days</th>
                <th width="10%" class="text-center">Price</th>
                <th width="10%" class="text-center">No of Jobs</th>
                <th width="10%" class="text-center">No of push</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd gradeX">
                <td class="text-center"><?= $plan->plan_name; ?></td>
                <td class="text-center"><?= $plan->interval; ?></td>
                <td class="text-center"><?= $plan->no_of_days; ?></td>
                <td class="text-center"><?= $plan->price; ?></td>
                <td class="text-center"><?= $plan->no_of_jobs; ?></td>
                <td class="text-center"><?= $plan->no_of_push; ?></td>
            </tr>
        </tbody>
    </table>
</div>