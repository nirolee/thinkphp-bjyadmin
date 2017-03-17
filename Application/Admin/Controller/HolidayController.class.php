<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 短信
 */
class HolidayController extends AdminBaseController{
    /**
     * 短信管理
     */

  
    public function index(){
        $data=D('Holiday')->getTreeData();
        $assign=array(
            'data'=>$data
            );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加权限
     */
    public function add(){
        $data=I('post.');
        unset($data['id']);
        $result=D('Holiday')->addData($data);
        if ($result) {
            $this->success('添加成功',U('Admin/Holiday/index'));
        }else{
            $this->error('添加失败');
        }
    }
    
      /**
     * 添加节日
     */
    public function add_holiday(){
        if(IS_POST){
            $data=I('post.');
            $result=D('Holiday')->addData($data);
            if($result){
          
                // 操作成功
                $this->success('添加成功',U('Admin/Holiday/index'));
            }else{
                $error_word=D('Holiday')->getError();
                // 操作失败
                $this->error($error_word);
            }
        }else{
            $data=D('Holiday')->select();
            $assign=array(
                'data_holiday'=>$data
                );
            $this->assign($assign);
            $this->display();
        }
    }
}