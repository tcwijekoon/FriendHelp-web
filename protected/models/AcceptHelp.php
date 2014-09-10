<?php

/**
 * This is the model class for table "tbl_accept_help".
 *
 * The followings are the available columns in table 'tbl_accept_help':
 * @property integer $accept_help_id
 * @property integer $user_id
 * @property integer $request_help_id
 * @property integer $status
 * @property string $create_time
 *
 * The followings are the available model relations:
 * @property AcceptCancel[] $acceptCancels
 * @property RequestHelp $requestHelp
 * @property User $user
 * @property HelpCompleted[] $helpCompleteds
 */
class AcceptHelp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_accept_help';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, request_help_id, status, create_time', 'required'),
			array('user_id, request_help_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('accept_help_id, user_id, request_help_id, status, create_time', 'safe', 'on'=>'search'),
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
			'acceptCancels' => array(self::HAS_MANY, 'AcceptCancel', 'accept_help_id'),
			'requestHelp' => array(self::BELONGS_TO, 'RequestHelp', 'request_help_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'helpCompleteds' => array(self::HAS_MANY, 'HelpCompleted', 'help_accept_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'accept_help_id' => 'Accept Help',
			'user_id' => 'User',
			'request_help_id' => 'Request Help',
			'status' => 'Status',
			'create_time' => 'Create Time',
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

		$criteria->compare('accept_help_id',$this->accept_help_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('request_help_id',$this->request_help_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AcceptHelp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
