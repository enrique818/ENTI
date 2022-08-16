<?php

namespace App\View\Components;

use Illuminate\View\Component;

class select extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $col;
    public $mb;
    public $class;
    public $value;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label = null, $placeholder = '', $col = 'col-12', $mb = 'mb-4', $class = '', $value = '', $required = true)
    {
        $this->name = $name;
        $this->label = $label??$name;
        $this->placeholder = $placeholder;
        $this->col = $col??'col-12';
        $this->mb = $mb??'mb-4';
        $this->class = $class??'';
        $this->value = $value??'';
        $this->required = $required??true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
