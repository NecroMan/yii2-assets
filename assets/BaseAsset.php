<?php
namespace milano\assets;

class BaseAsset extends \yii\web\AssetBundle
{

    /**
     * Removes '.min' part of filename.
     *
     * @param string $path Original filename
     *
     * @return string
     */
    private function removeMin($path)
    {
        return str_replace('.min.', '.', $path);
    }

    public function init()
    {
        // If we are in debug mode, replace minified versions of js and css files with full ones.
        if (YII_DEBUG) {
            array_map([$this, 'removeMin'], $this->css);
            array_map([$this, 'removeMin'], $this->js);
        }

        parent::init();
    }

}
