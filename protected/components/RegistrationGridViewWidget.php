<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanjar
 * Date: 11/7/12
 * Time: 10:50 AM
 * To change this template use File | Settings | File Templates.
 */
class RegistrationGridViewWidget extends CWidget
{
    public function run()
    {
        Yii::import('application.controllers.RegistrationController');

        $model=new Registration('search');

        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Registration']))
            $model->attributes=$_GET['Registration'];

//        $model->reg_patient = $this->_patient->patient_id;

        $model->reg_patient=Yii::app()->request->getParam('pid');

//
        //Yii::app()->clientscript->scriptMap['jquery.js'] = false;
        Yii::app()->clientscript->scriptMap['bootstrap.js'] = false;
        Yii::app()->clientscript->scriptMap['bootstrap-yii.js'] = false;
        Yii::app()->clientscript->scriptMap['jquery-ui-bootstrap.js'] = false;

        $controller = new RegistrationController(false);

        $controller->renderPartial('//registration/_gridview',array(
            'model'=>$model, 'patient_id'=>$model->reg_patient
        ), false, true);
    }

}
