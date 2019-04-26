<?php
namespace Sapling\ACF\Tabs;


class Headings
{
    public function addTab(&$builder)
    {
        $builder->addTab('Headings')
            ->addImage('Icon')
            ->addRepeater('Headings')
            ->addSelect('Size', ['choices' => [
                'h1' => 'Heading 1',
                'h2' => 'Heading 2',
                'h3' => 'Heading 3',
                'h4' => 'Heading 4',
                'h5' => 'Heading 5',
                'h6' => 'Heading 6',
            ]])->setWidth('50')
            ->addText('Heading')->setWidth('50')
            ->endRepeater()
        ;
    }
}