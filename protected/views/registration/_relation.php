<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanjar
 * Date: 10/21/12
 * Time: 7:14 AM
 * To change this template use File | Settings | File Templates.
 */

// example code for the view "_relational" that returns the HTML content
echo CHtml::tag('h3',array(),'RELATIONAL DATA EXAMPLE ROW : "'.$id.'"');
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array_merge(array(array('class'=>'bootstrap.widgets.TbImageColumn')),
    array('mrtscan_name','mrtscan_discont','mrtscan_price')),
));

?>