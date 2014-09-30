<?php
/* @var $this AcceptHelpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accept Helps',
);
?>

<h1>Accept Helps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
