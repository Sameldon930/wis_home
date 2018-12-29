<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\Config;
use think\Db;

class TestController extends HomeBaseController
{
    public function index()
    {

        $prefix= Config::get('database.prefix');

        Db::execute('CREATE TABLE IF NOT EXISTS `'.$prefix.'kkkkkk'.'` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT \'订单ID\',
  `amount` bigint(20) DEFAULT NULL COMMENT \'交易金额\',
  `balance` bigint(20) DEFAULT NULL COMMENT \'实际金额\',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT \'账变类型\',
  `flow` tinyint(3) unsigned NOT NULL COMMENT \'资金流向 1：转入 2：转出\',
  `snap` text COLLATE utf8mb4_unicode_ci COMMENT \'快照\',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business` tinyint(4) DEFAULT NULL COMMENT \'业务类型\',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');

    }
}
