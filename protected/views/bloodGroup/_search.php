<?php
/* @var $this BloodGroupController */
/* @var $model BloodGroup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bld_grp_id'); ?>
		<?php echo $form->textField($model,'bld_grp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bld_group'); ?>
		<?php echo $form->textField($model,'bld_group',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->