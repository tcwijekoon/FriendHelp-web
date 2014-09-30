<?php
/* @var $this AcceptCancelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accept Cancels',
);
?>

<h1>Accept Cancels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
