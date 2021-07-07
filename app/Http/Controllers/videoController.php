<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
class videoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
    {
        $categories =DB::table('categories')->get();
        return view('Admin.video.add-video', ['categories'=> $categories]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function videoshare()
    {
        $videos =  DB::table('videos')->get();
        view()->share([
         'videos'=> $videos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->has('password')) {
            $data['password'] = Hash::make($data['password']);
        }   

    //processsing social links requst 
        if ($request->has('category_id')) {
            $data['category_id'] = implode(',',$data['category_id']);
        }

        if ($request->has('social')) {
            $data['social'] = implode(',',$data['social']);
        }
        //handling image file processing

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($tbl,$data['image']);
        }
        if ($request->hasFile('video')) {
            $data['video'] = $this->uploadvideo($tbl,$data['video']);
        }

        DB::table($tbl)->insert($data);
        session::flash('message',' Data Has Been Inserted Successfully');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadImage($location, $imagename)
    {
        $name = $imagename->getClientOriginalName();

        $imagename->move(public_path().'/'.$location.'/images',date('ymdgis').$name);
        return date('ymdgis').$name;
    }
    public function uploadvideo($location, $videoname)
    {
        $name = $videoname->getClientOriginalName();
        $videoname->move(public_path().'/'.$location.'/vids',date('ymdgis').$name);
        return date('ymdgis').$name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videodata = DB::table('videos')->where('vid',$id)->first();
       $categories = DB::table('categories')->get();
       $vidcat = explode(',',$videodata->category_id);
       return view('Admin.video.Edit',['videodata'=>$videodata,'categories'=>$categories, 'vidcat'=>$vidcat]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($request->has('category_id')) {
            $data['category_id'] = implode(',',$data['category_id']);
        }
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($tbl,$data['image']);
        }
        if ($request->hasFile('video')) {
            $data['video'] = $this->uploadvideo($tbl,$data['video']);
        }
        DB::table($tbl)->where(key($data),reset($data))->update($data);
        session::flash('message',' Data Has Been Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function videolist()
    {
        $datas = DB::table('videos')->paginate(30); 
        $videos = DB::table('videos')->get();
        $publishedvideo = DB::table('videos')->where('status','publish')->get();
        foreach($datas as $data){
            $categories = explode(',', $data->category_id);
            foreach($categories as $category){
                $datacategory = DB::table('categories')->where('id', $category)->value('title');
                $datacategories[] = $datacategory;
                $datacategory = implode(', ', $datacategories);

            }
            $data->category_id = $datacategory;
            $datacategories=[];
        }
        return view('Admin.video.index', ['datas'=>$datas,'publishedvideo'=>$publishedvideo,'videos'=>$videos]);
    }

    public function massDelete(Request $request)
    {
        $data = $request->except('_token');
        if($data['bulk-action'] == 0){
            session::flash('message','Please select the action you want to perform');
            return redirect()->back();
        }
        $tbl = decrypt($data['tbl']);
        $tblid = decrypt($data['tblid']);
        if(empty($data['select-data'])) {
            session::flash('message','Please select the data you want to delete');
            return redirect()->back();
        }
        $ids = $data['select-data'];
        foreach($ids as $id){
            DB::table($tbl)->where($tblid,$id)->delete();
        }
        session::flash('message','Data deleted successifully');
            return redirect()->back();
    }
}

    