<?php

/**
 * This is the model class for table "doctors".
 *
 * The followings are the available columns in table 'doctors':
 * @property integer $doctor_id
 * @property string $doctor_fullname
 * @property string $doctor_phone
 * @property integer $doctor_hospital
 * @property integer $doctor_enable
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_user
 * @property integer $updated_user
 *
 * The followings are the available model relations:
 * @property Hospitals $doctorHospital
 * @property Patients[] $patients
 */
class Doctor extends MasterModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Doctor the static model class
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
		return 'doctors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doctor_fullname, doctor_phone, doctor_hospital, doctor_enable, created_at, updated_at, created_user, updated_user', 'required'),
			array('doctor_hospital, doctor_enable', 'numerical', 'integerOnly'=>true),
			array('doctor_fullname, doctor_phone', 'length', 'max'=>45),
            array('doctor_hospital', 'exist',
                'allowEmpty' => false,
                'attributeName' => 'hospital_id',
                'className' => 'Hospital',
                'message' => 'The specified Hospital does not exist.',
                'skipOnError'=>true
            ),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('doctor_id, doctor_fullname, doctor_phone, doctor_hospital, doctor_enable, created_at, updated_at, created_user, updated_user', 'safe', 'on'=>'search'),
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
			'doctorHospital' => array(self::BELONGS_TO, 'Hospital', 'doctor_hospital'),
			'patients' => array(self::HAS_MANY, 'Patient', 'patient_doctor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'doctor_id' => 'Doctor',
			'doctor_fullname' => 'Doctor Fullname',
			'doctor_phone' => 'Doctor Phone',
			'doctor_hospital' => 'Doctor Hospital',
			'doctor_enable' => 'Doctor Enable',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'created_user' => 'Created User',
			'updated_user' => 'Updated User',
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

		$criteria->compare('doctor_id',$this->doctor_id);
		$criteria->compare('doctor_fullname',$this->doctor_fullname,true);
		$criteria->compare('doctor_phone',$this->doctor_phone,true);
		$criteria->compare('doctor_hospital',$this->doctor_hospital);
		$criteria->compare('doctor_enable',$this->doctor_enable);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_user',$this->created_user);
		$criteria->compare('updated_user',$this->updated_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return string the status text display for the current issue
     */
    public function getStatusText()
    {
        $statusOptions = $this->statusOptions;
        return isset($statusOptions[$this->doctor_enable]) ? $statusOptions[$this->doctor_enable] : "unknown status ({$this->hospital_enable})";
    }

    public function doctorsList()
    {
        return CHtml::listData(Doctor::model()->findAll(), 'doctor_id', 'doctor_fullname');
    }
}