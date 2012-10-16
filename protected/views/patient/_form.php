<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'patient-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'patient_fullname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'patient_phone',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'patient_birthday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'patient_doctor',array('class'=>'span5')); ?>

<!--	--><?php //echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>
<!---->
<!--	--><?php //echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>
<!---->
<!--	--><?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5')); ?>
<!---->
<!--	--><?php //echo $form->textFieldRow($model,'updated_user',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
