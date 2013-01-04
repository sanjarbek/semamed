<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        UserModule::t('Users')=>$this->createUrl('//user/admin'),
        $model->username,
    ),
));

?>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'View details of user '.$model->username),
    'headerIcon' => 'icon-user',
    'headerButtons'=>array(
        array(
            'class'=>'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
//                array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
                array('label'=>UserModule::t('Create User'), 'url'=>array('create'), 'icon'=>'icon-plus'),
                array('label'=>UserModule::t('Update User'), 'url'=>array('update','id'=>$model->id), 'icon'=>'icon-pencil'),
                array('label'=>UserModule::t('Delete User'), 'url'=>'#','icon'=>'icon-delete', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
                array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin'), 'icon'=>'icon-th-list'),
                array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin'), 'icon'=>'icon-th-list'),
            ),
        ),
    ),
));?>
<?php
 
	$attributes = array(
		'id',
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
		'password',
		'email',
		'activkey',
		'create_at',
		'lastvisit_at',
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>

<?php $this->endWidget(); ?>
