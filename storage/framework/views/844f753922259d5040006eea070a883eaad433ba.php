<?php
    $setting = App\Models\Utility::settings();
?>
<?php echo e(Form::open(['url' => 'interview-schedule', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('candidate', __('Interviewer'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('candidate', $candidates, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('employee', __('Assign Employee'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('employee', $employees, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('date', __('Interview Date'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('date', null, ['class' => 'form-control d_week', 'autocomplete' => 'off'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('time', __('Interview Time'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::time('time', null, ['class' => 'form-control ', 'id' => 'clock_in'])); ?>

        </div>
        <div class="form-group ">
            <?php echo e(Form::label('comment', __('Comment'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('comment', null, ['class' => 'form-control'])); ?>

        </div>
        <?php if(isset($setting['is_enabled']) && $setting['is_enabled'] =='on'): ?>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('synchronize_type', __('Synchroniz in Google Calendar ?'), ['class' => 'form-label'])); ?>

            <div class=" form-switch">
                <input type="checkbox" class="form-check-input mt-2" name="synchronize_type" id="switch-shadow"
                    value="google_calender">
                <label class="form-check-label" for="switch-shadow"></label>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">

</div>
<?php echo e(Form::close()); ?>


<?php if($candidate != 0): ?>
    <script>
        $('select#candidate').val(<?php echo e($candidate); ?>).trigger('change');
    </script>
<?php endif; ?>
<?php /**PATH /home/magpfymo/srbg.pro/resources/views/interviewSchedule/create.blade.php ENDPATH**/ ?>