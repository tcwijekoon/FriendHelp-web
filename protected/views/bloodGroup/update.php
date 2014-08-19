<?php
/* @var $this BloodGroupController */
/* @var $model BloodGroup */

$this->breadcrumbs=array(
	'Blood Groups'=>array('index'),
	$model->bld_grp_id=>array('view','id'=>$model->bld_grp_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BloodGroup', 'url'=>array('index')),
	array('label'=>'Create BloodGroup', 'url'=>array('create')),
	array('label'=>'View BloodGroup', 'url'=>array('view', 'id'=>$model->bld_grp_id)),
	array('label'=>'Manage BloodGroup', 'url'=>array('admin')),
);
?>

<h1>Update BloodGroup <?php echo $model->bld_grp_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>