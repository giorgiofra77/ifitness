<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * The type of button.
     *
     * @var string
     */
    public $type;
    /**
     * The alert type.
     *
     * @var string
     */
    public $alertType;
    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     * @param  string  $type
     * @param string $alertType
     * @param  string  $message
     * @return void
     */
    public function __construct($type, $alertType, $message)
    {
        $this->type = $type;
        $this->alertType = $alertType;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.buttons.button');
    }
}
