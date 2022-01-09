<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dash_active = 'active';
        // $firstDayCurrentMonth = date('Y-m-d', strtotime("first day of this month"));
        // $lastDayCurrentMonth = date('Y-m-d', strtotime("last day of this month"));
        // $firstDayPreviousMonth = date('Y-m-d', strtotime("first day of previous month"));
        // $lastDayPreviousMonth = date('Y-m-d', strtotime("last day of previous month"));
        $currentMonth = date('m');
        $previousMonth = date('m', strtotime('-1 month'));
        $user_monthly = DB::table("users")
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->count();
        $question_monthly = DB::table("pertanyaan")
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->count();
        $blog_monthly = DB::table("posts")
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->count();

        // init empty array to store users with role business
        $business_user = [];
        // specific date to get this month data
        $users = User::with('roles')->whereMonth('created_at','=',date('m'))->get();
        foreach($users as $user)
        {
            if($user->roles->first()){
                if($user->roles->first()->name == 'business'){
                    $business_user[] = $user;
                }
            }
        }
        $business_monthly = count($business_user);
        return view('admin/index',compact('dash_active','user_monthly','question_monthly','blog_monthly','business_monthly'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
