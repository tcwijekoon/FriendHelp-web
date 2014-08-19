<?php
/* @var $this UserLocationController */
/* @var $model UserLocation */

$this->breadcrumbs=array(
	'User Locations'=>array('index'),
	$model->user_location_id=>array('view','id'=>$model->user_location_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserLocation', 'url'=>array('index')),
	array('label'=>'Create UserLocation', 'url'=>array('create')),
	array('label'=>'View UserLocation', 'url'=>array('view', 'id'=>$model->user_location_id)),
	array('label'=>'Manage UserLocation', 'url'=>array('admin')),
);
?>

<h1>Update UserLocation <?php echo $model->user_location_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>