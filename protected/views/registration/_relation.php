<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanjar
 * Date: 10/21/12
 * Time: 7:14 AM
 * To change this template use File | Settings | File Templates.
 */

//echo CHtml::tag('h2',array(),"Fuck you!!!");
// example code for the view "_relational" that returns the HTML content
//echo CHtml::tag('h5',array(),'RELATIONAL DATA EXAMPLE ROW : "'.$id.'"');
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id'=>'RelationGridView'.$id,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
//    'template' => "{items}",
    'template' => "{items}\n{extendedSummary}",
    'columns' => $gridColumns,
    'extendedSummary' => array(
        'title' => Yii::t('text','Total service price'),
        'columns' => array(
            'reg_total_price' => array('label'=>Yii::t('text','Total price'),
                'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
));

?>