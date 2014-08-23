<?php
/* @var $this BloodGroupController */
/* @var $data BloodGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bld_grp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bld_grp_id), array('view', 'id'=>$data->bld_grp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bld_group')); ?>:</b>
	<?php echo CHtml::encode($data->bld_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />


</div>