@extends('layouts.master')
@section('content')

<div class="content-wrapper px-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">Contact Person Details</div>
              <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                          <p class="form-control-plaintext" id="address">{{$data->fname}}</p>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                          <p class="form-control-plaintext" id="address">{{$data->lname}}</p>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <p class="form-control-plaintext" id="email">{{$data->email}}</p>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 col-form-label">Phone No.</label>
                        <div class="col-sm-8">
                          <p class="form-control-plaintext" id="phone">{{$data->contact}}</p>
                        </div>
                    </div>
                </form>
              </div>
              <div class="card-footer">Footer</div>
           </div>
        </div>

        <div class="col-md-6">
            <div class="card">
              <div class="card-header">Company Details</div>
              <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="org" class="col-sm-4 col-form-label">Company Name</label>
                        <div class="col-sm-8">
                          <p class="form-control-plaintext" id="org">{{$data->org}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext" id="address">{{$data->address}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="service" class="col-sm-4 col-form-label">Services</label>
                        <div class="col-sm-8">
                          <p class="form-control-plaintext" id="service">{{$data->service}}</p>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tax" class="col-sm-4 col-form-label">Sales Tax Doc</label>
                        <div class="col-sm-8">
                            <a href="/storage/taxes/{{$data->tax}}" id='tax' class='form-control-plaintext' download><i class='fas fa-download fa-2x'></i></a>
                        </div>
                    </div>
                </form>
              </div>
              <div class="card-footer">Footer</div>
           </div>
        </div>


    </div>

<div class="row pt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                All Awards
            </div>
            <div class="card-body">
              <div class="text-center">
                <button type="button" class="btn btn-primary center" data-toggle="modal" data-target="#myModal2">
                  SHOW
                </button>
              </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal2">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">

                      @include('vendorData.awa')

                  </div>


                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>
            <!-- end modal -->
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                In-progress Jobs
            </div>
            <div class="card-body">
              <div class="text-center">
                <button type="button" class="btn btn-primary center" data-toggle="modal" data-target="#myModal1">
                  SHOW
                </button>
              </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal1">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">

                      @include('vendorData.prog')

                  </div>


                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>
            <!-- end modal -->
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Completed Jobs
            </div>
            <div class="card-body">
                <!-- modal -->
                <!-- Button to Open the Modal -->
                <div class="text-center">
                  <button type="button" class="btn btn-primary center" data-toggle="modal" data-target="#myModal">
                    SHOW
                  </button>
                </div>

              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Modal Heading</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        @include('vendorData.comp')

                    </div>


                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- end modal -->

        </div>
    </div>
</div>
</div>


@endsection
