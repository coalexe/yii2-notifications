<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace coalexe\notifications;

use yii\web\AssetBundle;

class NotificationsAsset extends AssetBundle
{
  public $sourcePath = '@vendor';
  public $css = [
    '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
    'coalexe/notifications/src/css/notifications.css'
  ];
  public $js = [
    'coalexe/notifications/src/js/notifications.js'
  ];
  public $depends = [
    'coalexe\notifications\WidgetFactoryAsset'
  ];
}
