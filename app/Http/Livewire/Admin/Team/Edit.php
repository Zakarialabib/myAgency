<?php

namespace App\Http\Livewire\Admin\Team;

use Livewire\WithFileUploads;
use App\Models\Team;
use App\Models\Language;
use Livewire\Component;
use Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    
    public Team $team;
    
    public $image;

    protected $listeners = [
        'submit',
    ];
    
    protected $rules = [    
        'team.language_id' => 'required',
        'team.status' => 'required',
        'team.image' => 'nullable',
        'team.name' => 'required|max:191',
        'team.content' => 'required',
        'team.role' => 'required',
    ]; 

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.admin.team.edit');
    }

    public function submit()
    {
        $this->validate();
        
        if($this->image){
            $imageName = Str::slug($this->team->name).'.'.$this->image->extension();
            $this->image->storeAs('teams',$imageName);
            $this->team->image = $imageName;
        }

        $this->team->save();

        $this->alert('success', __('Team updated successfully!') );

        return redirect()->route('admin.teams.index');
    }
  
}
