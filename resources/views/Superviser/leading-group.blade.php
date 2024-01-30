@extends('Layouts.index-for-supervisor')
@section('content')
<div id="layoutSidenav_content" style="background-color: #f7fbff;">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"  style="color: #4040a2;">Superviser of theis Groups</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index-for-supervisor.html">Dashboard</a></li>
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
                                <th>Project Name</th>
                                <th>Reg.No</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-center" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Group Leader Name</th>
                                <th>Project Name</th>
                                <th>Reg.No</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-center" style="text-align: center;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Ali</td>
                                <td>PMS</td>
                                <td>20-Arid-1747</td>
                                <td>03137898012</td>
                                <td>zunu@gmail.com</td>
                                <td class="purposelbutton" style="text-align: center;">
                                    <a href="{{URL::to('Superviser/group-progress')}}" class="btn text-info border border-info btn-sm ms-3"><i class="fa-solid fa-file-pen fa-xl"></i>Progress</a>
                                    <a href="{{URL::to('Superviser/group-detail')}}" class="btn text-secondary border border-secondary btn-sm ms-3"><i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Group Detail</a>
                                    <!-- <a href="" class="btn btn-sm text-danger border border-danger  ms-3"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a> -->
                                    <!-- <a href="" class="btn btn-primary btn-sm  ms-3">Progresss</a>                                             -->
                                    <!-- <a href="singel-group-detail-for-superviser.html" class="btn btn-primary btn-sm  ms-3">Group Detail</a>                                             -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @endsection