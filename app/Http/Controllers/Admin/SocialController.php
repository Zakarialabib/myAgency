<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    //  Socila Links
    public function slinks(){
        $slinks = Social::all();
        return view('admin.settings.social.index', compact('slinks'));
    }

    // Store Social Link
    public function storeSlinks(Request $request){
        $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);

        $slink = new Social();
        $slink->icon = $request->icon;
        $slink->url = $request->url;
        $slink->save();

        $notification = array(
            'messege' => 'Social Link Added Successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Edit Social Links
    public function editSlinks($id){
        $slink = Social::findOrFail($id);
        return view('admin.settings.social.edit', compact('slink'));
    }

    // Update Social Links
    public function updateSlinks(Request $request, $id){

        $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);

        $slink = Social::findOrFail($id);
        $slink->icon = $request->icon;
        $slink->url = $request->url;
        $slink->save();

        $notification = array(
            'messege' => 'Social Link Updated Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.slinks')->with('notification', $notification);
    }    

    // Delete Social Links
    public function deleteSlinks($id){

        $slink = Social::findOrFail($id);
        $slink->delete();

        return redirect()->back();
    }


}
