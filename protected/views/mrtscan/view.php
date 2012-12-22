<?php
$this->breadcrumbs=array(
	'Mrtscans'=>array('admin'),
	$model->mrtscan_id,
);

//$this->menu=array(
//	array('label'=>'List Mrtscan','url'=>array('index')),
//	array('label'=>'Create Mrtscan','url'=>array('create')),
//	array('label'=>'Update Mrtscan','url'=>array('update','id'=>$model->mrtscan_id)),
//	array('label'=>'Delete Mrtscan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->mrtscan_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Mrtscan','url'=>array('admin')),
//);
?>

<!--<h1>View Mrtscan #--><?php //echo $model->mrtscan_id; ?><!--</h1>-->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'View MRT scan'),
    'headerIcon'=>'icon-eye-open',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('menu', 'Create Mrtscan'),'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>Yii::t('menu', 'Update Mrtscan'),'url'=>array('update','id'=>$model->mrtscan_id), 'icon'=>'icon-pencil'),
                array('label'=>Yii::t('menu', 'Delete Mrtscan'),'url'=>'#','icon'=>'icon-remove', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mrtscan_id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>Yii::t('menu', 'Manage Mrtscan'),'url'=>array('admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
)); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'mrtscan_id',
		'mrtscan_name',
		'mrtscan_description',
		'mrtscan_price',
		array(
            'name'=>'mrtscan_enable',
            'value'=>$model->getEnableStatus(),
        ),
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
	),
)); ?>

<?php $this->endWidget(); ?>