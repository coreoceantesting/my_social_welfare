<x-admin.layout>
    <x-slot name="title">Sports Scheme Application</x-slot>
    <x-slot name="heading">Sports Scheme Application</x-slot>

<section class="content">
    <div class="body_scroll">

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">

                    <div class="card"  id="divToPrint">
                        <div class="body" style="padding:60px;">
                            <table style="border: none">
                                <tr>
                                    <th style="border: none"><img class="img-fluid " src="{{ asset('admin/images/users/PMC-logo.png') }}" alt="Awesome Image" style="height:100px; width:150px;"></th>
                                    <th style="width: 60%;border: none"><h1><strong>पनवेल महानगरपालिका</strong></h1> <h4><strong>ता. पनवेल जि. रायगड पिन नं. ४१० २०६</strong></h4></th>
                                  </tr>
                            </table>
                            <div class="row d-none">
                                <div class="col-md-3" >
                                    <div class="icon-box">
                                        <img class="img-fluid " src="{{ asset('admin/images/users/PMC-logo.png') }}" alt="Awesome Image" style="height:100px; width:150px;">
                                    </div>
                                </div>
                                <div class="col-md-8 text-center">
                                    <h1><strong>पनवेल महानगरपालिका</strong></h1>
                                    <h4><strong>ता. पनवेल जि. रायगड पिन नं. ४१० २०६</strong></h4>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>कार्यालय :</strong> २७४५८०४०/४१/४२ &nbsp;&nbsp;&nbsp;<strong>फॅक्स नं. </strong>०२२-२७४५२२३३</p>

                                </div>
                                <div class="col-md-4 col-sm-4 text-left" style="padding-left:60px;">

                                    <p class="mb-1"><strong>Email : </strong> panvelcorporation@gmail.com</p>
                                </div>
                            </div>
                            <hr class="mb-1">

                            <div class="row pt-0">
                                <div class="col-md-10 col-sm-10">
                                </div>
                                    <div class="col-md-2 col-sm-2">
                                       Date :
                                       {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                    </div>
                                </div>


                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    महिला व बालकल्याण विभागा अंतर्गत महिला लाभार्थ्यांनी <strong>(चार चाकी वाहन चालविणेचे प्रशिक्षण बाबत.)</strong> प्रशिक्षण वर्गासाठी करावयाचा अर्जाचा नमुना.
                                </p>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-9 col-sm-9" >
                                <p class="mb-1"><strong>प्रति,</strong></p>
                                <p class="mb-1"><strong>मा. आयुक्त,</strong></p>
                                <p class="mb-1"><strong>पनवेल महानगरपालिका,</strong></p>
                                <p class="mb-1"><strong>पनवेल.</strong></p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="icon-box">
                                    <img class="img-fluid " src="{{ asset('storage/' . $data->passport_size_photo) }}" alt="Awesome Image" style="height:100px; width:150px;">
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी अर्जदार श्रीमती / कु <strong>{{ $data->full_name }}</strong> महिला बाल कल्याण विभागा अंतर्गत प्रशिक्षण घेवू इच्छित आहे व माझी माहिती खालीलप्रमाणे आहे.
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong> प्रशिक्षणाचे नावः </strong>
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>१) संपूर्ण नाव व पत्ता: </strong>{{ $data->full_name }} व {{ $data->full_address }}
                                </p>
                            </div>
                        </div>

                        <?php $dob = $data->dob;
                        $dob = new DateTime($dob);
                        $currentDate = new DateTime();
                        $age = $currentDate->diff($dob)->y; ?>
                            <div class="col-md-4 col-sm-4">
                                <p class="mb-0">
                                    <strong>2)जन्म तारीख : </strong>{{ date('d-m-Y', strtotime($data->dob)) }}

                                </p>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong> वय </strong>{{ $age }}
                                    </p>
                                </div>

                            <div class="col-md-4 col-sm-4">
                                <p class="mb-0">
                                    <strong>मोबाईल क्र.: </strong>{{ $data->contact }}
                                </p>
                            </div>


                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>३) महानगरपालिका क्षेत्रातील वास्तव्याचा कालावधी :- </strong>{{ $data->duration_of_residence }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>४) आधारकार्ड क्रमांक:-  </strong>{{ $data->adhaar_no }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>५) यापुर्वी सदर योजने अंतर्गत प्रशिक्षण घेतले असल्यास त्याचा तपशील:-  </strong> {{ $data->details }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>६) चारचाकी प्रशिक्षण फि रक्कम रू ५२०/- </strong>
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>७) प्रशिक्षणाची १० टक्के रक्कम भरल्याची पावती क्रमांक: </strong>{{ $data->receipt_no }}
                                </p>
                            </div>
                        </div>


                        <div class="row pt-3">
                            <div class="col-md-8 col-sm-8">
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="icon-box">
                                    <img class="img-fluid " src="{{ asset('storage/' . $data->candidate_signature) }}" alt="Awesome Image" style="height:100px; width:150px;">
                                </div>
                                <p class="mb-0">
                                    <strong>  अर्जदाराची सही</strong>
                                </p>
                                {{-- <p class="mb-0">
                                    <strong>(नावः- ---------------) </strong>
                                </p> --}}
                            </div>
                        </div>
                        <br>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <i class='fas fa-chevron-circle-right'></i>&nbsp;&nbsp;<strong>अर्ज हा सोबत जोडलेल्या विहित नमुन्यात द्यावा व सोबत खालील कागदपत्रे जोडावीत. </strong>
                                </p>

                                <p class="mb-1"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१) शिधापत्रिका (रेशनकार्डची) झेरॉक्स प्रत. २) आधारकार्डाची झेरॉक्स प्रत. ३) रहिवासी दाखला</strong></p>
                               <p class="mb-1"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३) सन्मा. नगरसेवक/ नगरसेविका यांचे शिफारस पत्र. ४) स्वयं घोषणापत्र. ५) प्रशिक्षण फि </strong></p>

                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>टिप:- फॉर्म मधील संपूर्ण माहिती भरुन सर्व कागदपत्र जोडून फॉर्म महानगरपालिकेच्या महिला व बालकल्या विभागात देण्यात यावा. अपूर्ण कागदपत्रांचा फॉर्म विचारात घेतला जाणार नाही याची नोंद घ्यावी.</strong>
                                </p>
                            </div>
                        </div>


                        </div>
                    </div>
                    <div class="submit-section text-right pt-5" style="float:right;margin-bottom:50px;">
					    <a href="{{ route('vehicle_scheme.application') }}" class="btn btn-danger btn-lg text-light" >Cancel</a>
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

