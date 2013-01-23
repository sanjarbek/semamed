<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mrtscan-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'class'=>'row-fluid',
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'mrtscan_name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textAreaRow($model,'mrtscan_description',array('class'=>'span5','rows'=>10, 'maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'mrtscan_price',array('class'=>'span2','maxlength'=>10)); ?>

	<?php echo $form->dropDownListRow($model,'mrtscan_enable', $model->getStatusOptions()); ?>

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
