<?php
/* @var $this AcceptHelpController */
/* @var $data AcceptHelp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('accept_help_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->accept_help_id), array('view', 'id'=>$data->accept_help_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_help_id')); ?>:</b>
	<?php echo CHtml::encode($data->request_help_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />


</div>