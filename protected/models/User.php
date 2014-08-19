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
 * @property string $register_date
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property TblSkills $skill
 * @property TblBloodGroup $bldGrp
 * @property TblStatus $status
 * @property TblUserHelpAccepted[] $tblUserHelpAccepteds
 * @property TblUserHelpRequests[] $tblUserHelpRequests
 * @property TblUserLocation[] $tblUserLocations
 */
class User extends CActiveRecord
{
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
            array('user_name, gcm_regid, password, first_name, last_name, mob_no, email, dob, gender, address_no, address_street, address_city, bld_grp_id, skill_id, register_date, status_id', 'required'),
            array('gender, bld_grp_id, skill_id, status_id', 'numerical', 'integerOnly' => true),
            array('user_name, mob_no', 'length', 'max' => 50),
            array('gcm_regid, password', 'length', 'max' => 255),
            array('first_name, last_name, email, address_no, address_street, address_city', 'length', 'max' => 250),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('user_id, user_name, gcm_regid, password, first_name, last_name, mob_no, email, dob, gender, address_no, address_street, address_city, bld_grp_id, skill_id, register_date, status_id', 'safe', 'on' => 'search'),
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
            'skill' => array(self::BELONGS_TO, 'TblSkills', 'skill_id'),
            'bldGrp' => array(self::BELONGS_TO, 'TblBloodGroup', 'bld_grp_id'),
            'status' => array(self::BELONGS_TO, 'TblStatus', 'status_id'),
            'tblUserHelpAccepteds' => array(self::HAS_MANY, 'TblUserHelpAccepted', 'user_id'),
            'tblUserHelpRequests' => array(self::HAS_MANY, 'TblUserHelpRequests', 'user_id'),
            'tblUserLocations' => array(self::HAS_MANY, 'TblUserLocation', 'user_id'),
        );
    }

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
            'register_date' => 'Register Date',
            'status_id' => 'Status',
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
        $criteria->compare('register_date', $this->register_date, true);
        $criteria->compare('status_id', $this->status_id);

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
