<?php
$this->breadcrumbs=array(
	'Hospitals'=>array('index'),
	$model->hospital_id=>array('view','id'=>$model->hospital_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hospital','url'=>array('index')),
	array('label'=>'Create Hospital','url'=>array('create')),
	array('label'=>'View Hospital','url'=>array('view','id'=>$model->hospital_id)),
	array('label'=>'Manage Hospital','url'=>array('admin')),
);
?>

<h1>Update Hospital <?php echo $model->hospital_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>