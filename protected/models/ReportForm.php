<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanzhar
 * Date: 1/8/13
 * Time: 4:38 PM
 * To change this template use File | Settings | File Templates.
 */
class ReportForm extends CFormModel
{
    public $hospital;
    public $doctor;
    public $range_date;
    public $start_date;
    public $end_date;

    public function rules()
    {
        return array(
            array('hospital, doctor', 'numerical'),
            array('doctor', 'exist',
                'allowEmpty' => false,
                'attributeName' => 'doctor_id',
                'className' => 'Doctor',
                'message' => 'The specified doctor does not exist.',
                'skipOnError'=>true
            ),
            array('hospital', 'exist',
                'allowEmpty' => false,
                'attributeName' => 'hospital_id',
                'className' => 'Hospital',
                'message' => 'The specified hospital does not exist.',
                'skipOnError'=>true
            ),
//            array('range_date', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'hospital'=>Yii::t('column', 'Hospital'),
            'doctor'=>Yii::t('column', 'Doctor'),
            'range_date'=>Yii::t('column', 'Range date'),
        );
    }

}
