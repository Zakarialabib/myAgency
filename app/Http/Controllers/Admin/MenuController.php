<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Language;
use App\Models\Daynamicpage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(Request $request) {

       
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;

      
        // set language
        app()->setLocale($lang->code);

        // get page names of selected language
        $pages = Daynamicpage::where('language_id', $lang->id)->get();

       
        $data["pages"] = $pages;

        // get previous menus
        $menu = Menu::where('language_id', $lang->id)->first();
        $data['prevMenu'] = '';

        if (!empty($menu)) {
            $data['prevMenu'] = $menu->menus;
        }
     

        return view('admin.menu.index', $data);
    }

    public function update(Request $request) {
        // return response()->json(json_decode($request->str, true));

        

        $menus = json_decode($request->str, true);

    

        foreach ($menus as $key => $menu) {
            if (strpos($menu['type'], 'products') !== false) {
                if (array_key_exists('children', $menu) && !empty($menu['children'])) {
                    return response()->json(['status' => 'error', 'message' => 'Product Menu can not contain children!']);
                }
            }
            if (array_key_exists('children', $menu) && !empty($menu['children'])) {
                $allChildren = json_encode($menu['children']);
                if (strpos($allChildren, 'products') !== false) {
                    return response()->json(['status' => 'error', 'message' => 'Product Menu cannot be children of a Menu!']);
                }
            }
        }

        Menu::where('language_id', $request->language_id)->delete();

        $menu = new Menu;
        $menu->language_id = $request->language_id;
        $menu->menus = json_encode($menus);
        $menu->save();

        return response()->json(['status' => 'success', 'message' => 'Menu updated successfully!']);
    }

}
