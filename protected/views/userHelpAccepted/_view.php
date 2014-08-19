<?php
/* @var $this UserHelpAcceptedController */
/* @var $data UserHelpAccepted */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('help_accepted_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->help_accepted_id), array('view', 'id'=>$data->help_accepted_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accepted_date')); ?>:</b>
	<?php echo CHtml::encode($data->accepted_date); ?>
	<br />


</div>