<?php

namespace dan8551\components\timeSlider;

use Yii;
use yii\web\AssetBundle;

class TimeSliderAsset extends AssetBundle
{
     public $sourcePath = '@vendor/dan8551/yii2-time-slider/assets';

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
    ];
   
   public $css = [
	'css/timeSlider.css'
   ];
    
    public $js = [
        'js/timeSlider.js',
    ];


}
