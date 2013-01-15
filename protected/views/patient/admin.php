<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        'Patients'
    ),
));
?>

<div id='divDialogPatient'>
    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dialogPatient',
        'options'=>array(
            'title'=>'Create patient',
            'autoOpen'=>false,
            'modal'=>true,
            'width'=>450,
            'height'=>465,
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

</script>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Manage Patients',
    'headerIcon' => 'icon-th-list',
    'htmlOptions' => array('class'=>'bootstrap-widget-table'),
//    'htmlOptions'=>array(
//        'class'=>'span9 pull-right',
//    ),
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array(
                    'label'=>Yii::t('title', 'Add new patient'),
                    'url'=>'#',
                    'type'=>'ajaxLink',
                    'icon'=>'icon-plus',
//                    'ajaxOptions'=>array(
//                        'url'=>"addPatient(); $('#dialogPatient').dialog('open');",
//                        'onClick'=>"addPatient(); $('#dialogPatient').dialog('open');",
//                    ),
                    'htmlOptions'=>array(
//                        'data-toggle'=>'modal',
//                        'data-target'=>'#dialogPatient',
                        'onClick'=>"addPatient(); $('#dialogPatient').dialog('open');",
                        'id' => 'send-link-'.uniqid(),
                    ),
                ),

            ),
        ),
    ),
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
