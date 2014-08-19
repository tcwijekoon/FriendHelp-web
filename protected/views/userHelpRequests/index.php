<?php
/* @var $this UserHelpRequestsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Help Requests',
);

$this->menu=array(
	array('label'=>'Create UserHelpRequests', 'url'=>array('create')),
	array('label'=>'Manage UserHelpRequests', 'url'=>array('admin')),
);
?>

<h1>User Help Requests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
