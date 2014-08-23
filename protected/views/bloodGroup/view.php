<?php
/* @var $this BloodGroupController */
/* @var $model BloodGroup */

$this->breadcrumbs=array(
	'Blood Groups'=>array('index'),
	$model->bld_grp_id,
);

$this->menu=array(
	array('label'=>'List BloodGroup', 'url'=>array('index')),
	array('label'=>'Create BloodGroup', 'url'=>array('create')),
	array('label'=>'Update BloodGroup', 'url'=>array('update', 'id'=>$model->bld_grp_id)),
	array('label'=>'Delete BloodGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bld_grp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BloodGroup', 'url'=>array('admin')),
);
?>

<h1>View BloodGroup #<?php echo $model->bld_grp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bld_grp_id',
		'bld_group',
		'create_time',
		'update_time',
	),
)); ?>
