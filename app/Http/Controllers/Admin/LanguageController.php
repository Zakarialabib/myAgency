<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use DB;
use File;

class LanguageController extends Controller
{
    /**
     * Remove the specified resource from storage.
     * @return Response
    */
    public function index()
    {
   	  $languages = DB::table('languages')->get();
   	  $columns = [];
	  $columnsCount = $languages->count();
	    if($languages->count() > 0){
	        foreach ($languages as $key => $language){
	            if ($key == 0) {
	                $columns[$key] = $this->openJSONFile($language->code);
	            }
	            $columns[++$key] = ['data'=>$this->openJSONFile($language->code), 'lang'=>$language->code];
	        }
	    }
   	  return view('admin.language', compact('languages','columns','columnsCount'));
    }   

    /**
     * Remove the specified resource from storage.
     * @return Response
    */
    public function store(Request $request)
    {
   	    $request->validate([
		    'key' => 'required',
		    'value' => 'required',
		]);
		$data = $this->openJSONFile('en');
        $data[$request->key] = $request->value;
        $this->saveJSONFile('en', $data);
        return redirect()->route('languages');
    }
    /**
     * Remove the specified resource from storage.
     * @return Response
    */

    public function langEdit($id)
    {
      $la = Language::find($id);
      $json = file_get_contents(base_path('lang/') . $la->code . '.json');
      $list_lang = Language::all();
  
  
      if (empty($json)) {
        $notify[] = ['error', 'File Not Found.'];
        return back()->with($notify);
      }
      $json = json_decode($json);
  
      return view('admin.language.edit_lang', compact( 'json', 'la', 'list_lang'));
    }
    public function updateLanguageJson(Request $request, $id)
    {
      $this->validate($request, [
        'key' => 'required',
        'value' => 'required'
      ]);
  
      $reqkey = trim($request->key);
      $reqValue = $request->value;
      $lang = Language::find($id);
  
      $data = file_get_contents(resource_path('lang/') . $lang->code . '.json');
  
      $json_arr = json_decode($data, true);
  
      $json_arr[$reqkey] = $reqValue;
  
      file_put_contents(resource_path('lang/') . $lang->code . '.json', json_encode($json_arr));
  
      
      return redirect()->back();
    }
    public function storeLanguageJson(Request $request, $id)
  {
    $la = Language::find($id);
    $this->validate($request, [
      'key' => 'required',
      'value' => 'required'
    ]);

    $items = file_get_contents(base_path('lang/') . $la->code . '.json');

    $reqKey = trim($request->key);

    if (array_key_exists($reqKey, json_decode($items, true))) {
      $notify[] = ['error', "`$reqKey` Already Exist"];
      return back()->withNotify($notify);
    } else {
      $newArr[$reqKey] = trim($request->value);
      $itemsss = json_decode($items, true);
      $result = array_merge($itemsss, $newArr);
      file_put_contents(base_path('lang/') . $la->code . '.json', json_encode($result));


      
      return redirect()->back();
    }
  }

    public function destroy($key)
    {
        $languages = DB::table('languages')->get();
        if($languages->count() > 0){
            foreach ($languages as $language){
                $data = $this->openJSONFile($language->code);
                unset($data[$key]);
                $this->saveJSONFile($language->code, $data);
            }
        }
        return response()->json(['success' => $key]);
    }
    /**
     * Open Translation File
     * @return Response
    */
    private function openJSONFile($code){
        $jsonString = [];
        if(File::exists(base_path('resources/lang/'.$code.'.json'))){
            $jsonString = file_get_contents(base_path('resources/lang/'.$code.'.json'));
            $jsonString = json_decode($jsonString, true);
        }
        return $jsonString;
    }


    /**
     * Save JSON File
     * @return Response
    */
    private function saveJSONFile($code, $data){
        ksort($data);
        $jsonData = json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        file_put_contents(base_path('resources/lang/'.$code.'.json'), stripslashes($jsonData));
    }
    /**
     * Save JSON File
     * @return Response
    */
    public function transUpdate(Request $request){
        $data = $this->openJSONFile($request->code);
        $data[$request->pk] = $request->value;
        $this->saveJSONFile($request->code, $data);
        return response()->json(['success'=>'Done!']);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
    */
    public function transUpdateKey(Request $request){
        $languages = DB::table('languages')->get();
        if($languages->count() > 0){
            foreach ($languages as $language){
                $data = $this->openJSONFile($language->code);
                if (isset($data[$request->pk])){
                    $data[$request->value] = $data[$request->pk];
                    unset($data[$request->pk]);
                    $this->saveJSONFile($language->code, $data);
                }
            }
        }
        return response()->json(['success'=>'Done!']);
    }

    public function changeLanguage($locale)
    {
        Session::put('language_code', $locale);
        $language = Session::get('language_code');

        return redirect()->back();
    }

}