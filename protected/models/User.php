<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $gcm_regid
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $mob_no
 * @property string $email
 * @property string $dob
 * @property integer $gender
 * @property string $address_no
 * @property string $address_street
 * @property string $address_city
 * @property integer $bld_grp_id
 * @property integer $skill_id
 * @property integer $status_id
 * @property string $last_login_time
 * @property string $create_time
 * @property string create_user_id
 * @property string $update_time
 * @property string update_user_id
 *
 * The followings are the available model relations:
 * @property Skills $skill
 * @property BloodGroup $bldGrp
 * @property Status $status
 * @property UserHelpAccepted[] $userHelpAccepteds
 * @property UserHelpRequests[] $userHelpRequests
 * @property UserLocation[] $userLocations
 */
class User extends FriendHelpActiveRecord
{
    public $password_repeat;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_name,  password, first_name, last_name, mob_no, email, dob, gender, address_no, address_street, address_city, bld_grp_id, skill_id', 'required'),
            array('gender, bld_grp_id, skill_id, status_id', 'numerical', 'integerOnly' => true),
            array('user_name, mob_no', 'length', 'max' => 50),
            array('gcm_regid, password', 'length', 'max' => 255),
            array('first_name, last_name, email, address_no, address_street, address_city', 'length', 'max' => 250),
            array('email, user_name', 'unique'),
            array('email', 'email'),
            array('password', 'compare'), //compare the pasword with confirmation
            //array('password_repeat,  password, first_name, last_name, mob_no,  dob, gender, address_no, address_street, address_city, bld_grp_id, skill_id', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('user_id, user_name, first_name, last_name, mob_no, email, dob, gender, address_no, address_street, address_city, bld_grp_id, skill_id, status_id, last_login_time, create_time, update_time', 'safe', 'on' => 'search'),
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
            'skill' => array(self::BELONGS_TO, 'Skills', 'skill_id'),
            'bldGrp' => array(self::BELONGS_TO, 'BloodGroup', 'bld_grp_id'),
//            'userHelpAccepteds' => array(self::HAS_MANY, 'UserHelpAccepted', 'user_id'),
//            'userHelpRequests' => array(self::HAS_MANY, 'UserHelpRequests', 'user_id'),
//            'userLocations' => array(self::HAS_MANY, 'UserLocation', 'user_id'),
        );
    }

//    public function getBloodGroups()
//    {
//        $usersArray = CHtml::listData($this->bldGrp, 'bld_grp_id', 'bld_group');
//        var_dump($usersArray);
//        return $usersArray;
//    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'user_id' => 'User',
            'user_name' => 'User Name',
            'gcm_regid' => 'Gcm Regid',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'mob_no' => 'Mob No',
            'email' => 'Email',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'address_no' => 'Address No',
            'address_street' => 'Address Street',
            'address_city' => 'Address City',
            'bld_grp_id' => 'Bld Grp',
            'skill_id' => 'Skill',
            'status_id' => 'Status',
            'last_login_time' => 'Last Login Time',
            'create_time' => 'Create Time',
            'create_user_id' => 'Create User',
            'update_time' => 'Update Time',
            'update_user_id' => 'Update User',
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

        $criteria = new CDbCriteria;

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('user_name', $this->user_name, true);
        $criteria->compare('gcm_regid', $this->gcm_regid, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('mob_no', $this->mob_no, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('address_no', $this->address_no, true);
        $criteria->compare('address_street', $this->address_street, true);
        $criteria->compare('address_city', $this->address_city, true);
        $criteria->compare('bld_grp_id', $this->bld_grp_id);
        $criteria->compare('skill_id', $this->skill_id);
        $criteria->compare('status_id', $this->status_id);
        $criteria->compare('last_login_time', $this->last_login_time, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * apply a hash on the password before we store it in the database
     */
    protected function afterValidate()
    {
        parent::afterValidate();
        if (!$this->hasErrors())
            $this->password = $this->hashPassword($this->password);
    }

    /**
     * Generates the password hash.
     * @param string password
     * @return string hash
     */
    public function hashPassword($password)
    {
        return md5($password);
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password)
    {
        return $this->hashPassword($password) === $this->password;
    }
}
