<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminEditRequest;
use App\Http\Requests\Auth\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Exception;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use StorageImageTrait;
    private $admin;
    public function __construct(Admin $admin)
    {
        $this->middleware(['auth']);
        $this->admin = $admin;
    }
    public function index()
    {
        $admins = $this->admin->paginate('5');
        $idCheck = Admin::first()->id;
        return view('back-end.admin.admins.index', compact('admins', 'idCheck'));
    }
    public function create()
    {
        $id = Admin::first()->id;
        if (Auth::user()->id == $id) {
            $admins = $this->admin->paginate('5');
            return view('back-end.admin.admins.add', compact('admins'));
        } else {
            session()->flash('success', 'Bạn không có quyền thêm');
            return redirect()->route('admin.index');
        }
    }
    public function store(AdminRequest $request)
    {
        $id = Admin::first()->id;
        if (Auth::user()->id == $id) {
            try {
                DB::beginTransaction();
                $data = [
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                ];
                $dataImgage = $this->storageTraitUploat($request, 'linkImg', 'admins');
                if (!empty($dataImgage)) {
                    $data['linkImg'] = $dataImgage['file_name'];
                } else {
                    $data['linkImg'] = 'adminDefault.jpg';
                }
                $this->admin->create($data);
                DB::commit();
                session()->flash('success', 'Bạn đã thêm thành công.');
                return redirect()->route('admin.index');
            } catch (Exception $exception) {
                DB::rollBack();
            }
        } else {
            session()->flash('success', 'Bạn không có quyền thêm');
            return redirect()->route('admin.index');
        }
    }

    public function edit($id)
    {
        $idCheck = Admin::first()->id;
        if (Auth::user()->id == $idCheck || Auth::user()->id == $id) {
            $admins = $this->admin->find($id);
            return view('back-end.admin.admins.edit', compact('admins'));
        } else {
            session()->flash('success', 'Bạn không có quyền chỉnh sửa');
            return redirect()->route('admin.index');
        }
    }

    public function update(AdminEditRequest $request, $id)
    {
        $idCheck = Admin::first()->id;
        if (Auth::user()->id == $idCheck || Auth::user()->id == $id) {
            try {
                DB::beginTransaction();
                $data = [
                    'name' => $request->name
                ];
                if (!empty($request->password_confirm)) {
                    $data['password'] = Hash::make($request->password_confirm);
                }
                if ($request->linkImg && $this->admin->find($id)->linkImg != 'adminDefault.jpg') {
                    Storage::delete('public/admins/' . $this->admin->find($id)->linkImg);
                }
                $dataImgage = $this->storageTraitUploat($request, 'linkImg', 'admins');
                if (!empty($dataImgage)) {
                    $data['linkImg'] = $dataImgage['file_name'];
                }
                $this->admin->find($id)->update($data);
                DB::commit();
                session()->flash('success', 'Bạn đã sửa thành công.');
                return redirect()->route('admin.index');
            } catch (Exception $exception) {
                DB::rollBack();
            }
        } else {
            session()->flash('success', 'Bạn không có quyền chỉnh sửa');
            return redirect()->route('admin.index');
        }
    }

    public function delete($id)
    {
        $idCheck = Admin::first()->id;
        if (Auth::user()->id == $idCheck && $id != $idCheck) {
            $n = $this->admin->find($id);

            if ($n->linkImg && $n->linkImg != 'adminDefault.jpg') {
                Storage::delete('public/admins/' . $n->linkImg);
            }
            $n->delete();
            session()->flash('success', 'Bạn đã xóa thành công.');
            return redirect()->route('admin.index');
        } else {
            session()->flash('success', 'Bạn không có quyền xóa');
            return redirect()->route('admin.index');
        }
    }
}
