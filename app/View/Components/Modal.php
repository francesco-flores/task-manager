<?php

namespace App\View\Components;

//use Closure;
//use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $title;
    public $buttonText;

    public function __construct($id, $title = 'Modal Title', $buttonText = 'Open Modal')
    {
        $this->id = $id;
        $this->title = $title;
        $this->buttonText = $buttonText;
    }

    public function render()
    {
        return view('components.modal');
    }
}
