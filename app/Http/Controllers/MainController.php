<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;
use App\Product;
use App\Ads;
use Image;
class MainController extends Controller
{
    protected $folderPathNews = 'upload/images/news/';
    public function home ()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(4);
        $ads = Ads::orderBy('created_at','desc')->first();
        $path = $this->folderPathNews;
        return view('home', ['newest' => $news, 'path' => $path, 'ads' => $ads]);
    }
    
    public function upload(Request $requests){
        /*if (Input::hasFile('file')) {
            echo 'Uploaded <br />';
            $file = Input::file('file');
            $file->move('uploads', $file->getClientOriginName());
            echo '<img src="upload/'. $file->getClientOriginName().'"/>';
        }*/
        return redirect('/tes')->with('message', 'Message');
        /*if ($requests->hasFile('photo')) {
            echo "Helo";
        }*/
    }
    public function test (){
        $img = Image::url('/upload/hinata.png',64,64,array('crop'));
        
        echo '<img src=" ' .$img. '"/>';
    }
}
