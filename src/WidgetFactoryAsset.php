<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace coalexe\notifications;

use yii\web\AssetBundle;

class WidgetFactoryAsset extends AssetBundle
{
  public $sourcePath = '@bower/jquery-ui/ui';
  public $css = [
  ];
  public $js = [
    'widget.js'
  ];
  public $depends = [
      'yii\web\JqueryAsset',
  ];

  public function init()
  {
    if (YII_ENV_PROD)
    {
      $this->js = ['minified/widget.min.js'];
    }

    parent::init();
  }
}
