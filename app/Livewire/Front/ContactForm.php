<?php

declare(strict_types=1);

namespace App\Livewire\Front;

use App\Models\Contact;
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
    public $subject;

    public function render()
    {
        return view('livewire.front.contact-form');
    }

    public function mount($type = null)
    {
        $this->subject = $type;
    }

    public function placeholder()
    {
        return <<<'HTML'
            <div>
                <!-- Loading spinner... -->
                <i class="fas fa-spinner fa-spin fa-fw"></i>
            </div>
            HTML;
    }

    public function submit()
    {
        $validated = Validator::make(
            // Data to validate...
            [
                'name'         => $this->name,
                'email'        => $this->email,
                'phone_number' => $this->phone_number,
                'message'      => $this->message,
                'subject'      => $this->subject,
            ],

            // Validation rules to apply...
            [
                'name'         => 'required|min:3',
                'email'        => 'required|email|min:3',
                'phone_number' => 'required|numeric|min:3',
                'message'      => 'required|min:3',
            ],

            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();

        Contact::create($validated);

        $this->alert('success', __('Your Message is sent succesfully.'));

        $this->reset(
            'name',
            'email',
            'phone_number',
            'message'
        );
    }
}
