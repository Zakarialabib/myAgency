<?php

namespace App\Http\Livewire\Admin\About;

use Livewire\WithFileUploads;
use App\Models\About;
use App\Models\Language;
use Livewire\Component;
use Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    
    public About $about;
    
    public $image, $icon,$inputs;
    public $block_titles = [];
    public $block_contents = [];
    
    protected $listeners = [
        'submit',
    ];
    
    
    protected function rules(): array
    {
        return [
            'about.language_id' => [
                'required',
            ],
            'about.status' => [
                'required',
            ],
            'about.image' => [
                'nullable',
            ],
            'about.title' => [
                'required',
                'max:191'
            ],
            'about.content' => [
                'required',
            ],
            'inputs.*.block_title' => [
                'required',
            ],
            'inputs.*.block_content' => [
                'required',
            ],
        ];
    }

    public function mount(About $about)
    {
        $this->about = $about;
        
        $this->fill([
            'inputs' => collect([['block_title' => '','block_content' => '']]),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.about.edit');
    }

    public function submit()
    {
        $this->validate();
        
        $this->about->slug = Str::slug($this->about->title);
        
        if($this->image){
            $imageName = Str::slug($this->about->title).'.'.$this->image->extension();
            $this->image->storeAs('abouts',$imageName);
            $this->about->image = $imageName;
        }

        foreach($this->inputs as $key => $input){
                // $this->about->block_title = json_encode($this->block_titles);
            // $this->about->block_content = json_encode($this->block_contents);
            $this->inputs['block_title'] = json_encode($this->block_titles);
            $this->inputs['block_content'] = json_encode($this->block_contents);
        }
 
        $this->about->save();   
        

        $this->alert('success', __('About updated successfully!') );

        return redirect()->route('admin.about.index');
    }
  
    public function addInput()
    {
        $this->inputs->push(['block_title' => '','block_content' => '']);
    }

    public function removeInput($key)
    {
        $this->inputs->pull($key);
    }

}
