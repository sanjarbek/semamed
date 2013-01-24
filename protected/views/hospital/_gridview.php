<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'HospitalGrid',
    'dataProvider'=>$model->search(),
    'type'=>'condensed, striped, bordered',
    'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
    'ajaxUrl'=>$this->createUrl('hospital/admin'),
    'columns'=>array(
        array(
            'name'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'filter'=>''//without filtering
        ),
        array(
            'name'=>'hospital_id',
            'htmlOptions'=>array(
                'width'=>'60px',
            ),
        ),
        'hospital_name',
        'hospital_phone',
        array(
            'name'=>'hospital_manager_id',
            'value'=>'CHtml::encode($data->manager->getFullname() )',
            'filter'=>User::model()->getManagersListForFilter(),
        ),
        array(
            'name'=>'hospital_enable',
            'value'=>'$data->getStatusText()',
            'filter'=>Hospital::model()->getStatusOptions(),
        ),
//        'created_at',
//        'updated_at',
        /*
        'created_user',
        'updated_user',
        */
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}{update}',
        ),
    ),
)); ?>