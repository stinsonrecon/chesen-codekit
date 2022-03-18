<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\BankRequest;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use Illuminate\Support\Facades\DB;
use Exception;
use PhpParser\Node\Expr\FuncCall;

class BankController extends Controller
{
    private $bank;

    public function __construct(BankAccount $bank)
    {
        $this->bank=$bank;
        $this->middleware(['auth']);
    }
    public function index(){
        $banks=$this->bank->paginate(5);
        return view('back-end.admin.bank.index',compact('banks'));
    }

    public function create(){
        return view('back-end.admin.bank.add');
    }

    public function store(BankRequest $request){
        try{
            DB::beginTransaction();
            $banks=$this->bank->create([
                'bankName'=>$request->bankName,
                'userName'=>mb_strtoupper($request->userName),
                'bankNumber'=>$request->bankNumber,
                'department'=>$request->department
            ]);
            
            
            DB::commit();
            session()->flash('success', 'Bạn đã thêm thành công.');
            return redirect()->route('bank.index');

        }
        catch(Exception $exception){
           
            DB::rollBack();

        }
    }
    public function edit($id){
        $banks=$this->bank->find($id);
        return view('back-end.admin.bank.edit',compact('banks'));
    }

    public function update($id,BankRequest $request){
        try{
            DB::beginTransaction();
            $this->bank->find($id)->update([
                'bankName'=>$request->bankName,
                'userName'=>mb_strtoupper($request->userName),
                'bankNumber'=>$request->bankNumber,
                'department'=>$request->department
            ]);
            
            DB::commit();
            session()->flash('success', 'Bạn đã sửa thành công.');
            return redirect()->route('bank.index');

        }
        catch(Exception $exception){
            DB::rollBack();

        }
    }
    public function delete($id){
        $this->bank->find($id)->delete();
        session()->flash('success', 'Bạn đã xóa thành công.');
        return redirect()->route('bank.index');
    }
}
