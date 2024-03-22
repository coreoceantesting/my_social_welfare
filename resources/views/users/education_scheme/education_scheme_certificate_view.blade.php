<x-admin.layout>
    <x-slot name="title">Education Scheme Application</x-slot>
    <x-slot name="heading">Education Scheme Application</x-slot>

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
                                    <th style="width: 60%"><h1>
                                        <h1 style="text-align: center"><strong>पनवेल महानगरपालिका</strong></h1>
                                        <h5 style="text-align: center"><strong>ता. पनवेल जि. रायगड पिन नं. ४१० २०६</strong></h5>
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
                                    <h4><strong>ता. पनवेल जि. रायगड पिन नं. ४१० २०६</strong></h4>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>Email : </strong> panvelcorporation@gmail.com</p>
                                </div>
                                <div class="col-md-4 col-sm-4 text-left" style="padding-left:60px;">
                                    <p class="mb-1"><strong>दूरध्वनी क्र.</strong> ०२२२७४५८०४०/४१/४२</p>
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
                                    <strong>महिला व बाल कल्याण विभागा अंतर्गत वैद्यकिय शिक्षण (एम.बी.बी.एस., बी.ए.एम.एस., बी.एव.एम.एस. दिनांक / बी.डी.एस.) घेणा-या मुलींना प्रोत्साहनात्मक शिष्यवृत्ती देणेकामी.</strong>
                                </p>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-9 col-sm-9" >
                                <p class="mb-1"><strong>प्रति,</strong></p>
                                <p class="mb-1"><strong>मा. आयुक्त</strong></p>
                                <p class="mb-1"><strong>पनवेल महानगरपालिका</strong></p>
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
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी अर्जदार श्रीमती / कु {{ $data->full_name }} महिला बाल कल्याण विभागा अंतर्गत वैद्यकिय शिक्षण (एम.बी.बी.एस., बी.ए.एम.एस., बी.एच.एम.एस., बी.डी.एस.) घेणा-या मुलींना प्रोत्साहनात्मक शिष्यवृत्ती घेणेकामी माझी माहिती खालील प्रमाणे आहे.
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>१) संपूर्ण नाव : </strong>{{ $data->full_address }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>२) संपूर्ण पत्ता : </strong>{{ $data->full_address }}
                                </p>
                            </div>
                        </div>

                        <?php $dob = $data->dob;
                        $dob = new DateTime($dob);
                        $currentDate = new DateTime();
                        $age = $currentDate->diff($dob)->y; ?>

                        <div class="row pt-3">
                            <div class="col-md-3 col-sm-3">
                                <p class="mb-0">
                                    <strong>३) वय :</strong> {{ $age}}
                                </p>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <p class="mb-0">
                                    <strong>जन्म तारीख : </strong>{{ date('d-m-Y', strtotime($data->dob)) }}

                                </p>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <p class="mb-0">
                                    <strong>मोबाईल क्र.: </strong> {{ $data->contact }}
                                </p>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <p class="mb-0">
                                    <strong>ई मेल आयडी:</strong> {{ $data->email }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-8 col-sm-8">
                                <p class="mb-0">
                                    <strong>४) कूटुंब प्रमुखाचे नाव : </strong> {{ $data->family_name }}
                                </p>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <p class="mb-0">
                                    <strong> लाभार्थ्यांचे नाते : </strong> {{ $data->beneficiary_relationship }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>५) कुटुंबातील एकूण संख्या : </strong> {{ $data->total_family }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>६) महानगरपालिका क्षेत्रातील ३ वर्ष वास्तव्याचा पुरावा : </strong> @if($data->is_residence_proof == 'yes') होय @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>७)  तहसिलदाराकडील अल्प उत्पन्नाचा दाखला : </strong> @if($data->is_low_income_proof == 'yes') होय @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>८) वैद्यकिय महाविद्यालयात प्रवेश घेतल्याचे प्रमाणपत्र : </strong> @if($data->is_medical_admission_proof == 'yes') होय @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>९) पहिल्या शैक्षणिक वर्षाच्या निकालाची प्रत : </strong> @if($data->is_first_year_proof == 'yes') होय @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>१०) राष्ट्रियकृत बँकेच्या पासबूकची छायांकित प्रतः- </strong> @if($data->is_pass_book_doc == 'yes') होय @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>११) आधारकार्ड क्रमांक व छायांकित प्रत:- </strong> {{ $data->adhaar_no }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>१२) मा. नगरसेवक / नगरसेविका यांचे शिफारस पत्र : </strong> @if($data->is_recommendation_doc == 'yes') होय @else नाही @endif
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
                                    <strong>  अर्जदाराची सही </strong>
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
                                    <strong>अर्ज विहित नमुन्यात दयावा व सोबत सर्व स्वसाक्षांकित कागदपत्रे जोडावीत. दाखल केलेल्या अर्जाच्या अनुषंगाने लाभ देणे अथवा नाकारण्याचा अंतिम अधिकार आयुक्त यांना राहील. </strong>
                                </p>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="submit-section text-right pt-5" style="float:right;margin-bottom:50px;">
					    <a href="{{ route('education_scheme.application') }}" class="btn btn-danger btn-lg text-light" >Cancel</a>
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

