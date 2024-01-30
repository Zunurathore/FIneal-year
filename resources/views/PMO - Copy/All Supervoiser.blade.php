@extends('Layouts.index')

@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">All Superviser Detail</h3>
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
                                Superviser
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Superviser Name</th>
                                            <!-- <th>Name</th>
                                            <th>Reg.No</th> -->
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th class="text-center" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Superviser Name</th>
                                            <!-- <th>Name</th>
                                            <th>Reg.No</th> -->
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th class="text-center" style="text-align: center;">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Ali</td>
                                            <!-- <td>Bilal</td>
                                            <td>20-Arid-1747</td> -->
                                            <td>03137898012</td>
                                            <td>zunu@gamil.com</td>
                                            <td class="purposelbutton" style="text-align: center;">
                                                <!-- <a href="Add-student-for-PMO.html" class="btn text-info border border-info btn-sm ms-3"><i class="fa-solid fa-book-open-reader fa-lg me-1"></i>View</a> -->
                                                <a href="Add-supervisor-for-PMO.html" class="btn text-secondary border border-secondary btn-sm ms-3"><i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Update</a>
                                                <a href="" class="btn btn-sm text-danger border border-danger  ms-3"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a>
                                                <!-- <a href="Add-supervisor-for-PMO.html" class="btn btn-success btn-sm m-1 ms-3">Update</a> -->
                                                <!-- <a href="" class="btn btn-danger btn-sm m-1 ms-3">Delete</a> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
@endsection
