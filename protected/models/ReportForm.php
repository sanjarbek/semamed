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

    public function getManagerReport()
    {
        $query = "call getTest(4, '".$this->start_date."','".$this->end_date."')";

        $command = Yii::app()->db->createCommand();
        $command->setText($query);
        $rawData = $command->queryAll();

        $data = array();

        foreach($rawData as $rawRow)
        {
            if (!array_key_exists($rawRow['hospital_name'], $data))
            {
                $data[$rawRow['hospital_name']] = array(
                    'hospital_name'=>$rawRow['hospital_name'],
                    'jan'=>0,
                    'feb'=>0,
                    'mar'=>0,
                    'apr'=>0,
                    'may'=>0,
                    'jun'=>0,
                    'jul'=>0,
                    'aug'=>0,
                    'sep'=>0,
                    'oct'=>0,
                    'nov'=>0,
                    'dec'=>0,
                );
            }
            switch($rawRow['month'])
            {
                case 1:
                    $data[$rawRow['hospital_name']]['jan'] = $rawRow['count'];
                    break;
                case 2:
                    $data[$rawRow['hospital_name']]['feb'] = $rawRow['count'];
                    break;
                case 3:
                    $data[$rawRow['hospital_name']]['mar'] = $rawRow['count'];
                    break;
                case 4:
                    $data[$rawRow['hospital_name']]['apr'] = $rawRow['count'];
                    break;
                case 5:
                    $data[$rawRow['hospital_name']]['may'] = $rawRow['count'];
                    break;
                case 6:
                    $data[$rawRow['hospital_name']]['jun'] = $rawRow['count'];
                    break;
                case 7:
                    $data[$rawRow['hospital_name']]['jul'] = $rawRow['count'];
                    break;
                case 8:
                    $data[$rawRow['hospital_name']]['aug'] = $rawRow['count'];
                    break;
                case 9:
                    $data[$rawRow['hospital_name']]['sep'] = $rawRow['count'];
                    break;
                case 10:
                    $data[$rawRow['hospital_name']]['oct'] = $rawRow['count'];
                    break;
                case 11:
                    $data[$rawRow['hospital_name']]['nov'] = $rawRow['count'];
                    break;
                case 12:
                    $data[$rawRow['hospital_name']]['dec'] = $rawRow['count'];
                    break;
            }
        }

        $rows = array();
        foreach($data as $row)
        {
            $rows[] = $row;
        }

//        var_dump($rows);
//        Yii::app()->end();

        return new CArrayDataProvider($rows, array(
//            'sort'=>array(
//                'attributes'=>array(
//                    'field1', 'field2'
//                ),
//            ),
            'pagination'=>array(
                'pageSize'=>20,
            ),
            'keyField'=>'hospital_name',
        ));

//        return new CSqlDataProvider(
//            $data,
//            array(
//                'pagination'=>false,
//                'keyField' => 'hospital_name',
//            )
//        );
    }

}
