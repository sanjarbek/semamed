<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title','Hospitals')=>array('admin'),
        $model->hospital_id=>array('view','id'=>$model->hospital_id),
        Yii::t('title','Update'),
    ),
));

//
//$this->menu=array(
//	array('label'=>'List Hospital','url'=>array('index')),
//	array('label'=>'Create Hospital','url'=>array('create')),
//	array('label'=>'View Hospital','url'=>array('view','id'=>$model->hospital_id)),
//	array('label'=>'Manage Hospital','url'=>array('admin')),
//);
//?>
<!---->
<!--<h1>Update Hospital --><?php //echo $model->hospital_id; ?><!--</h1>-->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Update hospital '. $model->hospital_id),
    'headerIcon'=>'icon-pencil',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>Yii::t('title','Create Hospital'),'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>Yii::t('title','View Hospital'),'url'=>array('view','id'=>$model->hospital_id), 'icon'=>'icon-eye-open'),
                array('label'=>Yii::t('title','Manage Hospital'),'url'=>array('admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
)); ?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<?php $this->endWidget(); ?>