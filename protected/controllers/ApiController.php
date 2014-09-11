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
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => 'login success ', 'user_name' => $model->username, 'user_Id' => Yii::app()->user->getId())));
                echo $msg;
            } else {
                $msg = CJSON::encode(array(array('success' => "false", 'message' => 'Invalid username or password ')));
                echo $msg;
            }
        } else {
            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'Invalid request')));
            echo $msg;
        }
    }

    public function actionGcmUser()
    {
        if (isset($_POST['SignUp']) && !empty($_POST['SignUp'])) {
            $model = new GcmUsers;

            $model->attributes = CJSON::decode($_POST['SignUp']);
            $logData = CJSON::decode($_POST['SignUp']);
            if ($model->save()) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => 'wade goda')));

                $this->send_notification($logData['gcm_regid'], "asdsds");
            } else {
                $msg = CJSON::encode(array(array('success' => "false", 'message' => 'save failed')));
                echo $msg;
            }

        } else {
            $msg = CJSON::encode(array(array('success' => "false", 'message' => 'method failed')));
            echo $msg;
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
        if (isset($_POST['RequestHelp']) && !empty($_POST['RequestHelp'])) {
            $model = new RequestHelp();
            $model->attributes = CJSON::decode($_POST['RequestHelp']);
            try {
                if ($model->save(false)) {
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'bbbbbbb')));
                    echo $msg;
                    die;
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'RequestHelp successful')));
                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'RequestHelp failed')));
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
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'bbbbbbb')));
                    echo $msg;
                    die;
                    $msg = CJSON::encode(array(array('success' => "true", 'message' => 'RequestHelp successful')));
                    echo $msg;
                } else {
                    $msg = CJSON::encode(array(array('success' => "false", 'message' => 'RequestHelp failed')));
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

    public function actionGcm()
    {
        $regId = 'APA91bHhKH6V7fpLqWeip85hxAw3k3ZWJAhCC3zZtRMtlIlEBaR0VkDTDi5dWbYKNQN6DTkEgVXCCjnBHBId4Cbx67hgMZLYgb0ugrRVXJqrUrQ2xR4dsLI_tehyk3OYLwjMlLdPgqgMfE92JmzfViaFjh0dS5n6TbYEQYPOZ8aRHZ1FpBybBZw';
        $message = 'test ddfsfsdfmsg';
        $registatoin_ids = array($regId);
        $message = array("price" => $message);
        $result = $this->send_notification($registatoin_ids, $message);
        echo $result;
    }

    public function send_notification($registatoin_ids, $message)
    {
// Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
        $headers = array(
            'Authorization: key=AIzaSyBo4BPp5b4VcAjOhvBQP3_KtQV9FVnUDB0',
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
        echo $result;
    }
}