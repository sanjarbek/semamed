<?php
$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	$model->reg_id,
);

$this->menu=array(
	array('label'=>'List Registration','url'=>array('index')),
	array('label'=>'Create Registration','url'=>array('create')),
	array('label'=>'Update Registration','url'=>array('update','id'=>$model->reg_id)),
	array('label'=>'Delete Registration','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->reg_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Registration','url'=>array('admin')),
);
?>

<h1>View Registration #<?php echo $model->reg_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'reg_id',
		'reg_patient',
		'reg_mrtscan',
		'reg_discont',
		'reg_price',
		'reg_report_status',
		'reg_report_text',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
	),
)); ?>
