<?php
$this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'AdminRegistrationGrid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
    'ajaxUrl' => $this->createUrl('registration/admin'),
	'filter'=>$model,
    'template' => "{items}{pager}",
	'columns'=>array(
        //this for the auto page number of cgridview
        array(
            'name'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'filter'=>false//without filtering
        ),
        array(
            'name'=>'reg_id',
            'sortable'=>true,
            'filter'=>false,
            'htmlOptions'=>array(
                'width'=>'50px',
            ),
        ),
        array(
            'name'=>'reg_patient',
            'value'=>'CHtml::encode($data->regPatient->patient_fullname)',
        ),
        array(
            'name'=>'reg_mrtscan',
            'value'=>'CHtml::encode($data->regMrtscan->mrtscan_name)',
            'footer'=>'<b><i>'.Yii::t('text','Total').'</i></b>'
        ),
        array(
            'name'=>'reg_price',
            'class'=>'bootstrap.widgets.TbTotalSumColumn',
        ),
        array(
            'name'=>'reg_discont',
            'class'=>'bootstrap.widgets.TbTotalSumColumn',
        ),
        array(
            'name'=>'reg_total_price',
            'class'=>'bootstrap.widgets.TbTotalSumColumn',
        ),
//		'reg_report_status',

//		'reg_report_text',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
//		array(
//			'class'=>'bootstrap.widgets.TbButtonColumn',
//            'header'=>Yii::t('text','Action'),
//            'template'=>'{delete}',
//            'buttons'=>array(
//                'delete'=>array(
//                    'visible'=>'$data->regPatient->isStatusChangeable()',
//                ),
//            ),
//		),
	),
//    'extendedSummary' => array(
////        'title' => Yii::t('text','Total service price'),
//        'columns' => array(
//            'reg_total_price' => array('label'=>Yii::t('text','<b>Result price</b>'),
//                'class'=>'TbSumOperation')
//        )
//    ),
//    'extendedSummaryOptions' => array(
//        'class' => 'well pull-right',
//        'style' => 'width:300px;margin-top: 10px;margin-right:10px'
//    ),
)); ?>
