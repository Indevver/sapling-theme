<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Tabs\Headings;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Quote extends FieldsBuilder
{
    public function __construct()
    {
        parent::__construct('quote', ['label' => 'Quote']);
        $this->addTab('Content')
            ->addRepeater('Members', ['layout' => 'block'])
            ->addImage('Head Shot')
            ->addText('Name')->setWidth('50')
            ->addText('Position')->setWidth('50')
            ->addWysiwyg('quote')
            ->endRepeater()
        ;
    }
}