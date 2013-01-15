<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
	    UserModule::t("Login"),
    ),
));
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Login'),
    'headerIcon' => 'icon-user',
    'htmlOptions'=>array(
        'class'=>'pull-left',
    ),
));?>

<div class='span6'>
<?php
echo CHtml::image(Yii::app()->request->baseUrl .'images/logo.png', 'Semamed', array(
    'data-original' => 'original',
));
?>
</div>
<div class='span6'>
<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<!--<div class="form" >-->
<?php //echo CHtml::beginForm(); ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'patient-form',
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
<!--	--><?php //echo CHtml::errorSummary($model); ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model,'username',array('class'=>'span6','maxlength'=>30)); ?>
    <?php echo $form->passwordFieldRow($model,'password',array('class'=>'span6','maxlength'=>30)); ?>
    <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
<!--    <div class="row">-->
<!--		--><?php //echo CHtml::activeLabelEx($model,'username'); ?>
<!--		--><?php //echo CHtml::activeTextField($model,'username') ?>
<!--	</div>-->
<!--	-->
<!--	<div class="row">-->
<!--		--><?php //echo CHtml::activeLabelEx($model,'password'); ?>
<!--		--><?php //echo CHtml::activePasswordField($model,'password') ?>
<!--	</div>-->
<!--	-->
<!--	<div class="row">-->
<!--		<p class="hint">-->
<!--		--><?php //echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?><!-- | --><?php //echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
<!--		</p>-->
<!--	</div>-->
	
<!--	<div class="row rememberMe">-->
<!--		--><?php //echo CHtml::activeCheckBox($model,'rememberMe'); ?>
<!--		--><?php //echo CHtml::activeLabelEx($model,'rememberMe'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row submit">-->
<!--		--><?php //echo CHtml::submitButton(UserModule::t("Login")); ?>
<!--	</div>-->

<?php $this->endWidget(); ?>
</div> <!--login div -->

<?php $this->endWidget(); ?>
