<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t('Profile Fields')=>$this->createUrl('admin'),
        $model->title=>$this->createUrl('view',array('id'=>$model->id)),
        UserModule::t('Update'),
    ),
));
?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Update Profile Field'),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>UserModule::t('View Profile Field'), 'url'=>array('view','id'=>$model->id), 'icon'=>'icon-eye-open'),
                array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    )
));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>