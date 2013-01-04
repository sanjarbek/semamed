<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        (UserModule::t('Users'))=>$this->createUrl('//user/admin'),
        $model->username=>$this->createUrl('view',array('id'=>$model->id)),
        (UserModule::t('Update')),
    ),
));

$this->menu=array(
);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Update user'),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>UserModule::t('Create User'), 'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>UserModule::t('View User'), 'url'=>array('view','id'=>$model->id), 'icon'=>'icon-eye-open'),
                array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'), 'icon'=>'icon-th-list'),
//                array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
            ),
        ),
    ),
));?>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>

<?php $this->endWidget() ?>