<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title','Doctors')=>array('admin'),
        Yii::t('title','Create'),
        ),
));

//$this->menu=array(
//	array('label'=>'List Doctor','url'=>array('index')),
//	array('label'=>'Manage Doctor','url'=>array('admin')),
//);
?>

<!--<h1>Create Doctor</h1>-->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Create doctor'),
    'headerIcon'=>'icon-plus',
//    'headerButtonActionsLabel'=>Yii::t('title', 'Actions'),
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('title','Manage Doctor'),'url'=>array('admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
));?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>