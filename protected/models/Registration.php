<?php

/**
 * This is the model class for table "registrations".
 *
 * The followings are the available columns in table 'registrations':
 * @property integer $reg_id
 * @property integer $reg_patient
 * @property integer $reg_mrtscan
 * @property integer $reg_price
 * @property integer $reg_discont
 * @property integer $reg_total_price
 * @property integer $reg_report_status
 * @property string $reg_report_text
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_user
 * @property integer $updated_user
 *
 * The followings are the available model relations:
 * @property Mrtscans $regMrtscan
 * @property Patients $regPatient
 */
class Registration extends MasterModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Registration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registrations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reg_patient, reg_mrtscan, reg_discont, reg_total_price, reg_price, reg_report_status, created_at, updated_at, created_user, updated_user', 'required'),
			array('reg_patient, reg_mrtscan, reg_discont, reg_total_price, reg_price, reg_report_status', 'numerical', 'integerOnly'=>true),
			array('reg_price', 'length', 'max'=>10),
			array('reg_report_text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reg_id, reg_patient, reg_mrtscan, reg_discont, reg_price, reg_report_status, reg_report_text, created_at, updated_at, created_user, updated_user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'regMrtscan' => array(self::BELONGS_TO, 'Mrtscan', 'reg_mrtscan'),
			'regPatient' => array(self::BELONGS_TO, 'Patient', 'reg_patient'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reg_id' => Yii::t('column', 'Registration ID'),
			'reg_patient' => Yii::t('column', 'Patient'),
			'reg_mrtscan' => Yii::t('column', 'MRT Scan'),
			'reg_discont' => Yii::t('column', 'Discont'),
			'reg_price' => Yii::t('column', 'MRT Price'),
            'reg_total_price' => Yii::t('column', 'Total Price'),
			'reg_report_status' => Yii::t('column', 'Report Status'),
			'reg_report_text' => Yii::t('column', 'Report Text'),
			'created_at' => Yii::t('column', 'Created At'),
			'updated_at' => Yii::t('column', 'Updated At'),
			'created_user' => Yii::t('column', 'Created User'),
			'updated_user' => Yii::t('column', 'Updated User'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('reg_id',$this->reg_id);
		$criteria->compare('reg_patient',$this->reg_patient);
		$criteria->compare('reg_mrtscan',$this->reg_mrtscan);
		$criteria->compare('reg_discont',$this->reg_discont);
		$criteria->compare('reg_price',$this->reg_price,true);
		$criteria->compare('reg_report_status',$this->reg_report_status);
		$criteria->compare('reg_report_text',$this->reg_report_text,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_user',$this->created_user);
		$criteria->compare('updated_user',$this->updated_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'created_at desc',
            ),
		));
	}

    public function report()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('reg_id',$this->reg_id);
        $criteria->compare('reg_patient',$this->reg_patient);
        $criteria->compare('reg_mrtscan',$this->reg_mrtscan);
        $criteria->compare('reg_discont',$this->reg_discont);
        $criteria->compare('reg_price',$this->reg_price,true);
        $criteria->compare('reg_report_status',$this->reg_report_status);
        $criteria->compare('reg_report_text',$this->reg_report_text,true);
        $criteria->compare('created_at',$this->created_at,true);
        $criteria->compare('updated_at',$this->updated_at,true);
        $criteria->compare('created_user',$this->created_user);
        $criteria->compare('updated_user',$this->updated_user);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'created_at desc',
            ),
            'pagination'=>array(
                'pageSize'=>1000000,
            ),
        ));
    }

    public function getDoctorReport()
    {
        $str = 'select * from doctor_report';

        return new CSqlDataProvider(
            $str,
            array(
                'pagination'=>array(
                    'pageSize'=>1000000,
                )
            )
        );

//        $criteria = new CDbCriteria;
//        $criteria->select = array(
//            '`d`.`doctor_fullname`',
//            '`d`.`doctor_phone`',
//            'date(`t`.`created_at`) as "created_at"',
//            'count(*) as "quantity"',
//            'sum(t.reg_price) as "price"');
//        $criteria->join = 'LEFT JOIN `patients` AS `p` ON t.reg_patient=p.patient_id
//LEFT JOIN doctors d ON p.patient_doctor=d.doctor_id';
//        $criteria->group = 'd.doctor_fullname, d.doctor_phone, date(t.created_at)';
//
//        return new CActiveDataProvider($this, array(
//            'criteria'=>$criteria,
////            'sort'=>array(
////                'defaultOrder'=>'created_at desc',
////            ),
//            'pagination'=>array(
//                'pageSize'=>1000000,
//            ),
//        ));
    }

    public function getGridDataProvider($id)
    {
        $criteria=new CDbCriteria;

//        $criteria->compare('reg_id',$this->reg_id);
        $criteria->compare('reg_patient', $id);
//        $criteria->compare('reg_mrtscan',$this->reg_mrtscan);
//        $criteria->compare('reg_discont',$this->reg_discont);
//        $criteria->compare('reg_price',$this->reg_price,true);
//        $criteria->compare('reg_report_status',$this->reg_report_status);
//        $criteria->compare('reg_report_text',$this->reg_report_text,true);
//        $criteria->compare('created_at',$this->created_at,true);
//        $criteria->compare('updated_at',$this->updated_at,true);
//        $criteria->compare('created_user',$this->created_user);
//        $criteria->compare('updated_user',$this->updated_user);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'created_at desc',
            ),
            'pagination'=>array(
                'pageSize'=>100,
            ),
        ));
    }
}