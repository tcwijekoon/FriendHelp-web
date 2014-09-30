<?php
/* @var $this RequestCancelController */
/* @var $data RequestCancel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_cancel_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->request_cancel_id), array('view', 'id'=>$data->request_cancel_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_help_id')); ?>:</b>
	<?php echo CHtml::encode($data->request_help_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />


</div>