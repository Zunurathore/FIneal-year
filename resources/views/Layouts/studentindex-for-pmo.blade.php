<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMO</title>
    <link href="{{URL::to('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('css/styles.css')}}" rel="stylesheet" />
    <link href="{{URL::to('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{URL::to('https://use.fontawesome.com/releases/v6.3.0/js/all.js')}}" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color: #2a446c;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" style="font-size:29px;" href="{{URL::to('PMO/home')}}" >
            <img src="{{URL::to('Images/nav-logo.png')}}" alt="" style="height: 45px;width: 55px;" class="">
            <b style="font-size:29px;">GIMS</b> 
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-0 order-lg-0 me-5 me-lg-0 pe-3" style="color: white;" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- <form class="d-none d-md-inline-block form-inline  me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form> -->
        <!-- Button trigger modal -->
        <div class="ms-auto ps-sm-5 me-3">
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalpmo" class="mx-2" onclick="addnewsinmodel()">
                <i class="fa-solid fa-comment fa-xl " style="color: white;"></i>
            </a>
        </div>
        {{-- <div class="navbar-nav ms-auto ms-md-0 me-5">
            <a href="" class="me-lg-3 ms-sm-auto ps-sm-5 ms-auto">
                <i class="fa-solid fa-right-from-bracket fa-lg" style="color: white;"></i>
            </a>
        </div> --}}
           <!-- Navbar -->
           <ul class="navbar-nav ms-auto ms-md-0 me-3">
            <li>
                <a href=""></a>
            </li>
            <li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fa-lg" style="color: white;"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li> -->
                    <li><a class="dropdown-item" href="{{URL::to('PMO/add-pmo')}}"><i class="fa-solid fa-user fa-lg me-2"  style="color: #63656d;"></i></i>Profile</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li> <a class="dropdown-item" href="{{URL::to('PMO/logout')}}"><i class="fa-solid fa-right-from-bracket fa-lg me-2" style="color: #63656d;"></i>Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #2a446c;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="{{URL::to('PMO/home')}}" style="font-size:15px;">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house fa-beat"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">PMO</div>
                        <!-- <a class="nav-link collapsed text-white" style="font-size:15px;" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePMO" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-user fa-fade fa-lg"></i></div>
                            For PMO
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePMO" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="Groups-For-PMO.html">All Groups</a>
                                <a class="nav-link" href="PMO-file-share.html">File Share</a>
                                <a class="nav-link" href="purposel-form-for-PMO.html">Purposel Form</a>
                                <a class="nav-link" href="defance-form-for-panel.html">Defance Form</a>
                                <a class="nav-link" href="Add-student-for-PMO.html">Add Student</a>
                                <a class="nav-link" href="add-student-by-excel-for-pmo.html">Add Student by Excel</a>
                                <a class="nav-link" href="Add-student-login-for-PMO.html">Add Student login</a>
                                <a class="nav-link" href="Add-supervisor-for-PMO.html">Add Superviser</a>
                                <a class="nav-link" href="All Supervoiser.html">All Superviser</a>
                                <a class="nav-link" href="All Panels.html">All Panel</a>
                                <a class="nav-link" href="All group login.html">All Groups Logins</a>
                                <a class="nav-link" href="all-students-record.html">All Student Record</a>
                                <a class="nav-link" href="Meeting-form-for-PMO.html">Meeting Form</a>
                                <a class="nav-link" href="Mid-form-for-PMO.html">Mid Form</a>
                                <a class="nav-link" href="Finel-form-for-PMO.html">Finel Form</a>
                            </nav>
                        </div>  -->
                        <a class="nav-link" href="{{URL::to('PMO/add-group-login')}}" style="font-size:15px;">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-light fa-plus "></i></div>
                            Add Group Login
                        </a>
                        <a class="nav-link" href="{{URL::to('PMO/add-student')}}" style="font-size:15px;">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-light fa-user-plus"></i></div>
                            Add Student
                        </a>
                        <a class="nav-link" href="{{URL::to('PMO/add-students-by-excel')}}" style="font-size:15px;">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-light fa-file-excel "></i></div>
                            Add Students By Excel
                        </a>
                        <a class="nav-link" href="{{URL::to('PMO/all-students')}}" style="font-size:15px;">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard"></i></div>
                            All Student's
                        </a>
                        <a class="nav-link" href={{URL::to('PMO/all-group-login')}} style="font-size:15px;">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></div>
                            All Group's Login
                        </a>
                        <a class="nav-link" href="{{URL::to('PMO/all-group')}}" style="font-size:15px;">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-light fa-users-between-lines "></i></div>
                            All Group
                        </a>
                         <!-- <a class="nav-link collapsed text-white" style="font-size:15px;" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePanel" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon  text-white"><i class="fa-solid fa-user fa-fade fa-lg"></i></div>
                            For Panel
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down fa-lg"></i></div>
                        </a>
                        <div class="collapse" id="collapsePanel" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="Groups-for-panel.html">All Groups</a>
                            </nav>
                        </div> 
                         <a class="nav-link collapsed text-white" style="font-size:15px;" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStudent" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon  text-white"><i class="fa-solid fa-user fa-fade fa-lg"></i></div>
                            For Students
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseStudent" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index-for-student.html">Sudent index</a>
                                <a class="nav-link" href="select_member_page.html">Select Group Member</a>
                                <a class="nav-link" href="test.html">Proposal Form</a>
                                <a class="nav-link" href="test.html">Share File</a>
                                <a class="nav-link" href="view-project-status-as-student.html">Project Status</a>
                                <a class="nav-link" href="view-shared-file-as-student.html">View File</a>
                                <a class="nav-link" href="view-marks-as-student.html">View Marks</a>
                            </nav>
                        </div> 
                        <a class="nav-link collapsed  text-white" style="font-size:15px;" href="#" data-bs-toggle="collapse" data-bs-target="#collapsesupervisor" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-user fa-fade fa-lg"></i></div>
                            For Superviser
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsesupervisor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index-for-supervisor.html">Index for supervisor</a>
                                <a class="nav-link" href="all-groups-for-supervisor.html">Groups Purposel Form</a>
                                <a class="nav-link" href="supervisor-file-share.html">Share File</a>
                                <a class="nav-link" href="view-shared-file-as-superviser.html">View File</a>
                                <a class="nav-link" href="groups-under-supervisor.html">Superviser of Groups</a>
                            </nav>
                        </div>  -->
                        <!-- <a class="nav-link text-white" href="Groups-For-PMO.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            All Groups
                        </a>
                        <a class="nav-link text-white" href="PMO-file-share.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            File Share
                        </a>
                        </a>
                        <a class="nav-link text-white" href="purposel-form-for-PMO.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            Purposel Form
                        </a>
                        <a class="nav-link text-white" href="Add-student-for-PMO.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            Add Student
                        </a>
                        <a class="nav-link text-white" href="add-student-by-excel-for-pmo.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            Add Student by Excel
                        </a>
                        <a class="nav-link text-white" href="Add-student-login-for-PMO.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            Add Student login
                        </a>
                        <a class="nav-link text-white" href="Add-supervisor-for-PMO.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            Add Superviser
                        </a>
                        <a class="nav-link text-white" href="All Supervoiser.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            All Superviser
                        </a>
                        <a class="nav-link text-white" href="All Panels.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            All Panel
                        </a>
                        <a class="nav-link text-white" href="All group login.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            All Groups Logins
                        </a>
                        <a class="nav-link text-white" href="all-students-record.html" style="font-size:15px;">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            All Student Record
                        </a> -->
                      
                        <!-- <a class="nav-link collapsed text-white" style="font-size: 15px;" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns fa-lg text-white"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed text-white" style="font-size: 15px;" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open fa-lg"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div> -->
                        <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a> -->
                    </div>
                </div>
                <div class="sb-sidenav-footer text-white d-none">
                    <div class="small">Logged in as:</div>
                    PMO
                </div>
            </nav>
        </div>
        @yield('content')
            <footer class="py-3 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center small">
                        <img src="{{URL::to('Images/nav-logo.png')}}" alt="" style="height: 50px;width: 57px;" class="me-2">
                        <div class="text-muted"> 
                            Gujrat Institute of Management and Sciences is formed in Gujrat under the Affiliation arrangement with PMAS-Arid Agriculture University Rawalpindi.
                        </div>
                        <!-- <div class="text-muted">Copyright &copy; GIMS PMS 2023</div> -->
                        <!-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <div id="customDropdownContainer">
    </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModalpmo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">News For Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput2" placeholder="Type message">
                        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                        <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                        <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
                    </div> -->
                    <div id="news" style="overflow: auto; max-height:300px;">
                        <div>
                          {{-- <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Ut enim ad minima veniam,
                            quis
                            nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                            commodi
                            consequatur?</p>
                          <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13<button id="" class="" type="button"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i></button></p>
                        </div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;"> --}}
                       </div>
                </div>
                <form action="{{route('PMO.addnews')}}" method="POST" id="newsForm">
                    @csrf
                   <div class="modal-footer">
                        <div class="d-flex justify-content-start me-5 pe-1">
                            <div class="form-check me-5">
                                <input type="hidden" name="newsfor" id="newsfor" value="">
                                <input class="form-check-input" type="checkbox" name="Superviser" id="Superviser">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Superviser
                                </label>
                            </div>
                            <div class="form-check me-5 pe-5">
                                <input class="form-check-input" type="checkbox" name="Student" id="Student">
                                <label class="form-check-label me-5 pe-2" for="flexCheckChecked">
                                    Student
                                </label>
                            </div>
                        </div>
                        <div class="input-group">
                             <textarea class="form-control"  rows="2" name="news" id="news-textbox" required></textarea>
                            {{-- <input type="text" class="form-control" placeholder="Type message" aria-label="Recipient's username" aria-describedby="basic-addon2" name="news" id="news-textbox" required> --}}
                            <span class="input-group-text" id="basic-addon2"><a href="" id="submitnews"><i class="fas fa-paper-plane"></i></a></span>
                        </div>
                        {{-- <button type="button" class="btn btn-sm text-danger border border-danger  ms-3"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Clear Chat</button> --}}
                    </div>
                </form>
            </div>
        </div>
     </div>
    
    <script src="{{URL::to('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js')}}"></script>
    <script src="{{URL::to('https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js')}}"></script>
    <script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js')}}" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{URL::to('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js')}}"></script>
    <script src="{{URL::to('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{URL::to('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{URL::to('js/scripts.js')}}"></script>
    <script src="{{URL::to('js/datatables-simple-demo.js')}}"></script>
    <script>
         $(document).ready(function() {
            var selectlenghtforupdatestudent = selectedstudents();
            if (selectlenghtforupdatestudent == 0) {
                selectlenghtforupdatestudent = 3;
            } else if (selectlenghtforupdatestudent == 1) {
                selectlenghtforupdatestudent = 2;
            } else if (selectlenghtforupdatestudent == 2) {
                selectlenghtforupdatestudent = 1;
            }
            console.log(selectlenghtforupdatestudent);
            $('.js-example-basic-multiple').select2({
                  maximumSelectionLength: selectlenghtforupdatestudent,
            });
            $('#submitnews').click(function(e) {
                    e.preventDefault(); // Prevent the default action (form submission)
                    var formData = $('#newsForm').serialize(); // Serialize form data
                    $.ajax({
                        type: 'POST',
                        url: $('#newsForm').attr('action'), // URL to your controller method
                        data: formData,
                        success: function(response) {
                            // Handle success response
                            console.log(response);
                            addnewsinmodel();
                            $('#news-textbox').val('');
                            // You can perform actions after successful submission here
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
            });
            $(document).on('click', '.dynamicbuttonstudent', function() {
                    const dropdownContent = $(this).siblings('.dropdown-menu').clone();
                    const customDropdownContainer = $('#customDropdownContainer');
                    customDropdownContainer.empty();
                    // Toggle visibility based on the presence of child elements
                    if (customDropdownContainer.children().length === 0) {
                    dropdownContent.css({
                        'display': 'block',
                        'bottom': '162px',
                        'right': '91px',
                        'top': '-35px',
                        'left': '-225px',
                        'height': '159px',
                        'width': '186px'
                    });
                    customDropdownContainer.empty().append(dropdownContent);
                    c = 1;
                    console.log(c);
                    } else {
                    customDropdownContainer.empty();
                    c = 0;
                    console.log(c);
                    }
            });
            $(document).on('click', '.dynamicbuttongroup', function() {
                const dropdownContent = $(this).siblings('.dropdown-menu').clone();
                const customContainer = $('#customDropdownContainer');
                customContainer.empty();
                if (customContainer.children().length === 0) {
                dropdownContent.css({
                    'display': 'block',
                    'bottom': '162px',
                    'right': '91px',
                     'top': '-121px',
                    'left': '-225px',
                    'height': '303px',
                    'width': '186px'
                });
                customContainer.empty().append(dropdownContent);
                c = 1;
                console.log(c);
                } else {
                customDropdownContainer.empty();
                c = 0;
                console.log(c);
                }
            });
            // $('#excelUploadForm').submit(function(e) {
            //     e.preventDefault();
            //     let fileInput = $('#file')[0];

            //     if (fileInput.files.length === 0) {
            //         alert("Please select a file.");
            //         return;
            //     }

            //     let fileName = fileInput.files[0].name;
            //     let fileExtension = fileName.split('.').pop().toLowerCase();

            //     if (fileExtension !== 'xlsx') {
            //         alert("Please select a valid Excel file with .xlsx extension.");
            //         return;
            //     }

            //     // If the file is valid, you can proceed with form submission.
            //     // Uncomment the following line to submit the form:
            //     // $(this).unbind('submit').submit();
            // });
               // $('#datatablesSimple').DataTable({
                    //     "lengthMenu": [ ] 
                    // })
                    // $("#datatable-dropdown").css("display", "none");
            $('#selectgrouplogin').change(function(){
                    var selectedSession=$(this).val();
                    // console.log(selectedSession);
                    if(selectedSession!="")
                    {
                        $.ajax({
                            url: "{{ route('PMO.showgrouploginaccordingsession', ':session') }}".replace(':session', selectedSession),
                            method: 'GET',
                            success: function(response) {
                                // Clear table body
                                $('.grouplogins tbody').empty();
                                // console.log(response);
                                $.each(response, function(index, data) {
                                    $('.grouplogins tbody').append(
                                            '<tr>' +
                                                '<td>' + data.email + '</td>' +
                                                '<td>' + data.password + '</td>' +
                                                '<td>' + data.session + '</td>' +
                                                '<td>' +
                                                        '<a href="/PMO/updategrouplogin/' + data.id + '" class="btn text-secondary border border-secondary btn-sm ms-3">' +
                                                            '<i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Update' +
                                                        '</a>' +
                                                        '<a href="/PMO/deletegrouplogin/' + data.id + '" class="btn btn-sm text-danger border border-danger  ms-3">' +
                                                            '<i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete' +
                                                        '</a>' +
                                                    '</td>' +
                                            '</tr>'
                                        );
                                });
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                    // console.log(selectedSession);
            });
            $('#selectstudentrecord').change(function(){
                    var selectedSession=$(this).val();
                    // console.log(selectedSession);
                    if(selectedSession!="")
                    {
                        $.ajax({
                            url: "{{ route('PMO.showstudentaccordingsession', ':session') }}".replace(':session', selectedSession),
                            method: 'GET',
                            success: function(response) {
                                const customContainer = $('#customDropdownContainer');
                                 customContainer.empty();
                                // Clear table body
                                $('.studentrecordtable tbody').empty();
                                // console.log(response);
                                $.each(response, function(index, data) {
                                $('.studentrecordtable tbody').append(
                                    '<tr>' +
                                        '<td>' + data.name + '</td>' +
                                        '<td>' + data.regno + '</td>' +
                                        '<td>' + data.pnumber + '</td>' +
                                        '<td>' + data.email + '</td>' +
                                        '<td>' + data.session + '</td>' +
                                        '<td>' +
                                            '<div class="dropdown-center d-flex justify-content-center">' +
                                                '<button class="btn btn-secondary btn-sm dropdown-toggle dynamicbuttonstudent" id="dropdownButtonn" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                                                    'Option' +
                                                '</button>' +
                                                '<ul class="dropdown-menu" style="display:none;">' +
                                                    '<li><span class="dropdown-item-text text-secondary">Action</span></li>' +
                                                    '<li><hr class="m-0"></li>' +
                                                    '<li><a href="/PMO/Mid-Marks/' + data.id + '" class="dropdown-item btn btn-sm text-secondary"><i class="fa-solid fa-book-open-reader fa-lg me-2" style="color: #6c757d;"></i>Mid Marks</a></li>' +
                                                    '<li><a href="/PMO/Finel-Marks/' + data.id + '" class="dropdown-item btn btn-sm text-secondary"><i class="fa-regular fa-pen-to-square fa-lg  me-2" style="color: #6c757d;"></i>Finel Marks</a></li>' +
                                                    '<li><a href="/PMO/updatestudentrecord/' + data.id + '" class="dropdown-item btn btn-sm text-secondary"><i class="fa fa-refresh fa-lg me-2" style="color: #6c757d;" aria-hidden="true"></i>Update</a></li>' +
                                                    '<li><hr class="m-0"></li>' +
                                                    '<li><a class="dropdown-item btn btn-sm text-danger" href="/PMO/deletestudentrecord/' + data.id + '"><i class="fa-regular fa-trash-can fa-lg me-1" style="color: #df0707;"></i>Delete</a></li>' +
                                                '</ul>' +
                                            '</div>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            });
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                    // console.log(selectedSession);
            });
           
        });
    </script>
    <script>
            document.getElementById('prevent').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default behavior (navigating to "#")
            // Your JavaScript code here
            return false; // Prevents the default behavior and stops event propagation
            });
              function selectedstudents() {
                    var selectedValues = [];
                    $('.studentupdatetable tbody tr').each(function() {
                        var regno = $(this).find('td:eq(1)').text(); // Adjust index based on column position
                        var name = $(this).find('td:eq(0)').text(); // Adjust index based on column position
                        selectedValues.push({ id: regno, text: name });
                    });
                    console.log(selectedValues); // This line logs data to the console
                //      $('.js-example-basic-multiple').select2({
                //     data: selectedValues,
                //     placeholder: 'Select values',
                //     multiple: true // Assuming it's a multi-select dropdown
                // });
                // $('.js-example-basic-multiple').val(selectedValues);

                    // Additional logic if needed
                    return selectedValues.length;
                }
                function addnewsinmodel() {
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('PMO.readnews') }}",
                        success: function(response) {
                            // Handle success response
                            // console.log(response);
                            $('#news').empty();
                             var data="";
                            // Example: Displaying the news in the console
                            for (let i = 0; i < response.length; i++) {
                                // console.log("News Title: " + response[i].news);
                                // console.log("News Content: " + response[i].id);
                                var deleteUrl = "{{ route('PMO.deletenews', ':id') }}";
                                    deleteUrl = deleteUrl.replace(':id', response[i].id); 
                               data += `<div class="d-flex justify-content-end">
                                           <div style="overflow-wrap:anywhere;">
                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${response[i].news}</p>
                                            <p class="d-flex flex-row justify-content-end small me-3 mb-3 rounded-3 text-muted"><a href="" style="" type="button" data-id="" class="text-danger ms-2" id="${response[i].id}"  onclick="deletenews(this.id); return false;"> delete</a></p>
                                           </div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                                         </div>`;
                            }
                            $('#news').append(data);
                            // You can perform actions after successful retrieval of data here
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                   
                }
                function deletenews(value)
                {
                    console.log(value);
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('PMO.deletenews') }}",
                        data: { id: value }, // Assuming 'id' is the parameter name expected by the controller
                        success: function(response) {
                            addnewsinmodel();
                            // console.log("Response:", response);
                            // Handle the response data here
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                        }
                    });
    
                }
    
    </script>
    </body>
</html>