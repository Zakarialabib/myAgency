<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use Brotzka\DotenvEditor\DotenvEditor;

class Smtp extends Component
{
	public $host;
	public $port;
	public $username;
	public $password;
	public $encryption;

	public function mount()
	{
		$env              = new DotenvEditor();
		$this->host       = $env->getValue("MAIL_HOST");
		$this->port       = $env->getValue("MAIL_PORT");
		$this->username   = $env->getValue("MAIL_USERNAME");
		$this->password   = $env->getValue("MAIL_PASSWORD");
		$this->encryption = $env->getValue("MAIL_ENCRYPTION");
	}

    public function render()
    {
        return view('livewire.admin.settings.smtp');
    }

    public function onUpdateSMTP(){

    	try {

	        $env = new DotenvEditor();

	        $env->changeEnv([
				'MAIL_HOST'       => $this->host,
				'MAIL_PORT'       => $this->port,
				'MAIL_USERNAME'   => $this->username,
				'MAIL_PASSWORD'   => $this->password,
				'MAIL_ENCRYPTION' => $this->encryption   
	        ]);
			$this->alert('success', __('Email configuration updated successfully!') );
        
    	} catch (\Exception $e) {
			$this->alert('error', __($e->getMessage()) );
    	}

    }
}