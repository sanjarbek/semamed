<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title','Mrtscans'),
    ),
));

$this->menu=array(
	array('label'=>'Create Mrtscan','url'=>array('create')),
	array('label'=>'Manage Mrtscan','url'=>array('admin')),
);
?>

<h1>Mrtscans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
