<?php
$this->breadcrumbs=array(
	'Hospitals'=>array('index'),
	$model->hospital_id,
);

$this->menu=array(
	array('label'=>'List Hospital','url'=>array('index')),
	array('label'=>'Create Hospital','url'=>array('create')),
	array('label'=>'Update Hospital','url'=>array('update','id'=>$model->hospital_id)),
	array('label'=>'Delete Hospital','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->hospital_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hospital','url'=>array('admin')),
);
?>

<h1>View Hospital #<?php echo $model->hospital_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'hospital_id',
		'hospital_name',
		'hospital_phone',
		'hospital_enable',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
	),
)); ?>
