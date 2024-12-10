<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputField extends Component
{
    public $id;
    public $name;
    public $label;
    public $type;
    public $placeholder;
    public $value;
    public $required;

    public function __construct($id, $name, $label, $type = 'text', $placeholder = '', $value = '', $required = true)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.input-field');
    }
}
