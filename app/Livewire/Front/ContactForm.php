<?php

declare(strict_types=1);

namespace App\Livewire\Front;

use App\Mail\ContactForm as MailContactForm;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ContactForm extends Component
{
    use LivewireAlert;
    public Contact $contact;

    public $name;

    public $email;

    public $phone_number;

    public $message;

    public function render()
    {
        return view('livewire.front.contact-form');
    }

    public function submit()
    {
        $validated = Validator::make(
            // Data to validate...
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'message' => $this->message,
            ],

            // Validation rules to apply...
            [
                'name' => 'required|min:3',
                'email' => 'required|email|min:3',
                'phone_number' => 'required|numeric|min:3',
                'message' => 'required|min:3',
            ],

            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();

        Contact::create($validated);

        $this->alert('success', __('Your Message is sent succesfully.'));

        $this->resetInputFields();

        $user = User::find(1);
        $user_email = $user->email;
        Mail::to($user_email)->send(new MailContactForm($contact));
        
        $this->reset(
            'name',
            'email',
            'phone_number',
            'message'
        );
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->message = '';
    }
}
