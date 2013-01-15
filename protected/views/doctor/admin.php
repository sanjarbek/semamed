<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title','Doctors')=>array('admin'),
        Yii::t('title','Manage'),
    ),
));

//$this->menu=array(
//	array('label'=>'List Doctor','url'=>array('index')),
//	array('label'=>'Create Doctor','url'=>array('create')),
//);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('doctor-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
//?>
<!---->
<!--<h1>Manage Doctors</h1>-->
<!---->
<!--<!--<p>-->
<!--<!--You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>-->
<!--<!--or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
<!--<!--</p>-->
<!--<!---->
<?php ////echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<!--<div class="search-form" style="display:none">-->
<?php ////$this->renderPartial('_search',array(
////	'model'=>$model,
////)); ?>
<!--</div><!-- search-form -->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title'=>Yii::t('title', 'Manage doctors'),
    'headerIcon'=>'icon-th-list',
//    'headerButtonActionsLabel'=>Yii::t('title', 'Actions'),
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