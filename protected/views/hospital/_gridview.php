<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'HospitalGrid',
    'dataProvider'=>$model->search(),
    'type'=>'condensed, striped, bordered',
    'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
    'ajaxUrl'=>$this->createUrl('hospital/admin'),
    'columns'=>array(
        'hospital_id',
        'hospital_name',
        'hospital_phone',
        array(
            'name'=>'hospital_enable',
            'value'=>'CHtml::encode(($data->getStatusText()))',
            'filter'=>array(
                '1'=>'true',
                '0'=>'false',
            ),
        ),
        array(
            'name'=>'hospital_manager_id',
            'value'=>'CHtml::encode($data->manager->getFullname() )',
            'filter'=>User::model()->getManagersListForFilter(),
        ),

        'created_at',
        'updated_at',
        /*
        'created_user',
        'updated_user',
        */
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>