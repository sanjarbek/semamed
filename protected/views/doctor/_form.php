<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'doctor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'doctor_fullname',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'doctor_phone',array('class'=>'span5','maxlength'=>45)); ?>

    <label class="required" for="Doctor_doctor_type">
        Doctor type <span class="required">*</span>
    </label>
    <?php
        $this->widget('bootstrap.widgets.TbTypeahead', array(
            'model'=>$model,
            'attribute'=>'doctor_type',
            'htmlOptions'=>array(
                'autocomplete' => 'off',
            ),
            'options'=>array(
//                'name'=>'doctor_type',
                'source'=> $model->getTypeOptions(),
                'items'=>4,
                'matcher'=>"js:function(item) {
            return ~item.toLowerCase().indexOf(this.query.toLowerCase());
            }",
        )));
    ?>

	<?php echo $form->dropDownListRow($model,'doctor_hospital',
        CHtml::listData(Hospital::model()->findAll(), 'hospital_id', 'hospital_name')); ?>

	<?php echo $form->checkBoxRow($model,'doctor_enable'    ); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('title','Create') : Yii::t('title','Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
