<?php
/* @var $this SkillsController */
/* @var $model Skills */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	$model->skill_id=>array('view','id'=>$model->skill_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Skills', 'url'=>array('index')),
	array('label'=>'Create Skills', 'url'=>array('create')),
	array('label'=>'View Skills', 'url'=>array('view', 'id'=>$model->skill_id)),
	array('label'=>'Manage Skills', 'url'=>array('admin')),
);
?>

<h1>Update Skills <?php echo $model->skill_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>