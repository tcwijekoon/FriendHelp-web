<?php
/* @var $this UserLocationController */
/* @var $model UserLocation */

$this->breadcrumbs=array(
	'User Locations'=>array('index'),
	$model->user_location_id,
);

$this->menu=array(
	array('label'=>'List UserLocation', 'url'=>array('index')),
	array('label'=>'Create UserLocation', 'url'=>array('create')),
	array('label'=>'Update UserLocation', 'url'=>array('update', 'id'=>$model->user_location_id)),
	array('label'=>'Delete UserLocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_location_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserLocation', 'url'=>array('admin')),
);
?>

<h1>View UserLocation #<?php echo $model->user_location_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_location_id',
		'user_id',
		'gps_lat',
		'gps_lon',
		'location_address',
		'location_date',
	),
)); ?>
