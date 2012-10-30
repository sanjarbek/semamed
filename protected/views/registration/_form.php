<?php
$cs = Yii::app()->getClientScript();
$cs->registerScript(
    'getMrtscanPrice',
    "$('#Registration_reg_mrtscan').bind('change',function(){getMrtscanPrice();});
    $('#Registration_reg_discont').bind('change',function(){
        getMrtscanPrice();
        });
    ",
    CClientScript::POS_END
);
?>

<script type="text/javascript">

    $('#Registration_reg_mrtscan').change();
    function getMrtscanPrice()
    {
        <?php echo CHtml::ajax(array(
            'url'=>array('mrtscan/getPrice'),
            'data'=> "js:$('#Registration_reg_mrtscan').serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    alert('Please, check your internet connection.');
                }
                else
                {
                    var discont = parseInt($('#Registration_reg_discont').val());
                    if (isNaN(discont))
                    {
                        $('#Registration_reg_discont').val(0);
                        discont = 0;
                    }
                    var mrtscan_price = parseInt(data.content);
                    $('#Registration_reg_price').val(mrtscan_price);
                    $('#Registration_reg_total_price').val(mrtscan_price-discont);
                }

            } ",
        ))?>;
        return false;
    }

</script>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'reg_patient',
            CHtml::listData(Patient::model()->findAll(),'patient_id','patient_fullname')); ?>

    <?php echo $form->dropDownListRow($model,'reg_mrtscan',
        CHtml::listData(Mrtscan::model()->findAll(),'mrtscan_id','mrtscan_name')); ?>


    <?php echo $form->textFieldRow($model,'reg_price',array('readonly'=>true, 'class'=>'span2','maxlength'=>10)); ?>

	<?php
        if ($model->isNewRecord)
            $model->reg_discont = 0;
        echo $form->textFieldRow($model,'reg_discont',array('class'=>'span2'));
    ?>

    <?php echo $form->textFieldRow($model,'reg_total_price',array('readonly'=>true, 'class'=>'span2','maxlength'=>10)); ?>

	<?php echo $form->checkBoxRow($model,'reg_report_status'); ?>

<!--	--><?php //echo $form->textAreaRow($model,'reg_report_text',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!--    --><?php //echo $form->html5EditorRow($model, 'reg_report_text', array('class'=>'span4', 'rows'=>5,
//        'height'=>'200', 'options'=>array('color'=>true))); ?>
    <?php echo $form->redactorRow($model, 'reg_report_text', array('class'=>'span8', 'rows'=>6)); ?>

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
