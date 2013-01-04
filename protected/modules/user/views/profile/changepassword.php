<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t("Profile") => $this->createUrl('//user/profile'),
        UserModule::t("Change Password"),
    ),
));

?>

<!--<h1 xmlns="http://www.w3.org/1999/html">--><?php //echo UserModule::t("Change password"); ?><!--</h1>-->

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Change password'),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                ((UserModule::isAdmin())
                    ?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'), 'icon'=>'icon-th-list')
                    :array()),
        //        array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
                array('label'=>UserModule::t('Profile'), 'url'=>array('//user/profile'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Edit'), 'url'=>array('edit'), 'icon'=>'icon-pencil'),
                array('label'=>UserModule::t('Logout'), 'url'=>array('//user/logout'), 'icon'=>'icon-off'),
            ),
        ),
    ),
)); ?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<?php echo $form->errorSummary($model); ?>
	
<!--	<div class="row">-->
<!--	--><?php //echo $form->labelEx($model,'oldPassword'); ?>
	<?php echo $form->passwordFieldRow($model,'oldPassword'); ?>
<!--	--><?php //echo $form->error($model,'oldPassword'); ?>
<!--	</div>-->
	
<!--	<div class="row">-->
<!--	--><?php //echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordFieldRow($model,'password'); ?>
<!--	--><?php //echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
<!--	</div>-->
	
<!--	<div class="row">-->
<!--	--><?php //echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordFieldRow($model,'verifyPassword'); ?>
<!--	--><?php //echo $form->error($model,'verifyPassword'); ?>
<!--	</div>-->
	
	
<!--	<div class="row submit">-->
<!--	--><?php //echo CHtml::submitButton(UserModule::t("Save")); ?>
<!--	</div>-->
    </br>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'label'=>UserModule::t('Save'))); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->

<?php $this->endWidget(); ?>