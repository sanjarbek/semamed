<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title','Doctors')=>array('admin'),
        Yii::t('title','Manage'),
    ),
));
?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Manage doctors'),
    'headerIcon'=>'icon-th-list',
    'htmlOptions'=>array(
        'class'=>'bootstrap-widget-table',
    ),
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('title','Create Doctor'),'url'=>array('create'), 'icon'=>'icon-plus'),
            ),
        ),
    ),
)) ?>

<?php $this->_getGridViewDoctorGrid(); ?>

<?php $this->endWidget(); ?>