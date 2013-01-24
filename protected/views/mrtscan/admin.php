<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('MRT scans'),
));
?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Manage MRT scans'),
    'headerIcon'=>'icon-th-list',
    'htmlOptions'=>array(
        'class'=>'bootstrap-widget-table',
    ),
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('value','Create MRT scan'), 'url'=>array('create'), 'icon'=>'icon-plus'),
            ),
        ),
    ),
)); ?>

<?php $this->_getGridViewMrtscanGrid(); ?>

<?php $this->endWidget(); ?>
