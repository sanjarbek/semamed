<pre>
<?php
 $this->widget('bootstrap.widgets.TbHighCharts', array(
     'options'=>array(
        'title' => array('text' => 'Fruit Consumption'),
        'xAxis' => array(
           'type'=>'datetime',
        ),
        'yAxis' => array(
           'title' => array('text' => 'Fruit eaten')
        ),
        'series' => array(
           array('name' => 'Jane', 'data' => array(
               array(date('2010-1-1'),1),
               array(date('2010-1-2'),4),
//               array(gmdate('Y,m,d', strtotime('2010-1-3')),6)
           )),
        )
    )
 ));
?>
 </pre>