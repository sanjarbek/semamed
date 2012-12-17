<?php
$this->breadcrumbs=array(
    Yii::t('title','Hospitals')=>array('admin'),
    Yii::t('title','Create'),
);

//$this->menu=array(
//	array('label'=>'List Hospital','url'=>array('index')),
//	array('label'=>'Manage Hospital','url'=>array('admin')),
//);
//?>

<!--<h1>Create Hospital</h1>-->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Create hospital'),
    'headerIcon'=>'icon-plus',
    'headerButtonActionsLabel'=>Yii::t('title', 'Actions'),
    'headerActions'=>array(
        array('label'=>Yii::t('title','Manage Hospital'),'url'=>array('admin'), 'icon'=>'icon-th-list'),
    ),
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>