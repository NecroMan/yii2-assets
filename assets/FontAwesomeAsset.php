<?php
namespace milano\assets;

class FontAwesomeAsset extends BaseAsset
{

    public $sourcePath = '@bower/font-awesome';
    public $css = [
        'css/font-awesome.min.css',
    ];
    public $publishOptions = [
        'only' => [
            'fonts/*',
            'css/*',
        ]
    ];

}
