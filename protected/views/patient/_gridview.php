<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'PatientGrid',
    'type'=>'condensed striped bordered',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
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
//            'editable' => array(
//                'url' => $this->createUrl('patient/editable'),
//                'type'=>'date',
//                'format'=>'yyyy-mm-dd',
//                'viewformat'  => 'dd.mm.yyyy',
//            )
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
            'value'=>'CHtml::encode($data->patientDoctor->doctor_fullname)',
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
            'header'=>Yii::t('text','Action'),
            'template'=>'{view}{delete}',
            'buttons'=> array(
                'view' => array(
                    'url'=>  '$this->grid->controller->createUrl("/registration/adminmanage",
                        array("pid"=>$data->patient_id))',
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
