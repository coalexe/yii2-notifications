<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace coalexe\notifications;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class Notifications extends Widget
{
  const DEFAULT_CLASS = "notifications";
      
  public $notificationTypes = ["success", "info", "warning", "error"];
  public $options = [];
  public $clientOptions = [];     

  public function init()
  {
    parent::init();

    if (!isset($this->options["id"]))
    {
      $this->options["id"] = $this->getId();
    }
      
    if(isset($this->options["class"]))
    {
      $this->options["class"] .= " " . self::DEFAULT_CLASS;
    }
    else
    {
      $this->options["class"] = self::DEFAULT_CLASS;
    }            
  }
  
  public function run()
  {
    $notifications = [];
    $session = \Yii::$app->getSession();
    $flashes = $session->getAllFlashes();
    
    foreach ($flashes as $type => $messages) 
    {
      if (in_array($type, $this->notificationTypes))
      {
        foreach ($messages as $message)
        {
          $notifications[] = ["type" => $type, "message" => $message];  
        }
      }
    }
    
    $html = Html::ul($notifications, ["id" => $this->options["id"], "class" => $this->options["class"] ,"item" => function($item, $index) {
      return Html::tag("li", $item->message, ["class" => "notification-" . $type]);
    }]);
    
    echo $html;
    
    $this->registerClientScript();
  }
  
	public function registerClientScript()
	{
		$view = $this->getView();
		NotificationsAsset::register($view);
	
		$options = empty($this->clientOptions) ? "" : Json::encode($this->clientOptions);
		$id = $this->options["id"];
		
		$view->registerJs("jQuery('#$id').notifications($options);");
	}  
}
