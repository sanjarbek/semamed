<?php

/**
 * This is the model class for table "patients".
 *
 * The followings are the available columns in table 'patients':
 * @property integer $patient_id
 * @property string $patient_fullname
 * @property string $patient_phone
 * @property string $patient_birthday
 * @property integer $patient_doctor
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_user
 * @property integer $updated_user
 *
 * The followings are the available model relations:
 * @property Doctors $patientDoctor
 * @property Registrations[] $registrations
 */
class Patient extends MasterModel
{
    public $firstLetter;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Patient the static model class
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
		return 'patients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_fullname, patient_phone, patient_birthday, patient_doctor', 'required'),
			array('patient_doctor', 'numerical', 'integerOnly'=>true),
			array('patient_fullname', 'length', 'max'=>30),
			array('patient_phone', 'length', 'max'=>20),
            array('patient_doctor', 'exist',
                'allowEmpty' => false,
                'attributeName' => 'doctor_id',
                'className' => 'Doctor',
                'message' => 'The specified Doctor does not exist.',
                'skipOnError'=>true
            ),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('patient_id, patient_fullname, patient_phone, patient_birthday, patient_doctor, created_at, updated_at, created_user, updated_user', 'safe', 'on'=>'search'),
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
			'patientDoctor' => array(self::BELONGS_TO, 'Doctor', 'patient_doctor'),
			'registrations' => array(self::HAS_MANY, 'Registration', 'reg_patient'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'patient_id' => Yii::t('column', 'Patient'),
			'patient_fullname' => Yii::t('column', 'Patient Fullname'),
			'patient_phone' => Yii::t('column', 'Patient Phone'),
			'patient_birthday' => Yii::t('column', 'Patient Birthday'),
			'patient_doctor' => Yii::t('column', 'Patient Doctor'),
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

		$criteria->compare('patient_id',$this->patient_id);
		$criteria->compare('patient_fullname',$this->patient_fullname,true);
		$criteria->compare('patient_phone',$this->patient_phone,true);
		$criteria->compare('patient_birthday',$this->patient_birthday,true);
		$criteria->compare('patient_doctor',$this->patient_doctor);
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
                'pageSize'=>10,
            ),
		));
	}

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function report()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('patient_id',$this->patient_id);
        $criteria->compare('patient_fullname',$this->patient_fullname,true);
        $criteria->compare('patient_phone',$this->patient_phone,true);
        $criteria->compare('patient_birthday',$this->patient_birthday,true);
        $criteria->compare('patient_doctor',$this->patient_doctor);
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
                'pageSize'=>10000,
            ),
        ));
    }

    public function getPatientCountPerDoctor()
    {

//        $str = "select hospital_name, doctor_fullname, CONCAT(CONCAT(date, ', '), count) AS count from patient_count";
        $str = "select * from patient_count";
        return new CSqlDataProvider(
            $str,
            array(
                'pagination'=>false,
                'keyField' => 'hospital_name',
            )
        );
    }
}