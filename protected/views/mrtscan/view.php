<?php
$this->breadcrumbs=array(
	'Mrtscans'=>array('index'),
	$model->mrtscan_id,
);

$this->menu=array(
	array('label'=>'List Mrtscan','url'=>array('index')),
	array('label'=>'Create Mrtscan','url'=>array('create')),
	array('label'=>'Update Mrtscan','url'=>array('update','id'=>$model->mrtscan_id)),
	array('label'=>'Delete Mrtscan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->mrtscan_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mrtscan','url'=>array('admin')),
);
?>

<h1>View Mrtscan #<?php echo $model->mrtscan_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'mrtscan_id',
		'mrtscan_name',
		'mrtscan_description',
		'mrtscan_price',
		'mrtscan_enable',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
	),
)); ?>
