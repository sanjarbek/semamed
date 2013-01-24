<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title', 'Registrations')=>array('/registration/admin'),
        Yii::t('title', 'Manage'),
    ),
));
?>

<h4></h4>


<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('value', 'Manage registrations'),
    'headerIcon' => 'icon-th-list',
    'htmlOptions' => array('class'=>'bootstrap-widget-table'),
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
//            'buttons'=>array(
//                array(
//                    'label'=>Yii::t('title', 'Download Template'),
//                    'icon'=>'icon-download',
//                    'url'=>Yii::app()->createAbsoluteUrl('registration/gettemplate', array('pid'=>$patient->patient_id)),
//                ),
//                array(
//                    'label'=>'Registration',
//                    'icon'=>'icon-plus',
//                    'htmlOptions'=>array(
//                        'data-toggle'=>'modal',
////                        'data-target'=>'#dialogRegistration',
//                        'onClick'=>"addRegistration(); $('#dialogRegistration').dialog('open');"
//                    ),
//                ),
//            ),
        ),
    ),
));?>

<?php $this->_getGridViewAdminRegistrationGrid(); ?>

<?php $this->endWidget();?>
