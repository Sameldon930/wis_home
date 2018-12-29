<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace plugins\wis\controller; //Demo插件英文名，改成你的插件英文就行了
use cmf\controller\PluginRestBaseController;
use plugins\Demo\Model\PluginDemoModel;
use plugins\wis\model\WechatMessagesModel;
use think\Db;
use think\Request;


class ApiIndexController extends PluginRestBaseController
{

    public function index()
    {
        dump($_POST);
        dump($_GET);
        //echo '1231231';die;
        $this->success('success', ['hello' => 'hello ThinkCMF!']);
    }

    public function wechat_message()
    {
        $request = Request::instance();

        //dump($data);die;
        if(!$request->isAjax()){
            return $this->success('success', ['error' => '请求类型错误']);
        }
        $data=$request->param();
        if(empty($data['mobile'])||empty($data['name'])){
            return $this->success('success', ['error' => '手机号或者名字未填写']);
        }
        //echo is_numeric($data['mobile']);die;
        if(!is_numeric($data['mobile'])||strlen($data['mobile'])!=11){
            return $this->success('success', ['error' => '手机号码错误！']);
        }
        if(strlen($data['name'])>=64){
            return $this->success('success', ['error' => '姓名过长！']);
        }
        $message=new WechatMessagesModel;
        $message->data([
            'name'  =>  $data['name'],
            'mobile' =>  $data['mobile'],
            'create_time' =>  time(),
            'update_time' =>  time()
        ]);
        $message->save();

        return $this->success('success', ['error' => '提交成功！']);
    }

}
