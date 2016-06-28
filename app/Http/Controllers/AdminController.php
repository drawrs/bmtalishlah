<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Tag;
use App\News;
use App\Product;
use Auth;
class AdminController extends Controller
{
    //

        protected $hari = array(
                    'Monday' => "Senin",
                    'Tuesday' => "Selasa",
                    'Wednesday' => "Rabu",
                    'Thursday' => "Kamis",
                    'Friday' => "Jum'at",
                    'Saturday' => "Sabtu",
                    'Sunday' => "Minggu"
                    );
        protected $bulan = array(
                    '01' => "Januari",
                    '02' => "Febuari",
                    '03' => "Maret",
                    '04' => "April",
                    '05' => "Mei",
                    '06' => "Juni",
                    '07' => "Juli",
                    '08' => "Agustus",
                    '09' => "September",
                    '10' => "Oktober",
                    '11' => "November",
                    '12' => "Desember"
                    );
    public function dashboard ()
    {
        return view('admin.welcome');
    }
    public function add_tag (Request $request)
    {
        $tag = new Tag;
        $tag->name = $request->tagName;
        $tag->slug = str_slug($request->tagName);
        if ($tag->save()) {
            return '1';
        }
        return '0';
    }
    public function addNews ()
    {
        $tags = Tag::all();
        return view('admin.add-news', ['tags' => $tags ]);
    }
    public function addProduct ()
    {
        return view('admin.add-product');
    }
    //Proses
    public function news_add (Request $requests) 
    {
        $this->validate($requests, [
            'title' => 'required',
            'tag_id' => 'required',
            'content' => 'required'
            ]);
        $title = $requests->title;
        $tag_id = $requests->tag;
        $content = $requests->content;
        $image = 'none';
        /*Siapkan Tanggal*/
        $day = date('l');
        $month = date('m');
        $year = date('Y');
        $date = date('d');
        $fixDate = $this->hari[$day] . ', ' . $date . ' ' . $this->bulan[$month] . ' ' . $year;

        /*Eksekusi Query*/
        $news = new News;
        $news->user_id = Auth::user()->id;
        $news->tag_id = $tag_id;
        $news->title = $title;
        $news->slug = str_slug($title);
        $news->content = $content;
        $news->image = $image;
        $news->date = $fixDate;
        if ($news->save()) {
            $message = 'Berhasil Diterbitkan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.add-news')->with(['message' => $message]);
        //return $requests->title;
    }
    public function product_add (Request $requests)
    {
        $this->validate($requests, [
            'title' => 'required',
            'desk' => 'required'/*,
            'icon' => 'reqired',
            'content' => 'required'*/
            ]);
        $product = new Product;
        $product->title = $requests->title;
        $product->desk = $requests->desk;
        $product->icon = 'none';
        $product->content = 'none';
        $product->slide = 'none';
        $product->slide_img = 'none';
        if ($product->save()) {
            $message = 'Berhasil Ditambahkan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.add-product')->with(['message' => $message]);
    }

    public function listNews ()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $no = 1;
        return view('admin.list-news', ['news' => $news, 'no' => $no]);
    }
    public function listProduct ()
    {
        return;
    }

    public function editNews ($id)
    {
        $news = News::find($id);
        $tags = Tag::all();
        return view('admin.edit-news', ['news' => $news, 'tags' => $tags]);
    }
    public function editProduct ($id)
    {
        $product = Product::find($id);
        return view('admin.edit-product', ['product' => $product]);
    }

    public function delTag (Request $request)
    {
        $tag = Tag::find($request->tag_id);
        $news = News::where('tag_id', $request->tag_id);
        if (is_null($tag)) {
            return '0';
        } elseif ($tag->delete() && $news->delete()) {
            return '1';
        }
        return '2';
    }
}
