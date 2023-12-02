<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\DB;
use App\Notifications\SendUserMessage;
use App\Http\Helpers\Notification as FcmNotification;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::orderBy('id', 'DESC')->get();
        return view('backend.admin.news.index' , compact('news'));
    }


    public function create()
    {
        return view('backend.admin.news.create');
    }


    public function store(NewsRequest $request)
    {

        try{
            DB::beginTransaction();

            News::create($request->all());

            //FcmNotification::sendFCMNotification($request->title, $request->message);

            \Notification::send(User::all(), new SendUserMessage($request->title, $request->message));

            DB::commit();

            toastr()->success(trans('defult.date has been created successfully!'));
            return redirect()->route('news.index');

        }catch(\Throwable $th) {

            DB::rollBack();

            throw $th;

            toastr()->error('something went wrong');
            return redirect()->route('news.index');

        }


    }
}


