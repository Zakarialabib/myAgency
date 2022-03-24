<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Contact; 
use App\Mail\ContactForm as MailContactForm;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ContactForm extends Component
{

    public Contact $contact;
    
    public $name, $email, $subject, $phone_number, $message;
    
    protected $listeners = [
        'submit',
    ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->phone_number = '';
        $this->message = '';
    }

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }  

    public function render()
    {
        return view('livewire.front.contact-form');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        $contact = Contact::create([
            'name' =>  $this->name,
            'email' =>  $this->email,
            'phone_number' =>  $this->phone_number,
            'subject' =>  $this->subject,
            'message' =>  $this->message,
        ]);

        $this->alert('success', __('Your Message is sent succesfully.') );

        $this->resetInputFields();

        $user = User::find(1);
        $user_email = $user->email;
        Mail::to($user_email)->send(new MailContactForm($contact));

    }
}
