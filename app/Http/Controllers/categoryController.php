<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class categoryController extends Controller
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
    public function index()
    {
        $data = DB::table('categories')->get(); 
        $videos = DB::table('videos')->get(); 
        return view('Admin.category.View', ['data'=>$data, 'videos'=>$videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    //processsing social links requst 
        if ($request->has('social')) {
            $data['social'] = implode(',',$data['social']);
        }
        //handling image file processing

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($tbl,$data['image']);
        }
        
        if ($request->hasFile('FeaturedImage')) {
            $data['FeaturedImage'] = $this->uploadcatImage($tbl,$data['FeaturedImage']);
        }
        if ($request->hasFile('backgroundimg')) {
            $data['backgroundimg'] = $this->uploadbImage($tbl,$data['backgroundimg']);
        }


        DB::table($tbl)->insert($data);
        session::flash('message',' Data Has Been Inserted Successfully');
        return redirect()->back();
        
    }

    public function uploadbImage($location, $imagename){
        $name = $imagename->getClientOriginalName();

        $imagename->move(public_path().'/'.$location.'/bimg',date('ymdgis').$name);
        return date('ymdgis').$name; 
    }

    public function uploadcatImage($location, $imagename){
        $name = $imagename->getClientOriginalName();

        $imagename->move(public_path().'/'.$location, date('ymdgis').$name);
        return date('ymdgis').$name; 
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

        $imagename->move(public_path().'/'.$location,date('ymdgis').$name);
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
        $categorydata = DB::table('categories')->where('id',$id)->first();
       $data = DB::table('categories')->get();
       return view('Admin.category.Edit',['data'=>$data,'categorydata'=>$categorydata]); 
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
               //processsing social links requst 
       if ($request->has('social')) {
        $data['social'] = implode(',',$data['social']);
    }
    //handling image file processing

    if ($request->hasFile('image')) {
        $data['image'] = $this->uploadImage($tbl,$data['image']);
    }
     
    if ($request->hasFile('FeaturedImage')) {
        $data['FeaturedImage'] = $this->uploadcatImage($tbl,$data['FeaturedImage']);
    }
    

    if ($request->hasFile('backgroundimg')) {
        $data['backgroundimg'] = $this->uploadbImage($tbl,$data['backgroundimg']);
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
    public function destroy($id)
    {
       
    }

    public function massDelete(Request $request)
    {

        if ($request->hasFile('image')) {
            unlink($imagename);
        }
         
        if ($request->hasFile('FeaturedImage')) {
             unlink($imagename);
        }
        
    
        if ($request->hasFile('backgroundimg')) {
          unlink($imagename);
        }
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
