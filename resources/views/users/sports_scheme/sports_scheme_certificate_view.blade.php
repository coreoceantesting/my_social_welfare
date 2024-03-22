<x-admin.layout>
    <x-slot name="title">Sports Scheme Application</x-slot>
    <x-slot name="heading">Sports Scheme Application</x-slot>

    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
    </style>

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
                                    <strong>महिला व बाल कल्याण विभागा अंतर्गत राज्य व राष्ट्रीय क्रिडा क्षेत्रात विशेष प्राविण्य मिळवणा-या खेळासाठी ( वैयक्तिक व सांघिक ) मुलींना आर्थिक मदत करणे.</strong>
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
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी अर्जदार श्रीमती / कु <strong>{{ $data->full_name }}</strong> महिला बाल कल्याण विभागा अंतर्गत वैद्यकिय शिक्षण महिला व बाल कल्याण विभागा अंतर्गत राज्य व राष्ट्रीय क्रिडा क्षेत्रात विशेष प्राविण्य मिळवणा-या खेळासाठी.
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>१) संपूर्ण नाव : </strong>{{ $data->full_name }}
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
                                    <strong>३)जन्म तारीख : </strong>{{ date('d-m-Y', strtotime($data->dob)) }}

                                </p>
                            </div>

                                <div class="col-md-3 col-sm-3">
                                    <p class="mb-0">
                                        <strong> वय : </strong>{{ $age }}
                                    </p>
                                </div>


                            <div class="col-md-3 col-sm-3">
                                <p class="mb-0">
                                    <strong>मोबाईल क्र.: </strong>{{ $data->contact }}
                                </p>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <p class="mb-0">
                                    <strong>ई मेल आयडी: </strong>{{ $data->email }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>४) पमपा क्षेत्रातील शाळेचे / कॉलेजचे नांव : </strong>{{ $data->school_name }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>५) शाळा / महाविद्यालयाचे संमतीपत्रक : </strong> @if($data->school_certificate == 'yes') हो @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>६) आधारकार्ड प्रत : </strong>
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>७)  प्रत्येक पात्र लाभार्थी खेळाडूच्या नावाचे राष्ट्रियकृत बँकेतील बँक खात्याच्या पासबूकची छायांकित प्रत जोडणे बंधनकारक राहिल. </strong>
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>८) राज्य स्तर / राष्ट्रीय स्तर यामध्ये विशेष प्राविण्य मिळविल्याचे प्रमाणपत्राची छायांकित प्रत : </strong> @if($data->state_or_national_certificate == 'yes') हो @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>९)  नगरसेवकांचे शिफारस पत्र : </strong> @if($data->recommendation_letter == 'yes') हो @else नाही @endif
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                           <?php
                                $financial_help = '';

                                if($data->financial_help == 'personal'){
                                    $financial_help ='वैयक्तिक';
                                }else{
                                    $financial_help ='सांघिक';
                                }

                            ?>
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>१०) आर्थिक मदत : वैयक्तिक / सांधिक : </strong>{{ $financial_help }}
                                </p>
                            </div>
                        </div>


                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                                <p class="mb-0">
                                    <strong>सांघिक खेळाडूंची माहिती मागील पानावर भरणे.</strong>
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
                                    <strong>  अर्जदाराची /संघ प्रमुखाची सही</strong>
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
                                    <strong>अर्ज विहित नमुन्यात द्यावा व सोबत सर्व स्वसाक्षांकित कागदपत्रे जोडावीत. दाखल केलेल्या अर्जाच्या अनुषंगाने लाभ देणे अथवा नाकारण्याचा अंतिम अधिकार आयुक्त यांना राहील. </strong>
                                </p>
                            </div>
                        </div>

                        </div>

                        @if($data->financial_help == 'relational')
                            @if(!empty($player_details))
                                <p><strong>सांघिक:</strong></p>
                                <table style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>SR.No</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Aadhar No</th>
                                            <th>Photo</th>
                                            <th>Aadhar card</th>
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($player_details as $index => $detail)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{$detail->player_name}}</td>
                                                <td>{{$detail->player_mobile_no}}</td>
                                                <td>{{$detail->player_aadhar_no}}</td>
                                                <td><a href="{{ asset('storage/' . $detail->player_photo) }}" target="_blank"><img src="{{ asset('storage/' . $detail->player_photo) }}" height="100" width="100" alt="test"></a></td>
                                                <td><a href="{{ asset('storage/' . $detail->player_aadhar_photo) }}" target="_blank"><img src="{{ asset('storage/'. $detail->player_aadhar_photo) }}" height="100" width="100" alt="test"></a></td>
                                                <td><a href="{{ asset('storage/' . $detail->player_signature) }}" target="_blank"><img src="{{ asset('storage/'. $detail->player_signature) }}" height="100" width="100" alt="test"></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endif

                    </div>
                    <div class="submit-section text-right pt-5" style="float:right;margin-bottom:50px;">
					    <a href="{{ route('sports_scheme.application') }}" class="btn btn-danger btn-lg text-light" >Cancel</a>
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