<?php

declare(strict_types=1);

namespace App\Livewire\Utils;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;

    protected $listeners = [
        'show' => 'show',
    ];

    /**
     * -------------------------------------------------------------------------------
     *  Set Modal
     * -------------------------------------------------------------------------------
     */
    public function show()
    {
        $this->show = true;
    }
}
