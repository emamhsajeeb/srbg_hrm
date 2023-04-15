<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Job')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>

    <link href="<?php echo e(asset('public//libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
<script src='<?php echo e(asset('assets/js/plugins/tinymce/tinymce.min.js')); ?>'></script>
    <script src="<?php echo e(asset('public/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>

    <script>
        var e = $('[data-toggle="tags"]');
        e.length && e.each(function() {
            $(this).tagsinput({
                tagClass: "badge badge-primary"
            })
        });
    </script>

<?php $__env->stopPush(); ?>



<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('job.index')); ?>"><?php echo e(__('Manage Job')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit Job')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
       <?php echo e(Form::model($job,array('route' => array('job.update', $job->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="col-md-6 ">
            <div class="card card-fluid job2-card">
                <div class="card-body ">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('title', __('Job Title'),['class'=>'form-label']); ?>

                            <?php echo Form::text('title', null, ['class' => 'form-control','required' => 'required']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('branch', __('Branch'),['class'=>'form-label']); ?>

                            <?php echo e(Form::select('branch', $branches,null, array('class' => 'form-control select','required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('category', __('Job Category'),['class'=>'form-label']); ?>

                            <?php echo e(Form::select('category', $categories,null, array('class' => 'form-control select','required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('position', __('No. of Positions*'),['class'=>'form-label']); ?>

                            <?php echo Form::text('position', null, ['class' => 'form-control','required' => 'required']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('status', __('Status'),['class'=>'form-label']); ?>

                            <?php echo e(Form::select('status', $status,null, array('class' => 'form-control select','required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('start_date', __('Start Date'),['class'=>'form-label']); ?>

                            <?php echo Form::date('start_date', null, ['class' => 'form-control ', 'autocomplete' => 'off']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('end_date', __('End Date'),['class'=>'form-label']); ?>

                            <?php echo Form::date('end_date', null, ['class' => 'form-control ', 'autocomplete' => 'off']); ?>

                        </div>

                        <div class="form-group col-md-12">
                             <label class="col-form-label" for="skill"><?php echo e(__('Skill Box')); ?></label>
                            <input type="text" class="form-control" value="<?php echo e($job->skill); ?>" data-toggle="tags" name="skill" placeholder="Skill"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-fluid job2-card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><?php echo e(__('Need to ask* ?')); ?></h6>
                                <div class="my-4">
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="gender" id="check-gender" <?php echo e((in_array('gender',$job->applicant)?'checked':'')); ?>>
                                        <label class="form-check-label" for="check-gender"><?php echo e(__('Gender')); ?> </label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="dob" id="check-dob" <?php echo e((in_array('dob',$job->applicant)?'checked':'')); ?>>
                                        <label class="form-check-label" for="check-dob"><?php echo e(__('Date Of Birth')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="address" id="check-address" <?php echo e((in_array('address',$job->applicant)?'checked':'')); ?>>
                                        <label class="form-check-label" for="check-address"><?php echo e(__('Address')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><?php echo e(__('Need to show option* ?')); ?></h6>
                                <div class="my-4">
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="profile" id="check-profile" <?php echo e((in_array('profile',$job->visibility)?'checked':'')); ?>>
                                        <label class="form-check-label" for="check-profile"><?php echo e(__('Profile Image')); ?> </label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="resume" id="check-resume" <?php echo e((in_array('resume',$job->visibility)?'checked':'')); ?>>
                                        <label class="form-check-label" for="check-resume"><?php echo e(__('Resume')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="letter" id="check-letter" <?php echo e((in_array('letter',$job->visibility)?'checked':'')); ?>>
                                        <label class="form-check-label" for="check-letter"><?php echo e(__('Cover Letter')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="terms" id="check-terms" <?php echo e((in_array('terms',$job->visibility)?'checked':'')); ?>>
                                        <label class="form-check-label" for="check-terms"><?php echo e(__('Terms And Conditions')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <h6><?php echo e(__('Custom Questions*')); ?></h6>
                            <div class="my-4">
                                <?php $__currentLoopData = $customQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="custom_question[]" value="<?php echo e($question->id); ?>" <?php if($question->is_required == 'yes'): ?> required <?php endif; ?> id="custom_question_<?php echo e($question->id); ?>" <?php echo e((in_array($question->id,$job->custom_question)?'checked':'')); ?>>
                                        <label class="form-check-label" for="custom_question_<?php echo e($question->id); ?>"><?php echo e($question->question); ?><?php if($question->is_required == 'yes'): ?>
                                            <span class="text-danger">*</span>
                                        <?php endif; ?> </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid job2-card">
                <div class="card-body ">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('description', __('Job Description'),['class'=>'form-label']); ?>

                            <textarea class="form-control editor " name="description" id="description" rows="17"><?php echo e($job->description); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid job2-card">
                <div class="card-body ">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('requirement', __('Job Requirement'),['class'=>'form-label']); ?>

                            <textarea class="form-control editor " name="requirement" id="requirement" rows="10"><?php echo e($job->requirement); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-end">
            <div class="form-group">
                <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/magpfymo/srbg.pro/resources/views/job/edit.blade.php ENDPATH**/ ?>