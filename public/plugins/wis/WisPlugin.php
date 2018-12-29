<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace plugins\wis;//Demo插件英文名，改成你的插件英文就行了
use cmf\lib\Plugin;
use think\Config;
use think\Db;

//Demo插件英文名，改成你的插件英文就行了
class WisPlugin extends Plugin
{

    #自定义参数 start
    public $mysqlname = 'wechat_messages';
    public $prefix = '';

    #自定义参数 end
    public function __construct()
    {

        $this->prefix=Config::get('database.prefix');
        //必须执行父类的构造函数
        parent::__construct();
    }

    public $info = [
        'name'        => 'Wis',//Demo插件英文名，改成你的插件英文就行了
        'title'       => 'wis插件演示',
        'description' => 'wis插件演示',
        'status'      => 1,
        'author'      => 'wis',
        'version'     => '1.0',
        'demo_url'    => 'http://demo.thinkcmf.com',
        'author_url'  => 'http://www.thinkcmf.com'
    ];

    public $hasAdmin = 1;//插件是否有后台管理界面

    // 插件安装
    public function install()
    {

        Db::execute('CREATE TABLE IF NOT EXISTS `'.$this->prefix.$this->mysqlname.'` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT \'名字\',
      `mobile` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT \'手机号\',
      `create_time` int(10) UNSIGNED  NOT NULL COMMENT \'创建时间\',
      `update_time` int(10) UNSIGNED  NOT NULL COMMENT \'更新时间\',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
        //插件的安装，建议增加数据表表单
        return true;//安装成功返回true，失败false
    }

    // 插件卸载
    public function uninstall()
    {


        Db::execute('DROP TABLE '.$this->prefix.$this->mysqlname.';');
        //删除数据表内容
        return true;//卸载成功返回true，失败false
    }

    //实现的footer_start钩子方法  //钩子类型在数据库hook 和 pluginModel 中定死了。 //如需添加自己钩子，需要在 hooks.php 中定义
   /* public function footerStart($param)
    {
        $config = $this->getConfig();
        $this->assign($config);
        echo $this->fetch('widget');
    }*/

    public function wechatMessageForm($param)
    {
        //$config = $this->getConfig();
       // $this->assign($config);
        echo $this->fetch('wechat_message_form');
    }

    public function wechatMessageMobileForm($param)
    {
        //$config = $this->getConfig();
        // $this->assign($config);
        echo $this->fetch('wechat_message_mobile_form');
    }


}