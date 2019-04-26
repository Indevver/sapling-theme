<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Tabs\Headings;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Form extends FieldsBuilder
{
    public function __construct()
    {
        parent::__construct('form', ['label' => 'Form']);
        $this->addTab('Content')
            ->addNumber('Form ID')
        ;
    }
}