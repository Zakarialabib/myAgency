<?php

namespace App\Http\Livewire\Admin\Permission;

use Livewire\Component;
use App\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Create extends Component
{
    use LivewireAlert;
    public Permission $permission;
    
    protected $listeners = [
        'submit',
    ];

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function render()
    {
        return view('livewire.admin.permission.create');
    }

    public function submit()
    {
        $this->validate();

        $this->permission->save();

        $this->alert('success', __('Permission created successfully!') );

        return redirect()->route('admin.permissions.index');
    }

    protected function rules(): array
    {
        return [
            'permission.title' => [
                'string',
                'required',
            ],
        ];
    }
}
