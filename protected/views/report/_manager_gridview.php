<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanzhar
 * Date: 1/15/13
 * Time: 2:45 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
    $array_data_provider = $model->getManagerReport();
//    var_dump($data);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'ManagerReportGrid',
    'type'=>'condensed striped',
    'dataProvider'=>$array_data_provider,
//    'filter'=>$model,
    'template'=>'{items}{pager}',
    'columns'=>array(
//        array(
//            'header'=>'Hospital Name',
//            'name'=>'hospital_name',
//            'value'=>'$data["hospital_name"]',
//        ),
//        array(
//            'header'=>'Year',
//            'name'=>'year',
//            'value'=>'$data["year"]',
//        ),
//        array(
//            'header'=>'Month',
//            'name'=>'month',
//            'value'=>'$data["month"]',
//        ),
//        array(
//            'header'=>'Day',
//            'name'=>'day',
//            'value'=>'$data["day"]',
//        ),
//        array(
//            'header'=>'Count',
//            'name'=>'count',
//            'value'=>'$data["count"]',
//        ),
        array(
            'name'=>'hospital_name',
            'header'=>'Hospital name',
        ),
        array(
            'name'=>'jan',
//            'header'=>'January',
            'header'=>'1',
        ),
        array(
            'name'=>'feb',
//            'header'=>'February',
            'header'=>'2',
        ),
        array(
            'name'=>'mar',
//            'header'=>'Marh',
            'header'=>'3',
        ),
        array(
            'name'=>'apr',
//            'header'=>'April',
            'header'=>'4',
        ),
        array(
            'name'=>'may',
//            'header'=>'May',
            'header'=>'5',
        ),
        array(
            'name'=>'jun',
//            'header'=>'June',
            'header'=>'6',
        ),
        array(
            'name'=>'jul',
//            'header'=>'July',
            'header'=>'7',
        ),
        array(
            'name'=>'aug',
//            'header'=>'August',
            'header'=>'8',
        ),
        array(
            'name'=>'sep',
//            'header'=>'September',
            'header'=>'9',
        ),
        array(
            'name'=>'oct',
//            'header'=>'October',
            'header'=>'10',
        ),
        array(
            'name'=>'nov',
//            'header'=>'November',
            'header'=>'11',
        ),
        array(
            'name'=>'dec',
//            'header'=>'December',
            'header'=>'12'
        ),
    ),
));