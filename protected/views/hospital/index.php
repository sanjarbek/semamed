<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title','Hospitals'),
    ),
));

$this->menu=array(
	array('label'=>'Create Hospital','url'=>array('create')),
	array('label'=>'Manage Hospital','url'=>array('admin')),
);
?>

<h1>Hospitals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
