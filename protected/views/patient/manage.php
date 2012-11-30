<?php
$this->breadcrumbs=array(
    'Patients'
);

//$this->menu=array(
//	array('label'=>'List Patient','url'=>array('index')),
//	array('label'=>'Create Patient','url'=>array('create')),
//);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('patient-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<!---->
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('text','New patient'),
    'type'=>'primary',
    'htmlOptions'=>array(
//        'data-toggle'=>'modal',
        'data-target'=>'#dialogModal',
        'onClick'=>"{addPatient(); $('#dialogPatient').dialog('open');}"

    ),
)); ?>

<!--//################################################-->
<div id='divDialogPatient'>
    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dialogPatient',
        'options'=>array(
            'title'=>'Create patient',
            'autoOpen'=>false,
            'modal'=>true,
            'width'=>550,
            'height'=>470,
            'closeOnEscape'=>true,
        ),
    ));?>
    <div class="divForForm"></div>

    <?php $this->endWidget();?>
</div>

<script type="text/javascript">
    // here is the magic
    function addPatient()
    {
        <?php echo CHtml::ajax(array(
            'url'=>array('patient/create'),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogPatient div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    $('#dialogPatient div.divForForm form').submit(addPatient);
                    $('div[aria-labelledby=\"ui-dialog-title-dialogPatient\"] a.ui-dialog-titlebar-close.ui-corner-all[role=\"button\"]').live('click',function()
                        { $('#dialogPatient div.divForForm').html(''); });
                }
                else
                {
                    $('#dialogPatient div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogPatient').dialog('close') \",1000);
                    $.fn.yiiGridView.update('PatientGrid');
                }

            } ",
        ))?>;
        return false;
    }

    function patientRegistrations(url)
    {
        <?php echo CHtml::ajax(array(
            'url'=>'js:url',
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
                {
                    if (data.status == 'successfully')
                    {
                        $('#dialogPatientRegistration div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogPatientRegistration div.divForForm form').submit(patientRegistrations);
                        $('div[aria-labelledby=\"ui-dialog-title-dialogPatientRegistration\"] a.ui-dialog-titlebar-close.ui-corner-all[role=\"button\"]').bind('click',function()
                            { $('#dialogPatientRegistration div.divForForm').html(''); });
                    }
                    else
                    {
                        $('#dialogPatientRegistration div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogPatientRegistration').dialog('close') \",1000);
                    }

                } ",
        ))?>;
        return false;
    }

</script>



<!--//##################################################3-->
<div id='divDialogPatientRegistration'>
    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dialogPatientRegistration',
        'options'=>array(
            'title'=>'Patient Registrations',
            'autoOpen'=>false,
            'modal'=>true,
            'width'=>750,
            'height'=>470,
            'closeOnEscape'=>true,
        ),
    ));?>
    <div class="divForForm"></div>
    <?php $this->endWidget();?>
</div>

<!--//#############################################################/-->

<h3>Manage Patients</h3>

<!--<p>-->
<!--You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>-->
<!--or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
<!--</p>-->
<!---->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->


<?php $this->_getGridViewManagePatientGrid(); ?>
