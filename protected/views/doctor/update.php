<?php
$this->breadcrumbs=array(
    Yii::t('title', 'Doctors')=>array('admin'),
	$model->doctor_id=>array('view','id'=>$model->doctor_id),
    Yii::t('title', 'Update'),
);

//$this->menu=array(
//	array('label'=>'List Doctor','url'=>array('index')),
//	array('label'=>'Create Doctor','url'=>array('create')),
//	array('label'=>'View Doctor','url'=>array('view','id'=>$model->doctor_id)),
//	array('label'=>'Manage Doctor','url'=>array('admin')),
//);
?>

<!--<h1>Update Doctor --><?php //echo $model->doctor_id; ?><!--</h1>-->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Update doctor'),
    'headerIcon'=>'icon-pencil',
//    'headerButtonActionsLabel'=>Yii::t('title', 'Actions'),
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('title', 'Create Doctor'),'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>Yii::t('title', 'View Doctor'),'url'=>array('view','id'=>$model->doctor_id), 'icon'=>'icon-eye-open'),
                array('label'=>Yii::t('title', 'Manage Doctor'),'url'=>array('admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
)); ?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<?php $this->endWidget(); ?>