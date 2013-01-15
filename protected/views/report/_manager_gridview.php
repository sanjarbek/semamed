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
    $data = $model->getManagerReport();
//    var_dump($data);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'ManagerReportGrid',
    'type'=>'condensed striped',
    'dataProvider'=>$data,
//    'filter'=>$model,
    'template'=>'{items}{pager}',
    'columns'=>array(
        array(
            'header'=>'Hospital Name',
            'name'=>'hospital_name',
            'value'=>'$data["hospital_name"]',
        ),
        array(
            'header'=>'Year',
            'name'=>'year',
            'value'=>'$data["year"]',
        ),
        array(
            'header'=>'Month',
            'name'=>'month',
            'value'=>'$data["month"]',
        ),
        array(
            'header'=>'Day',
            'name'=>'day',
            'value'=>'$data["day"]',
        ),
        array(
            'header'=>'Count',
            'name'=>'count',
            'value'=>'$data["count"]',
        ),
    ),
));