<?php
namespace milano\assets;

class OwlCarouselAsset extends BaseAsset
{

    public $sourcePath = '@bower/owl.carousel/dist';
    public $css = [
        'assets/owl.carousel.min.css'
    ];
    public $js = [
        'owl.carousel.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
