<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Tabs\Headings;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Hero extends FieldsBuilder
{
    public function __construct(array $button_styles)
    {
        parent::__construct('hero', ['label' => 'Hero']);
        $this->addTab('Content')
            ->addImage('Background')
            ->addText('Heading')->setWidth('50')
            ->addRepeater('Call To Action')
            ->addLink('Button')->setWidth('75')
            ->addSelect('Button Style', [
                'choices' => $button_styles,
            ])->setDefaultValue('light')->setWidth('25')
            ->endRepeater()
        ;
    }
}