<?php
/* @var $this RequestCancelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Request Cancels',
);
?>

<h1>Request Cancels</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
