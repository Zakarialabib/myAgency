<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    // public User $user;

    public string $password = '';

    public $user, $name, $address, $phone, $email, $company_name,
    $whatsapp_number , $telegram_link, $banner_image;
   
    protected $listeners = [
        'submit',
    ];

    public function mount()
    {
        $user =   User::find(Auth::user()->id);
        $this->name      = $user->name;
        $this->address       = $user->address;
        $this->phone         = $user->phone;
        $this->email         = $user->email;
        $this->company_name       = $user->company_name;
        $this->whatsapp_number         = $user->whatsapp_number;
        $this->telegram_link         = $user->telegram_link;
        $this->banner_image         = $user->banner_image;
    }

    public function render()
    {
        return view('livewire.admin.user.profile');
    }

    public function submit()
    {
        try{

            $this->user = User::find(Auth::user()->id);
          
            if($this->banner_image){

                $filename = $this->banner_image->store("/");
            }
            
            $validatedDate = $this->validate([
                'email'          => 'email',
                'name'        => 'required|string',
                'address'       => 'max:255',
                'phone'       => 'required|numeric|max:1O',
                'company_name'       => 'max:255',
                'whatsapp_number'       => 'max:255',
                'telegram_link'       => 'max:255',
            ]);
            
            $this->user->banner_image = $filename;
            
            if($this->password !== '')
                $this->user->password = bcrypt($this->password);
            $this->user->update($validatedDate);

            // $this->alert('success', __('Profil updated successfully!') );

        }catch(Exception $e){
            $this->alert('error', __('Unable to update informations!') );

        }

    }


}
