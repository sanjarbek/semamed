<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t("Profile")=>$this->createUrl('//user/profile'),
        UserModule::t("Edit"),
    ),
));
?>

<!--<h1>--><?php //echo UserModule::t('Edit profile'); ?><!--</h1>-->

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Edit profile'),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>UserModule::t('Manage users'), 'url'=>array('//user/admin'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Profile'), 'url'=>array('//user/profile'), 'icon'=>'icon-eye-open'),
                array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword'), 'icon'=>'icon-edit'),
                array('label'=>UserModule::t('Logout'), 'url'=>array('//user/logout'), 'icon'=>'icon-off'),
            ),
        ),
    ),
));?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success" xmlns="http://www.w3.org/1999/html">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($profile,$field->varname);
		
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textAreaRow($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
//		echo $form->error($profile,$field->varname); ?>
<!--	</div>	-->
			<?php
			}
		}
?>
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textFieldRow($model,'username',array('size'=>20,'maxlength'=>20)); ?>
<!--		--><?php //echo $form->error($model,'username'); ?>
<!--	</div>-->

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($model,'email'); ?>
<!--	</div>-->
    </br>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'label'=>$model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'))); ?>
    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php $this->endWidget() ?>