<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\NewRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;
use App\Models\News;
use Illuminate\Support\Facades\DB;
class NewController extends Controller
{
    use StorageImageTrait;
    private $new;
    public function __construct(News $new)
    {
        $this->new=$new; 
        $this->middleware(['auth']);     
    }
    public function index(){
        $news=$this->new->paginate('5');
        
        return view('back-end.admin.new.index',compact('news'));
    }
    public function create(){
        return view('back-end.admin.new.add');
    }
    public function store(NewRequest $request){
        try{
            DB::beginTransaction();
            
           
            $data= [
                'title' => $request->title,
                'description' => $request->description,
                'content'=>$request->content,
                'statusTop'=>$request->statusTop,
                'statusDisplay'=>$request->statusDisplay,
                
           
            ];
            $dataImgage =$this->storageTraitUploat($request,'linkImg','new');
                if(!empty($dataImgage))
                    {
                        $data['linkImg']=$dataImgage['file_name'];
                    }
                    else{
                        $data['linkImg']='chesen-banner-1.jpg';
                    }
           $this->new->create($data);
           DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
           return redirect()->route('new.index'); 
        }
        catch(Exception $exception){
            DB::rollBack();
        }
       
    }

    public function edit($id){
        $news=$this->new->find($id);
        return view('back-end.admin.new.edit',compact('news'));
    }

    public function update($id,NewRequest $request){
        try{
            DB::beginTransaction();
            
            $data= [
                'title' => $request->title,
                'description' => $request->description,
                'content'=>$request->content,
                'statusTop'=>$request->statusTop,
                'statusDisplay'=>$request->statusDisplay
            ];
            if($request->linkImg){
                Storage::delete('public/new/'.$this->new->find($id)->linkImg);
            }
            $dataImgage =$this->storageTraitUploat($request,'linkImg','new');   
                if(!empty($dataImgage))
                    {
                        $data['linkImg']=$dataImgage['file_name'];
                    }
                    
           $this->new->find($id)->update($data);
           DB::commit();
            session()->flash('success', 'Bạn đã sửa thành công.');
           return redirect()->route('new.index'); 
        }
        catch(Exception $exception){
            DB::rollBack();
        }
    }

    public function delete($id){
        $n = $this->new->find($id);
        
        if($n->linkImg && $n->linkImg != 'chesen-banner-1.jpg')
        {
            Storage::delete('public/new/'.$n->linkImg);
        }
        $n->delete();
        session()->flash('success', 'Bạn đã xóa thành công.');
        return redirect()->route('new.index');
    }

}
