<?php

/**
 * This is the model class for table "hospitals".
 *
 * The followings are the available columns in table 'hospitals':
 * @property integer $hospital_id
 * @property string $hospital_name
 * @property string $hospital_phone
 * @property integer $hospital_enable
 * @property integer $hospital_manager_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_user
 * @property integer $updated_user
 *
 * The followings are the available model relations:
 * @property Doctors[] $doctors
 */
class Hospital extends MasterModel
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Hospital the static model class
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
		return 'hospitals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hospital_name, hospital_phone, hospital_enable, hospital_manager_id, created_at, updated_at, created_user, updated_user', 'required'),
			array('hospital_enable, hospital_manager_id', 'numerical', 'integerOnly'=>true),
			array('hospital_name, hospital_phone', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('hospital_id, hospital_name, hospital_manager_id, hospital_phone, hospital_enable, created_at, updated_at, created_user, updated_user', 'safe', 'on'=>'search'),
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
			'doctors' => array(self::HAS_MANY, 'Doctor', 'doctor_hospital'),
            'manager' => array(self::BELONGS_TO, 'User', 'hospital_manager_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hospital_id' => Yii::t('column', 'Hospital'),
			'hospital_name' => Yii::t('column', 'Hospital name'),
			'hospital_phone' => Yii::t('column', 'Hospital phone'),
			'hospital_enable' => Yii::t('column', 'Status'),
            'hospital_manager_id' => Yii::t('column', 'Manager'),
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

		$criteria->compare('hospital_id',$this->hospital_id);
		$criteria->compare('hospital_name',$this->hospital_name,true);
		$criteria->compare('hospital_phone',$this->hospital_phone,true);
		$criteria->compare('hospital_enable',$this->hospital_enable);
        $criteria->compare('hospital_manager_id',$this->hospital_manager_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_user',$this->created_user);
		$criteria->compare('updated_user',$this->updated_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getStatusOptions()
    {
        return array(
            self::STATUS_ENABLED => Yii::t('value', 'Enabled'),
            self::STATUS_DISABLED => Yii::t('value', 'Disabled'),
        );
    }

    /**
     * @return string the status text display for the current issue
     */
    public function getStatusText()
    {
        $statusOptions = $this->statusOptions;
        return isset($statusOptions[$this->hospital_enable]) ? $statusOptions[$this->hospital_enable] : "Unknown status ({$this->hospital_enable})";
    }

    public function hospitalsList()
    {
        return CHtml::listData(Hospital::model()->findAll(), 'hospital_id', 'hospital_name');
    }

}