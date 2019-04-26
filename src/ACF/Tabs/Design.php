<?php
/**
 * Created by PhpStorm.
 * User: rpark
 * Date: 4/25/2019
 * Time: 4:32 PM
 */

namespace Sapling\ACF\Tabs;


class Design
{
    public function addTab(&$builder, array $text_colors, array $background_colors)
    {
        $builder
            ->addTab('Design')
            ->addTrueFalse('Full Width')->setWidth(50)
            ->addText('Max Width')->setWidth(50)
            ->addField('Text Alignment', 'button_group', [
                'choices' => [
                    "left" => "<span class=\"dashicons dashicons-editor-alignleft\"></span>",
                    "center" => "<span class=\"dashicons dashicons-editor-aligncenter\"></span>",
                    "right" => "<span class=\"dashicons dashicons-editor-alignright\"></span>",
                ]
            ])->setWidth('50')
            ->addSelect('Text Color', [
                'choices' => ['default' => 'Default'] + $text_colors,
            ])->setWidth('50')
            ->addSelect('Background Type', ['choices' => ['solid' => 'Solid', 'gradient' => 'Gradient']])->setWidth('50')
            ->addImage('Background Image')
            ->setWidth('25')
            ->conditional('Background Type', '==', 'solid')
            ->addSelect('Background Color', [
                'choices' => ['default' => 'Default'] + $background_colors,
            ])
            ->setWidth('25')
            ->conditional('Background Type', '==', 'solid')
            ->addColorPicker('Top Background Color')
            ->setWidth('25')
            ->conditional('Background Type', '==', 'gradient')
            ->addColorPicker('Bottom Background Color')
            ->setWidth('25')
            ->conditional('Background Type', '==', 'gradient')
        ;
    }
}