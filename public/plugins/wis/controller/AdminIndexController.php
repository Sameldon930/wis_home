<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace plugins\wis\controller; //Demo插件英文名，改成你的插件英文就行了

use cmf\controller\PluginAdminBaseController;
use plugins\wis\model\WechatMessagesModel;
use think\Db;

class AdminIndexController extends PluginAdminBaseController
{
    //后台菜单， 这里定义后，后台会自动补上菜单内容
    protected function _initialize()
    {
        parent::_initialize();
        $adminId = cmf_get_current_admin_id();//获取后台管理员id，可判断是否登录
        if (!empty($adminId)) {
            $this->assign("admin_id", $adminId);
        }
    }

    /**
     * 演示插件
     * @adminMenu(
     *     'name'   => '智世插件',
     *     'parent' => 'admin/Plugin/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '演示插件',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        //理由注释解释方法属性
        $model=new WechatMessagesModel();
        $param = $this->request->param();
        $param_data['page'] = !empty($param['page'])?$param['page']:'';

        $data  = $model->alias('a')
            ->order('update_time', 'DESC')
            ->paginate(10);
        $data->appends($param_data);
        $this->assign('articles', $data->items());
        $this->assign('page', $data->render());

        return $this->fetch('/admin_index');

       /* $users = Db::name("user")->limit(0, 5)->select();
        //$demos = PluginDemoModel::all();

        // print_r($demos);

        $this->assign("users", $users);


        $this->assign("users", $users);

        return $this->fetch('/admin_index');*/
    }

    /**
     * 演示插件设置
     * @adminMenu(
     *     'name'   => '智世插件设置',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '演示插件设置',
     *     'param'  => ''
     * )
     */
    public function setting()
    {
        $users = Db::name("user")->limit(0, 5)->select();
        //$demos = PluginDemoModel::all();

        // print_r($demos);

        $this->assign("users", $users);


        $this->assign("users", $users);

        return $this->fetch('/admin_index');
    }

}
