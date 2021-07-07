<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use Illuminate\Support\Facades\Cache;

class clientController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth','verified']);

        $categories =Category::where('status','on')->get();
        $settings = DB::table('settings')->first(); 
        $pages =DB::table('pages')->where('status','on')->get();
        $ads = DB::table('adverts')->where('status','on')->orderBy('id','DESC')->get();
        if ($settings) {
           $settings->social = explode(',', $settings->social);

           foreach($settings->social as $social){
               $icon = explode('.',$social);
               $icon= $icon[1];
               $icons[]= $icon;
           }
           }else{
            $icons = [];
        }
        view()->share([
            'categories'=> $categories,
            'settings'=> $settings,
            'icons'=>$icons,
            'pages'=>$pages,
            'ads'=>$ads,
            ]);
    }


    public function index(){
        $data = DB::table('categories')->get();       
        $videos = DB::table('videos')->orderby('vid','DESC')->paginate(12); 
        foreach($videos as $video){
            if(!empty($video->videolink)){
                $url = explode('=',$video->videolink);
                $url = $url[1];
                $urls[] = $url;     
            
      }else{
         $urls=[]; 
      }
    }

        return view('Client.landing.home', ['data'=>$data, 'videos'=>$videos, 'url'=>$url]);

    }

    public function category($slug){
        $category = DB::table('categories')->where('slug', $slug)->first();      
        $videos = DB::table('videos')->where('category_id','LIKE','%'.$category->id.'%')->orderby('vid','DESC')->paginate(12);
        
        return view('Client.landing.category',['category'=>$category, 'videos'=>$videos]);

    }
    //movie detail

    public function videodetail($slug){
        $singlevideo = DB::table('videos')->where('slug',$slug)->first();
        $views = $singlevideo->views;
        $category = explode(',',$singlevideo->category_id);
        $category = $category[0];
        if (!empty($singlevideo)) {
            DB::table('videos')->where('slug', $slug)->update(['views'=>$views + 1]);
        }else{
            return null;
        }
     

        $videos = DB::table('videos')->where('category_id','LIKE','%'.$category.'%')->whereNotIn('vid', [$singlevideo->vid])->inRandomOrder()->paginate(12);
        return view('Client.landing.videodetail',['singlevideo'=>$singlevideo, 'videos'=>$videos
        ]);
    }
    public function searchcontent(){
        $url ='http://watchlive.streetceostv.com/videodetail';
        $text=$_GET['text'];
        $data = DB::table('videos')->where('title','LIKE','%'.$text.'%')->orwhere('description','LIKE','%'.$text.'%')->get();
        $output='';
        echo '<ul class="search-result">';
        if (count($data)> 0) {
            foreach($data as $d){
                echo '<li><a href="'.$url.'/'.$d->slug.'">'.$d->title.'</a></li>';
            }
        } else{
            echo '<li>Sorry! No Data Found For Your Search</li>';
        }
       
        echo '</ul>';
        return $output;
    }

    public function getpages($slug){
        $page = DB::table('pages')->where('slug', $slug)->first();
        return view('Client.landing.pages',['page'=>$page]);
    }
}
