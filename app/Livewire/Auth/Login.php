<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Livewire\Admin\Dashboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    #[Rule('boolean')]
    public $remember_me = false;

    public function authenticate()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {

            $user = User::where(['email' => $this->email])->first();

            auth()->login($user, $this->remember_me);

            if ($user->hasRole('admin')) {
                return $this->redirect(Dashboard::class);
            } else {
                return $this->redirect('/');
            }

        } else {
            session()->flash('error', 'Invalid credentials.');
        }

    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
