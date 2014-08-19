<?php
/* @var $this UserHelpAcceptedController */
/* @var $model UserHelpAccepted */

$this->breadcrumbs=array(
	'User Help Accepteds'=>array('index'),
	$model->help_accepted_id=>array('view','id'=>$model->help_accepted_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserHelpAccepted', 'url'=>array('index')),
	array('label'=>'Create UserHelpAccepted', 'url'=>array('create')),
	array('label'=>'View UserHelpAccepted', 'url'=>array('view', 'id'=>$model->help_accepted_id)),
	array('label'=>'Manage UserHelpAccepted', 'url'=>array('admin')),
);
?>

<h1>Update UserHelpAccepted <?php echo $model->help_accepted_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>