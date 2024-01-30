@extends('Layouts.studentindex-for-pmo')

@section('content')
<div id="layoutSidenav_content" style="background-color: #f7fbff;">
    <main>
        <div class="container-fluid px-4">
            <Form class="mt-2 mb-5">
                <div class="form-outline w-25">
                    <label class="form-label" for="form6Example2" style="color: #4040a2; font-size: 20px;">Select Session</label>
                    <select name="select" id="form6Example2" class="form-control" onchange="" required>
                      <option value=""></option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                    </select>
                    <!-- <input type="text" id="form6Example2" class="form-control" placeholder="ex# Fall-2020" required/> -->
                  </div>
            </Form>
            <h3 class="mt-4" style="color: #4040a2;">All Groups Details</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{URL::to('PMO/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">group's</li>
            </ol>
            <!-- <div class="card mb-4">
                <div class="card-body">
                    DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                    <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                    .
                </div>
            </div> -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class=" me-1"></i>
                    Groups
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Group Leader Name</th>
                                <th>Reg.No</th>
                                <th>Phone</th>
                                <th>Login Email</th>
                                <th>Superviser Name</th>
                                <th class="text-center" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Group Leader Name</th>
                                <th>Reg.No</th>
                                <th>Phone</th>
                                <th>Login Email</th>
                                <th>Superviser Name</th>    
                                <th class="text-center" style="text-align: center;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($allgrouprecord as $item)
                            <tr>
                                @if ($item->PreliminaryProposal && $item->PreliminaryProposal->supervisor && $item->PreliminaryProposal->supervisor->name)
                                 @if ($item->studentsrecords && $item->studentsrecords->name)
                                    <td>{{$item->studentsrecords->name}}</td>
                                    <td>{{$item->studentsrecords->regno}}</td>
                                    <td>{{$item->studentsrecords->pnumber}}</td>
                                @else
                                    <td>Select Group Member</td>
                                    <td>Select Group Member</td>
                                    <td>Select Group Member</td>
                                 @endif
                                    <td>{{$item->allgrouplogin->email}}</td>
                                    <td>{{$item->PreliminaryProposal->supervisor->name}}</td>
                                <td class="purposelbutton">
                                    <!-- Default dropend button -->
                                    <div class="dropdown-center d-flex justify-content-center">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle dynamicbuttongroup" id="dropdownButton" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                          Option
                                        </button>
                                        <ul class="dropdown-menu" style="display: none;">
                                         <li><span class="dropdown-item-text text-secondary">Action</span></li>
                                          <li><hr class="m-0"></li>
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="{{URL::to('PMO/group-detail/'.$item->id)}}"><i class="fa-solid fa-book-open-reader fa-lg me-2" style="color: #6c757d;"></i>View</a></li>
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="{{URL::to('PMO/purposel-update/'.$item->preliminaryProposal->id)}}"><i class="fa-regular fa-pen-to-square fa-lg  me-2" style="color: #6c757d;"></i>Update Purposel</a></li>
                                           @if($item->groupmembers<3)
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="{{URL::to('PMO/updategroup/'.$item->id)}}"><i class="fa fa-refresh fa-lg me-2" style="color: #6c757d;" aria-hidden="true"></i>Update Group</a></li>
                                          @else
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="#" id="prevent"><i class="fa fa-refresh fa-lg me-2" style="color: #6c757d;" aria-hidden="true"></i>Group Completed</a></li>
                                          @endif
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="ali"><i class="fa-regular fa-file fa-lg me-2" style="color: #53637f;"></i>Meeting Form</a></li>
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="ali"><i class="fa-solid fa-pager fa-lg me-2"></i>Mid Evaluation Form</a></li>
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="{{URL::to('PMO/finalform/'.$item->id)}}"><i class="fa-solid fa-file fa-lg me-2"></i>Finel Evalution Form</a></li>
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="ali"><i class="fa-solid fa-paperclip fa-lg me-2"></i>Purposel Abstract</a></li>
                                          <li><a class="dropdown-item btn btn-sm text-secondary" href="ali"><i class="fa-solid fa-book fa-lg me-2"></i>Documentation</a></li>
                                          <li><hr class="m-0"></li>
                                          <li><a class="dropdown-item btn btn-sm text-danger" href=""><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                    <!-- <a href="singel-group-detail-for-PMO.html" class="btn text-info border border-info btn-sm"><i class="fa-solid fa-book-open-reader fa-lg me-1 "></i>View</a>
                                    <a href="test.html" class="btn text-secondary border border-secondary btn-sm "><i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Update</a>
                                    <a href="" class="btn btn-sm text-danger border border-danger"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a> -->
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @endsection