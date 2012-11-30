<?php
$this->breadcrumbs=array(
	'Patients'
);

$this->menu=array(
	array('label'=>'List Patient','url'=>array('index')),
	array('label'=>'Create Patient','url'=>array('create')),
);

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
//?>

<!---->


<?php
//echo CHtml::ajaxLink('send a message', '/message',
//    array('replace' => '#message-div'),
//    array('id' => 'send-link-'.uniqid())
//);
//?><!--  -->

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
//                    $('div[aria-labelledby=\"ui-dialog-title-dialogPatient\"] a.ui-dialog-titlebar-close.ui-corner-all[role=\"button\"]').live('click',function()
//                        { $('#dialogPatient div.divForForm').html(''); });
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
//            'id'=>uniqid(),
            'type'=>'post',
//            'live'=>'false',
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

<!--<h3>Manage Patients</h3>-->

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

<?php
//$this->widget('bootstrap.widgets.TbBox', array(
//    'title' => 'Basic Box',
//    'headerIcon' => 'icon-home',
//    'content' => $this->_getGridViewPatientGrid(),
//    'headerButtonActionsLabel' => 'My actions',
//    'headerActions' => array(
//        array('label'=>'first action', 'url'=>'#', 'icon'=>'icon-music'),
//        array('label'=>'second action', 'url'=>'#', 'icon'=>'icon-headphones'),
//        '---',
//        array('label'=>'third action', 'url'=>'#', 'icon'=>'icon-facetime-video')
//    )
//));
//?>
<?php
$create_new_patient_ajax = CHtml::Ajax(
    array(
        'success' => "function(){addPatient(); $('#dialogPatient').dialog('open');}",
    )
);

?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Manage Patients',
    'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
    'headerButtonActionsLabel' => 'My actions',
    'headerActions' => array(
        array(
            'label'=>'Add new patient',
            'url'=>'#',
            'icon'=>'icon-plus',
            'linkOptions'=>array(
                'onclick'=>$create_new_patient_ajax,
                ),
        ),
    ),
    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php //$this->widget('bootstrap.widgets.TbButton', array(
//    'label'=>Yii::t('text','New patient'),
//    'type'=>'primary',
//    'htmlOptions'=>array(
////        'data-toggle'=>'modal',
//        'data-target'=>'#dialogModal',
//        'onClick'=>"{addPatient(); $('#dialogPatient').dialog('open');}"
//
//    ),
//)); ?>

<?php $this->_getGridViewPatientGrid(); ?>

<?php $this->endWidget();?>
