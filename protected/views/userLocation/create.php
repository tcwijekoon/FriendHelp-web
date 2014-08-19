<?php
/* @var $this UserLocationController */
/* @var $model UserLocation */

$this->breadcrumbs=array(
	'User Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserLocation', 'url'=>array('index')),
	array('label'=>'Manage UserLocation', 'url'=>array('admin')),
);
?>

<h1>Create UserLocation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>