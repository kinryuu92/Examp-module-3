<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImgTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use DeleteModelTrait;
    use StorageImgTrait;

    private $category;
    private $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('category_id')->get();
        return view('admin.product.add', compact('categories'));
    }

    public function store(ProductAddRequest $request)
    {
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id' => $request->category_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            return redirect()->route('product.index', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        $dataProductUpdate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'category_id' => $request->category_id
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($dataUploadFeatureImage)) {
            $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->product->find($id)->update($dataProductUpdate);
        $product = $this->product->find($id);
        return redirect()->route('product.index', compact('product'));


    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }
}
