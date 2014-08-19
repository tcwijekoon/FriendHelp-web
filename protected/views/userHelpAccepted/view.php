<?php
/* @var $this UserHelpAcceptedController */
/* @var $model UserHelpAccepted */

$this->breadcrumbs=array(
	'User Help Accepteds'=>array('index'),
	$model->help_accepted_id,
);

$this->menu=array(
	array('label'=>'List UserHelpAccepted', 'url'=>array('index')),
	array('label'=>'Create UserHelpAccepted', 'url'=>array('create')),
	array('label'=>'Update UserHelpAccepted', 'url'=>array('update', 'id'=>$model->help_accepted_id)),
	array('label'=>'Delete UserHelpAccepted', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->help_accepted_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserHelpAccepted', 'url'=>array('admin')),
);
?>

<h1>View UserHelpAccepted #<?php echo $model->help_accepted_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'help_accepted_id',
		'user_id',
		'accepted_date',
	),
)); ?>
