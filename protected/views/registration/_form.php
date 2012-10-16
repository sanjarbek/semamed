<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'reg_patient',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'reg_mrtscan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'reg_discont',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'reg_price',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'reg_report_status',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'reg_report_text',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_user',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
