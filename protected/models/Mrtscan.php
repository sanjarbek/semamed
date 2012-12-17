<?php

/**
 * This is the model class for table "mrtscans".
 *
 * The followings are the available columns in table 'mrtscans':
 * @property integer $mrtscan_id
 * @property string $mrtscan_name
 * @property string $mrtscan_description
 * @property string $mrtscan_price
 * @property integer $mrtscan_enable
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_user
 * @property integer $updated_user
 *
 * The followings are the available model relations:
 * @property Disconts[] $disconts
 * @property Registrations[] $registrations
 */
class Mrtscan extends MasterModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mrtscan the static model class
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
		return 'mrtscans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mrtscan_name, mrtscan_description, mrtscan_price, mrtscan_enable, created_at, updated_at, created_user, updated_user', 'required'),
			array('mrtscan_enable', 'numerical', 'integerOnly'=>true),
			array('mrtscan_name', 'length', 'max'=>45),
			array('mrtscan_description', 'length', 'max'=>255),
			array('mrtscan_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mrtscan_id, mrtscan_name, mrtscan_description, mrtscan_price, mrtscan_enable, created_at, updated_at, created_user, updated_user', 'safe', 'on'=>'search'),
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
			'disconts' => array(self::HAS_MANY, 'Disconts', 'discont_mriscan'),
			'registrations' => array(self::HAS_MANY, 'Registrations', 'reg_mrtscan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mrtscan_id' => Yii::t('column', 'MRT scan'),
			'mrtscan_name' => Yii::t('column', 'MRT scan name'),
			'mrtscan_description' => Yii::t('column', 'MRT scan description'),
			'mrtscan_price' => Yii::t('column', 'MRT scan price'),
			'mrtscan_enable' => Yii::t('column', 'Enable'),
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

		$criteria->compare('mrtscan_id',$this->mrtscan_id);
		$criteria->compare('mrtscan_name',$this->mrtscan_name,true);
		$criteria->compare('mrtscan_description',$this->mrtscan_description,true);
		$criteria->compare('mrtscan_price',$this->mrtscan_price,true);
		$criteria->compare('mrtscan_enable',$this->mrtscan_enable);
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
    public function getEnableStatus()
    {
        $statusOptions = $this->statusOptions;
        return isset($statusOptions[$this->mrtscan_enable]) ? $statusOptions[$this->mrtscan_enable] : "unknown status ({$this->mrtscan_enable})";
    }

}