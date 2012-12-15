<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('//user/admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);
$this->menu=array(
    array('label'=>UserModule::t('Create User'), 'url'=>array('create')),
    array('label'=>UserModule::t('View User'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>

<!--<h1>--><?php //echo  UserModule::t('Update User')." ".$model->id; ?><!--</h1>-->

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Manage users'),
    'headerIcon' => 'icon-user',
));?>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>

<?php $this->endWidget() ?>