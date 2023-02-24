<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Permission;

use App\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
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
        return view('livewire.admin.permission.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->permission->save();

        // $this->alert('success', __('Permission updated successfully!') );

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
