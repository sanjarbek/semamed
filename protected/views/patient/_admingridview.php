<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
    'id'=>'AdminPatientGrid',
    'type'=>'condensed striped',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'ajaxUrl'=>$this->createUrl('patient/admin'),
    'htmlOptions'=>array(
//        'class'=>'pagination-small',
    ),
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        //this for the auto page number of cgridview
        array(
            'name'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'filter'=>''//without filtering
        ),
        array(
            'name'=>'patient_id',
            'value'=>'CHtml::encode($data->patient_id)',
            'sortable'=>false,
            'htmlOptions'=>array(
                'width'=>'10px',
            ),
        ),
        array(
//            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_fullname',
            'sortable'=>false,
//            'editable' => array(
//                'url' => $this->createUrl('patient/editable'),
//                'placement' => 'right',
//                'inputclass' => 'span3',
//            ),
        ),
        array(
//            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_phone',
            'sortable'=>false,
//            'htmlOptions'=>array('style'=>'width: 100px'),
//            'editable' => array(
//                'url' => $this->createUrl('patient/editable'),
//                'placement' => 'left',
//                'inputclass' => 'span3',
//            ),
        ),
        array(
//            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_birthday',
            'sortable'=>false,
//            'filter'=>$this->widget('bootstrap.widgets.TbDatePicker', array(
//                'model'=>$model,
//                'attribute'=>'patient_birthday',
//                'options'=>array(
//                    'format'=>'mm/dd/yyyy',
//                ),
//                ),
//                true
//            ),
//            'editable' => array(
//                'url' => $this->createUrl('patient/editable'),
//                'type'=>'date',
//                'format'=>'yyyy-mm-dd',
//                'viewformat'  => 'dd.mm.yyyy',
//            )
        ),
        array(
            'name'=>'patient_sex',
            'value'=> '$data->getSexText()',
//            'filter'=>"[{text: '0', value: 'Male'}, {text: '1', value: 'Female'}]",
            'filter'=>$model->getSexOptions(),
            'sortable'=>false,
        ),
        array(
            'name'=>'patient_status',
            'value'=> '$data->getStatusText()',
//            'filter'=>"[{text: '0', value: 'Male'}, {text: '1', value: 'Female'}]",
            'filter'=>$model->getStatusOptions(),
            'sortable'=>false,
        ),
        array(
//            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_doctor',
            'sortable'=>false,
//            'editable' => array(
//                'url' => $this->createUrl('patient/editable'),
//                'type'=>'select',
//                'source' => CHtml::listData(Doctor::model()->findAll(array('order'=>'doctor_fullname')),'doctor_id','doctor_fullname'),
//            ),
            'value'=>'$data->patientDoctor->doctor_fullname',
            'filter'=>CHtml::listData(Doctor::model()->findAll(array('order'=>'doctor_fullname')),'doctor_id','doctor_fullname'),
        ),
        'created_at',

        /*
          'updated_at',
          'created_user',
          'updated_user',
          */
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
//            'header'=>Yii::t('text','Action'),
            'template'=>'',
            'buttons'=> array(
                'view' => array(
                    'options'=>array(
                        'title'=>Yii::t('title', 'Detailed view'),
                    ),
                    'url'=>  '$this->grid->controller->createUrl("/registration/index",
                        array("pid"=>$data->patient_id))',
//                    'visible'=>'$data->'
                ),
//                'update' => array
//                (
//                    'options'=>array('title'=>'Add ...'),
//                    'id'=>'send-link-'.uniqid(),
//                    'url'=>'$this->grid->controller->createUrl("/registration/admin",
//                        array("pid"=>$data->patient_id))',
//                    'click'=>"function( e ){
//                        e.preventDefault();
////                        $( '#dialogPatientRegistration' ).children( ':eq(0)' ).empty(); // Stop auto POST
//                        //dialogPatientRegistration( $( this ).attr( 'href' ));
//                        patientRegistrations($( this ).attr( 'href' ));
//                        $('#dialogPatientRegistration').dialog( 'open' ); }",
//                ),
            ),

        ),
    ),
)); ?>
