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
            ->addImage('Image')->setWidth('50')
            ->addTrueFalse('Full Width')->setWidth('50')->setDefaultValue(true)
            ->addField('Text Alignment', 'button_group', [
                'choices' => [
                    "left" => "<span class=\"dashicons dashicons-editor-alignleft\"></span>",
                    "center" => "<span class=\"dashicons dashicons-editor-aligncenter\"></span>",
                    "right" => "<span class=\"dashicons dashicons-editor-alignright\"></span>",
                ]
            ])
        ;
    }
}