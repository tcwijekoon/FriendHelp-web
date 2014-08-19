<?php
/* @var $this UserHelpAcceptedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Help Accepteds',
);

$this->menu=array(
	array('label'=>'Create UserHelpAccepted', 'url'=>array('create')),
	array('label'=>'Manage UserHelpAccepted', 'url'=>array('admin')),
);
?>

<h1>User Help Accepteds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
