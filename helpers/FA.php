<?php
namespace milano\helpers;

use yii\helpers\Html;

class FA
{

    const FIXED_WIDTH = 'fw';
    const BORDER = 'border';
    const SPIN = 'spin';
    const STACKED_INVERSE = 'inverse';

    const SIZE_LG = 'lg';
    const SIZE_2X = '2x';
    const SIZE_3X = '3x';
    const SIZE_4X = '4x';
    const SIZE_5X = '5x';

    const ROTATE_90 = 'rotate-90';
    const ROTATE_180 = 'rotate-180';
    const ROTATE_270 = 'rotate-270';

    const FLIP_HORIZONTAL = 'flip-horizontal';
    const FLIP_VERTICAL = 'flip-vertical';

    /**
     * Generate <i> tag with selected icon and parameters.
     *
     * @param string $name     Icon name
     * @param array  $settings Additional icon settings (size, rotate...)
     * @param array  $classes  Additional classes for <i> tag
     *
     * @return string
     */
    public static function icon($name, array $settings = [], array $classes = [])
    {
        $options = ['class' => 'fa'];

        Html::addCssClass($options, 'fa-' . $name);

        foreach ($settings as $setting) {
            if (substr($setting, 0, 3) !== 'fa-') {
                $setting = 'fa-' . $setting;
            }

            Html::addCssClass($options, $setting);
        }

        foreach ($classes as $class) {
            Html::addCssClass($options, $class);
        }

        return Html::tag('i', '', $options);
    }

}
