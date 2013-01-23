<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('MRT scans'),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mrtscan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Manage MRT scans'),
    'headerIcon'=>'icon-th-list',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>'Create MRT scan','url'=>array('create'), 'icon'=>'icon-plus'),
            ),
        ),
    ),
)); ?>

<?php $this->_getGridViewMrtscanGrid(); ?>

<?php $this->endWidget(); ?>
