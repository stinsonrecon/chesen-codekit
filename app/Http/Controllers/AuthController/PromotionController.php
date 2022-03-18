<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PromotionRequest;
use App\Models\Product;
use App\Models\Promotion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PromotionController extends Controller
{
    private $promotion;
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->middleware(['auth']);
    }

    public function index()
    {

        $timeNow = Carbon::now();
        $p = $this->promotion->paginate('5');
        return view('back-end.admin.promotion.index', compact('p', 'timeNow'));
    }
    public function create()
    {
        return view('back-end.admin.promotion.add');
    }

    public function store(PromotionRequest $request)
    {
        DB::beginTransaction();
        $timeNow = Carbon::now();
        $endTime = $dt = Carbon::create($request->date_end . ' ' . $request->time_end);
        if (
            $request->limitTime == 1 && ($timeNow < $endTime) &&
            ($request->date_start < $request->date_end || (($request->date_start == $request->date_end) && $request->time_start < $request->time_end))
        ) {
            $data = [
                'name' => $request->name,
                'limitTime' => $request->limitTime,
                'startTime' => ($request->date_start . ' ' . $request->time_start),
                'endTime' => ($request->date_end . ' ' . $request->time_end),
            ];

            $this->promotion->create($data);
            session()->flash('success', 'Bạn đã thêm thành công.');
            DB::commit();
            return redirect()->route('promotion.index');
        } elseif ($request->limitTime == 0) {
            $data = [
                'name' => $request->name,
                'limitTime' => $request->limitTime,
                'startTime' => null,
                'endTime' => null,
            ];

            $this->promotion->create($data);

            session()->flash('success', 'Bạn đã thêm thành công.');
            DB::commit();
            return redirect()->route('promotion.index');
        } else {
            session()->flash('name', $request->name);

            session()->flash('fail', ' Vui lòng nhập lại thời gian (Thời gian kết thúc phải lớn hơn thời gian bắt đầu)');
            DB::rollBack();
            return redirect()->route('promotion.create');
        }
    }

    public function delete($id)
    {
        $products = Product::where('promoID',$id)->get();
        foreach ($products as $p) {
            $p->promoID = null;
            $p->save();
        }
        $this->promotion->find($id)->delete();
        session()->flash('success', 'Bạn đã xóa thành công.');
        return redirect()->route('promotion.index');
    }

    public function edit($id)
    {
        $promotions = $this->promotion->find($id);
        return view('back-end.admin.promotion.edit', compact('promotions'));
    }

    public function update(PromotionRequest $request, $id)
    {


        DB::beginTransaction();

        $timeNow = Carbon::now();
        $endTime = $dt = Carbon::create($request->date_end . ' ' . $request->time_end);

        if (
            $request->limitTime == 1 && ($timeNow < $endTime) &&
            ($request->date_start < $request->date_end || (($request->date_start == $request->date_end) && $request->time_start < $request->time_end))
        ) {
            $data = [
                'name' => $request->name,
                'limitTime' => $request->limitTime,
                'startTime' => ($request->date_start . ' ' . $request->time_start),
                'endTime' => ($request->date_end . ' ' . $request->time_end),
            ];

            $this->promotion->find($id)->update($data);

            session()->flash('success', 'Bạn đã sửa thành công.');
            DB::commit();
            return redirect()->route('promotion.index');
        } elseif ($request->limitTime == 0) {
            $data = [
                'name' => $request->name,
                'limitTime' => $request->limitTime,
                'startTime' => null,
                'endTime' => null,
            ];

            $this->promotion->find($id)->update($data);

            session()->flash('success', 'Bạn đã sửa thành công.');
            DB::commit();
            return redirect()->route('promotion.index');
        } else {
            session()->flash('name', $request->name);

            session()->flash('fail', '  Vui lòng nhập lại thời gian (Thời gian kết thúc phải lớn hơn thời gian bắt đầu và thời gian hiện tại)');

            DB::rollBack();
            return redirect()->route('promotion.edit', ['id' => $id]);
        }
    }
}
