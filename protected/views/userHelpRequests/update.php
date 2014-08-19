<?php
/* @var $this UserHelpRequestsController */
/* @var $model UserHelpRequests */

$this->breadcrumbs=array(
	'User Help Requests'=>array('index'),
	$model->help_requests_id=>array('view','id'=>$model->help_requests_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserHelpRequests', 'url'=>array('index')),
	array('label'=>'Create UserHelpRequests', 'url'=>array('create')),
	array('label'=>'View UserHelpRequests', 'url'=>array('view', 'id'=>$model->help_requests_id)),
	array('label'=>'Manage UserHelpRequests', 'url'=>array('admin')),
);
?>

<h1>Update UserHelpRequests <?php echo $model->help_requests_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>