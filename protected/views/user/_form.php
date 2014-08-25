<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'user_name'); ?>
        <?php echo $form->textField($model, 'user_name', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'user_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password_repeat'); ?>
        <?php echo $form->passwordField($model, 'password_repeat', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'password_repeat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mob_no'); ?>
        <?php echo $form->textField($model, 'mob_no', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'mob_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'dob'); ?>
        <?php echo $form->textField($model, 'dob'); ?>
        <?php echo $form->error($model, 'dob'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'gender'); ?>
        <?php echo $form->textField($model, 'gender'); ?>
        <?php echo $form->error($model, 'gender'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address_no'); ?>
        <?php echo $form->textField($model, 'address_no', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'address_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address_street'); ?>
        <?php echo $form->textField($model, 'address_street', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'address_street'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address_city'); ?>
        <?php echo $form->textField($model, 'address_city', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'address_city'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'bld_grp_id'); ?>
        <?php  $list = CHtml::listData(BloodGroup::model()->findAll(array('order' => 'bld_grp_id')), 'bld_grp_id', 'bld_group');
        echo $form->dropDownList($model, 'bld_grp_id', $list); ?>
        <?php echo $form->error($model, 'bld_grp_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'skill_id'); ?>
        <?php  $list = CHtml::listData(Skills::model()->findAll(array('order' => 'skill_id')), 'skill_id', 'skill');
         echo $form->dropDownList($model, 'skill_id', $list); ?>
        <?php echo $form->error($model, 'skill_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->