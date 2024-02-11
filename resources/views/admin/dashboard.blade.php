<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}
<style>
 .clearfix {
            clear: both;
        }

        .row.no-gutter {
            margin-left: 0;
            margin-right: 0;
        }

        .row.no-gutter [class*='col-']:not(:first-child),
        .row.no-gutter [class*='col-']:not(:last-child) {
            padding-right: 0;
            padding-left: 0;
        }
        .card-body h4{
            height:50px;
        }
    .card-body .save-btn{
        margin-top:10px;
    }
</style>



    <div class="row">
        <div class="col-xxl-12">
            <div class="d-flex flex-column h-100">

                                <div class="row">
                                    @foreach ($scheme as $schemes)

                                    <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> {{ strtoupper($schemes->scheme_name) }}</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                    {{ $schemes->scheme_marathi_name }}
                                                </h4>

                                                  <div class="save-btn text-center">
                                                      <a href="{{ route('terms_conditions', $schemes->id) }}">
                                                          <button type="button" class="btn btn-blue btn-rounded width-md waves-effect waves-light" style="background-color:#8c68cd; color:#000000;">Apply &nbsp;<i class="fas fa-check"></i>
                                                        </button>
                                                      </a>
                                                  </div>
                                              </br>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                    {{-- <div class="col-md-4"> --}}
                                        <!-- card -->
                                        {{-- <div class="card card-animate" style="background-color: #8c68cd;color: white;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <p class="text-uppercase fw-medium  mb-0" style="text-align: center;font-size: 20px;">{{ $schemes->scheme_name }}</p>
                                                    </div>

                                                </div>
                                                <div class=" mt-4" >

                                                    <div class="mt-3" style="text-align: center;">
                                                        <a href="{{ route('terms_conditions', $schemes->id) }}" class="btn btn-success">Apply </a>

                                                    </div>

                                                </div> --}}
                                            {{-- </div><!-- end card body --> --}}
                                        {{-- </div><!-- end card --> --}}
                                    {{-- </div><!-- end col --> --}}
                                    @endforeach

                                    
                                    @canany(['hod.application'])
                                    <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Bus Concession Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$bus_concession_scheme_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>     
                                                    <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$bus_concession_scheme_pending}}</td>
                                                            <td>{{$bus_concession_scheme_approve}}</td>
                                                            <td>{{$bus_concession_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                
                                            </div>     
                                          </div>
                                        </div>
                                      </div>


                                      

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Divyang Nondani Application</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$disability_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                               
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$disability_scheme_pending}}</td>
                                                            <td>{{$disability_scheme_approve}}</td>
                                                            <td>{{$disability_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Education Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$education_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$education_scheme_pending}}</td>
                                                            <td>{{$education_scheme_approve}}</td>
                                                            <td>{{$education_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Marriage Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$marriage_scheme_total_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$marriage_scheme_pending}}</td>
                                                    <td>{{$marriage_scheme_approve}}</td>
                                                    <td>{{$marriage_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Sports Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$sports_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$sports_scheme_pending}}</td>
                                                    <td>{{$sports_scheme_approve}}</td>
                                                    <td>{{$sports_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> vehicle scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$vehicle_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$vehicle_scheme_pending}}</td>
                                                    <td>{{$vehicle_scheme_approve}}</td>
                                                    <td>{{$vehicle_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Women Sewing Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$women_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$women_scheme_pending}}</td>
                                                    <td>{{$women_scheme_approve}}</td>
                                                    <td>{{$women_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      @endcan  
                                     
                                      {{-- AC Panel --}}
                                      @canany(['ac.application'])
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Bus Concession Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$bus_concession_scheme_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>     
                                                    <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$ac_bus_concession_scheme_pending}}</td>
                                                            <td>{{$ac_bus_concession_scheme_approve}}</td>
                                                            <td>{{$ac_bus_concession_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                
                                            </div>     
                                          </div>
                                        </div>
                                      </div>


                                      

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Divyang Nondani Application</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$disability_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                               
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$ac_disability_scheme_pending}}</td>
                                                            <td>{{$ac_disability_scheme_approve}}</td>
                                                            <td>{{$ac_disability_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Education Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$education_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$ac_education_scheme_pending}}</td>
                                                            <td>{{$ac_education_scheme_approve}}</td>
                                                            <td>{{$ac_education_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Marriage Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$marriage_scheme_total_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$ac_marriage_scheme_pending}}</td>
                                                    <td>{{$ac_marriage_scheme_approve}}</td>
                                                    <td>{{$ac_marriage_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Sports Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$sports_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$ac_sports_scheme_pending}}</td>
                                                    <td>{{$ac_sports_scheme_approve}}</td>
                                                    <td>{{$ac_sports_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> vehicle scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$vehicle_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$ac_vehicle_scheme_pending}}</td>
                                                    <td>{{$ac_vehicle_scheme_approve}}</td>
                                                    <td>{{$ac_vehicle_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Women Sewing Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$women_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$ac_women_scheme_pending}}</td>
                                                    <td>{{$ac_women_scheme_approve}}</td>
                                                    <td>{{$ac_women_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endcan   

                                      {{-- AMC Panel --}}
                                      @canany(['amc.application'])
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Bus Concession Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$bus_concession_scheme_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>     
                                                    <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$amc_bus_concession_scheme_pending}}</td>
                                                            <td>{{$amc_bus_concession_scheme_approve}}</td>
                                                            <td>{{$amc_bus_concession_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                
                                            </div>     
                                          </div>
                                        </div>
                                      </div>


                                      

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Divyang Nondani Application</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$disability_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                               
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$amc_disability_scheme_pending}}</td>
                                                            <td>{{$amc_disability_scheme_approve}}</td>
                                                            <td>{{$amc_disability_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Education Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$education_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$amc_education_scheme_pending}}</td>
                                                            <td>{{$amc_education_scheme_approve}}</td>
                                                            <td>{{$amc_education_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Marriage Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$marriage_scheme_total_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$amc_marriage_scheme_pending}}</td>
                                                    <td>{{$amc_marriage_scheme_approve}}</td>
                                                    <td>{{$amc_marriage_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Sports Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$sports_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$amc_sports_scheme_pending}}</td>
                                                    <td>{{$amc_sports_scheme_approve}}</td>
                                                    <td>{{$amc_sports_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> vehicle scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$vehicle_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$amc_vehicle_scheme_pending}}</td>
                                                    <td>{{$amc_vehicle_scheme_approve}}</td>
                                                    <td>{{$amc_vehicle_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Women Sewing Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$women_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$amc_women_scheme_pending}}</td>
                                                    <td>{{$amc_women_scheme_approve}}</td>
                                                    <td>{{$amc_women_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endcan 

                                {{-- DMC Panel --}}  

                                @canany(['dmc.application'])
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Bus Concession Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$bus_concession_scheme_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>     
                                                    <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$dmc_bus_concession_scheme_pending}}</td>
                                                            <td>{{$dmc_bus_concession_scheme_approve}}</td>
                                                            <td>{{$dmc_bus_concession_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                
                                            </div>     
                                          </div>
                                        </div>
                                      </div>


                                      

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Divyang Nondani Application</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$disability_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                               
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$dmc_disability_scheme_pending}}</td>
                                                            <td>{{$dmc_disability_scheme_approve}}</td>
                                                            <td>{{$dmc_disability_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Education Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$education_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$dmc_education_scheme_pending}}</td>
                                                            <td>{{$dmc_education_scheme_approve}}</td>
                                                            <td>{{$dmc_education_scheme_reject}}</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Marriage Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">{{$marriage_scheme_total_count}}</h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$dmc_marriage_scheme_pending}}</td>
                                                    <td>{{$dmc_marriage_scheme_approve}}</td>
                                                    <td>{{$dmc_marriage_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Sports Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$sports_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$dmc_sports_scheme_pending}}</td>
                                                    <td>{{$dmc_sports_scheme_approve}}</td>
                                                    <td>{{$dmc_sports_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> vehicle scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$vehicle_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$dmc_vehicle_scheme_pending}}</td>
                                                    <td>{{$dmc_vehicle_scheme_approve}}</td>
                                                    <td>{{$dmc_vehicle_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-4 mb-3">
                                        <!-- Portlet card -->
                                        <div class="card h-100" style="border:solid 1px;">
                                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                            <div class="card-widgets">
                                            </div>
                                            <h5 class="card-title mb-0 text-dark" style="text-align:center;"> Women Sewing Scheme</h5>
                                          </div>
                                          <div id="cardCollpase5" class="collapse show">
                                            <div class="card-body">
                                              <br>
                                                <h4 style="text-align:center;">
                                                   {{$women_scheme_total_count}}
                                                </h4>
                                                <h4 style="text-align:center;">Count</h4>
                                                 
                                                <table class="table table-bordered nowrap align-middle">
                                                    <thead>
                                                    <tr>
                                                    <th>Pending</th>
                                                    <th>Approved</th>
                                                    <th>Rejected</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                    <td>{{$dmc_women_scheme_pending}}</td>
                                                    <td>{{$dmc_women_scheme_approve}}</td>
                                                    <td>{{$dmc_women_scheme_reject}}</td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endcan
                                      
                                </div> <!-- end row-->

            </div>
        </div>


    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
