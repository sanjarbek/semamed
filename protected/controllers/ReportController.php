<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanzhar
 * Date: 1/9/13
 * Time: 4:08 AM
 * To change this template use File | Settings | File Templates.
 */
class ReportController extends Controller
{
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return CMap::mergeArray(parent::filters(),array(

        ));
    }

    public function actionIndex()
    {
        $model = new ReportForm();

        $this->render('index', array(
            'model'=>$model,
        ));
    }

    public function actionReport()
    {
        $model = new ReportForm();

        if (isset($_POST['ReportForm']))
        {
            $model->hospital = $_POST['ReportForm']['hospital'];
            $model->doctor = $_POST['ReportForm']['doctor'];
            $model->range_date = $_POST['ReportForm']['range_date'];

            $dates = explode('-', $model->range_date);
            $model->start_date = trim($dates[0]);
            $model->end_date = trim($dates[1]);

//            $model->attributes = $_POST['ReportForm'];
        }

        $this->render('report', array(
            'model'=>$model,
        ));
    }

    public function actionGridview()
    {
        $model = new ReportForm();
        if (isset($_POST['ReportForm']))
        {
            $model->attributes = $_POST['ReportForm'];
            if ($model->validate())
            {

            }
        }
    }

}
