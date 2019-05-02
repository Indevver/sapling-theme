<?php
/**
 * Created by PhpStorm.
 * User: rpark
 * Date: 4/25/2019
 * Time: 4:36 PM
 */

namespace Sapling\ACF\Tabs;


class Spacing
{
    public function addTab(&$builder)
    {
        $builder
            ->addTab('Spacing')
            ->addTrueFalse('Full Width')->setWidth(50)
            ->addText('Max Width')->setWidth(50)
            ->addText('Margin Top')->setWidth(25)
            ->addText('Margin Right')->setWidth(25)
            ->addText('Margin Bottom')->setWidth(25)
            ->addText('Margin Left')->setWidth(25)
            ->addText('Padding Top')->setWidth(25)
            ->addText('Padding Right')->setWidth(25)
            ->addText('Padding Bottom')->setWidth(25)
            ->addText('Padding Left')->setWidth(25)
        ;
    }
}