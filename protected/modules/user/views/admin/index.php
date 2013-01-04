<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t('Users'),
    ),
));

$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>

<?php
//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//    $('.search-form').toggle();
//    return false;
//});
//$('.search-form form').submit(function(){
//    $.fn.yiiGridView.update('user-grid', {
//        data: $(this).serialize()
//    });
//    return false;
//});
//");
//?>

<!--<h1>--><?php //echo UserModule::t("Manage Users"); ?><!--</h1>-->
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
    'title' => Yii::t('title', 'Manage users'),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
        //        array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create'), 'icon'=>'icon-music'),
        //        array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
        //        array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
                array('label'=>UserModule::t('Create User'), 'url'=>array('create'), 'icon'=>'icon-plus'),
        //        array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
                array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'), 'icon'=>'icon-th-list'),
        //        array('label'=>UserModule::t('List User'), 'url'=>array('//user')),
            ),
        ),
    ),
    'htmlOptions' => array('class'=>'bootstrap-widget-table'),
));?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
    'type'=>'condensed striped',
	'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
//            'filter'=>false,
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		'create_at',
		'lastvisit_at',
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>
