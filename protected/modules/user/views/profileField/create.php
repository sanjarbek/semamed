<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t('Profile Fields')=>$this->createUrl('admin'),
        UserModule::t('Create'),
    ),
));
?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Your profile'),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin'),  'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'),  'icon'=>'icon-th-list'),
            ),
        ),
    ),
)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>