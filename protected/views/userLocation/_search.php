<?php
/* @var $this UserLocationController */
/* @var $model UserLocation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'user_location_id'); ?>
		<?php echo $form->textField($model,'user_location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gps_lat'); ?>
		<?php echo $form->textField($model,'gps_lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gps_lon'); ?>
		<?php echo $form->textField($model,'gps_lon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_address'); ?>
		<?php echo $form->textField($model,'location_address',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_date'); ?>
		<?php echo $form->textField($model,'location_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->