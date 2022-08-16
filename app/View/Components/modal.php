<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal extends Component
{

    public $id;
    public $title;
    public $route;
    public $color;
    public $dynamic;
    public $modal;
    public $validation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $title, string $route, string $validation = null, string $color = 'primary', $dynamic = false, $modal = 'modal-md')
    {
        $this->id = $id;
        $this->title = $title;
        $this->route = $route;
        $this->color = $color;
        $this->dynamic = $dynamic;
        $this->modal = $modal;
        $this->validation = $validation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
