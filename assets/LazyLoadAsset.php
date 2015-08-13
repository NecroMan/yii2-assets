<?php
namespace milano\assets;

class LazyLoadAsset extends BaseAsset
{

    public $sourcePath = '@bower/jquery.lazyload';
    public $js = [
        'jquery.lazyload.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function publish($am)
    {
        parent::publish($am);

        $path = $am->publish('@vendor/as-milano/yii2-assets/assets/src/lazyLoad');
        $this->js[] = $path[1] . '/js/animate.js';
    }

}
