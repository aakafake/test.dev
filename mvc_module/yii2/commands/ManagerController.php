<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\Request;
use yii\console\Response;
use yii\web\HttpException;

use Yii;

use app\models\User;
use app\models\Pay;
use app\models\ManagerForm;

/**
 * Cron controller
 */
class ManagerController extends \yii\console\Controller {


	
    //Checking for the test period
    public function actionTest(){
//
        $pays_test = Pay::find()->indexBy('id')->where(['status' => Pay::STATUS_TEST])->all();
        $time_now = time();
        foreach ($pays_test as $pay){

            $payment_date = $pay->date1_int;
            $pay_expire = strtotime('+3 day', $payment_date);
            $days_left = round(abs($time_now - $pay_expire) / 86400);

            if ($days_left == 2){
                \Yii::$app->response->format = Response::FORMAT_JSON;
                $form = new ManagerForm();
                $form->pay_id = $pay->id;
                if ($form->validate()) {
                    //Notification about non payment
                    $form->sendMessage();
                } else {
                    throw new HttpException(404, Yii::t('app', 'Incorrect form'));
                }

            }elseif($days_left == 0){
                //Notification about end of test period
                $form = new ManagerForm();
                $form->pay_id = $pay->id;
                $form->sendNotification();
                return $pay->delete();
            }
        }
    }




}