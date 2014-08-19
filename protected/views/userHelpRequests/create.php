<?php
/* @var $this UserHelpRequestsController */
/* @var $model UserHelpRequests */

$this->breadcrumbs=array(
	'User Help Requests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserHelpRequests', 'url'=>array('index')),
	array('label'=>'Manage UserHelpRequests', 'url'=>array('admin')),
);
?>

<h1>Create UserHelpRequests</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>