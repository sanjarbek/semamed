
<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'DoctorGrid',
    'type'=>'condensed, striped, bordered',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
    'ajaxUrl'=>$this->createUrl('doctor/admin'),
    'columns'=>array(
        array(
            'name'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'filter'=>''//without filtering
        ),
        array(
            'name'=>'doctor_id',
            'htmlOptions'=>array(
                'width'=>'50px',
            ),
        ),
        'doctor_fullname',
        'doctor_phone',
        array(
            'name'=>'doctor_type',
            'filter'=>$this->widget('bootstrap.widgets.TbTypeahead', array(
                'model'=>$model,
                'attribute'=>'doctor_type',
                'htmlOptions'=>array(
                    'autocomplete' => 'off',
                ),
                'options'=>array(
                    'source'=> $model->getTypeOptions(),
                    'items'=>4,
                    'matcher'=>"js:function(item) {
                        return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    }",
                )
            ), true),
        ),
        array(
            'name'=>'doctor_hospital',
            'value'=>'CHtml::encode($data->doctorHospital->hospital_name)',
            'filter'=>Hospital::model()->getHospitalsList(),
        ),
        array(
            'name'=>'doctor_enable',
            'value'=>'$data->getStatusText()',
            'filter'=>Doctor::model()->getStatusOptions(),
        ),
//		'created_at',
//		'created_user',
        /*
        'updated_at',
        'created_user',
        'updated_user',
        */
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}{update}'
        ),
    ),
)); ?>