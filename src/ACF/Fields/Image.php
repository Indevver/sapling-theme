<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Tabs\Headings;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Image extends FieldsBuilder
{
    public function __construct()
    {
        parent::__construct('image', ['label' => 'Image']);
        $this->addTab('Content')
            ->addField('Image Alignment', 'button_group', [
                'choices' => [
                    "left" => "<span class=\"dashicons dashicons-align-left\"></span>",
                    "center" => "<span class=\"dashicons dashicons-align-center\"></span>",
                    "right" => "<span class=\"dashicons dashicons-align-right\"></span>",
                ]
            ])
            ->addImage('Image')->setWidth('50')
            ->addTrueFalse('Full Width')->setWidth('50')->setDefaultValue(true)
        ;
    }
}