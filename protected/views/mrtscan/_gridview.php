
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
    'id'=>'MrtscanGrid',
    'type'=>'striped bordered',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
    'ajaxUrl'=>$this->createUrl('mrtscan/admin'),
    'columns'=>array(
        //this for the auto page number of cgridview
        array(
            'name'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'filter'=>''//without filtering
        ),
        array(
            'name'=>'mrtscan_id',
            'htmlOptions'=>array(
                'width'=>'80px',
            ),
        ),
        'mrtscan_name',
        'mrtscan_description',
        'mrtscan_price',
        array(
            'name'=>'mrtscan_enable',
            'value'=>'$data->getStatusText()',
            'filter'=>Mrtscan::model()->getStatusOptions(),
        ),
//        'created_at',
        /*
        'updated_at',
        'created_user',
        'updated_user',
        */
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}{update}',
        ),
    ),

)); ?>