<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class adminController extends Controller

{

  public function __construct()
  {
      $this->middleware(['auth','can:manageContent']);
  }
    public function settings()
      {
        $data = DB::table('settings')->first(); 
        if ($data) {
          $data->social = explode(',', $data->social);
        }

        return view('Admin.settings', ['data'=>$data]);
      }

//adding New page


    public function pages(){
      return view('Admin.pages.add-pages');
    }
    
    public function allpages(){
      $pages = DB::table('pages')->get();
      return view('Admin.pages.index', ['pages'=>$pages]);
    } 
    public function Edit($id)
    {
        $page = DB::table('pages')->where('id',$id)->first();
       return view('Admin.pages.Edit',['page'=>$page]); 
    } 
    public function allads()
    {
        $ads = DB::table('adverts')->get();
       return view('Admin.ads.index',['ads'=>$ads]); 
    } 
    public function editads($id)
    {
        $adverts = DB::table('adverts')->where('id',$id)->first();
       return view('Admin.ads.edit',['adverts'=>$adverts]); 
    }   
    public function ads()
    {
       return view('Admin.ads.addads'); 
    }
     
    public function allmessages(){
      $messages = DB::table('messages')->get();
      return view('Admin.messages.index',['messages'=>$messages]);

    }

    public function AllUsers(){
      $users = DB::table('users')->get();
      return view('Admin.users.users',['users'=>$users]);
    }

}


