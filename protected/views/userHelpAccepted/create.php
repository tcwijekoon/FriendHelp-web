<?php
/* @var $this UserHelpAcceptedController */
/* @var $model UserHelpAccepted */

$this->breadcrumbs=array(
	'User Help Accepteds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserHelpAccepted', 'url'=>array('index')),
	array('label'=>'Manage UserHelpAccepted', 'url'=>array('admin')),
);
?>

<h1>Create UserHelpAccepted</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>