<?php
/* @var $this UserHelpRequestsController */
/* @var $model UserHelpRequests */

$this->breadcrumbs=array(
	'User Help Requests'=>array('index'),
	$model->help_requests_id,
);

$this->menu=array(
	array('label'=>'List UserHelpRequests', 'url'=>array('index')),
	array('label'=>'Create UserHelpRequests', 'url'=>array('create')),
	array('label'=>'Update UserHelpRequests', 'url'=>array('update', 'id'=>$model->help_requests_id)),
	array('label'=>'Delete UserHelpRequests', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->help_requests_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserHelpRequests', 'url'=>array('admin')),
);
?>

<h1>View UserHelpRequests #<?php echo $model->help_requests_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'help_requests_id',
		'user_id',
		'requested_date',
		'help_status',
		'accepted_date',
	),
)); ?>
