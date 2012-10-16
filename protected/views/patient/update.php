<?php
$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->patient_id=>array('view','id'=>$model->patient_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Patient','url'=>array('index')),
	array('label'=>'Create Patient','url'=>array('create')),
	array('label'=>'View Patient','url'=>array('view','id'=>$model->patient_id)),
	array('label'=>'Manage Patient','url'=>array('admin')),
);
?>

<h1>Update Patient <?php echo $model->patient_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>