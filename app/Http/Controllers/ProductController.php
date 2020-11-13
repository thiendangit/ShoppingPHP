<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Caterory;
use App\Models\Product;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $tag;

    public function __construct(Caterory $category, Product $product, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $html = $this->getCategory('');
        return view('admin.product.add', compact('html'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpLoadImage($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            //Insert data to product_image table
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $image) {
                    $dataUploadProductImage = $this->storageTraitUpLoadMultiImage($image, 'product');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'image_name' => $dataUploadProductImage['file_name'],
                        'image_path' => $dataUploadProductImage['file_path']
                    ]);
                }
            }
            if (!empty($request->tags)) {
                foreach ($request->tags as $tag) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tag]);
                    $tagId[] = $tagInstance->id;
                }
                $product->tags()->attach($tagId);
            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e . getLine());
        }
    }
}
