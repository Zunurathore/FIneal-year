<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//session
use Illuminate\Support\Facades\Session;

//models
use App\Models\news;
use App\Models\studentsrecords;
use App\Models\studentgroups;
use App\Models\superviser;
use App\Models\supervisersession;
use App\Models\preliminaryproposal;
//date
use Carbon\Carbon;


class studentcontroller extends Controller
{
    public function logout(Request $request){
        Session::flush();
        return view('Student.login');
    }
    public function index(Request $request){
        return view('Student.home');
    }
    //// student group function----------------------------------------
    public function selectgroupmember(Request $request){
        try
        {
            $currentYear = Carbon::now()->year;
            $allstudent=studentsrecords::where('session',$currentYear)
            ->where('enrolledingroup', 0)
            ->get();
            $grouprecord=studentgroups::where('loginid',8)->first();
            $studentregnos = [];
            if($grouprecord)
            {
                if($grouprecord->m1regno!=0)
                  {
                      $records=studentsrecords::where('regno',$grouprecord->m1regno)->first();
                      $studentregnos[] = array_merge($studentregnos, $records->toArray());
                  }
                if($grouprecord->m2regno!=0)
                  {
                      $records=studentsrecords::where('regno',$grouprecord->m2regno)->first();
                      $studentregnos[] = array_merge($studentregnos, $records->toArray());
                  }
                if($grouprecord->m3regno!=0)
                  {
                      $records=studentsrecords::where('regno',$grouprecord->m3regno)->first();
                      $studentregnos[] = array_merge($studentregnos, $records->toArray());
                  }
                // foreach($grouprecord as $item)
                // {
                //     if($item->regno!=0)
                //     {
                //         $records=studentsrecords::where('regno',$grouprecord->regno)->first();
                //         $studentregnos = array_merge($studentregnos, $records->toArray());
                //     }
                // }
            }
            // dd($studentregnos );
            return view('Student.Select-group-member',compact('allstudent','studentregnos'));
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
      
    }
    public function creategroup(Request $request){
       
        try{
            $grouprecord=studentgroups::where('loginid',8)->first();;
            if($grouprecord)
            {
                return back()->with('error', 'Group already Created.');
            }
            else
            {
                $selectedStudentIds = $request->input('states');
               
                $addstudentgroup = new studentgroups;
                $members = count($selectedStudentIds);
                if(isset($selectedStudentIds[0])) {
                    $addstudentgroup->m1regno = $selectedStudentIds[0];
                }
                if(isset($selectedStudentIds[1])) {
                    $addstudentgroup->m2regno = $selectedStudentIds[1];
                }
                if(isset($selectedStudentIds[2])) {
                    $addstudentgroup->m3regno = $selectedStudentIds[2];
                }
                $addstudentgroup->groupmembers=$members;
                $addstudentgroup->loginid=8;
                if($addstudentgroup->save())
                {
                    foreach ($selectedStudentIds as $studentId) {
                        $studentRecord = studentsrecords::where('regno', $studentId)->first();
                        $studentRecord->enrolledingroup = 1;
                        $studentRecord->save();
                    }
                    return back()->with('success', 'Group Created.');
                }
                else
                {
                    return back()->with('error', 'Group  Not Created.');
                }
            }
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        // return view('Student.Preliminary-Purposel');
    }
    //// student group function end----------------------------------------
    public function preliminarypurposel(Request $request){
        try
        {

            $currentYear = Carbon::now()->year;
            $allsupervisercurrentsession=supervisersession::where('session',$currentYear)->get();
            if($allsupervisercurrentsession)
            {
                $allsuperviser=[];
                foreach($allsupervisercurrentsession as $item)
                {
                  $superviser=superviser::where('id',$item->superviserid)->first();
                  $allsuperviser[] = array_merge($allsuperviser, $superviser->toArray());
                }
            }

            $grouprecord=studentgroups::where('loginid',8)->first();
            $studentregnos = [];
            if($grouprecord)
            {
                if($grouprecord->m1regno!=0)
                  {
                      $records=studentsrecords::where('regno',$grouprecord->m1regno)->first();
                      $studentregnos[] = array_merge($studentregnos, $records->toArray());
                  }
                if($grouprecord->m2regno!=0)
                  {
                      $records=studentsrecords::where('regno',$grouprecord->m2regno)->first();
                      $studentregnos[] = array_merge($studentregnos, $records->toArray());
                  }
                if($grouprecord->m3regno!=0)
                  {
                      $records=studentsrecords::where('regno',$grouprecord->m3regno)->first();
                      $studentregnos[] = array_merge($studentregnos, $records->toArray());
                  }
                return view('Student.Preliminary-Purposel',compact('allsuperviser','studentregnos','grouprecord'));
            }
            else 
            {
                return back()->with('error', 'Please Firstly Create Your group');
            }
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function addpreliminarypurposel(Request $request){
        try
        {
            $request->validate([
                'superviser' => 'required',
                'projectname' => 'required',
                'electivecourses' => 'required',
                'plt' => 'required',
            ], [
                'email.required' => 'Select Superviser is required.',
                'projectname.required' => 'Project Name is required.',
                'electivecourses.required' => 'Pleace Write Elective Courses.',
                'plt.required' => 'Pleace Write Tools Programing languages.',
            ]);
            $addpurposel=new preliminaryproposal;
            $addpurposel->groupid=$request->input('id');
            $addpurposel->superviserid=$request->input('superviser');
            $addpurposel->projectname=$request->input('projectname');
            $addpurposel->electivecourses=$request->input('electivecourses');
            $addpurposel->programminglanguagetools=$request->input('plt');
            $purposelrecord=preliminaryproposal::where('groupid',$request->input('id'))->first();
            if(!$purposelrecord)
            {
                if($addpurposel->save())
                {
                    return redirect()->route('Student.projectstatus')->with('success', 'Preliminary Proposal Form is Submitted.');
                }
                else
                {
                    return back()->with('error', 'Preliminary Proposal Form Not Submited.');
                }
            }
            else
            {
                return redirect()->route('Student.projectstatus')->with('error', 'Preliminary Proposal Form already Submitted.');
            }  
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function sharefile(Request $request){
        return view('Student.share-file');
    }
    public function viewfile(Request $request){
        return view('Student.view-file');
    }
    public function meetingslote(Request $request){
        return view('Student.meeting-slote');
    }
    public function viewmarks(Request $request){
        return view('Student.view-marks');
    }
    public function projectstatus(Request $request){
        return view('Student.Project-status');
    }
    public function readnews(Request $request){
        $news = news::whereIn('sharedfor', ['student', 'both'])->get();
        if(!empty($news))
        {
          return response()->json($news);
        }
    }
}
