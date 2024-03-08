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
                            <table>
                                <tr>
                                    <th><img class="img-fluid " src="{{ asset('admin/images/users/PMC-logo.png') }}" alt="Awesome Image" style="height:100px; width:150px;"></th>
                                    <th style="width: 53%"><h1>
                                        <h1><strong>पनवेल महानगरपालिका</strong></h1>
                                        <h5 style="text-align: center"><strong>ता. पनवेल, जि. रायगड, पिन नं. ४१० २०६</strong></h5>
                                        <h5 style="text-align: center"><strong>(दिव्यांग/कुष्ट रोग कल्याण विभाग)</strong></h5>
                                    </th>
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
                                    <h4><strong>ता. पनवेल, जि. रायगड, पिन नं. ४१० २०६</strong></h4>
                                    <h4><strong>(दिव्यांग/कुष्ट रोग कल्याण विभाग)</strong></h4>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>कार्यालय : </strong>२७४५८०४०/४१/४२ </p>


                                </div>
                                <div class="col-md-4 col-sm-4 text-left" style="padding-left:60px;">
                                    <p class="mb-1"><strong>Email : </strong> panvelcorporation@gmail.com</p>
                                </div>
                            </div>
                            <hr class="mb-1">

                            <div class="row">
                                <div class="col-md-3" >
                                    <div class="icon-box">

                                    </div>
                                </div>
                                <div class="col-md-8 text-center">
                                    <h4><strong>  दिव्यांग/कुष्ट रोग नोंदणी अर्ज सन २००३ /२००४</strong></h4>
                                </div>
                            </div>


                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>व्यक्तीचे नाव : </strong> {{ $data->full_name }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong> संपूर्ण पत्ता : </strong> {{ $data->full_address }}
                                </p>
                            </div>
                        </div>


                            <div class="row pt-3">
                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong>लिंग : </strong> {{ $data->gender }}
                                    </p>
                                </div>

                                <div class="col-md-4 col-sm-4 text-right">
                                    <p class="mb-0">
                                        <strong>वयः </strong> {{ $data->age }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>वडिलांचे / पतीचे नाव व पत्ता: </strong> {{ $data->father_name }} & {{ $data->father_address }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong>मोबाईल नं.: १) </strong> {{ $data->contact }}
                                    </p>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong> २) </strong> {{ $data->alternate_contact_no }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-6 col-sm-6">
                                    <p class="mb-0">
                                        <strong>दिव्यांगत्वाचा प्रकार / कुष्ठरोगाचा प्रकार : </strong> {{ $data->type_of_disability }}
                                    </p>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong> टक्केवारी :</strong> {{ $data->percentage }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>प्रमाणपत्र देणाऱ्या सक्षम अधिकाऱ्याचे नाव / हुद्दा व तपशील: </strong> {{ $data->authority_name }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>व्यक्तीचा आधारकार्ड नंबर : </strong> {{ $data->adhaar_no }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-6 col-sm-6">
                                    <p class="mb-0">
                                        <strong> बँकेचे नाव : </strong> {{ $data->bank_name }}
                                    </p>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong> शाखा :</strong> {{ $data->branch_name }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-6 col-sm-6">
                                    <p class="mb-0">
                                        <strong> खाते क्रमांक : </strong> {{ $data->account_no }}
                                    </p>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong> IFSC कोड :</strong> {{ $data->ifsc_code }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong> शिक्षण / नोकरी : </strong> {{ $data->profession }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-6 col-sm-6">
                                    <p class="mb-0">
                                        <strong> कुटुंबातील सदस्याची संख्या : </strong> {{ $data->number_of_family }}
                                    </p>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <p class="mb-0">
                                        <strong> शेती :</strong> {{ $data->agriculture }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <?php
                                        $personal_benefit = '';
                                        if($data->personal_benefit == 'yes'){
                                            $personal_benefit = 'होय';
                                        }
                                        else{
                                            $personal_benefit = 'नाही';
                                        }?>
                                        <strong> यापुर्वी वैयक्तीत लाभाच्या योजनेचा लाभ मिळालेला आहे का ?  </strong> {{ $personal_benefit }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong> कधी मिळालेला होता (वर्ष) :  </strong> {{ $data->received_year }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <?php
                                        $welfare_schemes = '';
                                        if($data->welfare_schemes == 'yes'){
                                            $welfare_schemes = 'होय';
                                        }
                                        else{
                                            $welfare_schemes = 'नाही';
                                        }?>
                                        <strong> केंद्र / राज्य सरकारच्या निराधार व इतर योजनांचा लाभदायक आहे काय ?  </strong>{{ $welfare_schemes }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">

                                        <?php
                                        $govt_scheme = '';
                                        if($data->govt_scheme == 'yes'){
                                            $govt_scheme = 'होय';
                                        }
                                        else{
                                            $govt_scheme = 'नाही';
                                        }?>
                                        <strong> शासन योजने अंतर्गत घरकूल मिळाले किंवा नाही : </strong>{{ $govt_scheme }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>  दारिद्र रेषेचा क्रमांक : </strong>{{ $data->poverty_number }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>  जातीचा प्रवर्ग : </strong> {{ $data->caste }}
                                    </p>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong> प्रभाग क्र.: </strong> {{ $data->ward_no }}
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                        <strong>  प्रभागातील मा. नगरसेवक / नगरसेविका यांचे नाव : </strong> {{ $data->name }}
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
                                        <strong>  अर्जदाराची सही / अगंठा </strong>
                                    </p>
                                </div>
                            </div>

                            <br>

                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <h4><strong> <u>अर्जासोबत जोडावयाची कागदपत्रे :</u> </strong></h4>
                                </div>
                            </div>

                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                         १) अर्जदाराचे अपंगत्वाचे प्रमाणपत्र / कुष्ठरोगाचे प्रमाणपत्र  (४०% च्या वरील) फक्त online ग्राह्य धरली जातील
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                         २) बँक पासबुक किंवा चेक ची झेरॉक्स
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                         ३) तहसिलदार यांचे कडिल १ लाखाच्या आतील उत्पन्नाचा दाखला (दिव्यांग व्यक्तीचा /कुष्ठरोगी व्यक्तीचा )
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                         ४) तहसिलदार / नगरसेवकाचा स्थानिक रहिवाशी दाखला.
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                         ५) लाभार्थ्यांचे २ पासपोर्ट साईज फोटो ६) लाभार्थ्यांचे आधारकार्ड
                                    </p>
                                </div>
                            </div>

                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                         ७) रेशनकार्ड / लाईटबील / मतदान ओळखपत्र / पॅनकार्ड
                                    </p>
                                </div>
                            </div>


                            <div class="row pt-3 d-none">
                                <div class="col-md-12 col-sm-12">
                                    <h4><strong> सुचना :</strong></h4>
                                    <p class="mb-0">
                                     १) अर्जदार पनवेल महानगरपालिका हद्दितील रहिवाशी असावा.
                                    </p>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                    २) अर्ज सादर करतेवेळी वरील आवश्यक परिपुर्ण कागदपत्रे सोबत जोडावी.
                                    </p>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                    ३) अर्ज सादर करणेपुर्वी दिव्यांग विभाग प्रमुखाकडून अर्ज तपासून घ्यावे त्यानंतरच सदरचा अर्ज आवक / जावक विभागात सादर करावा.
                                    </p>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                    ४) पुर्वी लाभ मिळाला असल्यास नविन अर्ज सादर करु नये.
                                    </p>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <p class="mb-0">
                                   ५) अर्जावरील कुठलीही माहिती अपुर्ण असल्यास फॉर्म रद्द करण्यात येईल याची नोंद घ्यावी.
                                    </p>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="submit-section text-right pt-5" style="float:right;margin-bottom:50px;">
					    <a href="{{ route('divyang.application') }}" class="btn btn-danger btn-lg text-light" >Cancel</a>
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
