<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertMessage extends Component
{

    // public function __construct(string $message = "success", string $type = "info")
    // {
    //     $this->message = $message;
    //     $this->type = $type;
    // }

    public function render()
    {
        return view('components.alert-message');
    }
}
