<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t('Profile Fields')=>array('admin'),
        UserModule::t($model->title),
    ),
));

$this->menu=array(
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'View Profile Field'),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>UserModule::t('Update Profile Field'), 'url'=>array('update','id'=>$model->id), 'icon'=>'icon-pencil'),
                array('label'=>UserModule::t('Delete Profile Field'), 'url'=>'#','icon'=>'icon-remove', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
//                array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
)); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'varname',
		'title',
		'field_type',
		'field_size',
		'field_size_min',
		'required',
		'match',
		'range',
		'error_message',
		'other_validator',
		'widget',
		'widgetparams',
		'default',
		'position',
		'visible',
	),
)); ?>

<?php $this->endWidget(); ?>