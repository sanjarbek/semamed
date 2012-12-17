
<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'DoctorGrid',
    'type'=>'condensed, striped, bordered',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        'doctor_id',
        'doctor_fullname',
        'doctor_phone',
        array(
            'name'=>'doctor_hospital',
            'value'=>'CHtml::encode($data->doctorHospital->hospital_name)',
            'filter'=>Hospital::hospitalsList(),
        ),
        array(
            'name'=>'doctor_enable',
            'value'=>'CHtml::encode($data->getStatusText())',
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
        ),
    ),
)); ?>