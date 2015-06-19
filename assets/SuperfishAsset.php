<?php
namespace milano\assets;

class SuperfishAsset extends BaseAsset
{

    public $sourcePath = '@bower/superfish/dist';
    public $css = [
        'css/superfish.css'
    ];
    public $js = [
        'js/hoverIntent.js',
        'js/superfish.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
