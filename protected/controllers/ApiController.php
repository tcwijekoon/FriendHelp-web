<?php

class ApiController extends Controller
{
    public function actionIndex()
    {
        echo 'dddddd';
    }

    public function actionLogin()
    {
        $model = new LoginForm;

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = CJSON::decode($_POST['LoginForm']);

            try {
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login()) {
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'login success ', 'user_name' => $model->username, 'user_Id' => Yii::app()->user->getId())));
                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'Invalid username or password ')));
                    echo $msg;
                }
            } catch (Exception $s) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => $s->getMessage())));
                echo $msg;
                die;
            }
        } else {
            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'Invalid request')));
            echo $msg;
        }
    }

//    public function actionLogout(){
//        Yii::app()->user->logout();
//    }

    public function actionUpdateGcmId()
    {
        if (isset($_POST['GcmInfo']) && !empty($_POST['GcmInfo'])) {
            $logData = CJSON::decode($_POST['GcmInfo']);
            $userId = $logData['user_id'];
            $regId = $logData['gcm_regid'];

            $user = User::model()->findByPk($userId);
            $user->gcm_regid = $regId;
            if ($user->update()) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => 'update success')));
                echo $msg;
            } else {
                $msg = CJSON::encode(array(array('success' => "false", 'message' => 'update failed')));
                echo $msg;
            }
        }
    }

    public function actionSignUp()
    {
        if (isset($_POST['SignUp']) && !empty($_POST['SignUp'])) {
            $model = new User;
            $temparyPwd = null;
            $model->attributes = CJSON::decode($_POST['SignUp']);
            $temparyPwd = $model->password;
            $model->password = $model->hashPassword($model->password);
            if ($model->isNewRecord) {
                if ($model->save(false)) {
//                    echo $this->loginUsingParams($model->user_name, $temparyPwd);
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'sign up successful')));
                    echo $msg;
                } else {
//                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'sign up failed' . $model->bld_grp_id)));
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'sign up failed' . $model->password)));
//                    . '--' . $model->address_city . '--'. $model->address_no . '--'. $model->address_street . '--'. $model->bld_grp_id . '--' . $model->create_time . '--' . $model->create_user_id . '--' . $model->dob . '--' . $model->mob_no . '--' . $model->password
                    echo $msg;
                }
            }
        }
    }


    public function actionRequestHelp()
    {
        try {
            if (isset($_POST['RequestHelp']) && !empty($_POST['RequestHelp'])) {
                $model = new RequestHelp();
                $model->attributes = CJSON::decode($_POST['RequestHelp']);

                if ($model->save(false)) {
                    $this->updateUsertableStatus($model->user_id, 2);
                    $this->getNearByLocations($model->user_id);
//                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'RequestHelp successful')));
//                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'RequestHelp failed')));
                    echo $msg;
                }
            }
        } catch (Exception $s) {
            $msg = CJSON::encode(array(array('success' => "true", 'message' => $s->getMessage())));
            echo $msg;
            die;
        }
    }

    public function updateUsertableStatus($userId, $status)
    {
        $user = User::model()->findByPk($userId);
        $user->status_id = $status;
        $user->update();
//        if ($user->update()) {
//            $msg = CJSON::encode(array(array('success' => "true", 'message' => 'update success')));
//            echo $msg;
//        } else {
//            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'update failed')));
//            echo $msg;
//        }
    }

    public function updateRequestHelpStatus($userId, $status)
    {
        $user = RequestHelp::model()->find('user_id=' . $userId);
        $user->status_id = $status;
        if ($user->update()) {
            $msg = CJSON::encode(array(array('success' => "true", 'message' => 'update success')));
            echo $msg;
        } else {
            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'update failed')));
            echo $msg;
        }
    }

    public function actionCancellRequest()
    {
        try {
            if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
                $userId = $_POST['user_id'];

                $criteria = new CDbCriteria;
                $criteria->select = 'request_help_id';
                $criteria->condition = "user_id=:user_id";
                $criteria->addCondition("status=:status");
                $criteria->params = array(':user_id' => $userId, ':status' => 2);
                $record = RequestHelp::model()->find($criteria);

                $record->status = 3;
                $record->update();

                $this->updateUsertableStatus($userId,1);
                $model = new RequestCancel();
                $model->request_help_id = $record->request_help_id;

                if ($model->save(false)) {
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'Request cancellation success')));
                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'Request cancellation failed')));
                    echo $msg;
                }
            }
        } catch (Exception $s) {
            $msg = CJSON::encode(array(array('success' => "true", 'message' => $s->getMessage())));
            echo $msg;
            die;
        }
    }

    public function actionAcceptHelp()
    {
        if (isset($_POST['AcceptHelp']) && !empty($_POST['AcceptHelp'])) {
            $model = new AcceptHelp();
            $model->attributes = CJSON::decode($_POST['AcceptHelp']);
            try {
                if ($model->save(false)) {

                    $reqHelp = RequestHelp::model()->find('request_help_id=' . $model->accept_help_id);
                    $reqHelp->status_id = 5;
                    $reqHelp->update();

                    $user = User::model()->findByPk($model->user_id);
                    $user->status_id = 3;
                    $user->update();

                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'AcceptHelp successful', 'accept_help_id' => $model->accept_help_id)));
                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'AcceptHelp failed')));
                    echo $msg;
                }
            } catch (Exception $s) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => $s->getMessage())));
                echo $msg;
                die;
            }
        }
    }

    public function actionAcceptCancel()
    {
        if (isset($_POST['AcceptCancel']) && !empty($_POST['AcceptCancel'])) {
            $model = new AcceptCancel();
            $model->attributes = CJSON::decode($_POST['AcceptCancel']);
            try {
                if ($model->save(false)) {

//                    $reqHelp = RequestHelp::model()->find('request_help_id=' . $model->accept_help_id);
//                    $reqHelp->status_id = 5;
//                    $reqHelp->update();
//
//                    $user = User::model()->findByPk($model->user_id);
//                    $user->status_id = 3;
//                    user->update();
//
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'AcceptCancel successful')));
                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'AcceptCancel failed')));
                    echo $msg;
                }
            } catch (Exception $s) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => $s->getMessage())));
                echo $msg;
                die;
            }
        }
    }

    public function actionUpdateMyLocation()
    {
        if (isset($_POST['UpdateMyLocation']) && !empty($_POST['UpdateMyLocation'])) {
            $model = new UserLocation();
            $model->attributes = CJSON::decode($_POST['UpdateMyLocation']);
            try {
                if ($model->save(false)) {
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'UpdateMyLocation successful')));
                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'UpdateMyLocation failed')));
                    echo $msg;
                }
            } catch (Exception $s) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => $s->getMessage())));
                echo $msg;
                die;
            }
        }
    }

//    function loginUsingParams($username, $password)
//    {
//        $model = new LoginForm;
//        $model->username = $username;
//        $model->password = $password;
//
//        if ($model->validate() && $model->login()) {
//            $msg = CJSON::encode(array(array('success' => "true", 'message' => 'login success', 'user_name' => $model->username, 'user_Id' => Yii::app()->user->getId())));
//        } else {
//            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'Invalid username or password ')));
//        }
//        return $msg;
//    }

    public function getNearByLocations($userId)
    {
        $query1 = Yii::app()->db->createCommand("SELECT `gps_lat`,`gps_lon`,request_help_id FROM tbl_user_location  where `user_id`=$userId ORDER BY `user_location_id` DESC ");
        $result1 = $query1->queryRow();

        $request_help_id = "";

        $in = array();
        foreach ($result1 as $val) {
            array_push($in, $val);
            $request_help_id = $val['request_help_id'];
        }
        if (sizeof($in) > 0) {
            $lat = $in[0];
            $lon = $in[1];

//        kilometers instead of miles, replace 3959 with 6371.
            $query = Yii::app()->db->createCommand("SELECT user_id,location_address,( 6371 * acos( cos( radians($lat) ) * cos( radians( gps_lat ) ) * cos( radians( gps_lon ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( gps_lat ) ) ) ) AS distance FROM tbl_user_location  where user_id != " . $userId . " HAVING distance < 20 ORDER BY distance LIMIT 0 , 10 ");
            $result = $query->query();

//            to get one row
//            $result = $query->queryRow();

            $out = array();
            foreach ($result as $val2) {
                array_push($out, $val2);
                $uId = $val2['user_id'];
                $address = $val2['location_address'];
                $user = User::model()->findByPk($uId);

                $regId = $user->gcm_regid;
                $firstname = $user->first_name;
//                $message = $firstname.' is from '.$address.' requesting help from you';
                $registatoin_ids = array($regId);
                $message = array("request_help_id" => $request_help_id, "first_name" => $firstname, "address" => $address);
//                $message = array("message" => $message,"type"=>5);

                $result = $this->send_notification($registatoin_ids, $message);

                $msg = CJSON::encode(array(array('success' => "true", 'message' => 'send notifications')));
                echo $msg;
            }
//            if (sizeof($out) > 0) {
//                $this->renderJSON(array(array('success' => "true", 'result' => $out)));
//            } else {
//                $msg = CJSON::encode(array(array('success' => "false", 'message' => 'No location results')));
//                echo $msg;
//            }
        } else {
            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'No results for user current location')));
            echo $msg;
        }
    }

    function prettyPrint($a)
    {
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }

    public function actionGetSkills()
    {
        try {

            $out = array();
            $mainCat = Skills::model()->findAll();
            foreach ($mainCat as $val) {
                $skills['skill_id'] = $val->skill_id;
                $skills['skill'] = $val->skill;
                array_push($out, $skills);
            }

            $this->renderJSON(array(array('success' => "true", 'result' => $out)));
            //echo CJSON::encode($out);
        } catch (Exception $exc) {
            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'exception')));
            echo $msg;
        }
    }

    public function actionGetBloodGroups()
    {
        try {

            $out = array();
            $mainCat = BloodGroup::model()->findAll();
            foreach ($mainCat as $val) {
                $bld_group['bld_grp_id'] = $val->bld_grp_id;
                $bld_group['bld_group'] = $val->bld_group;
                array_push($out, $bld_group);
            }

            $this->renderJSON(array(array('success' => "true", 'result' => $out)));
            //echo CJSON::encode($out);
        } catch (Exception $exc) {
            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'exception')));
            echo $msg;
        }
    }

    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo CJSON::encode($data);

        foreach (Yii::app()->log->routes as $route) {
            if ($route instanceof CWebLogRoute) {
                $route->enabled = false; // disable any weblogroutes
            }
        }
        //Yii::app()->end();
    }

//    public function actionGcm()
//    {
//        $regId = 'APA91bHhKH6V7fpLqWeip85hxAw3k3ZWJAhCC3zZtRMtlIlEBaR0VkDTDi5dWbYKNQN6DTkEgVXCCjnBHBId4Cbx67hgMZLYgb0ugrRVXJqrUrQ2xR4dsLI_tehyk3OYLwjMlLdPgqgMfE92JmzfViaFjh0dS5n6TbYEQYPOZ8aRHZ1FpBybBZw';
//        $message = 'test ddfsfsdfmsg';
//        $registatoin_ids = array($regId);
//        $message = array("price" => $message);
//        $result = $this->send_notification($registatoin_ids, $message);
////        return $result;
//    }

    public function send_notification($registatoin_ids, $message)
    {
// Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
        $headers = array(
            'Authorization: key=AIzaSyDzDJlT43jEMvekT-aexn9osmty_1hc1TE',
            'Content-Type: application/json'
        );

// Open connection
        $ch = curl_init();

// Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

// Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
// Close connection
        curl_close($ch);
//        return $result;
//        die;
    }
}