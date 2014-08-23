<?php

/**
 * This is the model class for table "tbl_user_help_accepted".
 *
 * The followings are the available columns in table 'tbl_user_help_accepted':
 * @property integer $help_accepted_id
 * @property integer $user_id
 * @property string $accepted_date
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserHelpAccepted extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user_help_accepted';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, accepted_date', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('help_accepted_id, user_id, accepted_date', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'help_accepted_id' => 'Help Accepted',
			'user_id' => 'User',
			'accepted_date' => 'Accepted Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('help_accepted_id',$this->help_accepted_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('accepted_date',$this->accepted_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserHelpAccepted the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
