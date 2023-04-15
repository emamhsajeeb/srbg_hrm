


<?php echo e(Form::open(['url' => 'goaltracking', 'method' => 'post'])); ?>

<div class="modal-body">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo e(Form::label('branch', __('Branch'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('branch', $brances, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo e(Form::label('goal_type', __('GoalTypes'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('goal_type', $goalTypes, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('start_date', null, ['class' => 'form-control d_week','autocomplete'=>'off' ,'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('end_date', null, ['class' => 'form-control d_week','autocomplete'=>'off' ,'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('subject', null, ['class' => 'form-control' ,'placeholder'=>'enter goal subject' ,'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?php echo e(Form::label('target_achievement', __('Target Achievement'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('target_achievement', null, ['class' => 'form-control' ,'placeholder'=>'enter target achievement'])); ?>

        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control' ,'rows'=>'3' ,'placeholder'=>'enter description'])); ?>

        </div>
    </div>
</div>
</div>
<div class="modal-footer">
<input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
<input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/magpfymo/srbg.pro/resources/views/goaltracking/create.blade.php ENDPATH**/ ?>