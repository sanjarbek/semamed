<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo (($model->id)?$form->textFieldRow($model,'varname',array('size'=>60,'maxlength'=>50,'readonly'=>true)):$form->textFieldRow($model,'varname',array('size'=>60,'maxlength'=>50))); ?>
    <p class="hint"><?php echo UserModule::t("Allowed lowercase letters and digits."); ?></p>

    <?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255)); ?>
    <p class="hint"><?php echo UserModule::t('Field name on the language of "sourceLanguage".'); ?></p>

    <?php echo (($model->id)?$form->textFieldRow($model,'field_type',array('size'=>60,'maxlength'=>50,'readonly'=>true,'id'=>'field_type')):$form->dropDownListRow($model,'field_type',ProfileField::itemAlias('field_type'),array('id'=>'field_type'))); ?>
    <p class="hint"><?php echo UserModule::t('Field type column in the database.'); ?></p>

    <?php echo (($model->id)?$form->textFieldRow($model,'field_size',array('readonly'=>true)):$form->textFieldRow($model,'field_size')); ?>
    <p class="hint"><?php echo UserModule::t('Field size column in the database.'); ?></p>

    <?php echo $form->textFieldRow($model,'field_size_min'); ?>
    <p class="hint"><?php echo UserModule::t('The minimum value of the field (form validator).'); ?></p>

    <?php echo $form->dropDownListRow($model,'required',ProfileField::itemAlias('required')); ?>
    <p class="hint"><?php echo UserModule::t('Required field (form validator).'); ?></p>

    <?php echo $form->textFieldRow($model,'match',array('size'=>60,'maxlength'=>255)); ?>
    <p class="hint"><?php echo UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u')."); ?></p>

    <?php echo $form->textFieldRow($model,'range',array('size'=>60,'maxlength'=>5000)); ?>
    <p class="hint"><?php echo UserModule::t('Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five).'); ?></p>

    <?php echo $form->textFieldRow($model,'error_message',array('size'=>60,'maxlength'=>255)); ?>
    <p class="hint"><?php echo UserModule::t('Error message when you validate the form.'); ?></p>

    <?php echo $form->textFieldRow($model,'other_validator',array('size'=>60,'maxlength'=>255)); ?>
    <p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('file'=>array('types'=>'jpg, gif, png'))))); ?></p>

    <?php echo (($model->id)?$form->textFieldRow($model,'default',array('size'=>60,'maxlength'=>255,'readonly'=>true)):$form->textFieldRow($model,'default',array('size'=>60,'maxlength'=>255))); ?>
    <p class="hint"><?php echo UserModule::t('The value of the default field (database).'); ?></p>

    <?php
    list($widgetsList) = ProfileFieldController::getWidgets($model->field_type);
    echo $form->dropDownListRow($model,'widget',$widgetsList,array('id'=>'widgetlist'));
    //echo CHtml::activeTextField($model,'widget',array('size'=>60,'maxlength'=>255)); ?>
    <p class="hint"><?php echo UserModule::t('Widget name.'); ?></p>

    <?php echo $form->textFieldRow($model,'widgetparams',array('size'=>60,'maxlength'=>5000,'id'=>'widgetparams')); ?>
    <p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('param1'=>array('val1','val2'),'param2'=>array('k1'=>'v1','k2'=>'v2'))))); ?></p>

    <?php echo $form->textFieldRow($model,'position'); ?>
    <p class="hint"><?php echo UserModule::t('Display order of fields.'); ?></p>

    <?php echo $form->dropDownListRow($model,'visible',ProfileField::itemAlias('visible')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'label'=>$model->isNewRecord ? 'Create' : 'Save',
)); ?>
</div>

<?php $this->endWidget(); ?>

<div id="dialog-form" title="<?php echo UserModule::t('Widget parametrs'); ?>">
	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="value">Value</label>
		<input type="text" name="value" id="value" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>
