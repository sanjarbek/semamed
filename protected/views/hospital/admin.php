<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title','Hospitals')=>array('admin'),
        Yii::t('title','Manage'),
    ),
));
?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Manage Hospital'),
    'headerIcon'=>'icon-th-list',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('title', 'Create Hospital'),'url'=>array('create'), 'icon'=>'icon-plus'),
            ),
        ),
    ),
    'htmlOptions' => array('class'=>'bootstrap-widget-table'),
)); ?>

<?php $this->_getGridViewHospitalGrid(); ?>

<?php $this->endWidget(); ?>
