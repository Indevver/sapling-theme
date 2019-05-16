<?php
/**
 * Created by PhpStorm.
 * User: rpark
 * Date: 4/25/2019
 * Time: 4:36 PM
 */

namespace Sapling\ACF\Tabs;


class Background
{
    private $background_colors = [];

    public function __construct(array $background_colors)
    {
        $this->background_colors = $background_colors;
    }

    public function addTab(&$builder)
    {
        $builder
            ->addTab('Background')
            ->addSelect("Background Type", [
                'choices' => [
                    '' => 'None',
                    'solid' => 'Solid',
                    'image' => 'Image'
                ]
            ])
            ->addSelect('Background Color', ['choices' => $this->background_colors])->conditional('Background Type', '==', 'solid')
            ->addImage('Background Image')->conditional('Background Type', '==', 'image')
        ;
    }
}