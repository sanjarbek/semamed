<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'doctor_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'doctor_fullname',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'doctor_phone',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'doctor_hospital',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'doctor_enable',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_user',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
