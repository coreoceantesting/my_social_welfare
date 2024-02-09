<x-admin.layout>
    <x-slot name="title">Divyang Scheme Application</x-slot>
    <x-slot name="heading">Divyang Scheme Application</x-slot>

<section class="content">
    <div class="body_scroll">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">

                    <div class="card"  id="divToPrint">
                        <div class="body" style="padding:60px;">
                            <div class="row">
                                <div class="col-md-3" >
                                    <div class="icon-box">
                                        <img class="img-fluid " src="{{ asset('admin/images/users/PMC-logo.png') }}" alt="Awesome Image" style="height:100px; width:150px;">
                                    </div>
                                </div>
                                <div class="col-md-8 text-center">
                                    <h1><strong>Panvel Municipal Corporation </strong></h1>
                                    <h4><strong>Senior Citizen/Diyang/Student</strong></h4>

                                </div>
                            </div>
                            <hr>

                            <div class="row pt-0">
                                <div class="col-md-3   col-sm-3 ">
                                   Date :
                                   {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </div>
                            </div>

                        <div class="row pt-3">
                            <div class="col-md-6 col-sm-6">
                                <p class="mb-0">
                                    <strong>Name: </strong>{{ $data->full_name }}
                                </p>
                            </div>
                            <div class="col-md-6 col-sm-6">

                                {{-- <img src="{{ asset('storage/' . $data->candidate_signature) }}" alt="Photo" style="max-width: 100px; height: auto;"> --}}
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <p class="mb-0">
                                    <strong>Address: </strong>{{ $data->full_address }}
                                </p>
                            </div>
                        </div>


                            <div class="row pt-3">
                                <div class="col-md-4 col-sm-4">

                                    <p class="mb-0">
                                        <strong>Candidate signature: </strong>
                                        {{-- <img src="{{ asset('storage/' . $data->candidate_signature) }}" alt="Photo" style="max-width: 100px; height: auto;"> --}}
                                    </p>

                                </div>

                                <div class="col-md-4 col-sm-4 text-right">
                                    <p class="mb-0">
                                        <strong>Age:  </strong>{{ $data->age }}
                                    </p>
                                </div>
                            </div>


                            <div class="row pt-3">
                                <div class="col-md-6 col-sm-6">
                                    <p class="mb-0">
                                        <strong>Date of issue of certificate: </strong>{{ date("d/m/Y", strtotime($data->dmc_approval_date)) }}
                                    </p>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <img src="{{ asset('storage/' . $data->dmc_sign) }}" alt="Photo" style="max-width: 100px; height: auto;">
                                    <p class="mb-0">
                                        <strong>Development Officer </strong><br>
                                        <strong>Panvel Municipal Corporation </strong>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="submit-section text-right pt-5" style="float:right;margin-bottom:50px;">
					    <a href='' class="btn btn-danger btn-lg text-light" >Cancel</a>
						<button  class="btn btn-success btn-lg" type="button" onClick="printDiv('divToPrint')" ><i class="fa fa-print fa-lg text-light"></i> &nbsp;&nbsp;Print</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>

</x-admin.layout>
<script>
    function printDiv(divName) {
        $("#print").css("display", "none");
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        $("#print").css("display", "block");
        // location.reload();

    }
</script>
