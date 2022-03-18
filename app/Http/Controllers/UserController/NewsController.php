<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function index(){
        $news = News::where('statusDisplay','=','1')->orderBy('statusTop','DESC')->orderBy('created_at','DESC')->paginate(5);
        $latest_news = News::limit(3)->where('statusDisplay','=','1')->orderBy('updated_at','DESC')->get();
        return view('front-end.contents.news',['news' => $news, 'latest_news' => $latest_news]);
    }

    function show($id){
        $new = News::find($id);
        return view('front-end.contents.newDetail', ['new' => $new]);
    }

    function test(){
        $news = News::where('statusDisplay','=','1')->orderBy('statusTop','DESC')->orderBy('created_at','DESC')->get();
        $latest_news = News::where('statusDisplay','=','1')->get();
        return view('front-end.test',['news' => $news, 'latest_news' => $latest_news]);
    }
}