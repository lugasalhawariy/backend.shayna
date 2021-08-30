<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $slug = $request->input('slug');
        $name = $request->input('name');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        // getAll
        $product = Product::with('gallery');

        // berdasarkan ID
        if($id){
            $product = Product::with('gallery')->find($id);

            if($product){
                return ResponseFormatter::success($product, 'Data produk berhasil diambil');
            }else{
                return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
            }
        }

        // berdasarkan SLUG
        if($slug){
            $product = Product::with('gallery')->where('slug', $slug)->first();

            if($product){
                return ResponseFormatter::success($product, 'Data produk berhasil diambil');
            }else{
                return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
            }
        }

        // berdasarkan NAME
        if($name){
            $product->where('name', 'like', '%' . $name . '%');
        }

        // berdasarkan TYPE
        if($type){
            $product->where('type', 'like', '%' . $type . '%');
        }

        // berdasarkan PRICE FROM
        if($price_from){
            $product->where('price_from', '>=', $price_from);
        }

        // berdasarkan PRICE TO
        if($price_to){
            $product->where('price_to', '<=', $price_to);
        }

        // Jika data list ditemukan, maka akan return success
        if($product->count() > 0){
            return ResponseFormatter::success(
                $product->paginate($limit),
                'Data list produk berhasil diambil'
            );
        }else{
            return ResponseFormatter::error(
                null,
                'Data list produk tidak ada',
                404
            );
        }
        
    }
}
