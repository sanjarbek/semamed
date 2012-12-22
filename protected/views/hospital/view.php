<?php
$this->breadcrumbs=array(
    Yii::t('title','Hospitals')=>array('admin'),
	$model->hospital_id,
);

//$this->menu=array(
//	array('label'=>'List Hospital','url'=>array('index')),
//	array('label'=>'Create Hospital','url'=>array('create')),
//	array('label'=>'Update Hospital','url'=>array('update','id'=>$model->hospital_id)),
//	array('label'=>'Delete Hospital','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->hospital_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Hospital','url'=>array('admin')),
//);
//?>
<!---->
<!--<h1>View Hospital #--><?php //echo $model->hospital_id; ?><!--</h1>-->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'View hospital '.$model->hospital_id),
    'headerIcon'=>'icon-eye-open',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('title','Create Hospital'),'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>Yii::t('title','Update Hospital'),'url'=>array('update','id'=>$model->hospital_id), 'icon'=>'icon-pencil'),
                array('label'=>Yii::t('title','Delete Hospital'),'url'=>'#', 'icon'=>'icon-remove','linkOptions'=>array('submit'=>array('delete','id'=>$model->hospital_id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>Yii::t('title','Manage Hospital'),'url'=>array('admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
)); ?>

<?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'id' => 'user-details',
        'data' => $model,
//        'url' => $this->createUrl('hospital/update'),  //common submit url for all editables
        'attributes'=>array(
            'hospital_id',
            'hospital_name',
            'hospital_phone',
            array(
                'name'=>'hospital_enable',
                'value'=>CHtml::encode($model->getStatusText()),
//                'editable'=>CHtml::encode($model->getStatusText()),
            ),
            array(
                'name'=>'hospital_manager_id',
                'value'=>CHtml::encode($model->manager->getFullname()),
            ),
//            array(
//                'name' => 'updated_at',
//                'editable' => array(
//                    'type' => 'date',
//                    'viewformat' => 'dd/mm/yyyy'
//                ),
//            ),
        ),
    ));
?>

<?php $this->endWidget(); ?>
