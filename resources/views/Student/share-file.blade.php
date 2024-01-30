@extends('Layouts.index-for-student')

@section('content')
<div id="layoutSidenav_content" style="background-color: #f7fbff;">
    <main>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <form action="POST">
                        <h5 style="color: #4040a2;">Share File</h5>
                        {{-- <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                For Superviser
                            </label>
                        </div> --}}
                        <div class="form-outline">
                            <select name="select" id="select" class="form-control" required>
                              <option value=""></option>
                              <option value="Purposel_Abstract">Purposel Abstract</option>
                              <option value="Documentation">Documentation</option>
                            </select>
                            <!-- <input type="text" id="form6Example2" class="form-control" placeholder="No.Of Members" pattern="[1-3]{1}" required/> -->
                          </div>
                        <div class="mt-3">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3">Send</button>
                            {{-- <input type="submit" value="Send" class="btn btn-primary mt-3"> --}}
                        </div>
                    </form>
                    <main>
                        <div class="container-fluid px-4">
                            <h3 class="mt-4" style="color: #4040a2;">Shared Files</h3>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="index-for-student.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Fiels</li>
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
                                    Files
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Share with</th>
                                                <!-- <th>Reg.No</th>
                                                <th>Phone</th>
                                                <th>Email</th> -->
                                                <th class="text-center" style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Share with</th>
                                                <!-- <th>Reg.No</th>
                                                <th>Phone</th>
                                                <th>Email</th> -->
                                                <th class="text-center" style="text-align: center;">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Purposel Form</td>
                                                <td>Student</td>
                                                <!-- <td>20-Arid-1747</td>
                                                <td>03137898012</td>
                                                <td>zunu@gamil.com</td> -->
                                                <td class="purposelbutton" style="text-align: center;">
                                                    <a href="" class="btn text-info border border-info btn-sm ms-3"><i class="fa-solid fa-file-pen fa-xl"></i>View</a>
                                                    <!-- <a href="Add-student-for-PMO.html" class="btn text-secondary border border-secondary btn-sm ms-3"><i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Update</a> -->
                                                    {{-- <a href="" class="btn btn-sm text-danger border border-danger  ms-3"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Meeting Form</td>
                                                <td>Superviser</td>
                                                <!-- <td>20-Arid-1747</td>
                                                <td>03137898012</td>
                                                <td>zunu@gamil.com</td> -->
                                                <td class="purposelbutton" style="text-align: center;">
                                                    <a href="" class="btn text-info border border-info btn-sm ms-3"><i class="fa-solid fa-file-pen fa-xl"></i>View</a>
                                                    <!-- <a href="Add-student-for-PMO.html" class="btn text-secondary border border-secondary btn-sm ms-3"><i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Update</a> -->
                                                    {{-- <a href="" class="btn btn-sm text-danger border border-danger  ms-3"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a> --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </main>
@endsection