<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    // public User $user;

    public string $password = '';

    public $user;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $company_name;
    public $whatsapp_number;
    public $telegram_link;
    public $banner_image;

    protected $listeners = [
        'submit',
    ];

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->address = $user->address;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->company_name = $user->company_name;
        $this->whatsapp_number = $user->whatsapp_number;
        $this->telegram_link = $user->telegram_link;
        $this->banner_image = $user->banner_image;
    }

    public function render()
    {
        return view('livewire.admin.user.profile');
    }

    public function submit()
    {
        try {
            $this->user = User::find(Auth::user()->id);

            if ($this->banner_image) {
                $filename = $this->banner_image->store('/');
            }

            $validatedDate = $this->validate([
                'email' => 'email',
                'name' => 'required|string',
                'address' => 'max:255',
                'phone' => 'required|numeric|max:1O',
                'company_name' => 'max:255',
                'whatsapp_number' => 'max:255',
                'telegram_link' => 'max:255',
            ]);

            $this->user->banner_image = $filename;

            if ($this->password !== '') {
                $this->user->password = bcrypt($this->password);
            }
            $this->user->update($validatedDate);

            // $this->alert('success', __('Profil updated successfully!') );
        } catch(Exception $e) {
            $this->alert('error', __('Unable to update informations!'));
        }
    }
}
