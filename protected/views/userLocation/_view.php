<?php
/* @var $this UserLocationController */
/* @var $data UserLocation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_location_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_location_id), array('view', 'id'=>$data->user_location_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gps_lat')); ?>:</b>
	<?php echo CHtml::encode($data->gps_lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gps_lon')); ?>:</b>
	<?php echo CHtml::encode($data->gps_lon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_address')); ?>:</b>
	<?php echo CHtml::encode($data->location_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_date')); ?>:</b>
	<?php echo CHtml::encode($data->location_date); ?>
	<br />


</div>