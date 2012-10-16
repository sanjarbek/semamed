<?php

/**
 * This is the model class for table "hospitals".
 *
 * The followings are the available columns in table 'hospitals':
 * @property integer $hospital_id
 * @property string $hospital_name
 * @property string $hospital_phone
 * @property integer $hospital_enable
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
			array('hospital_name, hospital_phone, hospital_enable, created_at, updated_at, created_user, updated_user', 'required'),
			array('hospital_enable, created_user, updated_user', 'numerical', 'integerOnly'=>true),
			array('hospital_name, hospital_phone', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('hospital_id, hospital_name, hospital_phone, hospital_enable, created_at, updated_at, created_user, updated_user', 'safe', 'on'=>'search'),
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
			'doctors' => array(self::HAS_MANY, 'Doctors', 'doctor_hospital'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hospital_id' => 'Hospital',
			'hospital_name' => 'Hospital Name',
			'hospital_phone' => 'Hospital Phone',
			'hospital_enable' => 'Hospital Enable',
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

		$criteria->compare('hospital_id',$this->hospital_id);
		$criteria->compare('hospital_name',$this->hospital_name,true);
		$criteria->compare('hospital_phone',$this->hospital_phone,true);
		$criteria->compare('hospital_enable',$this->hospital_enable);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('created_user',$this->created_user);
		$criteria->compare('updated_user',$this->updated_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}