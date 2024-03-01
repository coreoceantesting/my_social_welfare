<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard (डॅशबोर्ड)</x-slot>
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
        /* .card-body h4{
            height:50px;
        } */

    .card-body .save-btn{
        margin-top:10px;
    }

    .card-title {
    font-size: 15px !important;
    margin: 0 0 7px 0;
}


    .card-body table tr,td{
        text-align: center;
    }
</style>





    <div class="row">
        <div class="col-xxl-12">
            <div class="d-flex flex-column h-100">

                                <div class="row">

                                    @foreach ($scheme as $schemes)

                                        <div class="col-lg-3 mb-3">
                                            <!-- Portlet card -->
                                            <div class="card h-100" style="border:solid 1px;">
                                                <div class="card-header h-20 text-white" style="background-color:#8c68cd;">
                                                    <div class="card-widgets"></div>
                                                    <h5 class="card-title mb-0 text-white" style="text-align:center;"> {{ strtoupper($schemes->scheme_name) }}</h5>
                                                </div>
                                                <div class="card-body h-50">
                                                    <h5 style="text-align:center;">
                                                        {{ $schemes->scheme_marathi_name }}
                                                    </h5>
                                                </div>
                                                <div class="card-footer border-0">
                                                    <div class="save-btn text-center">
                                                        <a href="{{ route('terms_conditions', $schemes->id) }}">
                                                            <button type="button" class="btn btn-blue btn-rounded width-md waves-effect waves-light text-white" style="background-color:#8c68cd; color:#000000;">Apply &nbsp;<i class="fas fa-check"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>



@canany(['hod.application'])
<div class="row justify-content-center">
    <div class="col-xxl-12">
        <div class="card" style="border:solid 1px;">
            <form class="needs-validation" novalidate id="invoice_form">
                <div class="card-body border-bottom border-bottom-dashed p-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="" style="text-align: center !important;">
                                <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Divyang</button>

                            </div>
                            <div>

                            </div>
                        </div>
                        <!--end col-->

                    </div>
                    <!--end row-->
                </div>

                <div class="card-body p-3" style="margin-bottom: -25px;">
                    <!--end row-->
                    <div class="row">
                    <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center; text-transform: capitalize;"> Bus Concession Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                              <h4 style="text-align:center;">Total Count</h4>
                              <h4 style="text-align:center;">{{ $bus_concession_scheme_count }}</h4>
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
                                <td><a href="{{ url('bus_concession_application_list?category=1', 0) }}">{{$bus_concession_scheme_pending}}</a></td>
                                <td><a href="{{ url('bus_concession_application_list?category=1', 1) }}">{{$bus_concession_scheme_approve}}</a></td>
                                <td><a href="{{ url('bus_concession_application_list?category=1', 2) }}">{{$bus_concession_scheme_reject}}</a></td>
                                </tr>
                                </tbody>
                                </table>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Divyang Nondani Application</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                                <h4 style="text-align:center;">{{ $disability_scheme_total_count }}</h4>
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
                                            <td><a href="{{ url('divyang_registration_list', 0) }}">{{$disability_scheme_pending}}</a></td>
                                            <td><a href="{{ url('divyang_registration_list', 1) }}">{{$disability_scheme_approve}}</a></td>
                                            <td><a href="{{ url('divyang_registration_list', 2) }}">{{$disability_scheme_reject}}</a></td>
                                        </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                                <h4 style="text-align:center;">{{ $education_scheme_total_count }}</h4>

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
                                            <td><a href="{{ url('education_scheme_application_list?category=1', 0) }}">{{$education_scheme_pending}}</a></td>
                                            <td><a href="{{ url('education_scheme_application_list?category=1', 1) }}">{{$education_scheme_approve}}</a></td>
                                            <td><a href="{{ url('education_scheme_application_list?category=1', 2) }}">{{$education_scheme_reject}}</a></td>
                                        </tr>
                                    </tbody>
                                    </table>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Marriage Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                              <h4 style="text-align:center;">Total Count</h4>
                              <h4 style="text-align:center;">{{ $marriage_scheme_total_count }}</h4>

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
                                    <td><a href="{{ url('marriage_scheme_application_list', 0) }}">{{$marriage_scheme_pending}}</a></td>
                                    <td><a href="{{ url('marriage_scheme_application_list', 1) }}">{{$marriage_scheme_approve}}</a></td>
                                    <td><a href="{{ url('marriage_scheme_application_list', 2) }}">{{$marriage_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>


                </div>
            </form>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->


<div class="row justify-content-center">
    <div class="col-xxl-12">
        <div class="card" style="border:solid 1px;">
            <form class="needs-validation" novalidate id="invoice_form">
                <div class="card-body border-bottom border-bottom-dashed  p-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="" style="text-align: center !important;">
                                <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Women and Child walfare</button>

                            </div>
                            <div>

                            </div>
                        </div>
                        <!--end col-->

                    </div>
                    <!--end row-->
                </div>

                <div class="card-body p-3" style="margin-bottom: -25px;">
                    <!--end row-->
                    <div class="row">
                    <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                              <h4 style="text-align:center;">Total Count</h4>
                              <h4 style="text-align:center;">{{ $women_bus_concession_scheme_count }}</h4>
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
                                    <td><a href="{{ url('bus_concession_application_list?category=women', 0) }}">{{$women_bus_concession_scheme_pending}}</a></td>
                                    <td><a href="{{ url('bus_concession_application_list?category=women', 1) }}">{{$women_bus_concession_scheme_approve}}</a></td>
                                    <td><a href="{{ url('bus_concession_application_list?category=women', 2) }}">{{$women_bus_concession_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                                <h4 style="text-align:center;">{{ $women_education_scheme_total_count }}</h4>

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
                                    <td><a href="{{ url('education_scheme_application_list?category=women', 0) }}">{{$women_education_scheme_pending}}</a></td>
                                    <td><a href="{{ url('education_scheme_application_list?category=women', 1) }}">{{$women_education_scheme_approve}}</a></td>
                                    <td><a href="{{ url('education_scheme_application_list?category=women', 2) }}">{{$women_education_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Cancer Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                                <h4 style="text-align:center;">{{ $cancer_scheme_total_count }}</h4>
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
                                    <td><a href="{{ url('cancer_scheme_application_list', 0) }}">{{$cancer_scheme_pending}}</a></td>
                                    <td><a href="{{ url('cancer_scheme_application_list', 1) }}">{{$cancer_scheme_approve}}</a></td>
                                    <td><a href="{{ url('cancer_scheme_application_list', 2) }}">{{$cancer_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>



                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Sports Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                                <h4 style="text-align:center;">{{ $sports_scheme_total_count  }}</h4>
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
                                    <td><a href="{{ url('sports_scheme_application_list', 0) }}">{{$sports_scheme_pending}}</a></td>
                                    <td><a href="{{ url('sports_scheme_application_list', 1) }}">{{$sports_scheme_approve}}</a></td>
                                    <td><a href="{{ url('sports_scheme_application_list', 2) }}">{{$sports_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Vehicle Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                               <h4 style="text-align:center;">{{  $vehicle_scheme_total_count }}</h4>

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
                                    <td><a href="{{ url('vehicle_scheme_application_list', 0) }}">{{$vehicle_scheme_pending}}</a></td>
                                    <td><a href="{{ url('vehicle_scheme_application_list', 1) }}">{{$vehicle_scheme_approve}}</a></td>
                                    <td><a href="{{ url('vehicle_scheme_application_list', 2) }}">{{$vehicle_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Women Sewing Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                                <h4 style="text-align:center;">{{ $women_scheme_total_count }}</h4>

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
                                    <td><a href="{{ url('women_scheme_application_list', 0) }}">{{$women_scheme_pending}}</a></td>
                                    <td><a href="{{ url('women_scheme_application_list', 1) }}">{{$women_scheme_approve}}</a></td>
                                    <td><a href="{{ url('women_scheme_application_list', 2) }}">{{$women_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>


                </div>
            </form>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

<div class="row justify-content-center">
    <div class="col-xxl-12">
        <div class="card" style="border:solid 1px;">
            <form class="needs-validation" novalidate id="invoice_form">
                <div class="card-body border-bottom border-bottom-dashed p-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="" style="text-align: center !important;">
                                <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Senior Citizen</button>

                            </div>
                            <div>

                            </div>
                        </div>
                        <!--end col-->

                    </div>
                    <!--end row-->
                </div>

                <div class="card-body p-3" style="margin-bottom: -25px;">
                    <!--end row-->
                    <div class="row">
                    <div class="col-lg-3 mb-3">
                        <!-- Portlet card -->
                        <div class="card h-auto" style="border:solid 1px;">
                          <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                            <div class="card-widgets">
                            </div>
                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                          </div>
                          <div id="cardCollpase5" class="collapse show">
                            <div class="card-body pb-0">
                                <h4 style="text-align:center;">Total Count</h4>
                                <h4 style="text-align:center;"> {{ $senior_bus_concession_scheme_count }}</h4>
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
                                    <td><a href="{{ url('bus_concession_application_list?category=seniorCitizen', 0) }}">{{$senior_bus_concession_scheme_pending}}</a></td>
                                    <td><a href="{{ url('bus_concession_application_list?category=seniorCitizen', 1) }}">{{$senior_bus_concession_scheme_approve}}</a></td>
                                    <td><a href="{{ url('bus_concession_application_list?category=seniorCitizen', 2) }}">{{$senior_bus_concession_scheme_reject}}</a></td>
                                    </tr>
                                    </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>



                    </div>


                </div>
            </form>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

@endcan


                                      {{-- AC Panel --}}

                                    @canany(['ac.application'])
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Divyang</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="padding-bottom: -25px;">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center; text-transform: capitalize;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $ac_bus_concession_scheme_count }}</h4>
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
                                                                    <td><a href="{{ url('ac_bus_concession_application_list?category=1', 0) }}">{{$ac_bus_concession_scheme_pending}}</a></td>
                                                                    <td><a href="{{ url('ac_bus_concession_application_list?category=1', 1) }}">{{$ac_bus_concession_scheme_approve}}</a></td>
                                                                    <td><a href="{{ url('ac_bus_concession_application_list?category=1', 2) }}">{{$ac_bus_concession_scheme_reject}}</a></td>
                                                                    </tr>
                                                                    </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Divyang Nondani Application</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $ac_disability_scheme_total_count }}</h4>
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
                                                                                <td><a href="{{ url('ac_divyang_registration_list', 0) }}">{{$ac_disability_scheme_pending}}</a></td>
                                                                                <td><a href="{{ url('ac_divyang_registration_list', 1) }}">{{$ac_disability_scheme_approve}}</a></td>
                                                                                <td><a href="{{ url('ac_divyang_registration_list', 2) }}">{{$ac_disability_scheme_reject}}</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $ac_education_scheme_total_count }}</h4>

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
                                                                                <td><a href="{{ url('ac_education_scheme_application_list?category=1', 0) }}">{{$ac_education_scheme_pending}}</a></td>
                                                                                <td><a href="{{ url('ac_education_scheme_application_list?category=1', 1) }}">{{$ac_education_scheme_approve}}</a></td>
                                                                                <td><a href="{{ url('ac_education_scheme_application_list?category=1', 2) }}">{{$ac_education_scheme_reject}}</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Marriage Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $ac_marriage_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('ac_marriage_scheme_application_list', 0) }}">{{$ac_marriage_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_marriage_scheme_application_list', 1) }}">{{$ac_marriage_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_marriage_scheme_application_list', 2) }}">{{$ac_marriage_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->


                                    <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Women and Child walfare</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom: -25px">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $ac_women_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('ac_bus_concession_application_list?category=women', 0) }}">{{$ac_women_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_bus_concession_application_list?category=women', 1) }}">{{$ac_women_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_bus_concession_application_list?category=women', 2) }}">{{$ac_women_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $ac_women_education_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('ac_education_scheme_application_list?category=women', 0) }}">{{$ac_women_education_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_education_scheme_application_list?category=women', 1) }}">{{$ac_women_education_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_education_scheme_application_list?category=women', 2) }}">{{$ac_women_education_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Cancer Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $ac_cancer_scheme_total_count }}</h4>


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
                                                                        <td><a href="{{ url('ac_cancer_scheme_application_list', 0) }}">{{$ac_cancer_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_cancer_scheme_application_list', 1) }}">{{$ac_cancer_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_cancer_scheme_application_list', 2) }}">{{$ac_cancer_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Sports Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $ac_sports_scheme_total_count  }}</h4>
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
                                                                        <td><a href="{{ url('ac_sports_scheme_application_list', 0) }}">{{$ac_sports_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_sports_scheme_application_list', 1) }}">{{$ac_sports_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_sports_scheme_application_list', 2) }}">{{$ac_sports_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Vehicle Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{  $ac_vehicle_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('ac_vehicle_scheme_application_list', 0) }}">{{$ac_vehicle_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_vehicle_scheme_application_list', 1) }}">{{$ac_vehicle_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_vehicle_scheme_application_list', 2) }}">{{$ac_vehicle_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Women Sewing Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $ac_women_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('ac_women_scheme_application_list', 0) }}">{{$ac_women_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_women_scheme_application_list', 1) }}">{{$ac_women_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_women_scheme_application_list', 2) }}">{{$ac_women_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Senior Citizen</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom: -25px;">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;"> {{ $ac_senior_bus_concession_scheme_count }}</h4>

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
                                                                        <td><a href="{{ url('ac_bus_concession_application_list?category=seniorCitizen', 0) }}">{{$ac_senior_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('ac_bus_concession_application_list?category=seniorCitizen', 1) }}">{{$ac_senior_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('ac_bus_concession_application_list?category=seniorCitizen', 2) }}">{{$ac_senior_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>



                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    @endcan


                                      {{-- AMC Panel --}}
                                      @canany(['amc.application'])

                                        <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Divyang</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom: -25px">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center; text-transform: capitalize;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_bus_concession_scheme_count }}</h4>
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
                                                                    <td><a href="{{ url('amc_bus_concession_application_list?category=1', 0) }}">{{$amc_bus_concession_scheme_pending}}</a></td>
                                                                    <td><a href="{{ url('amc_bus_concession_application_list?category=1', 1) }}">{{$amc_bus_concession_scheme_approve}}</a></td>
                                                                    <td><a href="{{ url('amc_bus_concession_application_list?category=1', 2) }}">{{$amc_bus_concession_scheme_reject}}</a></td>
                                                                    </tr>
                                                                    </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Divyang Nondani Application</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_disability_scheme_total_count }}</h4>
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
                                                                                <td><a href="{{ url('amc_divyang_registration_list', 0) }}">{{$amc_disability_scheme_pending}}</a></td>
                                                                                <td><a href="{{ url('amc_divyang_registration_list', 1) }}">{{$amc_disability_scheme_approve}}</a></td>
                                                                                <td><a href="{{ url('amc_divyang_registration_list', 2) }}">{{$amc_disability_scheme_reject}}</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_education_scheme_total_count }}</h4>

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
                                                                                <td><a href="{{ url('amc_education_scheme_application_list?category=1', 0) }}">{{$amc_education_scheme_pending}}</a></td>
                                                                                <td><a href="{{ url('amc_education_scheme_application_list?category=1', 1) }}">{{$amc_education_scheme_approve}}</a></td>
                                                                                <td><a href="{{ url('amc_education_scheme_application_list?category=1', 2) }}">{{$amc_education_scheme_reject}}</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Marriage Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_marriage_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('amc_marriage_scheme_application_list', 0) }}">{{$amc_marriage_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_marriage_scheme_application_list', 1) }}">{{$amc_marriage_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_marriage_scheme_application_list', 2) }}">{{$amc_marriage_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->


                                    <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Women and Child walfare</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom: -25px">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_women_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('amc_bus_concession_application_list?category=women', 0) }}">{{$amc_women_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_bus_concession_application_list?category=women', 1) }}">{{$amc_women_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_bus_concession_application_list?category=women', 2) }}">{{$amc_women_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">

                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_women_education_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('amc_education_scheme_application_list?category=women', 0) }}">{{$amc_women_education_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_education_scheme_application_list?category=women', 0) }}">{{$amc_women_education_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_education_scheme_application_list?category=women', 0) }}">{{$amc_women_education_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Cancer Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_cancer_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('amc_cancer_scheme_application_list', 0) }}">{{$amc_cancer_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_cancer_scheme_application_list', 1) }}">{{$amc_cancer_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_cancer_scheme_application_list', 2) }}">{{$amc_cancer_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Sports Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_sports_scheme_total_count  }}</h4>
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
                                                                        <td><a href="{{ url('amc_sports_scheme_application_list', 0) }}">{{$amc_sports_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_sports_scheme_application_list', 1) }}">{{$amc_sports_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_sports_scheme_application_list', 2) }}">{{$amc_sports_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Vehicle Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{  $amc_vehicle_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('amc_vehicle_scheme_application_list', 0) }}">{{$amc_vehicle_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_vehicle_scheme_application_list', 1) }}">{{$amc_vehicle_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_vehicle_scheme_application_list', 2) }}">{{$amc_vehicle_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Women Sewing Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $amc_women_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('amc_women_scheme_application_list', 0) }}">{{$amc_women_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_women_scheme_application_list', 1) }}">{{$amc_women_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_women_scheme_application_list', 2) }}">{{$amc_women_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Senior Citizen</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom: -25px">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;"> {{ $amc_senior_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('amc_bus_concession_application_list?category=seniorCitizen', 0) }}">{{$amc_senior_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('amc_bus_concession_application_list?category=seniorCitizen', 1) }}">{{$amc_senior_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('amc_bus_concession_application_list?category=seniorCitizen', 2) }}">{{$amc_senior_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>



                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                      @endcan

                                {{-- DMC Panel --}}

                                @canany(['dmc.application'])
                                        <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Divyang</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom:-25px;">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center; text-transform: capitalize;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_bus_concession_scheme_count }}</h4>
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
                                                                    <td><a href="{{ url('dmc_bus_concession_application_list?category=1', 0) }}">{{$dmc_bus_concession_scheme_pending}}</a></td>
                                                                    <td><a href="{{ url('dmc_bus_concession_application_list?category=1', 1) }}">{{$dmc_bus_concession_scheme_approve}}</a></td>
                                                                    <td><a href="{{ url('dmc_bus_concession_application_list?category=1', 2) }}">{{$dmc_bus_concession_scheme_reject}}</a></td>
                                                                    </tr>
                                                                    </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Divyang Nondani Application</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_disability_scheme_total_count }}</h4>
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
                                                                                <td><a href="{{ url('dmc_divyang_registration_list', 0) }}">{{$dmc_disability_scheme_pending}}</a></td>
                                                                                <td><a href="{{ url('dmc_divyang_registration_list', 1) }}">{{$dmc_disability_scheme_approve}}</a></td>
                                                                                <td><a href="{{ url('dmc_divyang_registration_list', 2) }}">{{$dmc_disability_scheme_reject}}</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_education_scheme_total_count }}</h4>

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
                                                                                <td><a href="{{ url('dmc_education_scheme_application_list?category=1', 0) }}">{{$dmc_education_scheme_pending}}</a></td>
                                                                                <td><a href="{{ url('dmc_education_scheme_application_list?category=1', 1) }}">{{$dmc_education_scheme_approve}}</a></td>
                                                                                <td><a href="{{ url('dmc_education_scheme_application_list?category=1', 2) }}">{{$dmc_education_scheme_reject}}</a></td>
                                                                            </tr>
                                                                        </tbody>
                                                                        </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Marriage Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_marriage_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('dmc_marriage_scheme_application_list', 0) }}">{{$dmc_marriage_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_marriage_scheme_application_list', 0) }}">{{$dmc_marriage_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_marriage_scheme_application_list', 0) }}">{{$dmc_marriage_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->


                                    <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Women and Child walfare</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom: -25px">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">

                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_women_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=women', 0) }}">{{$dmc_women_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=women', 1) }}">{{$dmc_women_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=women', 2) }}">{{$dmc_women_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_women_education_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=women', 0) }}">{{$dmc_women_education_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=women', 1) }}">{{$dmc_women_education_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=women', 2) }}">{{$dmc_women_education_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Cancer Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_cancer_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_cancer_scheme_application_list', 0) }}">{{$dmc_cancer_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_cancer_scheme_application_list', 1) }}">{{$dmc_cancer_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_cancer_scheme_application_list', 2) }}">{{$dmc_cancer_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Sports Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_sports_scheme_total_count  }}</h4>
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
                                                                        <td><a href="{{ url('dmc_sports_scheme_application_list', 0) }}">{{$dmc_sports_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_sports_scheme_application_list', 1) }}">{{$dmc_sports_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_sports_scheme_application_list', 2) }}">{{$dmc_sports_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Vehicle Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{  $dmc_vehicle_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('dmc_vehicle_scheme_application_list', 0) }}">{{$dmc_vehicle_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_vehicle_scheme_application_list', 1) }}">{{$dmc_vehicle_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_vehicle_scheme_application_list', 2) }}">{{$dmc_vehicle_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Women Sewing Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body pb-0">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;">{{ $dmc_women_scheme_total_count }}</h4>

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
                                                                        <td><a href="{{ url('dmc_women_scheme_application_list', 0) }}">{{$dmc_women_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_women_scheme_application_list', 1) }}">{{$dmc_women_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_women_scheme_application_list', 2) }}">{{$dmc_women_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <div class="row justify-content-center">
                                        <div class="col-xxl-12">
                                            <div class="card" style="border:solid 1px;">
                                                <form class="needs-validation" novalidate id="invoice_form">
                                                    <div class="card-body border-bottom border-bottom-dashed p-2">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="" style="text-align: center !important;">
                                                                    <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Senior Citizen</button>

                                                                </div>
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <!--end col-->

                                                        </div>
                                                        <!--end row-->
                                                    </div>

                                                    <div class="card-body p-3" style="margin-bottom: -25px">
                                                        <!--end row-->
                                                        <div class="row">
                                                        <div class="col-lg-3 mb-3">
                                                            <!-- Portlet card -->
                                                            <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                                <div class="card-widgets">
                                                                </div>
                                                                <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                                <div class="card-body">
                                                                    <h4 style="text-align:center;">Total Count</h4>
                                                                    <h4 style="text-align:center;"> {{ $dmc_senior_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 0) }}">{{$dmc_senior_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 1) }}">{{$dmc_senior_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 2) }}">{{$dmc_senior_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                        </tbody>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>



                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                      @endcan

                                      {{-- admin Dashboard --}}
                                @if(auth()->user()->name == "Admin")

                                    <div class="row justify-content-center">
                                    <div class="col-xxl-12">
                                        <div class="card" style="border:solid 1px;">
                                            <form class="needs-validation" novalidate id="invoice_form">
                                                <div class="card-body border-bottom border-bottom-dashed p-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="" style="text-align: center !important;">
                                                            <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Divyang</button>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                                </div>
                                                <div class="card-body p-3" style="margin-bottom:-25px;">
                                                <!--end row-->
                                                <div class="row">
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center; text-transform: capitalize;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=1', 0) }}">{{$dmc_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=1', 1) }}">{{$dmc_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=1', 2) }}">{{$dmc_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Divyang Nondani Application</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_disability_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_divyang_registration_list', 0) }}">{{$dmc_disability_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_divyang_registration_list', 1) }}">{{$dmc_disability_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_divyang_registration_list', 2) }}">{{$dmc_disability_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_education_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=1', 0) }}">{{$dmc_education_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=1', 1) }}">{{$dmc_education_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=1', 2) }}">{{$dmc_education_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Marriage Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_marriage_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_marriage_scheme_application_list', 0) }}">{{$dmc_marriage_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_marriage_scheme_application_list', 0) }}">{{$dmc_marriage_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_marriage_scheme_application_list', 0) }}">{{$dmc_marriage_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="row justify-content-center">
                                    <div class="col-xxl-12">
                                        <div class="card" style="border:solid 1px;">
                                            <form class="needs-validation" novalidate id="invoice_form">
                                                <div class="card-body border-bottom border-bottom-dashed p-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="" style="text-align: center !important;">
                                                            <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Women and Child walfare</button>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                                </div>
                                                <div class="card-body p-3" style="margin-bottom: -25px">
                                                <!--end row-->
                                                <div class="row">
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_women_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=women', 0) }}">{{$dmc_women_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=women', 1) }}">{{$dmc_women_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=women', 2) }}">{{$dmc_women_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Education Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_women_education_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=women', 0) }}">{{$dmc_women_education_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=women', 1) }}">{{$dmc_women_education_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_education_scheme_application_list?category=women', 2) }}">{{$dmc_women_education_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Cancer Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_cancer_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_cancer_scheme_application_list', 0) }}">{{$dmc_cancer_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_cancer_scheme_application_list', 1) }}">{{$dmc_cancer_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_cancer_scheme_application_list', 2) }}">{{$dmc_cancer_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Sports Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_sports_scheme_total_count  }}</h4>
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
                                                                        <td><a href="{{ url('dmc_sports_scheme_application_list', 0) }}">{{$dmc_sports_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_sports_scheme_application_list', 1) }}">{{$dmc_sports_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_sports_scheme_application_list', 2) }}">{{$dmc_sports_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Vehicle Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{  $dmc_vehicle_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_vehicle_scheme_application_list', 0) }}">{{$dmc_vehicle_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_vehicle_scheme_application_list', 1) }}">{{$dmc_vehicle_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_vehicle_scheme_application_list', 2) }}">{{$dmc_vehicle_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Women Sewing Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body pb-0">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;">{{ $dmc_women_scheme_total_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_women_scheme_application_list', 0) }}">{{$dmc_women_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_women_scheme_application_list', 1) }}">{{$dmc_women_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_women_scheme_application_list', 2) }}">{{$dmc_women_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="row justify-content-center">
                                    <div class="col-xxl-12">
                                        <div class="card" style="border:solid 1px;">
                                            <form class="needs-validation" novalidate id="invoice_form">
                                                <div class="card-body border-bottom border-bottom-dashed p-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="" style="text-align: center !important;">
                                                            <button type="button" class="btn btn-primary btn-lg" style="width: 30%">Senior Citizen</button>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                                </div>
                                                <div class="card-body p-3" style="margin-bottom: -25px">
                                                <!--end row-->
                                                <div class="row">
                                                    <div class="col-lg-3 mb-3">
                                                        <!-- Portlet card -->
                                                        <div class="card h-auto" style="border:solid 1px;">
                                                            <div class="card-header d-flex justify-content-center align-items-center h-100  text-white" style="background-color:#8c68cd;">
                                                            <div class="card-widgets">
                                                            </div>
                                                            <h5 class="card-title mb-0 text-white" style="text-align:center;"> Bus Concession Scheme</h5>
                                                            </div>
                                                            <div id="cardCollpase5" class="collapse show">
                                                            <div class="card-body">
                                                                <h4 style="text-align:center;">Total Count</h4>
                                                                <h4 style="text-align:center;"> {{ $dmc_senior_bus_concession_scheme_count }}</h4>
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
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 0) }}">{{$dmc_senior_bus_concession_scheme_pending}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 1) }}">{{$dmc_senior_bus_concession_scheme_approve}}</a></td>
                                                                        <td><a href="{{ url('dmc_bus_concession_application_list?category=seniorCitizen', 2) }}">{{$dmc_senior_bus_concession_scheme_reject}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->

                                @endif

                                </div> <!-- end row-->

                                

            </div>
        </div>


    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
