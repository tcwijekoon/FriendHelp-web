<?php
/* @var $this UserHelpRequestsController */
/* @var $model UserHelpRequests */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-help-requests-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requested_date'); ?>
		<?php echo $form->textField($model,'requested_date'); ?>
		<?php echo $form->error($model,'requested_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'help_status'); ?>
		<?php echo $form->textField($model,'help_status'); ?>
		<?php echo $form->error($model,'help_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accepted_date'); ?>
		<?php echo $form->textField($model,'accepted_date'); ?>
		<?php echo $form->error($model,'accepted_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->