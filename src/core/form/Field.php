<?php

namespace app\core\form;

use app\core\Model;

class Field extends BaseField
{

    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_FILE = 'file';
    const TYPE_URL = 'url';

    /**
     * Field constructor.
     *
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }

    public function renderInput(): string
    {
        return sprintf('<input type="%s" class="form-control%s" name="%s" value="%s">',
            $this->type,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }

    public function passwordField(): static
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function fileField(): static
    {
        $this->type = self::TYPE_FILE;
        return $this;
    }

    public function urlField(): static
    {
        $this->type = self::TYPE_URL;
        return $this;
    }
}