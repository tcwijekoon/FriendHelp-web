<?php
/* @var $this UserHelpRequestsController */
/* @var $data UserHelpRequests */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('help_requests_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->help_requests_id), array('view', 'id'=>$data->help_requests_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_date')); ?>:</b>
	<?php echo CHtml::encode($data->requested_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('help_status')); ?>:</b>
	<?php echo CHtml::encode($data->help_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accepted_date')); ?>:</b>
	<?php echo CHtml::encode($data->accepted_date); ?>
	<br />


</div>