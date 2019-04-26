<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Tabs\Headings;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Button extends FieldsBuilder
{
    public function __construct(array $button_styles)
    {
        parent::__construct('button', ['label' => 'Button']);
        $this->addTab('Content')
            ->addRepeater('Buttons')
            ->addLink('Button')->setWidth('75')
            ->addSelect('Button Style', [
                'choices' => $button_styles,
            ])->setDefaultValue('dark')->setWidth('25')
            ->endRepeater()
        ;
    }
}