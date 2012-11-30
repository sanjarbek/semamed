<?php
$gridColumns = array(
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
        'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'patient_fullname',
        'sortable'=>false,
        'editable' => array(
            'url' => $this->createUrl('patient/editable'),
            'placement' => 'right',
            'inputclass' => 'span3',
        )
    ),
    array(
        'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'patient_phone',
        'sortable'=>false,
//            'htmlOptions'=>array('style'=>'width: 100px'),
        'editable' => array(
            'url' => $this->createUrl('patient/editable'),
            'placement' => 'left',
            'inputclass' => 'span3',
        ),
    ),
    array(
        'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'patient_birthday',
        'sortable'=>false,
        'editable' => array(
            'url' => $this->createUrl('patient/editable'),
            'type'=>'date',
            'format'=>'yyyy-mm-dd',
            'viewformat'  => 'dd.mm.yyyy',
        )
    ),
    array(
        'class' => 'bootstrap.widgets.TbEditableColumn',
        'name' => 'patient_doctor',
        'sortable'=>false,
        'editable' => array(
            'url' => $this->createUrl('patient/editable'),
            'type'=>'select',
            'source' => CHtml::listData(Doctor::model()->findAll(array('order'=>'doctor_fullname')),'doctor_id','doctor_fullname'),
        ),
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
        'template'=>'{view} {update} {delete}',
        'buttons'=> array(
            'update' => array
            (
                'options'=>array('title'=>'Add ...'),
                'url'=>'$this->grid->controller->createUrl("/registration/admin",
                        array("pid"=>$data->patient_id))',
                'click'=>"function( e ){
                        e.preventDefault();
//                        $( '#dialogPatientRegistration' ).children( ':eq(0)' ).empty(); // Stop auto POST
                        //dialogPatientRegistration( $( this ).attr( 'href' ));
                        patientRegistrations($( this ).attr( 'href' ));
                        $('#dialogPatientRegistration').dialog( 'open' ); }",
            ),
        ),

    ),
);


$this->widget('bootstrap.widgets.TbExtendedGridView',array(
    'id'=>'ManagePatientGrid',
    'type'=>'condensed striped bordered',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>'{pager}{items}{summary}',
    'columns'=> array_merge(array(
        array(
            'class'=>'bootstrap.widgets.TbRelationalColumn',
            'name' => 'R',
            'filter'=> false,
            'url' => $this->createUrl('registration/relation'),
            'value'=> '">>"',
//            'afterAjaxUpdate' => 'js:function(tr,rowid,data){
//                bootbox.alert("I have afterAjax events too! This will only happen once for row with id: "+rowid);
//                }',
        )
    ), $gridColumns),

//    'columns'=> array($gridColumns),
)); ?>
