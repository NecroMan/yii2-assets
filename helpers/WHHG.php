<?php
namespace milano\helpers;

use yii\helpers\Html;

class WHHG
{

    /**
     * Generate <i> tag with selected icon.
     *
     * @param string $name    Icon name
     * @param array  $classes Additional classes for <i> tag
     *
     * @return string
     */
    public static function icon($name, array $classes = [])
    {
        $options = ['class' => ''];

        Html::addCssClass($options, 'fa-' . $name);

        foreach ($classes as $class) {
            Html::addCssClass($options, $class);
        }

        return Html::tag('i', '', $options);
    }

}
