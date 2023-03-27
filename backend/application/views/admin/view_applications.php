<?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Applicants')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Applicants</h2>
        </div>
    </div>

    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="13%">Employer Detail</th>
                <th width="20%">Candidate Detail</th>
                <th width="15%">Cover Letter</th>
                <th width="15%">Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($applicants) > 0): $count = 0; ?>
                <?php foreach ($applicants as $applicant):  ?>                    
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><a href="<?= site_url(ADMIN . '/members/manage/' . $employer_id) ?>"><?php echo $employer->mem_fname . ' ' . $employer->mem_lname . ' ' . '(' . $employer->mem_email .')'; ?></a></td>
                        <td><a href="<?= site_url(ADMIN . '/members/manage/' . $applicant->mem_id) ?>"><?php echo $applicant->mem_fname . ' ' . $applicant->mem_lname . ' ' . '(' . $applicant->mem_email .')'; ?></a></td>
                        <td><b><?= substr($applicant->cover_letter, 0, 100) ?></b> <a href="<?= site_url(ADMIN . '/jobs/cover_letter/' . $this->uri->segment(4)) ?>">
                        <span style="color: red;">Read More</span></a></td>
                        <td><a download="" href="<?= base_url('uploads/resumes/' . $applicant->resume) ?>">Download Resume</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>