<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Auth;
use App\Video;
use UserStatus;
use DB;
use App\Category;
use Illuminate\Support\Facades\Cache;

class clientController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth','verified',UserStatus::class]);

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
        $videos = Video::orderby('id','DESC')->paginate(12); 
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
        $videos = Video::where('category_id','LIKE','%'.$category->id.'%')->orderby('id','DESC')->paginate(12);
        
        return view('Client.landing.category',['category'=>$category, 'videos'=>$videos]);

    }
    //movie detail

    public function videodetail($slug){
        $singlevideo = Video::where('slug',$slug)->first();
        $views = $singlevideo->views;
        $category = explode(',',$singlevideo->category_id);
        $category = $category[0];
        if (!empty($singlevideo)) {
           Video::where('slug', $slug)->update(['views'=>$views + 1]);
        }else{
            return null;
        }
     

        $videos = Video::where('category_id','LIKE','%'.$category.'%')->whereNotIn('id', [$singlevideo->id])->inRandomOrder()->take(8)->get();
        return view('Client.landing.videodetail',['singlevideo'=>$singlevideo, 'videos'=>$videos
        ]);
    }
    public function searchcontent(){
        $url ='http://127.0.0.1:8000/videodetail';
        $text=$_GET['text'];
        $data =Video::where('title','LIKE','%'.$text.'%')->orwhere('description','LIKE','%'.$text.'%')->get();
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

     //entry page
     public function Usersubscription(){
        $plans = Flutterwave::subscriptions()->getall();
        $users = collect($plans['data']);
       
        $users=collect($users);
        $person = $users->filter(function ($value, $key) {
            return collect($value)->contains('customer_email', Auth::user()->email);
        });
        $person=$person->filter()->all();
        foreach($person as $Subscribed_user){
            $plan_id = $Subscribed_user['plan'];
            $Userplan = Flutterwave::plans()->fetch($plan_id);
            $Userplan = $Userplan['data'];
            return view('Client.landing.subscription',['Subscribed_user'=>$Subscribed_user,'Userplan'=>$Userplan]);
        }
     }

     public function LikeVideo(Request $request){

        $myvideo = Video::find($request->id);
        $response = auth()->user()->toggleLike($myvideo);

        return response()->json(['success'=>$response]);
    }


    //adding and removing a favourite video
    public function favourite(Request $request){

        $myvideo = Video::find($request->id);
        $response = auth()->user()->toggleFavorite($myvideo);

        return response()->json(['success'=>$response]);
    }

    public function watchlist(){
        $videos = auth()->user()->getFavoriteItems(Video::class)->paginate(8);
        return view('Client.landing.watchlist',['videos'=>$videos]);
    }
}
