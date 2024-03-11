<x-admin.layout>
    <x-slot name="title">Cancer Scheme Application</x-slot>
    <x-slot name="heading">Cancer Scheme Application</x-slot>

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
                                    <h1><strong>पनवेल महानगरपालिका</strong></h1>
                                    <h4><strong>ता. पनवेल जि. रायगड पिन नं. ४१० २०६</strong></h4>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>कार्यालय : </strong>२७४५८०४०/४१/४२ &nbsp;&nbsp;&nbsp;&nbsp;<strong>फॅक्स नं.</strong> ०२२-२७४५२२३३</p>

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
                                    <strong>महिला व बालकल्याण विभागातर्फे कॅन्सर या दुर्धर आजाराने ग्रस्त असलेल्या महिलांना व मुलांना /मुलींना अर्थसहाय्य मिळणेबाबत करावयाचा अर्जाचा नमुना.</strong>
                                </p>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-8 col-sm-8" >

                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="icon-box">
                                    <img class="img-fluid " src="{{ asset('storage/' . $data->passport_size_photo) }}" alt="Awesome Image" style="height:100px; width:150px;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-sm-8" >
                                <p class="mb-1"><strong>प्रति,</strong></p>
                                <p class="mb-1"><strong>मा. आयुक्त</strong></p>
                                <p class="mb-1"><strong>पनवेल महानगरपालिका,</strong></p>
                                <p class="mb-1"><strong>पनवेल.</strong></p>
                            </div>

                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी अर्जदार श्रीमती/ कु. {{ $data->full_name }} महिला व बालकल्याण विभागातर्फे कॅन्सर या दुर्धर आजाराने ग्रस्त असलेल्या महिलांना व मुलांना /मुलींना अर्थसहाय्य मिळणेबाबत व माझी माहिती खालीलप्रमाणे आहे.
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                        <table class="table table-bordered nowrap align-middle" style="border:1px solid">

                            <tr>
                                <td>अ.क्र.</td>
                            </tr>
                                <tr>
                                    <td><strong>१</strong></td>
                                    <td><strong>अर्जदाराचे लाभार्थ्याशी असलेले नाते</strong></td>
                                    <td><strong>स्वतः / नाते</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>२</strong></td>
                                    <td><strong>लाभार्थ्याचे संपूर्ण नाव व पत्ता<br>मोबाईल क्र.</strong></td>
                                    <td>{{ $data->full_name }}, {{ $data->full_address }} <br>{{ $data->contact }}</td>
                                </tr>
                                <tr>
                                    <?php $dob = $data->dob;
                                    $dob = new DateTime($dob);
                                    $currentDate = new DateTime();
                                    $age = $currentDate->diff($dob)->y; ?>
                                    <td><strong>३</strong></td>
                                    <td><strong>लाभार्थ्याचे वय</strong></td>
                                    <td><strong>पुरूष / स्त्री&nbsp;&nbsp;&nbsp;वय: {{ $age }}<br>

                                        जन्म दिनांक</strong> {{ date('d-m-Y', strtotime($data->dob)) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>४</strong></td>
                                    <td><strong>लाभार्थ्याचे महानगरपालिका क्षेत्रातील <br>वास्तव्याचा कालावधी :- </strong></td>
                                    <td>{{ $data->duration_of_residence }}</td>
                                </tr>
                                <tr>
                                    <td><strong>५</strong></td>
                                    <td><strong>लाभार्थ्यांचा आधार कार्ड नंबर : </strong></td>
                                    <td>{{ $data->adhaar_no }}</td>
                                </tr>

                                <tr>
                                    <td><strong>६</strong></td>
                                    <td><strong>उत्पन्नाचा दाखला (वार्षीक उत्पन्न रु. ६ <br>लाखांपेक्षा कमी):-</strong></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td><strong>७</strong></td>
                                    <td><strong>आजाराचा तपशिल /प्रकार<br>

                                        कॅन्सर निदान झालेचा दिनांक<br>उपचार घेत असलेल्या रूग्णालयाचे नाव <br> वैद्यकिय अधिका-याचे प्रमाणपत्र</strong></td>
                                    <td> {{ $data->type_of_disease }} <br>{{ $data->diagnosis_date }} <br>{{ $data->hospital_name }}</td>
                                </tr>

                                <tr>
                                    <td><strong>८</strong></td>
                                    <td><strong>RTGS साठी बँकेचे पासबूकची अथवा रद्द <br>धनादेशाची (Cancelled Cheque)<br> छायांकित प्रत/ बँक खाते नंबर</strong></td>
                                    <td>{{ $data->account_no }}</td>
                                </tr>


                        </table>

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
                                <strong>  अर्जदाराची सही /- </strong>
                            </p>
                            {{-- <p class="mb-0">
                                <strong>(नावः- ---------------) </strong>
                            </p> --}}
                        </div>
                    </div>
                    <br>
                    <div class="row text-center">
                           <strong>योजनेच्या आवश्यक लाभासाठी सादर कराचे स्वयं घोषणापत्र</strong>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-12 col-sm-12">
                            <p class="mb-0">
                                मी <strong>{{ $data->full_name }}</strong> राहणार <strong>{{ $data->full_address }}</strong> <strong>महिला व बालकल्याण विभागातर्फे कॅन्सर या दुर्धर आजाराने ग्रस्त असलेल्या महिलांना व मुलांना /मुलींना अर्थसहाय्य</strong> मिळणेकामी अर्ज सादर करत आहे. सदर अर्जासमवेत सदर केलेली सर्व छायांकित कागदपत्रे मी स्वसाक्षांकित केलेली आहेत. अर्जासोबत जोडलेली सर्व कागदपत्रे व सादर केलेली माहिती ही खरी आहे. सदर अर्जावरील माहिती खोटी निघाल्यास भारतीय दंड संहितेच्या कलम १९९ व कलम २०० नुसार होणा-या शिक्षेस मी पात्र राहील. तसेच मला मिळालेले सर्व अर्थसहाय्य महानगरपालिकेत जमा करण्याची हमी याव्दारे देत आहे. तरी <strong>महिला व बालकल्याण विभागातर्फ कॅन्सर या दुर्धर  आजाराने ग्रस्त असलेल्या महिलाना व मुलांना /मुलींना अर्थसहाय्य</strong> या योजने अंतर्गत मला महानगरपालिकेमार्फत अर्थसहाय्य देण्यात यावे ही नम्र विनंती.
                            </p>
                        </div>
                    </div>
<br>

                    <div class="row pt-3">
                        <div class="col-md-8 col-sm-8">
                            <p class="mb-0">
                                <strong>दिनांक : </strong>  {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                            </p>

                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="icon-box">
                                <img class="img-fluid " src="{{ asset('storage/' . $data->candidate_signature) }}" alt="Awesome Image" style="height:100px; width:150px;">
                            </div>
                            <p class="mb-0">
                                <strong>  अर्जदाराची सही</strong>
                            </p>
                            {{-- <p class="mb-0">
                                <strong>(नावः) </strong>
                            </p> --}}
                        </div>
                    </div>


                        </div>
                    </div>
                    <div class="submit-section text-right pt-5" style="float:right;margin-bottom:50px;">
					    <a href="{{ route('cancer_scheme.application') }}" class="btn btn-danger btn-lg text-light" >Cancel</a>

					</div>
                </div>
            </div>
        </div>
    </div>
</section>

</x-admin.layout>

