<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t('Users')=>$this->createUrl('//user/admin'),
        UserModule::t('Create'),
    ),
));

//$this->menu=array(
//    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
//    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
//    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
//);
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Create user'),
    'headerIcon' => 'icon-plus',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>UserModule::t('Manage Users'), 'url'=>array('//user/admin'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Manage Profile Fields'), 'url'=>array('profileField/admin'), 'icon'=>'icon-th-list'),
            ),
        ),
//        array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    ),
));?>
<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>
<?php $this->endWidget();?>