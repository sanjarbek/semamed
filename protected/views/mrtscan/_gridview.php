
<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
    'id'=>'MrtscanGrid',
    'type'=>'striped bordered',
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
        'mrtscan_id',
        'mrtscan_name',
        'mrtscan_description',
        'mrtscan_price',
        array(
            'name'=>'mrtscan_enable',
            'value'=>'CHtml::encode($data->getEnableStatus())',
            'filter'=>array(
                0=>Yii::t('status', 'false'),
                1=>Yii::t('status', 'true'),
            ),
        ),
        'created_at',
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