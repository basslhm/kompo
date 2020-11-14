<?php

namespace Kompo\Tests\Feature\Validation;

use Illuminate\Support\Str;
use Kompo\Core\MetaAnalysis;
use Kompo\Form;
use Kompo\Komponents\Field;

class _AllFieldsValidationsForm extends Form
{
    protected $fields;

    public function created()
    {
        $this->fields = collect(MetaAnalysis::getAllOfType(Field::class))->map(function ($field) {
            return new $field(class_basename($field));
        });
    }

    public function handle()
    {
    }

    public function komponents()
    {
        return $this->fields;
    }

    public function rules()
    {
        return collect($this->fields)->mapWithKeys(function ($field) {
            return [
                Str::snake(class_basename($field)) => 'required',
            ];
        });
    }
}
