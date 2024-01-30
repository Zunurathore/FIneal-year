<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//session
use Illuminate\Support\Facades\Session;
//models
use App\Models\news;
use App\Models\superviser;


class supervisercontroller extends Controller
{
    public function logout(Request $request){
        Session::flush();
        return view('Superviser.login');
    }
    public function index(Request $request){
        return view('Superviser.home');
    }
    public function groupspurposel(Request $request){
        return view('Superviser.group-purposels');
    }
    public function leadinggroups(Request $request){
        return view('Superviser.leading-group');
    }
    public function purposelaction(Request $request){
        return view('Superviser.action-on-purposel');
    }
    public function groupdetail(Request $request){
        return view('Superviser.group-detail');
    }
    public function groupprogress(Request $request){
        return view('Superviser.group-progress');
    }
    public function sharefile(Request $request){
        return view('Superviser.share-file');
    }
    public function viewfile(Request $request){
        return view('Superviser.view-file');
    }
    public function meetingslot(Request $request){
        return view('Superviser.meeting-slot');
    }
    public function readnews(Request $request){
        $news = news::whereIn('sharedfor', ['superviser', 'both'])->get();
        if(!empty($news))
        {
          return response()->json($news);
        }
    }
    public function NewNews(Request $request){
        $news = superviser::where('totalviewnews','1')->first();
        return response()->json($news);
    }
    public function allnewsreaded(Request $request){
        $allsupervisors = superviser::all();
        foreach ($allsupervisors as $supervisor) {
            $supervisor->totalviewnews = 0;
            $supervisor->save();
        }
        return response()->json(['message' => 'Operation successful']);
    }
}
