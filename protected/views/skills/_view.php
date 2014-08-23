<?php
/* @var $this SkillsController */
/* @var $data Skills */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->skill_id), array('view', 'id'=>$data->skill_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill')); ?>:</b>
	<?php echo CHtml::encode($data->skill); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />


</div>