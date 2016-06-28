<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
class ProductController extends Controller
{
    //
    protected $folderPathIcon = 'upload/images/product/icon/';
    protected $folderPathBrosur = 'upload/images/product/brosur/';
    public function products ()
    {
        $products = Product::orderBy('created_at','desc')->get();
        $brosurPath = $this->folderPathBrosur;
        $iconPath = $this->folderPathIcon;
        return view('products.list', ['products' => $products, 'brosurPath' => $brosurPath, 'iconPath' => $iconPath]);
    }
    public function addProduct ()
    {
        return view('admin.add-product');
    }
    
    public function product_add (Request $requests)
    {
        $this->validate($requests, [
            'title' => 'required|max:255',
            'desk' => 'required',
            'content' => 'required|image'/*,
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
        if ($requests->file('content')) {
            $file = $requests->file('content');
            $file_name = date("h:s-d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathBrosur, $file_name);
            $product->content = $file_name;
        }
        if ($product->save()) {
            $message = 'Berhasil Ditambahkan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.list-product')->with(['message' => $message]);
    }

    
    public function listProduct ()
    {
        $products = Product::all();
        $no = 1;
        return view('admin.list-product', ['products' => $products, 'no' => $no ]);
    }

    
    public function editProduct ($id)
    {
        $product = Product::find($id);
        $brosurPath = $this->folderPathBrosur;
        return view('admin.edit-product', ['product' => $product, 'brosurPath' => $brosurPath]);
    }
    public function product_edit (Request $requests)
    {
        $this->validate($requests, [
            'title' => 'required|max:255',
            'desk' => 'required',
            'content' => 'image'/*,
            'icon' => 'reqired',
            'content' => 'required'*/
            ]);
        $product = Product::find($requests->product_id);
        $product->title = $requests->title;
        $product->desk = $requests->desk;
        $product->icon = 'none';
        $product->slide = 'none';
        $product->slide_img = 'none';
        if ($requests->file('content')) {
            $file = $requests->file('content');
            $file_name = date("h:s-d-M-Y").'-'.$file->getClientOriginalName();
            // Lokasi  upload brosur
            $file->move($this->folderPathBrosur, $file_name);
            $product->content = $file_name;
        }
        if ($product->update()) {
            $message = 'Berhasil Disimpan.';
        } else {
            $message = 'Terjadi Kesalahan ! Silahkan ulangi atau kontak webmaster.';
        }

        return redirect()->route('dashboard.list-product')->with(['message' => $message]);

    }
    public function product_del (Request $request)
    {
        $product = Product::find($request->product_id);
        if (is_null($product)) {
            return '0';
        } elseif ($product->delete()) {
            return '1';
        }
        return '2';
    }
}
