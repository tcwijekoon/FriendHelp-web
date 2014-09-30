<?php
/* @var $this UserLocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Locations',
);
?>

<h1>User Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
