<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProducts() {
        $limit = 10;
        $products = Product::paginate($limit);
        return view('products.index', [
            'products' => $products
        ])->with('i', (request()->input('page', 1) - 1) * $limit);
    }

    public function createProduct() {
        return view('products.create');
    }

    public function storeProduct(Request $request) {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'stock' => 'required',
        //     'price' => 'required',
        // ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');

        if ($request->image) {
            $originalFileName = $request->image->getClientOriginalName(); // Database.png
            $extension = substr(strrchr($originalFileName, '.'), 1); // png
            $newFileName = $this->generateRandomString(20).'.'.$extension; // abc + . + png = abc.png
            $request->image->storeAs('public/products', $newFileName); // storage/public/products/abc.png
            $product->image = ''.$newFileName; // Image column in table: abc.png
        }

        $product->save();
        return redirect("/products");
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect("/products");
    }

    public function showProduct($id) {
        $product = Product::find($id);
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function updateProduct($id) {
        $product = Product::find($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function editProduct($id, Request $request) {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->updated_at = new DateTime();
        $product->save();
        return redirect("/products");
    }

    public function searchProduct(Request $request) {
        $search = $request->input('search');
        $limit = 5;
        $products = DB::table('products')
            ->where('products.name', 'LIKE', "%$search%")
            ->orWhere('products.description', 'LIKE', "%$search%")
            ->paginate($limit);
        $products->appends('search', $search);
        return view('products.index', [
                'products' => $products
            ])->with('i', (request()->input('page', 1) - 1) * $limit);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
