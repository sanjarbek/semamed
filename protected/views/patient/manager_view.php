<?php
//$this->breadcrumbs=array(
//	'Patients'
//);
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Patients'),
));
//
//$this->menu=array(
//	array('label'=>'List Patient','url'=>array('index')),
//	array('label'=>'Create Patient','url'=>array('create')),
//);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('patient-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
//?>

<!---->


<?php
//echo CHtml::ajaxLink('send a message', '/message',
//    array('replace' => '#message-div'),
//    array('id' => 'send-link-'.uniqid())
//);
//?><!--  -->



<!--//#############################################################/-->

<!--<h3>Manage Patients</h3>-->

<!--<p>-->
<!--You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>-->
<!--or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
<!--</p>-->
<!---->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Manager View'),
    'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
//    'headerButtonActionsLabel' => 'My actions',
//    'headerActions' => array(
//        array(
//            'label'=>'Add new patient',
//            'url'=>'#',
//            'icon'=>'icon-plus',
//            'linkOptions'=>array(
//                'onclick'=>$create_new_patient_ajax,
//                ),
//        ),
//    ),
//    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $data = $model->getPatientCountPerDoctor(); ?>

<?php //print_r($data); ?>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
    'id'=>'ManagerViewGrid',
//    'type'=>'condensed striped bordered',
    'dataProvider'=>$data,
//    'filter'=>$model,
//    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        //this for the auto page number of cgridview
//        array(
//            'name'=>'No',
//            'type'=>'raw',
//            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
//            'filter'=>''//without filtering
//        ),
//        array(
//            'name'=>'patient_id',
//            'value'=>'CHtml::encode($data->patient_id)',
//            'sortable'=>false,
//            'htmlOptions'=>array(
//                'width'=>'10px',
//            ),
//        ),
//        array(
////            'class' => 'bootstrap.widgets.TbEditableColumn',
//            'name' => 'patient_fullname',
//            'sortable'=>false,
//        ),
//        array(
//            'name' => 'patient_phone',
//            'sortable'=>false,
//        ),
//        array(
//            'name' => 'patient_birthday',
//            'sortable'=>false,
//        ),
//        array(
//            'name' => 'patient_doctor',
//            'sortable'=>false,
//            'value'=>'CHtml::encode($data->patientDoctor->doctor_fullname)',
//            'filter'=>CHtml::listData(Doctor::model()->findAll(array('order'=>'doctor_fullname')),'doctor_id','doctor_fullname'),
//        ),
//        'created_at',
        array(
//            'name'=>'hospital_name',
            'value'=>'$data["hospital_name"]'
        ),
        array(
//            'name'=>'doctor_fullname',
            'value'=>'$data["doctor_fullname"]'
        ),
        array(
//            'name'=>'date',
            'value'=>'$data["date"]'
        ),
        array(
//            'name'=>'count',
            'value'=>'$data["count"]'
        ),


        /*
          'updated_at',
          'created_user',
          'updated_user',
          */
    ),
//
//    'chartOptions' => array(
//        'data' => array(
//            'series' => array(
//                array(
//                    'name' => 'Patient doctor',
//                    'attribute' => 'patient_doctor'
//                )
//            )
//        ),
//        'config' => array(
//            'chart'=>array(
//                'title'=>'Hello World!!!',
//                'width'=>800
//            )
//        )
//    ),

)); ?>


<?php $this->endWidget();?>
