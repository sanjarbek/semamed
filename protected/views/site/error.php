<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->pageCaption = 'Error';
$this->pageDescription = $code;
$this->breadcrumbs=array(
	'Error',
);
?>
<?php
//$this->widget('bootstrap.widgets.TbAlert', array(
//    'block'=>true, // display a larger alert block?
//    'fade'=>true, // use transitions?
//    'closeText'=>'false', // close link text - if set to false, no close link is displayed
//    'content'=>CHtml::encode($message),
//    'alerts'=>array( // configurations per alert type
//        'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
//    ),
//));
?>


<?php $this->widget('BAlert',array(
	'type'=>'error',
    'content'=>CHtml::encode($message),
	'isBlock'=>true,
	'canClose'=>false,
)); ?>