<pre>
<?php

 $datas = array();
 $model_data = $model->getPatientCountPerDoctor()->getData();

 foreach($model_data as $row)
 {
     $datas[$row['hospital_name']][] = array( (floatval($row['date'])), (int)$row['count']);
 }

 $series = array();

 foreach($datas as $key => $data)
 {
     $series[] = array(
         'name'=>$key,
         'data'=>$data,
         'pointInterval'=>24 * 3600 * 1000, // one day
         'type'=>'column',
     );
 }
//echo var_dump($datas);

// echo var_dump($datas);
    $test_data = array(
        array(1350496800000, 25),
        array(1350583200000, 29),
        array(1350928800000, 71),
    );

// echo var_dump($test_data);


 $this->widget('bootstrap.widgets.TbHighCharts', array(
     'options'=>array(
         'title' => array('text' => Yii::t('title','Hospital report')),
         'spacingRight'=>200,
//         'zoomType'=>'x',
         'xAxis' => array(
             'type'=>'datetime',
             'labels'=>array(
                 'rotation'=>-45,
                 'y'=>30,
             ),
//             'minRange' =>  7 * 24 * 3600000,
//             'minPadding' => 0.03,
         ),
         'yAxis' => array(
             'title' => array('text' => Yii::t('title', 'Count')),
             'tickInterval'=>1,
         ),
//         'series' => array(
//             array(
//                 'name' => 'Patient count',
////                'data' => array(
////                    array(1350496800000, 25.12),
////                    array(1350583200000, 29.9),
////                    array(1350928800000, 71.5),
////                ),
//                 'data' => $datas,
//                 'type'=>'line',
////                 'pointInterval' => 3600 * 1000,
//            ),
//
//        )
        'series'=>$series,
    )
 ));
?>
 </pre>