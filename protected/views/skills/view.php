<?php
/* @var $this SkillsController */
/* @var $model Skills */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	$model->skill_id,
);

$this->menu=array(
	array('label'=>'List Skills', 'url'=>array('index')),
	array('label'=>'Create Skills', 'url'=>array('create')),
	array('label'=>'Update Skills', 'url'=>array('update', 'id'=>$model->skill_id)),
	array('label'=>'Delete Skills', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->skill_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Skills', 'url'=>array('admin')),
);
?>

<h1>View Skills #<?php echo $model->skill_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'skill_id',
		'skill',
	),
)); ?>
