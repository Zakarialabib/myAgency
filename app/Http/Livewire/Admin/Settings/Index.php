<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Language;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    
    public Setting $setting;

    public $logoFile, $iconFile, $favicon, $siteImage;
    public $language_id;

    public array $listsForFields = [];

    protected $listeners = ['save', 'uploadFavicon', 'uploadLogo'];

    protected function initListsForFields(): void
    {
        $this->listsForFields['languages'] = Language::pluck('name', 'id')->toArray();
    }

    public function mount(Setting $setting)
    {
        $this->setting = $setting;
        $this->initListsForFields();
    }

    public function languageChange() {
        $this->render();
    }
   
    public function save()
    {
        $this->setting = Setting::update([
            'language_id' => $this->language_id,
            'website_title' => $this->website_title,
            'base_color' => $this->base_color,
        
            'site_logo' => $this->site_logo,
            'fav_icon' => $this->fav_icon,
        
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'address' => $this->address,

            'footer_text' => $this->footer_text,
            'copyright_text' => $this->copyright_text,
            
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,

            'social_facebook' => $this->social_facebook,
            'social_twitter' => $this->social_twitter,
            'social_instagram' => $this->social_instagram,
            'social_linkedin' => $this->social_linkedin,
            'social_whatsapp' => $this->social_whatsapp,

            'head_tags' => $this->head_tags,
            'body_tags' => $this->body_tags,

            'announcement' => $this->announcement,
            'announcement_delay' => $this->announcement_delay,
            'cookie_alert_text' => $this->cookie_alert_text,
            
            'is_preloader' => $this->is_preloader,
            'preloader_icon' => $this->preloader_icon,
            'preloader_bg_color' => $this->preloader_bg_color,

            'is_whatsapp' => $this->is_whatsapp,
            'is_cooki_alert' => $this->is_cooki_alert,
        ]);

        

        // $this->alert('success', __('Settings updated successfully!') );
    }


    public function uploadFavicon()
    {
        $favicon = $this->upload($this->iconFile, $this->favicon, 'iconFile');
        if($favicon){
            Setting::set('fav_icon', $favicon);
            // $this->alert('success', __('Favicon updated successfully!') );
            $this->iconFile = "";
            $this->favicon = $favicon;
        } else {
            $this->alert('error', __('Unable to upload your image') );
        }
    }

    private function upload($filename, $name,  $validateName)
    {
        $this->validate([
            $validateName => 'required|mimes:jpeg,png,jpg,gif,svg|max:1048'
        ]);

        if($name != null){
            Storage::delete('logo/'.$name);
        }

        $url = $filename->store('logo');

        return $url;
    }

    public function uploadLogo()
    {
        $logo = $this->upload($this->logoFile, $this->siteImage, 'logoFile');
        if($logo){
            Setting::set('site_logo', $logo);
            // $this->alert('success', __('Logo updated successfully!') );
            $this->logoFile = "";
            $this->siteImage = $logo;
        } else {
            $this->alert('error', __('Unable to upload your image') );
        }
    }


    public function render()
    {
        $setting = Service::when($this->language_id, function ($query) {
            return $query->where('language_id', $this->language_id);
            })->get();

        return view('livewire.admin.settings.index', compact('setting'));
    }

   
}
