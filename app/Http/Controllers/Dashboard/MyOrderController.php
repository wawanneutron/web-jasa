<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MyOrder\UpdateMyOrderRequest;
use App\Models\AdvantageService;
use App\Models\AdvantageUser;
use App\Models\Order;
use App\Models\Service;
use App\Models\Tagline;
use App\Models\ThumbnailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('freelancer_id', Auth::user()->id)->latest()->get();
        return view('pages.dashboard.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $service = Service::whereId($order['service_id'])->first();
        $advantage_service = AdvantageService::whereServiceId($order['service_id'])->get();
        $advantage_user = AdvantageUser::whereServiceId($order['service_id'])->get();
        $thumbnail = ThumbnailService::whereServiceId($service->id)->get();
        $tagline = Tagline::whereServiceId($order['service_id'])->get();
        $services = Service::whereUsersId(Auth::user()->id)->get();

        return view('pages.dashboard.order.detail', compact(
            'order',
            'service',
            'advantage_service',
            'advantage_user',
            'thumbnail',
            'tagline',
            'services'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::whereFreelancerId(Auth::user()->id)->findOrFail($id);
        return view('pages.dashboard.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMyOrderRequest $request, Order $order)
    {
        $data = $request->all();

        if ($request->hasFile('file')) {
            $path = $request->file('file')
                ->store('assets/order/attachment', 'public');
            $order = Order::find($order->id);
            $order->file = $path;
            $order->note = $data['note'];
            $order->save();
        }

        toast()->success('Submit order has been success');
        return redirect()->route('member.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    public function waiting($id)
    {
        $order = Order::whereFreelancerId(Auth::user()->id)->findOrFail($id);
        $order->order_status_id = 4;
        $order->save();

        toast()->success('Accept order has been success');
        return back();
    }

    public function accepted($id)
    {
        $order = Order::whereFreelancerId(Auth::user()->id)->findOrFail($id);
        $order->order_status_id = 2;
        $order->save();

        toast()->success('Accept order has been success');
        return back();
    }

    public function rejected($id)
    {
        $order = Order::whereFreelancerId(Auth::user()->id)->findOrFail($id);
        $order->order_status_id = 3;
        $order->save();

        toast()->success('Reject order has been success');
        return back();
    }
}
