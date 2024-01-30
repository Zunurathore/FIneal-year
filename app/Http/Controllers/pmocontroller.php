<?php

namespace App\Http\Controllers;
//Excel
use App\Imports\StudentRecordImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
//Validater
use Illuminate\Support\Facades\Validator;
//session
use Illuminate\Support\Facades\Session;

//models
use App\Models\pmo;
use App\Models\news;
use App\Models\sessionmodel;
use App\Models\Personrole;
use App\Models\superviser;
use App\Models\supervisersession;
use App\Models\allgroupslogin;
use App\Models\studentsrecords;
use App\Models\Studentgroups;
use App\Models\preliminaryproposal;
//date
use Carbon\Carbon;
//pdf
use Barryvdh\DomPDF\Facade\Pdf;


class pmocontroller extends Controller
{
    public function logout(Request $request){
        Session::flush();
        return view('PMO.login');
    }
    public function index(Request $request){
        return view('PMO.home');
    }
    public function addstudentexcel(Request $request){
        return view('PMO.add-students-by-excel');
    }
    public function addstudentbyexcel(Request $request){
        try{
            $request->validate([
                'file' => 'required|mimes:xlsx,xls', // Validate file type (xlsx, xls)
            ]);
            Excel::import(new StudentRecordImport, $request->file('file'));
            return back()->with('success', 'All Excel Student Added.');
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error with Row-NO:' . $e->getMessage());
        }
    }
    public function addstudent(Request $request){
        try{
            $session=sessionmodel::all();
           return view('PMO.add-student',compact('session'));
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function addstudentrecord(Request $request){
        try { 
            // Validation rules for email and password fields
            $validatedData = $request->validate([
                'email' => 'required|email|unique:studentsrecords,email',
                'session' => 'required',
                'name' => 'required',
                'department' => 'required',
                'pnumber' => 'required|min:11',
                'regno' => 'required|unique:studentsrecords,regno',
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'session.required' => 'Session is required.',
                'name.required' => 'name is required.',
                'department.required' => 'department is required.',
                'pnumber.required' => 'pnumber is required.',
                'pnumber.min' => 'pnumber is minimum 11 digits.',
                'regno.required' => 'Registration is required.',
                'regno.unique' => 'Registration is unique.',

            ]);
              $addstudent=new studentsrecords;
               $addstudent->name=$validatedData['name'];
               $addstudent->email=$validatedData['email'];
               $addstudent->session=$validatedData['session'];
               $addstudent->department=$validatedData['department'];
               $addstudent->pnumber=$validatedData['pnumber'];
               $addstudent->regno=$validatedData['regno'];
               // Save the data to the database
               $addstudent->save();
            return back()->with('success', 'Student added successfully.');
        } catch (\Exception $e) {
            // Handle specific database-related errors or any other exceptions here
            return back()->with('error', 'Failed to add Student: ' . $e->getMessage());
        }
       
    }
    public function updatestudentrecord($id){
        try{
            $studentrecord=studentsrecords::find($id);
            $session=sessionmodel::all();
            return view('PMO.update-student',compact('studentrecord','session'));
       }
       catch(\Exception $e)
       {
           return back()->with('error', 'Failed to load data'. $e->getMessage());
       }
    }

    public function saveupdatestudentrecord(Request $request){
        try { 
            // Validation rules for email and password fields
            $validatedData = $request->validate([
                'email' => 'required|email|unique:studentsrecords,email,'.$request->input('id'),
                'session' => 'required',
                'name' => 'required',
                'department' => 'required',
                'pnumber' => 'required|min:11',
                'regno' => 'required|unique:studentsrecords,regno,'.$request->input('id'),
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'session.required' => 'Session is required.',
                'name.required' => 'name is required.',
                'department.required' => 'department is required.',
                'pnumber.required' => 'pnumber is required.',
                'pnumber.min' => 'pnumber is minimum 11 digits.',
                'regno.required' => 'Registration is required.',
                'regno.unique' => 'Registration No is unique.',

            ]);
              $updatestudent=studentsrecords::find($request->input('id'));
               $updatestudent->name=$validatedData['name'];
               $updatestudent->email=$validatedData['email'];
               $updatestudent->session=$validatedData['session'];
               $updatestudent->department=$validatedData['department'];
               $updatestudent->pnumber=$validatedData['pnumber'];
               $updatestudent->regno=$validatedData['regno'];
               // Save the data to the database
               $updatestudent->save();
            return back()->with('success', 'Student Updated successfully.');
        } catch (\Exception $e) {
            // Handle specific database-related errors or any other exceptions here
            return back()->with('error', 'Failed to Update Student: ' . $e->getMessage());
        }
       
    }
    public function deletestudentrecord($id){
        try{
            $studentrecord=studentsrecords::find($id);
            $studentrecord->delete();
            return back()->with('success', 'Student delete successfully.');
       }
       catch(\Exception $e)
       {
           return back()->with('error', 'Failed to delete student'. $e->getMessage());
       }
    }
    public function allstudentrecord(Request $request){
        try{
            $allstudentrecord=studentsrecords::all();
            $session=sessionmodel::all();
            return view('PMO.all-students',compact('allstudentrecord','session'));
       }
       catch(\Exception $e)
       {
           return back()->with('error', 'Failed to load data'. $e->getMessage());
       }
    }
    public function showstudentaccordingsession($session){
        try { 
        $studentrecord=studentsrecords::where('session',$session)->get();
        return response()->json($studentrecord);
        }
        catch(\Exception $e)
        {
            return back()->with('error', 'Failed to record found.'. $e->getMessage());
        }
        
    }
    public function purposelupdate($id){
        try
        {
            $purposelrecord=preliminaryproposal::find($id);
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
            $grouprecord=Studentgroups::find($purposelrecord->groupid);
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
                      return view('PMO.purposel-update',compact('purposelrecord','studentregnos','allsuperviser'));
                }
        }
        catch(\Exception $e)
        {
            return back()->with('error', 'Failed to record found.'. $e->getMessage());
        }
       
    }
    public function saveupdatepreliminarypurposel(Request $request){
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
            $addpurposel=preliminaryproposal::find($request->input('id'));
            $addpurposel->superviserid=$request->input('superviser');
            $addpurposel->projectname=$request->input('projectname');
            $addpurposel->electivecourses=$request->input('electivecourses');
            $addpurposel->programminglanguagetools=$request->input('plt');
            if($addpurposel->save())
            {
                return back()->with('success', 'Preliminary Proposal Form is Uppdated.');
            }
            else
            {
                return back()->with('error', 'Preliminary Proposal Form Not Updated.');
            }
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function addgrouploginview(Request $request){
        try{
            $allsession=sessionmodel::all();
            return view('PMO.add-student-login',compact('allsession'));
       }
       catch(\Exception $e)
       {
           return back()->with('error', 'Failed to load sessions.'. $e->getMessage());
       }
    }
    public function allgrouplogin(Request $request){
        try{
             // Fetch all records from the 'allgroupslogin' table
            $allgrouplogin = allgroupslogin::all();
            $session = sessionmodel::all();
            // Return a view named 'PMO.all-group-login', passing the fetched records to the view
            return view('PMO.all-group-login', compact('allgrouplogin','session'));
        }
        catch(\Exception $e)
        {
            return back()->with('error', 'Failed to load group logins.'. $e->getMessage());
        }
    
    }
    public function allgroupsrecord(Request $request){
        try
        {

            // $currentYear = Carbon::now()->year;
            // $allsupervisercurrentsession=supervisersession::where('session',$currentYear)->get();
            // if($allsupervisercurrentsession)
            // {
            //     $allsuperviser=[];
            //     foreach($allsupervisercurrentsession as $item)
            //     {
            //       $superviser=superviser::where('id',$item->superviserid)->first();
            //       $allsuperviser[] = array_merge($allsuperviser, $superviser->toArray());
            //     }
            // }
            // $allGroupRecords = Studentgroups::with('preliminaryProposal.supervisor')->get();
            // dd($allGroupRecords);
            $allgrouprecord=Studentgroups::all();
            // if($allgrouprecord)
            // {
            //     foreach($allgrouprecord as $item)
            //     {
            //         if()
            //     }
            // }
            // return view('PMO.all-group',compact('allgrouprecord'));

            $studentregnos = [];
           
            if($allgrouprecord)
            {
                foreach($allgrouprecord as $item)
                {
                    // dd($item->allgrouplogin->email);
                    // dd($item->studentsrecords->name);
                    // dd($item->preliminaryProposal->id);

                    // dd($item->preliminaryProposal->supervisor);
                    // dd($item->preliminaryProposal->supervisor);
                    // dd($item->allGroupLogin->session);
                    if($item->m1regno!=0)
                    {
                        $records=studentsrecords::where('regno',$item->m1regno)->first();
                        $studentregnos[] = array_merge($studentregnos, $records->toArray());
                    }
                    // if($item->m2regno!=0)
                    // {
                    //     $records=studentsrecords::where('regno',$item->m2regno)->first();
                    //     $studentregnos[] = array_merge($studentregnos, $records->toArray());
                    // }
                    // if($item->m3regno!=0)
                    // {
                    //     $records=studentsrecords::where('regno',$item->m3regno)->first();
                    //     $studentregnos[] = array_merge($studentregnos, $records->toArray());
                    // }
                    // $records=preliminaryproposal::find($item->id);
                    // $studentregnos[] = array_merge($studentregnos, $records->toArray());
                    // dd($studentregnos);
                }
                // dd($studentregnos);
                // foreach ($studentregnos as $record) {
                //     if (isset($record['id'])) {
                //         // Retrieve the model instance based on the ID
                //         $studentRecord = studentsrecords::find($record['id']);
            
                //         // Check if the record was found
                //         if ($studentRecord) {
                //             // Access the preliminaryProposal relationship and its supervisor
                //             $supervisor = $studentRecord->preliminaryProposal->supervisor;
                            
                //             // Now you can use $supervisor as needed
                //             dd($supervisor);
                //         }
                //     }
                // }
                // dd($studentregnos);
                // foreach($studentregnos as $item)
                // {
                //     $supervisor = $item['id']->preliminaryProposal->supervisor;
                //     dd($supervisor);
                // }
                // dd($studentregnos);
                return view('PMO.all-group',compact('studentregnos','allgrouprecord'));
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
        
        return view('PMO.all-group');
    }
    public function grouprecord($id){
        try
        {
            $grouprecord=Studentgroups::find($id);
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
                     return view('PMO.group-detail',compact('studentregnos'));
            }
            // dd($studentregnos );
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function deletefromgroup($id,$regno)
    {
        try
        {
            $studentrecord=studentsrecords::find($id);
            // Convert $regno to an array if it's a string
            $regnoArray = is_array($regno) ? $regno : [$regno];
            $studentgroup = Studentgroups::whereIn('m1regno', $regnoArray)
                            ->orWhereIn('m2regno', $regnoArray)
                            ->orWhereIn('m3regno', $regnoArray)
                            ->first();
            if($studentgroup->m1regno==$regno)
            {
                $studentgroup->groupmembers-=1;
                $studentrecord->enrolledingroup=0;
                $studentgroup->m1regno=0;
                $studentrecord->save();
                $studentgroup->save();
                return back()->with('success','Student Delete Successfully.');
            }
            elseif($studentgroup->m2regno==$regno)
            {
                $studentgroup->groupmembers-=1;
                $studentrecord->enrolledingroup=0;
                $studentgroup->m2regno=0;
                $studentrecord->save();
                $studentgroup->save();
                return back()->with('success','Student Delete Successfully.');
            }
            elseif($studentgroup->m3regno==$regno)
            {
                $studentgroup->groupmembers-=1;
                $studentrecord->enrolledingroup=0;
                $studentgroup->m3regno=0;
                $studentrecord->save();
                $studentgroup->save();
                return back()->with('success','Student Delete Successfully.');
            }
            else{
                return back()->with('error',"Group Leader Can't deleted.");
            }

        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function updategroup($id)
    {
        try
        {
            $grouprecord=Studentgroups::find($id);
            $currentYear = Carbon::now()->year;
            $allstudentrecord=studentsrecords::where('session',$currentYear)
            ->where('enrolledingroup', 0)
            ->get();
            // Convert $regno to an array if it's a string
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
            return view('PMO.update-group-member',compact('studentregnos','allstudentrecord','id'));
            // if($studentgroup->m1regno==$regno)
            // {
            //     $studentrecord->enrolledingroup=0;
            //     $studentgroup->m1regno=0;
            //     return back()->with('success','Student Delete Successfully.');
            // }
            
        }
        catch (\Exception $e) 
        {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }

    }
    public function saveupdategroup(Request $request)
    {
        try
        {
            $selectedStudentIds=$request->input('states');
            $members = count($selectedStudentIds);
            if ($members > 3)
            {
                return back()->with('error','Maximum Selection of Member is 3.');
            }
            $grouprecord=Studentgroups::find($request->input('id'));
            // $currentYear = Carbon::now()->year;
            // $allstudentrecord=studentsrecords::where('session',$currentYear)
            // ->where('enrolledingroup', 0)
            // ->get();
            // Convert $regno to an array if it's a string
            // $studentregnos = [];
            // dd($selectedStudentIds);

            // dd($selectedStudentIds[0]);
            // if ($grouprecord->groupmembers == 0) {
            //     selectlenghtforupdatestudent = 3;
            // } else if (selectlenghtforupdatestudent == 1) {
            //     selectlenghtforupdatestudent = 2;
            // } else if (selectlenghtforupdatestudent == 2) {
            //     selectlenghtforupdatestudent = 1;
            // }
            if($grouprecord->groupmembers == 3)
            {
                return back()->with('error','Group already Completed.');
            }
            // dd($members);
                if(isset($selectedStudentIds[0])) {
                    // dd($selectedStudentIds[0]);
                    if($grouprecord->m1regno==0)
                    {
                        $grouprecord->groupmembers += 1;
                        $grouprecord->m1regno = $selectedStudentIds[0];
                        // dd($grouprecord->m1regno);
                    } 
                    elseif($grouprecord->m2regno==0)
                    {
                        $grouprecord->groupmembers += 1;
                        $grouprecord->m2regno = $selectedStudentIds[0];
                    }
                    elseif($grouprecord->m3regno==0)
                    {
                        $grouprecord->groupmembers += 1;
                        $grouprecord->m3regno = $selectedStudentIds[0];
                    }
                }
                if(isset($selectedStudentIds[1])) {
                    if($grouprecord->m1regno==0)
                    {
                        $grouprecord->groupmembers += 1;
                        $grouprecord->m1regno = $selectedStudentIds[1];
                        // dd($grouprecord->m1regno);
                    } 
                    elseif($grouprecord->m2regno==0)
                    {
                        $grouprecord->groupmembers += 1;
                        $grouprecord->m2regno = $selectedStudentIds[1];
                    }
                }
                if(isset($selectedStudentIds[2])) {
                    if($grouprecord->m3regno==0)
                    {
                        $grouprecord->groupmembers += 1;
                        $grouprecord->m3regno = $selectedStudentIds[2];
                    }
                }
                // dd($grouprecord);
                if($grouprecord->save())
                {
                    // dd($grouprecord);
                    foreach ($selectedStudentIds as $studentId) {
                        $studentRecord = studentsrecords::where('regno', $studentId)->first();
                        $studentRecord->enrolledingroup = 1;
                        $studentRecord->save();
                    }
                    return back()->with('success', 'Group Updated.');
                }
                else
                {
                    return back()->with('error', 'Group  Not Updated.');
                }
            }
            catch(\Exception $e)
            {
                return back()->with('error', 'Failed to record found.'. $e->getMessage());
            }
    }
    public function addgrouplogin(Request $request){
        try { 
            // Validation rules for email and password fields
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
                'session' => 'required',
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters long.',
                'session.required' => 'Session is required.',
            ]);
        
            // Create a new instance of allgroupslogin model
            $addgrouplogin = new allgroupslogin;
            
            // Assign values to the model instance from validated inputs
            $addgrouplogin->email = $validatedData['email'];
            $addgrouplogin->password = $validatedData['password'];
            $addgrouplogin->session = $validatedData['session'];
        
            // Save the data to the database
            $addgrouplogin->save();
            return back()->with('success', 'Group login added successfully.');
        } catch (\Exception $e) {
            // Handle specific database-related errors or any other exceptions here
            return back()->with('error', 'Failed to add group login: ' . $e->getMessage());
        }
    
        // Redirect back to the previous page with success message
    }
    public function deletegrouplogin($id){
        try{
            $deletegrouplogin=allgroupslogin::find($id);
            $deletegrouplogin->delete();
            return back()->with('success', 'Group login deleted successfully.');
        }
        catch(\Exception $e)
        {
            return back()->with('error', 'Failed to delete group login.'. $e->getMessage());
        }
    }
    public function updategrouplogin($id){
        try { 
        $grouplogin=allgroupslogin::find($id);
        $allsession=sessionmodel::all();
        return view('PMO.update-group-login',compact('grouplogin','allsession'));
        }
        catch(\Exception $e)
        {
            return back()->with('error', 'Failed to record found.'. $e->getMessage());
        }
        
    }
    public function showgrouploginaccordingsession($session){
        try { 
        $grouplogin=allgroupslogin::where('session',$session)->get();
        return response()->json($grouplogin);
        }
        catch(\Exception $e)
        {
            return back()->with('error', 'Failed to record found.'. $e->getMessage());
        }
        
    }
    public function updatesavegrouplogin(Request $request){
        try{
             // Validation rules for email and password fields
                $validatedData = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                    'session' => 'required',
                ], [
                    'email.required' => 'Email is required.',
                    'email.email' => 'Please enter a valid email address.',
                    'password.required' => 'Password is required.',
                    'session.required' => 'session is required.',
                    'password.min' => 'Password must be at least 8 characters long.',
                ]);
            
                $grouplogin = allgroupslogin::find($request->input('id'));
            
                // Update the fields with new values from the validated inputs
                $grouplogin->email = $validatedData['email'];
                $grouplogin->password = $validatedData['password'];
                $grouplogin->session = $validatedData['session'];
                $grouplogin->save();
                 return back()->with('success', 'Group login Updated successfully.');
            }
            catch(\Exception $e)
            {
                return back()->with('error', 'Failed to Update group login.'. $e->getMessage());
            }
    }

    public function midmarks(Request $request){
        return view('PMO.Mid-Marks');
    }
    public function finelmarks(Request $request){
        return view('PMO.Finel-Marks');
    }
   
    public function addsuperviser(Request $request){
        $session=sessionmodel::all();
        return view('PMO.add-superviser',compact('session'));
    }
    public function addnewsuperviser(Request $request){
        $addsuperviser= new superviser;
        $addsuperviser->name=$request->input('name');
        $addsuperviser->domain=$request->input('Domain');
        $addsuperviser->pnumber=$request->input('pnumber');
        $addsuperviser->email=$request->input('email');
        $addsuperviser->password=$request->input('password');
        if($addsuperviser->save())
        {
           $addsupervisersession= new supervisersession;
           $addsupervisersession->superviserid=$addsuperviser->id;
           $addsupervisersession->session=$request->input('session');
           $addsupervisersession->save();
            return back();
        }
    }
    public function allsuperviser(Request $request){
        $allsuperviser=superviser::all();
        $session=sessionmodel::all();
        $supervisersession=supervisersession::all();
        return view('PMO.all-superviser',compact('allsuperviser','session','supervisersession'));
    }
    public function enrollagainsuperviser($id,$year){
        $session=supervisersession::all();
        foreach($session as $item)
        {
            if($item->session==$year && $item->superviserid==$id)
            {
                return [$id, $year];
            }
        }
        $addrecord=new supervisersession;
        $addrecord->superviserid=$id;
        $addrecord->session=$year;
        $addrecord->save();
        return back();
    }
    public function deletesuperviser($id){
        // $deletesuperviser=superviser::find($id)->first();
        $superviser = superviser::find($id);
        if (!$superviser) {
            return back()->with('error', 'Supervisor not found');
        }
        supervisersession::where('superviserid', $id)->delete();
        // $deletesuperviser->delete();
        if($superviser->delete())
        {
            return back();
        }
    }
    public function updatesuperviser($id){
        $record=superviser::find($id);
        $session=sessionmodel::all();
        // $supervisersession=supervisersession::where('superviserid',$id)->first();
        $supervisersession = supervisersession::where('superviserid', $id)
            ->orderBy('id', 'desc')
            ->first();
        // $supervisersession=supervisersession::all($id);
        // $deletesuperviser->delete();
        // $supervisersession->delete();
        return view('PMO.updatesuperviser',compact('record','session','supervisersession'));
    }
  
    public function updatesavesuperviser(Request $request){
        $superviserrecord = superviser::find($request->input('id'));
        if (!$superviserrecord) {
            return back()->with('error', 'Supervisor not found');
        }
        $superviserrecord->name = $request->input('name');
        $superviserrecord->domain = $request->input('Domain');
        $superviserrecord->pnumber = $request->input('pnumber');
        $superviserrecord->email = $request->input('email');
        $superviserrecord->password = $request->input('password');
        if ($superviserrecord->save()) {
            $savesupervisersession = supervisersession::where('superviserid', $request->input('id'))->first();
            // if (!$savesupervisersession) {
            //     $savesupervisersession = new supervisersession();
            //     $savesupervisersession->superviserid = $superviserrecord->id;
            // }
            $savesupervisersession->session = $request->input('session');
            $savesupervisersession->save();
            return back()->with('success', 'Supervisor updated successfully');
        }
    
        return back()->with('error', 'Failed to update supervisor');
    }

    public function showsuperviseraccordingsession($session) {
        if(!empty($session)) {
            // Fetch all supervisors associated with the session
            $allsupervisers = supervisersession::where('session', $session)->get();
            
            // Array to store supervisor details
            $superviserDetails = [];
            // $supervisersession = supervisersession::all();
            $currentYear = date('Y');

            
            // Iterate through each supervisor associated with the session
            foreach ($allsupervisers as $superviser) {
                // Find supervisor details by supervisor ID
                $supervisorData = superviser::find($superviser->superviserid);
                $superviserSession = supervisersession::where('superviserid', $supervisorData->id)->get();

                // Check if the supervisor session contains the current year
                foreach ($superviserSession as $item) {
                    if ($item->session == $currentYear) {
                        $currentYear = true;
                        break; // No need to check further once current year is found
                    }
                }
                // Check if supervisor data exists

                    // Add supervisor details to the array
                    $superviserDetails[] = [
                        'supervisor' => $supervisorData,
                        'session' => $superviser->session,
                        'curentyear' => $currentYear,
                        // Add more fields from $allsupervisers if needed
                    ];
            }
            // Return supervisor details as JSON response
            return response()->json($superviserDetails);
        }
    }
    public function dactivatesuperviser($id){
        $supervisorData = superviser::find($id);
        $supervisorData->loginstatus = ($supervisorData->loginstatus == 0) ? 1 : 0;
        if($supervisorData->save())
        {
            return back();
        }
    }
  
    public function sharefile(Request $request){
        return view('PMO.share-file');
    }
    public function createsession(Request $request){
        $readsession=sessionmodel::all();
        return view('PMO.create-session',compact('readsession'));
    }
    public function deletesession($id){
        $readsession = sessionmodel::find($id);
        if (!$readsession) {
            return back()->with('error', 'Session not found');
        }
        $readsession->delete();
        return back()->with('success', 'Session deleted successfully');
    }
    public function addsession(Request $request){

        $addsession=new sessionmodel;
        $addsession->Year=$request->input('year');
        $addsession->save();
        return back();
    }

    public function addpmo(Request $request){
        $readsession=sessionmodel::all();
        if(!empty($readsession))
        {
            return view('PMO.add-pmo',compact('readsession'));
        }
    }
    public function addnewpmo(Request $request){
        $addnewpmo=new pmo;
        $addnewpmo->name=$request->input("name");
        $addnewpmo->pnumber=$request->input("pnumber");
        $addnewpmo->email=$request->input("email");
        $addnewpmo->password=$request->input("password");
        $addnewpmo->session=$request->input("session");
        $addnewpmo->save();
        return back();
    }
    public function allpmo(Request $request){
        $allpmo=pmo::all();
        $readsession=sessionmodel::all();
         if(!empty($allpmo) && !empty($readsession))
        {
           return view('PMO.all-pmo',compact("allpmo",'readsession'));
        }
    }
    public function showpmoaccordingsession($session){
      if(!empty($session))
        {
            $allpmo=pmo::where('session', $session)->get();
            return response()->json($allpmo);
        }
       
    }
    public function updatepmo($id){
        if(!empty($id)) {
            $pmo = pmo::find($id);
    
            if (!$pmo) {
                return back()->with('error', 'PMO not found');
            }
    
            $session = sessionmodel::all();
            return view('PMO.update-pmo', compact('pmo', 'session'));
        } else {
            return back()->with('error', 'Invalid ID');
        }
    }
    public function updatepmosave(Request $request){
        $id = $request->input('id');
    
        // Find the PMO record by ID
        $pmo = pmo::find($id);
    
        if (!$pmo) {
            return back()->with('error', 'PMO not found');
        }
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     'pnumber' => 'required|string',
        //     'email' => 'required|email',
        //     'password' => 'required|string',
        //     'session' => 'required|string',
        // ]);
    
        // Update the PMO record with validated data
        $pmo->name = $request['name'];
        $pmo->pnumber = $request['pnumber'];
        $pmo->email = $request['email'];
        $pmo->password = $request['password'];
        $pmo->session = $request['session'];
        $pmo->save();
        return back()->with('success', 'PMO updated successfully');
    }
    public function deletepmo($id) {
        if (!empty($id)) {
            $pmo = pmo::find($id);
            if (!$pmo) {
                return back()->with('error', 'PMO not found');
            }
    
            if ($pmo->delete()) {
                return back()->with('success', 'PMO deleted successfully');
            } else {
                return back()->with('error', 'Failed to delete PMO');
            }
        } else {
            return back()->with('error', 'Invalid ID');
        }
    }
    public function dactivatepmo($id){
        if (!empty($id)) {
            $pmo = pmo::find($id);
    
            if (!$pmo) {
                return back()->with('error', 'PMO not found');
            }
    
            // Toggle the login status
            $pmo->loginstatus = ($pmo->loginstatus == 0) ? 1 : 0;
    
            if ($pmo->save()) {
                $status = $pmo->loginstatus ? 'activated' : 'deactivated';
                return back()->with('success', "PMO login status has been $status");
            } else {
                return back()->with('error', 'Failed to update PMO login status');
            }
        } else {
            return back()->with('error', 'Invalid ID');
        }
    }
    public function addnews(Request $request){
        if($request->filled('news'))
        {
            $news = new news();
            $news->news = $request->input('news');
            $news->sharedby = 1;
            $news->sharedfor = $request->input('newsfor');
            if($request->input('newsfor')=='superviser')
            {
                $allsupervisors = superviser::all();
                foreach ($allsupervisors as $supervisor) {
                    $supervisor->totalviewnews = 1;
                    $supervisor->save();
                }
            }
            elseif($request->input('newsfor')=='student')
            {
                // $allsupervisors = student::all();
                // foreach ($allsupervisors as $supervisor) {
                //     $supervisor->totalviewnews = 1;
                //     $supervisor->save();
                // }
            }
            elseif($request->input('newsfor')=='both')
            {
                // $allsupervisors = Supervisor::all();
                // foreach ($allsupervisors as $supervisor) {
                //     $supervisor->totalviewnews = 1;
                //     $supervisor->save();
                // }
            }
            if($news->save())
            {
                return response()->json(['message' => 'Data saved successfully']);
            }

        }
        // return back();
    }
    public function readnews(Request $request){
            $news =news::all();
            if(!empty($news))
            {
                // return response()->json($news);
                return response()->json($news);
            }
        // return back();
    }
    public function deletenews(Request $request){
         $id=$request->input('id');
         $news =news::find($id);
         if($news->delete())
         {
            return back();
         }

        //  return response()->json($id);
    }
    public function defanceform(Request $request){
         $id=$request->input('id');
         $news =news::find($id);
         if($news->delete())
         {
            return back();
         }

        //  return response()->json($id);
    }
    public function finalform($id){
        $grouprecord=Studentgroups::find($id);
        // optional($grouprecord->preliminaryProposal->name);
        // dd($grouprecord->studentsrecord1->regno);
        $currentDate = Carbon::now()->format('d-m-Y');
        // $currentTime = Carbon::now()->format('g:i A');
        // $currentDateTime = Carbon::now('Asia/Karachi');
        // $currentDateTime->format('h:i A');
        // $mytime = Carbon::now();
        //  $mytime->toDateTimeString();
        // dd($currentDateTime);
        $timestamp = "2023-12-11T04:07:36.616963Z";

        // Create a Carbon instance from the provided timestamp in UTC
        $utcTime = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $timestamp)->setTimezone('Asia/Karachi');

        // Format the time in 12-hour format (hour:minute AM/PM) for Pakistan's time zone
        $currentTime = $utcTime->format('h:i A');
        // return $mytime;
        $pdf = Pdf::loadView('PMO.final-form',compact('grouprecord','currentDate','currentTime'));
        return $pdf->download();

        //  return response()->json($id);
    }
}
