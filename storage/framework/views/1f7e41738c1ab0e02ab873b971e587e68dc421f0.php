<?php echo e(Form::open(['url' => 'overtime', 'method' => 'post'])); ?>

<?php echo e(Form::hidden('employee_id', $employee->id, [])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('title', __('Overtime Title*'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('title', null, ['class' => 'form-control ', 'required' => 'required','placeholder'=>'Enter Title'])); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('number_of_days', __('Number of days'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::number('number_of_days', null, ['class' => 'form-control ','required' => 'required','step' => '0.01'])); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('hours', __('Hours'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::number('hours', null, ['class' => 'form-control ', 'required' => 'required', 'step' => '0.01'])); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('rate', __('Rate'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::number('rate', null, ['class' => 'form-control ', 'required' => 'required', 'step' => '0.01'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">

    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/magpfymo/srbg.pro/resources/views/overtime/create.blade.php ENDPATH**/ ?>