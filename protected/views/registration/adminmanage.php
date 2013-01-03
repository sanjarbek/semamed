<?php
$this->breadcrumbs=array(
    'Patients'=>array('/patient/admin'),
    'Manage',
);
?>

<?php //$this->widget('bootstrap.widgets.TbButton', array(
//    'label'=>Yii::t('text','New registration'),
//    'type'=>'primary',
//    'htmlOptions'=>array(
//        'data-toggle'=>'modal',
////        'data-target'=>'#dialogModal',
////        'data-target'=>'#dialogRegistration',
//        'onClick'=>"{addRegistration(); $('#dialogRegistration').dialog('open');}"
//
//    ),
//)); ?>

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



<!--//##################################################-->


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
                'source' => array(
                    'male'=>Yii::t('value', 'male'),
                    'female'=>Yii::t('value', 'female')
                ),
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


<!--//##################################################-->

<!--<h3>Manage Registrations</h3>-->

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
$new_registration_link = CHtml::Ajax(
    array(
        'success' => "function(data){addRegistration(); $('#dialogRegistration').dialog('open');}",
    )
); ?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Registrations',
    'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstrap-widget-table class
// the table will be 0-padding to the box
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
//    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->_getGridViewRegistrationGrid(); ?>

<?php $this->endWidget();?>
