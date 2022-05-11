<?php

namespace App\Http\Controllers\Landing;

use App\Models\Order;
use App\Models\Tagline;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\AdvantageUser;
use App\Models\ThumbnailService;
use App\Models\AdvantageServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class LandingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::orderBy('created_at','desc')->get();

        return view('pages.landing.index', compact('services'));
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
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
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

    public function explore(){

        $services = Services::orderBy('created_at','desc')->get();

        return view('pages.landing.explore');
    }

    public function detail($id){

        $services = Services::where('id', $id)->first();
        $thumbnail = ThumbnailService::where('service_id', $id)->get();
        $advantage_user= AdvantageUser::where('service_id', $id)->get();
        $advantage_service = AdvantageServices::where('service_id', $id)->get();
        $tagline = Tagline::where('service_id', $id)->get();



        return view('pages.landing.detail', compact('services','thumbnail','advantage_user','advantage_service','tagline'));
    }

    public function booking($id){

            $service = Services::where('id', $id)->first();
            $user_buyer = Auth::user()->id;

            //validation booking
            if ($service->users_id == $user_buyer) {
                toast()->warning('Sorry, members can`t book their own service!');
                return back();
            }

            $order = new Order;
            $order->buyer_id = $user_buyer;
            $order->freelancer_id = $service->user->id;
            $order->service_id = $service->id;
            $order->file = NULL;
            $order->note = NULL;
            $order->expired = Date('y-m-d', strtotime('+3 days'));
            $order->order_status_id = 4;
            $order->save();

            $order_detail = Order::where('id', $order->id)->first();
            return redirect()->route('detail.booking.landing', $order->id);
    }

    public function detail_booking($id){

        $order = Order::where('id', $id)->first();
        return view('pages.landing.booking', compact('order'));

    }
}
