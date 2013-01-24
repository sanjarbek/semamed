<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        'Patients'
    ),
));
?>

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
//            'buttons'=>array(
//                array(
//                    'label'=>Yii::t('title', 'Add new patient'),
//                    'url'=>'#',
//                    'type'=>'ajaxLink',
//                    'icon'=>'icon-plus',
////                    'ajaxOptions'=>array(
////                        'url'=>"addPatient(); $('#dialogPatient').dialog('open');",
////                        'onClick'=>"addPatient(); $('#dialogPatient').dialog('open');",
////                    ),
//                    'htmlOptions'=>array(
////                        'data-toggle'=>'modal',
////                        'data-target'=>'#dialogPatient',
//                        'onClick'=>"addPatient(); $('#dialogPatient').dialog('open');",
//                        'id' => 'send-link-'.uniqid(),
//                    ),
//                ),
//
//            ),
        ),
    ),
));?>

<?php $this->_getGridViewAdminPatientGrid(); ?>

<?php $this->endWidget();?>
