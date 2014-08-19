<?php
/* @var $this UserLocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Locations',
);

$this->menu=array(
	array('label'=>'Create UserLocation', 'url'=>array('create')),
	array('label'=>'Manage UserLocation', 'url'=>array('admin')),
);
?>

<h1>User Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
