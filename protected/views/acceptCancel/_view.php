<?php
/* @var $this AcceptCancelController */
/* @var $data AcceptCancel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('accept_cancel_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->accept_cancel_id), array('view', 'id'=>$data->accept_cancel_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accept_help_id')); ?>:</b>
	<?php echo CHtml::encode($data->accept_help_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />


</div>