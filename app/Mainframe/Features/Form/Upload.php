<?php

namespace App\Mainframe\Features\Form;

class Upload extends Form
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
     * @param  array  $conf
     */
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($element);


        $this->containerClass = $conf['container_class'] ?? '';

        $this->elementUuid = $element->uuid;

        if($element){
            $this->uploadableType = $conf['uploadable_type'] ?? get_class($element);
        }

        if ($element && $element->isUpdating()) {
            $this->elementId = $element->id;
            $this->tenantId = $element->tenant_id ?? null;
        }

        $this->moduleId = $conf['module_id'] ?? $element->module()->id;


        $this->elementId = $conf['element_id'] ?? $this->elementId;
        $this->elementUuid = $conf['element_uuid'] ?? $this->elementUuid;
        $this->tenantId = $conf['tenant_id'] ?? $this->tenantId;

        $this->type = $conf['type'] ?? null;
        $this->limit = $conf['limit'] ?? 999;
        $this->uploadBoxId = $conf['upload_box_id'] ?? 'uploadBox'.\Str::random(8);

    }
}