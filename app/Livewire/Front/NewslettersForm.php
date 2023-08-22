<?php

declare(strict_types=1);

namespace App\Livewire\Front;

use App\Mail\SubscribedMail;
use App\Models\Newsletter;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NewslettersForm extends Component
{
    public Newsletter $newsletter;
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.front.newsletters-form');
    }

    public function save()
    {
        $this->validate();

        Newsletter::create([
            'email' => $this->email,
        ]);

        $this->alert('success', __('Your are subscribed to our newsletters.'));

        $this->resetInputFields();

        $user = User::find(1);
        $user_email = $user->email;
        Mail::to($user_email)->send(new SubscribedMail());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->email = '';
    }
}
