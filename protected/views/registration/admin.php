<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title', 'Patients')=>array('/patient/admin'),
        Yii::t('title', 'Manage'),
    ),
));
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogRegistration',
    'options'=>array(
        'title'=>'New Registration',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>500,
        'closeOnEscape'=>true,
    ),
));?>

<div class="divForForm"></div>

<?php $this->endWidget();?>

<script type="text/javascript">
    // here is the magic
    function addRegistration()
    {
        <?php echo CHtml::ajax(array(
            'url'=>array('registration/create&pid='.$patient->patient_id),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogRegistration div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    $('#dialogRegistration div.divForForm form').submit(addRegistration);
                    $('div[aria-labelledby=\"ui-dialog-title-dialogRegistration\"] a.ui-dialog-titlebar-close.ui-corner-all[role=\"button\"]').live('click',function()
                        { $('#dialogRegistration div.divForForm').html(''); });
                }
                else
                {
                    $('#dialogRegistration div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogRegistration').dialog('close') \",1000);
                    $.fn.yiiGridView.update('RegistrationGrid');
                }

            } ",
        ))?>;
        return false;
    }

</script>

<h4>View Patient #<?php echo $patient->patient_id; ?></h4>

<?php $this->widget('bootstrap.widgets.TbEditableDetailView',array(
    'id' => 'patient-details',
    'data'=>$patient,
    'url' => $this->createUrl('patient/editable'),
    'attributes'=>array(
        'patient_id',
        'patient_fullname',
        'patient_phone',
        array(
            'name' => 'patient_birthday',
            'editable' => array(
                'type' => 'date',
                'viewformat' => 'dd.mm.yyyy'
            )
        ),
        array(
            'name' => 'patient_sex',
            'editable' => array(
                'type' => 'select',
                'source' => "[{value: '0', text: 'Male'}, {value: '1', text: 'Female'}]",
            )
        ),
        array(
            'name' => 'patient_status',
            'editable' => array(
                'type' => 'select',
                'source' => "[{value: '0', text: 'Not yet started'}, {value: '1', text: 'Started'}, {value: '2', text: 'Finished'}, {value: '3', text: 'Canceled'}, {value: '4', text: 'Delayed'}]",
            )
        ),
        array(
            'name' => 'patient_doctor',
            'editable' => array(
                'type'=>'select',
                'source' => CHtml::listData(Doctor::model()->findAll(array('order'=>'doctor_fullname')),'doctor_id','doctor_fullname'),
            ),
        ),
        'created_at',
        'updated_at',
//        'created_user',
//        'updated_user',
    ),
)); ?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Registrations',
    'headerIcon' => 'icon-th-list',
    'htmlOptions' => array('class'=>'bootstrap-widget-table'),
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array(
                    'label'=>Yii::t('title', 'Download Template'),
                    'icon'=>'icon-download',
                    'url'=>Yii::app()->createAbsoluteUrl('registration/gettemplate', array('pid'=>$patient->patient_id)),
                ),
                array(
                    'label'=>'Registration',
                    'icon'=>'icon-plus',
                    'htmlOptions'=>array(
                        'data-toggle'=>'modal',
//                        'data-target'=>'#dialogRegistration',
                        'onClick'=>"addRegistration(); $('#dialogRegistration').dialog('open');"
                    ),
                ),
            ),
        ),
    ),
));?>

<?php $this->_getGridViewRegistrationGrid(); ?>

<?php $this->endWidget();?>
