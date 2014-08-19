<?php
/* @var $this UserHelpRequestsController */
/* @var $model UserHelpRequests */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'help_requests_id'); ?>
		<?php echo $form->textField($model,'help_requests_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requested_date'); ?>
		<?php echo $form->textField($model,'requested_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'help_status'); ?>
		<?php echo $form->textField($model,'help_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accepted_date'); ?>
		<?php echo $form->textField($model,'accepted_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->