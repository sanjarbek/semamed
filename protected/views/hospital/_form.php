<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'hospital-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'hospital_name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'hospital_phone',array('class'=>'span5','maxlength'=>45)); ?>

    <?php echo $form->dropDownListRow($model,'hospital_manager_id',
        CHtml::listData(User::model()->getManagersList(), 'id', 'fullname')); ?>

	<?php echo $form->checkBoxRow($model,'hospital_enable'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('title','Create') : Yii::t('title','Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
