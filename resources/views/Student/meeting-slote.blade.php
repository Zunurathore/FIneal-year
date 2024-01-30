@extends('Layouts.index-for-student')

@section('content')
<div id="layoutSidenav_content" style="background-color: #f7fbff;">
    <main>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <!-- <form action="">
                        <h5>Select To Share File</h5>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                For Superviser
                            </label>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">
                                For Student
                            </label>
                        </div>
                        <div class="mt-3">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mt-3">Send</button>
                        </div>
                    </form> -->
                    <main>
                        <div class="container-fluid px-4">
                            <h3 class="mt-4" style="color: #4040a2;">Meeting Slotes</h3>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tables</li>
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
                                    Time Table
                                </div>
                                <div class="card-body table_custom">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Detail</th>
                                                <!-- <th>Phone</th>
                                                <th>Email</th> -->
                                                <!-- <th class="text-center" style="text-align: center;">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Date</th>
                                                <th>Share with</th>
                                                <th>Detail</th>
                                                <!-- <th>Phone</th>
                                                <th>Email</th> -->
                                                <!-- <th class="text-center" style="text-align: center;">Action</th> -->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Monday</td>
                                                <td>04/12/2023</td>
                                                <td>12:50</td>
                                                <td>Meeting For</td>
                                                <!-- <td>03137898012</td>
                                                <td>zunu@gamil.com</td> -->
                                             
                                            </tr>
                                            <tr>
                                                <td>Friday</td>
                                                <td>04/12/2023</td>
                                                <td>3:00</td>
                                                <td>Meeting For this Group</td>
                                                <!-- <td>03137898012</td>
                                                <td>zunu@gamil.com</td> -->
                                                
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