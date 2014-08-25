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
                $msg = CJSON::encode(array(array('success' => "true", 'message' => 'login success ')));
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

            $model->attributes = CJSON::decode($_POST['SignUp']);
            if ($model->save()) {
                $msg = CJSON::encode(array(array('success' => "true", 'message' => 'sign up successful')));
                echo $msg;
            } else {
                $msg = CJSON::encode(array(array('success' => "false", 'message' => 'sign up failed' . $model->isNewRecord)));
                echo $msg;
            }
        }
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

    public function send_notification($registatoin_ids, $message)
    {

        /* @var $apnsGcm YiiGcm */

        /*
         $gcm = Yii::app()->gcm;

         $apns_registatoin_ids = array($registatoin_ids);
         $apns_messages = array("price" => $message);
         $gcm->send($apns_registatoin_ids, $apns_messages,
         array(
         'price' => 1,
         ),
         array(
         'timeToLive' => 3
         )
         );
         */

        $apns_registatoin_ids = array($registatoin_ids);
        $apns_messages = array("price" => $message);
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => $apns_registatoin_ids,
            'data' => $apns_messages,
        );

        // define("GOOGLE_API_KEY", "AIzaSyBo4BPp5b4VcAjOhvBQP3_KtQV9FVnUDB0"); //thushara google gcm account
        define("GOOGLE_API_KEY", "AIzaSyDzDJlT43jEMvekT-aexn9osmty_1hc1TE"); // winniew splitit google account

        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
        echo $ch;

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
        // echo $result;

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
}