<?php

namespace App\View\Components;

use Illuminate\View\Component;

class formbtn extends Component
{

    public $color;
    public $text;
    public $loading;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = 'Continuar', $loading = 'Procesando...', $color = 'primary')
    {
        $this->text = $text;
        $this->loading = $loading;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.formbtn');
    }
}
