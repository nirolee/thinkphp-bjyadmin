<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AutoController extends HomeBaseController{
    public function __construct() {
        parent::__construct();
        $this->sendmessage();
    }
    
    private function sendmessage(){
        $month = date('m');
        $day = date('d');
        $condition = array();
        $condition['months'] = $month;
        $condition['days'] = $day;
        $user_data= M('Users')->field('username,phone,months,days')->where($condition)->select();
        $holiday_data = M('Holiday')->field('name,months,days')->where($condition)->select();
        
        if($user_date){
           //根据生日发送短信 
        }
        
        if($holiday_data){
        $user_data = M('Users')->field('username,phone,months,days')->select();
           //根据节日给所有人发送短信
        }
//        if(empty($user_data)&&empty($holiday_data) ){
//            echo '1';  
//        } elseif (empty($user_data)) {
//            echo '2';
//        }elseif (empty ($holiday_data)) {
//            echo '3';
//        }else{
//        $data = array_merge($user_data,$holiday_data);
//        $data = json_encode($data);
//        echo $data;
//        }
    }
}