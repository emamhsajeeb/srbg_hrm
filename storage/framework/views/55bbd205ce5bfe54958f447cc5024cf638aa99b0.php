<?php echo e(Form::open(['url' => 'termination', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('employee_id', __('Employee'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('employee_id', $employees, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('termination_type', __('Termination Type'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('termination_type', $terminationtypes, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('notice_date', __('Notice Date'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('notice_date', null, ['class' => 'form-control d_week', 'autocomplete' => 'off' ,'required' => 'required'])); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('termination_date', __('Termination Date'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('termination_date', null, ['class' => 'form-control d_week', 'autocomplete' => 'off' ,'required' => 'required'])); ?>

        </div>
        <div class="form-group  col-lg-12">
            <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Enter Description'),'rows' => '3' ,'required' => 'required'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/magpfymo/srbg.pro/resources/views/termination/create.blade.php ENDPATH**/ ?>