<?php

namespace dan8551\components\timeSlider;

use yii\bootstrap4\Html;
use yii\web\View;
use \yii\base\Widget;
use Yii;
use rmrevin\yii\fontawesome\FAS;

class TimeSlider extends Widget
{
    /**
     * 
     * @var bool  whether to display timeSlider as a range
     * @todo not yet implemented
     */
    public $range;
    
    /**
     * 
     * @var int minimum number to be displayed in minutes 0 = 0hours
     */
    public $min;
    
    /**
     * 
     * @var int maximum number to be displayed in minites 1439 = 2359
     */
    public $max;
    
    /**
     * 
     * @var int number of minutes to change at each movement of the slider
     */
    public $step;
    
    /**
     * 
     * @var int starting value of the slider in minutes
     */
    public $values;
    
    /**
     * 
     * @var int hours and minutes currently displayed
     */
    public $timeId;
    
    /**
     * 
     * @var string container for the parent of the slider
     */
    public $sliderId;
    
    /**
     * 
     * @var string javascript callback after the slider has moved
     */
    public $callback;
    
    /**
     * Overrides the parent function to load remote view into modal via Ajax.
     */
    public function run()
    {
	parent::run();
	$this->registerAssets();
        return true;
    }
    
    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        TimeSliderAsset::register($view);
        $uuid = uniqid();
        $js = <<<JS
            var ts = new TimeSlider({$this->range}, {$this->min}, {$this->max}, {$this->step}, {$this->values}, {$this->timeId}, {$this->sliderId}, {$this->callback});
            ts.slider();
        JS;
        $view->registerJs($js,View::POS_READY);
    }
}

?>
