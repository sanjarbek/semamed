<?php
$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->patient_id,
);

$this->menu=array(
	array('label'=>'List Patient','url'=>array('index')),
	array('label'=>'Create Patient','url'=>array('create')),
	array('label'=>'Update Patient','url'=>array('update','id'=>$model->patient_id)),
	array('label'=>'Delete Patient','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->patient_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Patient','url'=>array('admin')),
);
?>

<h1>View Patient #<?php echo $model->patient_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'patient_id',
		'patient_fullname',
		'patient_phone',
        'patient_birthday',
		'patient_doctor',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
	),
)); ?>
