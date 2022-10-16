<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();

        $category = Category::findOrFail($validateData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validateData['category_id'],
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['slug']),
            'brand' => $validateData['brand'],
            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],
            'original_price' => $validateData['original_price'],
            'selling_price' => $validateData['selling_price'],
            'quantity' => $validateData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'mata_title' => $validateData['mata_title'],
            'meta_keyword' => $validateData['meta_keyword'],
            'meta_description' => $validateData['meta_description'],


        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'upload/products/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $ext;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName =  $uploadPath . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,


                ]);
            }
        }

        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully');
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);

        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();

        return view('admin.products.edit', compact('product', 'categories', 'brands', 'colors'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {


        $validateData = $request->validated();

        $product = Category::findOrFail($validateData['category_id'])->products()->where('id', $product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validateData['category_id'],
                'name' => $validateData['name'],
                'slug' => Str::slug($validateData['slug']),
                'brand' => $validateData['brand'],
                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],
                'original_price' => $validateData['original_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'mata_title' => $validateData['mata_title'],
                'meta_keyword' => $validateData['meta_keyword'],
                'meta_description' => $validateData['meta_description'],
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'upload/products/';

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $ext = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $ext;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName =  $uploadPath . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,


                    ]);
                }
            }

            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0,
                    ]);
                }
            }
            
            return redirect('/admin/products')->with('message', 'Product Updated Successfully');
        } else {
            return redirect('/admin/products')->with('message', 'No Such Product Id Not Found!');
        }
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted!');
    }



    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted!');
    }

    public function updateProdColorQuantity(Request $request, $prod_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)->productColors()->where('id', $prod_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Product Color Qty updated']);
    }


    public function deleteProdColor($prod_color_id)
    {
       $prodcolo= ProductColor::findOrFail($prod_color_id);
       $prodcolo->delete();
       return response()->json(['message' => 'Product Color Deleted']);
    }

}
