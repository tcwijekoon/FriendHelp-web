<?php
/* @var $this RequestHelpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Request Helps',
);
?>

<h1>Request Helps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
