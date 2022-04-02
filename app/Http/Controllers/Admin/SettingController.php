<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
	public function index(Setting $setting)
    {
        // abort_if(Gate::denies('admin_settings_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.index',compact('setting'));
    }

}