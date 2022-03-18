<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promotion;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $promotion;
    public function __construct(Product $product,Promotion $promotion)
    {
        $this->product=$product;
        $this->promotion=$promotion;
    }
    public function index(){
        $products=$this->product->paginate(5);
        return view('back-end.admin.product.index',compact('products'));
    }
    public function create(){
        $promotions=$this->promotion->all();
        return view('back-end.admin.product.add',compact('promotions'));
    }
    public function store(ProductRequest $request){
        if ($request->quantity <= 0) {
            session()->flash('success', 'Số lượng sản phẩm phải > 0');
            return redirect()->route('product.index'); 
        }
        try{
            DB::beginTransaction();
            $data= [
                'name' => $request->name,
                'priceRoot'=>$request->priceRoot,
                'pricePromo'=>$request->pricePromo,
                'quantity'=>$request->quantity,
                'description' => $request->description,
                'status'=>$request->status,
           
            ];
            if($request->promotion==0){
                $data['promoID']=null;
            }
            else
            {
                $data['promoID']=$request->promotion;
            }
            $dataImgage =$this->storageTraitUploat($request,'linkImg','product');
            if(!empty($dataImgage))
                    {
                        $data['linkImg']=$dataImgage['file_name'];
                    }
                    else{
                        $data['linkImg']='chesen-banner-1.jpg';
                    }
          $this->product->create($data);
           DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
           return redirect()->route('product.index'); 
        }
        catch(Exception $exception){
            DB::rollBack();
        }
    }
    public function delete($id){
        try{
            $n = $this->product->find($id);
            $pathImg = $n->linkImg;
            $n->delete();
            if($pathImg && $pathImg != 'chesen-banner-1.jpg')
            {
                Storage::delete('public/product/'.$pathImg);
            }
            session()->flash('success', 'Bạn đã xóa thành công.');
            return redirect()->route('product.index');
        } catch(Exception $exception){
            session()->flash('success', 'Sản phẩm đang thuộc đơn hàng không thể xóa');
            return redirect()->route('product.index');
        }
        
    }
    public function edit($id){
        $products=$this->product->find($id);
        $promotions=$this->promotion->all();
        return view('back-end.admin.product.edit',compact('promotions','products'));
    }

    public function update(ProductRequest $request,$id){
        if ($request->quantity <= 0) {
            session()->flash('success', 'Số lượng sản phẩm phải > 0');
            return redirect()->route('product.index'); 
        }
        try{
            DB::beginTransaction();
            $data= [
                'name' => $request->name,
                'priceRoot'=>$request->priceRoot,
                'pricePromo'=>$request->pricePromo,
                'quantity'=>$request->quantity,
                'description' => $request->description,
                'status'=>$request->status,
           
            ];
            if($request->promotion==0){
                $data['promoID']=null;
            }
            else
            {
                $data['promoID']=$request->promotion;
            }
            if($request->linkImg){
                Storage::delete('public/product/'.$this->product->find($id)->linkImg);
            }
            $dataImgage =$this->storageTraitUploat($request,'linkImg','product');   
                if(!empty($dataImgage))
                    {
                        $data['linkImg']=$dataImgage['file_name'];
                    }
          $this->product->find($id)->update($data);
         
           DB::commit();
            session()->flash('success', 'Bạn đã sửa thành công.');
           return redirect()->route('product.index'); 
        }
        catch(Exception $exception){
            DB::rollBack();
        }
    }
}
