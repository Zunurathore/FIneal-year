@extends('Layouts.index-for-supervisor')
@section('content')
<div id="layoutSidenav_content" style="background-color: #f7fbff;">
    <main>
      <section class="section mt-3">
        <div class="container-fluid">
          <div class="row px-4">
            <h2 class="d-flex justify-content-center mb-5"  style="color: #4040a2;">Set Meeting Time/Free Time Slote</h2>
            <div class="col-lg-12">
              <form>
                 <div class="mb-4 border rounded">
                      <div class="m-3">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                              <label class="form-label" for="form6Example2">Day</label>
                              <select name="select" id="select" class="form-control" required>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                              </select>
                              <!-- <input type="text" id="form6Example2" class="form-control" placeholder="ex# Fall-2020" required/> -->
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-outline">
                              <label class="form-label" for="form6Example1">Time</label>
                              <input  type="time" name="time" min="00:00" max="12:00" step="60" id="form6Example1" class="form-control" placeholder="" required/>
                            </div>
                          </div>
                        </div>
                        <!-- Text input -->
                        <div class="form-outline mb-4">
                          <div class="form-group">
                            <label for="birthdate" class="form-lable">Select Date</label>
                            <input type="date" id="birthdate" class="form-control" name="birthdate" min="1900-01-01" max="2023-12-31">
                          </div>
                        </div>
                        <!-- Text input -->
                        <div class="form-outline mb-4">
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Detail</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Any Detail"></textarea>
                          </div>
                        </div>
                       </div>
                  </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
              </form>
            </div>
          </div>
        </div>
        <main>
          <div class="container-fluid px-5 ">
              <h3 class="mt-4"  style="color: #4040a2;">Meeting Slotes</h3>
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
                  <div class="card-header"  style="color: #4040a2;">
                      <i class=" me-1"></i>
                      Time Table
                  </div>
                  <div class="card-body table_custom">
                      <table id="datatablesSimple">
                          <thead>
                              <tr>
                                  <th>Day</th>
                                  <th>Time</th>
                                  <th>Detail</th>
                                  <!-- <th>Phone</th>
                                  <th>Email</th> -->
                                  <th class="text-center" style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>File Name</th>
                                  <th>Share with</th>
                                  <th>Detail</th>
                                  <!-- <th>Phone</th>
                                  <th>Email</th> -->
                                  <th class="text-center" style="text-align: center;">Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                              <tr>
                                  <td>Monday</td>
                                  <td>12:50</td>
                                  <td>Meeting For</td>
                                  <!-- <td>03137898012</td>
                                  <td>zunu@gamil.com</td> -->
                                  <td class="purposelbutton" style="text-align: center;">
                                      <!-- <a href="" class="btn text-info border border-info btn-sm ms-3"><i class="fa-solid fa-book-open-reader fa-lg me-1"></i>View</a> -->
                                      <!-- <a href="" class="btn text-secondary border border-secondary btn-sm ms-3"><i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Update</a> -->
                                      <a href="" class="btn btn-sm text-danger border border-danger  ms-3"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Friday</td>
                                  <td>3:00</td>
                                  <td>Meeting For this Group</td>
                                  <!-- <td>03137898012</td>
                                  <td>zunu@gamil.com</td> -->
                                  <td class="purposelbutton" style="text-align: center;">
                                      <!-- <a href="" class="btn text-info border border-info btn-sm ms-3"><i class="fa-solid fa-book-open-reader fa-lg me-1"></i>View</a> -->
                                      <!-- <a href="" class="btn text-secondary border border-secondary btn-sm ms-3"><i class="fa-regular fa-pen-to-square fa-lg  me-1" style="color: #6c757d;"></i>Update</a> -->
                                      <a href="" class="btn btn-sm text-danger border border-danger  ms-3"><i class="fa-regular fa-trash-can fa-lg  me-1" style="color: #df0707;"></i>Delete</a>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </main>
      </section>
    </main>
    @endsection