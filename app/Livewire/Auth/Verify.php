<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Verify extends Component
{
    // use LivewireAlert;

    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            redirect(route('home'));
        }

        Auth::user()->sendEmailVerificationNotification();

        $this->dispatch('resent');

        $this->alert('resent');
    }

    public function render()
    {
        return view('livewire.auth.verify');
    }
}
