<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t('Profile Fields')=>array('admin'),
        UserModule::t('Manage'),
    ),
));

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//    $('.search-form').toggle();
//    return false;
//});
//$('.search-form form').submit(function(){
//    $.fn.yiiGridView.update('profile-field-grid', {
//        data: $(this).serialize()
//    });
//    return false;
//});
//");

?>
<!--<h1>--><?php //echo UserModule::t('Manage Profile Fields'); ?><!--</h1>-->
<!---->
<!--<p>--><?php //echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?><!--</p>-->
<!---->
<?php //echo CHtml::link(UserModule::t('Advanced Search'),'#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
//    'model'=>$model,
//)); ?>
<!--</div><!-- search-form -->
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Manage profile fields'),
    'headerIcon' => 'icon-th-list',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create'), 'icon'=>'icon-plus'),
//                array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Manage Users'), 'url'=>array('//user/admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
    'htmlOptions' => array('class'=>'bootstrap-widget-table'),
));?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$model->search(),
    'type'=>'condensed striped bordered',
	'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
	'columns'=>array(
		'id',
		array(
			'name'=>'varname',
			'type'=>'raw',
			'value'=>'UHtml::markSearch($data,"varname")',
		),
		array(
			'name'=>'title',
			'value'=>'UserModule::t($data->title)',
		),
		array(
			'name'=>'field_type',
			'value'=>'$data->field_type',
			'filter'=>ProfileField::itemAlias("field_type"),
		),
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'ProfileField::itemAlias("required",$data->required)',
			'filter'=>ProfileField::itemAlias("required"),
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'ProfileField::itemAlias("visible",$data->visible)',
			'filter'=>ProfileField::itemAlias("visible"),
		),
		//*/
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<?php $this->endWidget();?>
