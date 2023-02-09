<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Newsletter;

class NewslettersForm extends Component
{
    public Newsletter $newsletter;
    
    public $email;
    
    protected $listeners = [
        'submit',
    ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->email = '';
    }

    public function mount(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }  

    public function render()
    {
        return view('livewire.front.newsletters-form');
    }

    protected $rules = [    
            'newsletter.email' => 'required|email',
    ]; 

    public function newsletterform()
    {
        
        $this->validate();

        $this->newsletter->save();

        // $this->alert('success', __('Your Message is sent succesfully.') );

        $this->resetInputFields();

        // $user = User::find(1);
        // $user_email = $user->email;
        // Mail::to($user_email)->send(new MailNewsletterForm($newsletter));

    }
    
}
