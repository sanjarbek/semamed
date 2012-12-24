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

<?php
    //print_r($data);
//    $current_date = date('Y-m-d');
//    $from_date = data('Y-m-d', strtotime("-4 months"));

?>

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
    'id'=>'ManagerViewGrid',
    'type'=>'condensed striped bordered',
    'dataProvider'=>$data,
//    'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        array(
            'name'=>Yii::t('column', 'Hospital name'),
            'value'=>'$data["hospital_name"]',
        ),
        array(
            'name'=>Yii::t('column', 'Doctor name'),
            'value'=>'$data["doctor_fullname"]',
        ),
//        array(
//            'name'=>Yii::t('column', 'Date'),
//            'value'=>'$data["date"]',
//        ),
//        array(
//            'name'=>Yii::t('column', 'Count'),
//            'value'=>'$data["count"]',
//        ),
        array(
            'name'=>Yii::t('column', 'Count'),
            'value'=>'$data["count"]',
        ),


        /*
          'updated_at',
          'created_user',
          'updated_user',
          */
    ),

    'chartOptions' => array(
        'data' => array(
            'series' => array(
                array(
                    'name' => 'Patient count',
                    'attribute' => 'count',
                ),
//                array(
//                    'name' => 'Date',
//                    'attribute' => 'date',
//                )
            ),
        ),
        'config' => array(
            'chart'=>array(
                'width'=>800,
                'type'=>'line',
            ),
            'title'=>array(
                'text'=>'Hello World',

            ),
//            'xAxis'=>array(
//                'title'=>array(
//                    'text'=>'Date'
//                ),
////                'categories'=>'date',
//                'minPadding'=>0.05,
////                'labels'=>array(
////                    'rotation'=>90,
////                ),
////                'min'=>0,
////                'max'=>31,
////                'tickInterval'=>1,
//                'type'=>'datetime',
////                'dateTimeLabelFormats'=>array(
////                    'day' => '%d-%m'
////                ),
////                'tickInterval'=>24 * 3600 * 1000,
////                'min'=>strtotime("2012-10-01 00:00:01 UTC"),
////                'max'=>strtotime("2012-10-12 11:59:59 UTC"),
//            ),
            'yAxis'=>array(
                'title'=>array(
                    'text'=>'Count'
                ),
                'tickInterval'=>1,
            ),
        )
    ),

)); ?>


<?php $this->endWidget();?>
