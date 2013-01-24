<?php
$this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'RegistrationGrid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
    'ajaxUrl' => $this->createUrl('registration/admin', array('pid'=>$patient->patient_id)),
//	'filter'=>false,
    'template' => "{pager}{items}\n{extendedSummary}",
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
//            'value'=>'CHtml::encode($data->reg_id)',
            'sortable'=>true,
            'filter'=>false,
            'htmlOptions'=>array(
                'width'=>'110px',
            ),
        ),
        array(
            'name'=>'reg_patient',
            'value'=>'CHtml::encode($data->regPatient->patient_fullname)',
            'sortable'=>false,
            'filter'=>false,
        ),
        array(
            'name'=>'reg_mrtscan',
            'value'=>'CHtml::encode($data->regMrtscan->mrtscan_name)',
            'sortable'=>false,
            'filter'=>false,
            'footer'=>'<b><i>'.Yii::t('text','Total').'</i></b>'
        ),
        array(
            'name'=>'reg_price',
            'sortable'=>false,
            'filter'=>false,
            'class'=>'bootstrap.widgets.TbTotalSumColumn',
        ),
        array(
            'name'=>'reg_discont',
            'sortable'=>false,
            'filter'=>false,
            'class'=>'bootstrap.widgets.TbTotalSumColumn',
        ),
        array(
            'name'=>'reg_total_price',
//            'value'=>'CHtml::encode($data->reg_total_price)',
            'sortable'=>false,
            'filter'=>false,
            'class'=>'bootstrap.widgets.TbTotalSumColumn',
        ),
//		'reg_report_status',
		/*
		'reg_report_text',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>Yii::t('text','Action'),
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'visible'=>'$data->regPatient->isStatusChangeable()',
                ),
            ),
		),
	),
    'extendedSummary' => array(
//        'title' => Yii::t('text','Total service price'),
        'columns' => array(
            'reg_total_price' => array('label'=>Yii::t('text','<b>Result price</b>'),
                'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px;margin-top: 10px;margin-right:10px'
    ),
)); ?>
