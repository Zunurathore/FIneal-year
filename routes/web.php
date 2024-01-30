<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\pmocontroller;
use App\Http\Controllers\studentcontroller;
use App\Http\Controllers\supervisercontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/','PMO.login');
Route::post('pmologin',[logincontroller::class,'pmologin'])->name('PMO.login');

Route::view('/student-login','Student.login');
Route::post('grouplogin',[logincontroller::class,'grouplogin'])->name('Student.login');

Route::view('/supervisor-login','Superviser.login');
Route::post('superviserlogin',[logincontroller::class,'supervisorlogin'])->name('Superviser.login');

// Route::get('/k', function () {
//     return view('Superviser.purposel-action-for-supervisor');
// });
// Route::get('/c', function () {
//     return view('pmo.home');
// });
Route::group(['middleware' => ['loginmiddleware']], function () {
    Route::prefix('PMO')->group(function () {
        ////index
        Route::get('/home', [pmocontroller::class,'index'])->name('PMO.home');
        ////student
        Route::get('/add-students-by-excel',[pmocontroller::class,'addstudentexcel'])->name("PMO.addstudentexcel");
        Route::post('/addstudentbyexcel',[pmocontroller::class,'addstudentbyexcel'])->name("PMO.addstudentbyexcel");
        Route::get("/add-student",[pmocontroller::class,'addstudent'])->name('PMO.addstudent');
        Route::post("/addstudentrecord",[pmocontroller::class,'addstudentrecord'])->name('PMO.addstudentrecord');
        Route::get("/updatestudentrecord/{id}",[pmocontroller::class,'updatestudentrecord'])->name('PMO.updatestudentrecord');
        Route::post("/saveupdatestudentrecord",[pmocontroller::class,'saveupdatestudentrecord'])->name('PMO.saveupdatestudentrecord');
        Route::get("/deletestudentrecord/{id}",[pmocontroller::class,'deletestudentrecord'])->name('PMO.deletestudentrecord');
        Route::get("/showstudentaccordingsession/{session}",[pmocontroller::class,'showstudentaccordingsession'])->name('PMO.showstudentaccordingsession');
        ////groups
        Route::get("/all-group-login",[pmocontroller::class,'allgrouplogin'])->name('PMO.allgrouplogin');
        Route::get("/add-group-login",[pmocontroller::class,'addgrouploginview'])->name('PMO.addgrouploginview');
        Route::post("/addgrouplogin",[pmocontroller::class,'addgrouplogin'])->name('PMO.addgrouplogin');
        Route::get("/updategrouplogin/{id}",[pmocontroller::class,'updategrouplogin'])->name('PMO.updategrouplogin');
        Route::get("/deletegrouplogin/{id}",[pmocontroller::class,'deletegrouplogin'])->name('PMO.deletegrouplogin');
        Route::post("/updatesavegrouplogin",[pmocontroller::class,'updatesavegrouplogin'])->name('PMO.updatesavegrouplogin');
        Route::get("/showgrouploginaccordingsession/{sessoion}",[pmocontroller::class,'showgrouploginaccordingsession'])->name('PMO.showgrouploginaccordingsession');
        Route::get("/Mid-Marks",[pmocontroller::class,'midmarks'])->name('PMO.midmarks');
        Route::get("/Finel-Marks",[pmocontroller::class,'finelmarks'])->name('PMO.finelmarks');
        Route::get('/all-students',[pmocontroller::class,'allstudentrecord'])->name('PMO.allstudentrecord');
        Route::get('/purposel-update/{id}',[pmocontroller::class,'purposelupdate'])->name('PMO.purposelupdate');
        Route::post('/saveupdatepreliminarypurposel',[pmocontroller::class,'saveupdatepreliminarypurposel'])->name('PMO.saveupdatepreliminarypurposel');
        Route::get('/all-group',[pmocontroller::class,'allgroupsrecord'])->name('PMO.allgroupsrecord');
        Route::get('/group-detail/{id}',[pmocontroller::class,'grouprecord'])->name('PMO.grouprecord');
        Route::get('/updategroup/{id}',[pmocontroller::class,'updategroup'])->name('PMO.updategroup');
        Route::post('/saveupdategroup',[pmocontroller::class,'saveupdategroup'])->name('PMO.saveupdategroup');
        Route::get('/deletefromgroup/{id}/{regno}',[pmocontroller::class,'deletefromgroup'])->name('PMO.deletefromgroup');
        //superviser
        Route::get("/add-superviser",[pmocontroller::class,'addsuperviser'])->name('PMO.superviser');
        Route::post("/addnewsuperviser",[pmocontroller::class,'addnewsuperviser'])->name('PMO.addnewsuperviser');
        Route::get("/enrollagainsuperviser/{id}/{year}",[pmocontroller::class,'enrollagainsuperviser'])->name('PMO.enrollagainsuperviser');
        Route::get("/deletesuperviser/{id}",[pmocontroller::class,'deletesuperviser'])->name('PMO.deletesuperviser');
        Route::get("/updatesuperviser/{id}",[pmocontroller::class,'updatesuperviser'])->name('PMO.updatesuperviser');
        Route::post("/updatesavesuperviser",[pmocontroller::class,'updatesavesuperviser'])->name('PMO.updatesavesuperviser');
        Route::get("/showsuperviseraccordingsession/{session}",[pmocontroller::class,'showsuperviseraccordingsession'])->name('PMO.showsuperviseraccordingsession');
        Route::get("/dactivatesuperviser/{id}",[pmocontroller::class,'dactivatesuperviser'])->name('PMO.dactivatesuperviser');
        Route::get("/all-superviser",[pmocontroller::class,'allsuperviser'])->name('PMO.allsuperviser');

        ////file share
        Route::get('/share-file',[pmocontroller::class,'sharefile'])->name('PMO.sharefile');
        //session
        Route::get('/create-session',[pmocontroller::class,'createsession'])->name('PMO.createsession');
        Route::post('/addsession',[pmocontroller::class,'addsession'])->name('PMO.addsession');
        Route::get('/deletesession/{id}',[pmocontroller::class,'deletesession'])->name('PMO.deletesession');
        //pmo's
        Route::get('/add-pmo',[pmocontroller::class,'addpmo'])->name('PMO.addpmo');
        Route::post('/addnewpmo',[pmocontroller::class,'addnewpmo'])->name('PMO.addnewpmo');
        Route::get('/all-pmo',[pmocontroller::class,'allpmo'])->name('PMO.allpmo');
        Route::get('/showpmoaccordingsession/{session}',[pmocontroller::class,'showpmoaccordingsession'])->name('PMO.showpmoaccordingsession');
        Route::get('/updatepmo/{id}',[pmocontroller::class,'updatepmo'])->name('PMO.updatepmo');
        Route::get('/deletepmo/{id}',[pmocontroller::class,'deletepmo'])->name('PMO.deletepmo');
        Route::get('/dactivatepmo/{id}',[pmocontroller::class,'dactivatepmo'])->name('PMO.dactivatepmo');
        Route::post('/updatepmosave',[pmocontroller::class,'updatepmosave'])->name('PMO.updatepmosave');
        //logout
        Route::get('/logout',[pmocontroller::class,'logout'])->name('PMO.logout');
        //news
        Route::post('/addnews',[pmocontroller::class,'addnews'])->name('PMO.addnews');
        Route::get('/readnews',[pmocontroller::class,'readnews'])->name('PMO.readnews');
        Route::get('/deletenews',[pmocontroller::class,'deletenews'])->name('PMO.deletenews');
        ////form's
        Route::get('/defanceform',[pmocontroller::class,'defanceform'])->name('PMO.defanceform');
        Route::get('/finalform/{id}',[pmocontroller::class,'finalform'])->name('PMO.finalform');
    });
});
Route::group(['middleware' => ['studentloginmiddleware']], function () {
    Route::prefix('Student')->group(function () {
        Route::get('/home', [studentcontroller::class,'index'])->name('Student.home');
        // Route::get('/login', [studentcontroller::class,'login'])->name('Student.login');
        ////student group
        Route::get('/select-group-member', [studentcontroller::class,'selectgroupmember'])->name('Student.selectgroupmember');
        Route::post('/creategroup', [studentcontroller::class,'creategroup'])->name('Student.creategroup');
        Route::get('/Preliminary-Purposel', [studentcontroller::class,'preliminarypurposel'])->name('Student.preliminarypurposel');
        Route::post('/addpreliminarypurposel', [studentcontroller::class,'addpreliminarypurposel'])->name('Student.addpreliminarypurposel');
        Route::get('/meeting-slote', [studentcontroller::class,'meetingslote'])->name('Student.meetingslote');
        Route::get('/share-file', [studentcontroller::class,'Sharefile'])->name('Student.Sharefile');
        Route::get('/view-file', [studentcontroller::class,'viewfile'])->name('Student.viewfiLE');
        Route::get('/view-marks', [studentcontroller::class,'viewmarks'])->name('Student.viewmarks');
        Route::get('/project-status', [studentcontroller::class,'projectstatus'])->name('Student.projectstatus');
        Route::get('/readnews', [studentcontroller::class,'readnews'])->name('Student.readnews');
         //logout
        Route::get('/logout',[studentcontroller::class,'logout'])->name('Student.logout');

    });
});
Route::group(['middleware' => ['supervisorloginmiddleware']], function () {
    Route::prefix('Superviser')->group(function () {
        Route::get('/home', [supervisercontroller::class,'index'])->name('Superviser.home');
        // Route::get('/login', [supervisercontroller::class,'login'])->name('Superviser.login');
        Route::get('/group-purposels', [supervisercontroller::class,'groupspurposel'])->name('Superviser.groupspurposel');
        Route::get('/leading-group', [supervisercontroller::class,'leadinggroups'])->name('Superviser.leadinggroups');
        Route::get('/action-on-purposel', [supervisercontroller::class,'purposelaction'])->name('Superviser.purposelaction');
        Route::get('/group-detail', [supervisercontroller::class,'groupdetail'])->name('Superviser.groupdetail');
        Route::get('/group-progress', [supervisercontroller::class,'groupprogress'])->name('Superviser.groupprogress');
        Route::get('/share-file', [supervisercontroller::class,'sharefile'])->name('Superviser.sharefile');
        Route::get('/view-file', [supervisercontroller::class,'viewfile'])->name('Superviser.viewfile');
        Route::get('/meeting-slot', [supervisercontroller::class,'meetingslot'])->name('Superviser.meetingslot');
        //New news
        Route::get('/NewNews', [supervisercontroller::class,'NewNews'])->name('Superviser.NewNews');
        Route::get('/readnews', [supervisercontroller::class,'readnews'])->name('Superviser.readnews');
        Route::get('/allnewsreaded', [supervisercontroller::class,'allnewsreaded'])->name('Superviser.allnewsreaded');
         //logout
         Route::get('/logout',[supervisercontroller::class,'logout'])->name('Superviser.logout');
    });
});

