<?php

namespace Kompo;

use Kompo\Komponents\Field;
use Kompo\Komponents\Traits\HasRows;

class Textarea extends Field
{
    use HasRows;

    public $vueComponent = 'Textarea';

    protected function vlInitialize($label)
    {
        parent::vlInitialize($label);

        $this->rows(3);
    }
}
