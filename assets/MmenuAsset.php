<?php
namespace milano\assets;

class MmenuAsset extends BaseAsset
{

    public $sourcePath = '@bower/jQuery.mmenu/dist';
    public $js = [
        'js/jquery.mmenu.min.js'
    ];
    public $css = [
        'css/jquery.mmenu.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
