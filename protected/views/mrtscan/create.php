<?php
$this->breadcrumbs=array(
	'Mrtscans'=>array('admin'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List Mrtscan','url'=>array('index')),
//	array('label'=>'Manage Mrtscan','url'=>array('admin')),
//);

?>

<!--<h1>Create Mrtscan</h1>-->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Create new MRT scan'),
    'headerIcon'=>'icon-plus',
    'headerButtonActionsLabel' => Yii::t('title', 'Actions'),
    'headerActions'=>array(
        array('label'=>'Manage Mrtscan','url'=>array('admin'), 'icon'=>'icon-th-list'),
    ),
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>