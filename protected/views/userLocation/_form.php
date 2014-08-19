<?php
/* @var $this UserLocationController */
/* @var $model UserLocation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-location-form',
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
		<?php echo $form->labelEx($model,'gps_lat'); ?>
		<?php echo $form->textField($model,'gps_lat'); ?>
		<?php echo $form->error($model,'gps_lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gps_lon'); ?>
		<?php echo $form->textField($model,'gps_lon'); ?>
		<?php echo $form->error($model,'gps_lon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_address'); ?>
		<?php echo $form->textField($model,'location_address',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'location_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_date'); ?>
		<?php echo $form->textField($model,'location_date'); ?>
		<?php echo $form->error($model,'location_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->