<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Permission;

use App\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

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

        $this->alert('success', __('Permission created successfully!'));

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
