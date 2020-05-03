<?php

namespace App\Mainframe\Features\Form;

class Upload extends Input
{
    /** @var string */
    public $containerClass;
    /** @var null|mixed */
    public $moduleId;
    /** @var null|mixed */
    public $elementId;
    /** @var null|mixed */
    public $elementUuid;
    /** @var null|mixed */
    public $type;
    /** @var int */
    public $limit;
    /** @var null|int */
    public $tenantId;
    /** @var string */
    public $uploadBoxId;
    /** * @var string */
    public $uploadableType;

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  array  $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var,$element);

        $this->containerClass = $var['container_class'] ?? '';

        $this->elementUuid = $element->uuid;

        if($element){
            $this->uploadableType = $var['uploadable_type'] ?? get_class($element);
        }

        if ($element && $element->isUpdating()) {
            $this->elementId = $element->id;
            $this->tenantId = $element->tenant_id ?? null;
        }

        $this->moduleId = $var['module_id'] ?? $element->module()->id;


        $this->elementId = $var['element_id'] ?? $this->elementId;
        $this->elementUuid = $var['element_uuid'] ?? $this->elementUuid;
        $this->tenantId = $var['tenant_id'] ?? $this->tenantId;

        $this->type = $var['type'] ?? null;
        $this->limit = $var['limit'] ?? 999;
        $this->uploadBoxId = $var['upload_box_id'] ?? 'uploadBox'.\Str::random(8);

    }
}