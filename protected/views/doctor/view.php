<?php
$this->breadcrumbs=array(
	'Doctors'=>array('index'),
	$model->doctor_id,
);

$this->menu=array(
	array('label'=>'List Doctor','url'=>array('index')),
	array('label'=>'Create Doctor','url'=>array('create')),
	array('label'=>'Update Doctor','url'=>array('update','id'=>$model->doctor_id)),
	array('label'=>'Delete Doctor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->doctor_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Doctor','url'=>array('admin')),
);
?>

<h1>View Doctor #<?php echo $model->doctor_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'doctor_id',
		'doctor_fullname',
		'doctor_phone',
		'doctor_hospital',
		'doctor_enable',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
	),
)); ?>
