<?php

namespace App\Http\Livewire\Admin\User;

use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    public User $user;
    public array $roles = [];
    public string $password = '';
    public array $listsForFields = [];
   
    protected $listeners = [
        'submit',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = bcrypt($this->password);
        $this->user->save();
        $this->user->roles()->sync($this->roles);

        $this->alert('success', __('User created successfully!') );

        return redirect()->route('admin.users.index');
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'user.phone' => [
                'numeric',
                'required',
                'max:10',
            ],
            'user.company_name' => [
                'string',
            ],
            'user.address' => [
                'string',
            ],
            'password' => [
                'string',
                'required',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles'] = Role::pluck('title', 'id')->toArray();
    }
}
