<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    use WithPagination;

    public int $perPage;

    public array $paginationOptions;

    public User $user;

    public array $roles = [];

    public array $subscriptions = [];

    public $price = "10";

    public string $password = '';

    public array $listsForFields = [];
   
    protected $listeners = [
        'submit',
    ];

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles'] = Role::pluck('title', 'id')->toArray();
    }

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->perPage           = 5;
        $this->paginationOptions = config('project.pagination.options');

        $this->roles = $this->user->roles->pluck('id')->toArray();

        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.user.edit');
    }

    public function submit()
    {
        $this->validate();
        
        if($this->password !== '')
        $this->user->password = bcrypt($this->password);
    
        $this->user->update();

        $this->user->roles()->sync($this->roles);

        $this->alert('success', __('User updated successfully!') );

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
            'password' => [
                'string',
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

   
}
