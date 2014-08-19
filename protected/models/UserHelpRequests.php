<?php

/**
 * This is the model class for table "tbl_user_help_requests".
 *
 * The followings are the available columns in table 'tbl_user_help_requests':
 * @property integer $help_requests_id
 * @property integer $user_id
 * @property string $requested_date
 * @property integer $help_status
 * @property string $accepted_date
 *
 * The followings are the available model relations:
 * @property TblUser $user
 */
class UserHelpRequests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user_help_requests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, requested_date, help_status', 'required'),
			array('user_id, help_status', 'numerical', 'integerOnly'=>true),
			array('accepted_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('help_requests_id, user_id, requested_date, help_status, accepted_date', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'TblUser', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'help_requests_id' => 'Help Requests',
			'user_id' => 'User',
			'requested_date' => 'Requested Date',
			'help_status' => 'Help Status',
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

		$criteria->compare('help_requests_id',$this->help_requests_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('requested_date',$this->requested_date,true);
		$criteria->compare('help_status',$this->help_status);
		$criteria->compare('accepted_date',$this->accepted_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserHelpRequests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
