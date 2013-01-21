<?php

/**
 * This is the model class for table "patients".
 *
 * The followings are the available columns in table 'patients':
 * @property integer $patient_id
 * @property string $patient_fullname
 * @property string $patient_phone
 * @property string $patient_birthday
 * @property enum $patient_sex
 * @property integer $patient_doctor
 * @property integer $patient_status
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
    const STATUS_NOT_YET_STARTED = 0;
    const STATUS_STARTED = 1;
    const STATUS_FINISHED = 2;
    const STATUS_CANCELED = 3;
    const STATUS_DELAYED = 4;

    const SEX_MALE = 0;
    const SEX_FEMALE = 1;

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
			array('patient_fullname, patient_phone, patient_birthday, patient_doctor, patient_sex', 'required'),
			array('patient_doctor', 'numerical', 'integerOnly'=>true),
			array('patient_fullname', 'length', 'max'=>30),
			array('patient_phone', 'length', 'max'=>20),
            array('patient_sex', 'in', 'range'=>array(
                self::SEX_MALE,
                self::SEX_FEMALE,
            )),
            array('patient_status', 'in', 'range'=>array(
                self::STATUS_NOT_YET_STARTED,
                self::STATUS_STARTED,
                self::STATUS_FINISHED,
                self::STATUS_CANCELED,
                self::STATUS_DELAYED,
            )),
            array('patient_doctor', 'exist',
                'allowEmpty' => false,
                'attributeName' => 'doctor_id',
                'className' => 'Doctor',
                'message' => 'The specified Doctor does not exist.',
                'skipOnError'=>true
            ),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('patient_id, patient_fullname, patient_phone, patient_birthday, patient_status, patient_doctor, patient_sex,  created_at', 'safe', 'on'=>'search'),
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
			'patient_fullname' => Yii::t('column', 'Fullname'),
			'patient_phone' => Yii::t('column', 'Phone'),
			'patient_birthday' => Yii::t('column', 'Birthday'),
            'patient_sex'=> Yii::t('column', 'Sex'),
            'patient_status'=> Yii::t('column', 'Status'),
			'patient_doctor' => Yii::t('column', 'Doctor'),
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
        $criteria->compare('patient_sex',$this->patient_sex);
        $criteria->compare('patient_status',$this->patient_status);
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

    public function getStatusOptions()
    {
        return array(
            self::STATUS_NOT_YET_STARTED => Yii::t('value', 'Not yet started'),
            self::STATUS_STARTED => Yii::t('value', 'Started'),
            self::STATUS_FINISHED => Yii::t('value', 'Finished'),
            self::STATUS_CANCELED => Yii::t('value', 'Canceled'),
            self::STATUS_DELAYED => Yii::t('value', 'Delayed'),
        );
    }

    public function getStatusText()
    {
        $status_options = $this->getStatusOptions();
        return isset($status_options[$this->patient_status])
            ? $status_options[$this->patient_status]
            : (Yii::t('value', 'Unknown status ') . $this->patient_status);
    }

    public function getSexOptions()
    {
        return array(
            self::SEX_MALE => Yii::t('value', 'Male'),
            self::SEX_FEMALE => Yii::t('value', 'Female'),
        );
    }

    public function getSexText()
    {
        $sex_options = $this->getSexOptions();
        return isset($sex_options[$this->patient_sex])
            ? $sex_options[$this->patient_sex]
            : (Yii::t('value', 'Unknown status ') . $this->patient_sex);
    }

    public function isStatusChangeable()
    {
        if ($this->patient_status == self::STATUS_FINISHED
            && $this->patient_status == self::STATUS_CANCELED
        )
        {
            return false;
        }
        return true;
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
//        $str = "select * from patient_count";
//        $str = "select hospital_name, doctor_fullname, CONCAT('Date.UTC(',Year(date), ',',  Month(date), ',', Day(date), '),', count) as count from patient_count";

//        $str = "select hospital_name, doctor_fullname, CONCAT(CONCAT(date, ', '), count) AS count from patient_count";

        $str = "select hospital_name, doctor_fullname, (unix_timestamp(date)*1000) as 'date', count
                    from patient_count
                    order by `date`";

        return new CSqlDataProvider(
            $str,
            array(
                'pagination'=>false,
                'keyField' => 'hospital_name',
            )
        );
    }
}