<?php

/**
 * This is the model class for table "registrations".
 *
 * The followings are the available columns in table 'registrations':
 * @property integer $reg_id
 * @property integer $reg_patient
 * @property integer $reg_mrtscan
 * @property integer $reg_discont
 * @property string $reg_price
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
			array('reg_patient, reg_mrtscan, reg_discont, reg_price, reg_report_status, created_at, updated_at, created_user, updated_user', 'required'),
			array('reg_patient, reg_mrtscan, reg_discont, reg_report_status', 'numerical', 'integerOnly'=>true),
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
			'reg_id' => 'Reg',
			'reg_patient' => 'Reg Patient',
			'reg_mrtscan' => 'Reg Mrtscan',
			'reg_discont' => 'Reg Discont',
			'reg_price' => 'Reg Price',
			'reg_report_status' => 'Reg Report Status',
			'reg_report_text' => 'Reg Report Text',
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
		));
	}
}