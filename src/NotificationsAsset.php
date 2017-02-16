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
  public $sourcePath = '@vendor/coalexe/notifications/src';
  public $css = [
    'css/notifications.css'
  ];
  public $js = [
    'js/notifications.js'
  ];
  public $depends = [
    'coalexe\notifications\WidgetFactoryAsset'
  ];
}
