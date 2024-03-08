<x-admin.layout>
    <x-slot name="title">Bus Concession Application</x-slot>
    <x-slot name="heading">Bus Concession Application</x-slot>

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
                                    <th style="width: 55%"><h1><strong>पनवेल महानगरपालिका</strong></h1></th>
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
                                </div>
                            </div>
                            <hr>
                            <table style="width:100%">
                                <tr>
                                <th><p ><strong>Email : </strong> panvelcorporation@gmail.com</p></th>
                                <th><p style="float: right"><strong>दूरध्वनी क्र. </strong>०२२२७४५८०४०/४१/४२ </p></th>
                                </tr>
                            </table>
                            <div class="row d-none">
                                <div class="col-md-8 col-sm-8">
                                    <p class="mb-1"><strong>Email : </strong> panvelcorporation@gmail.com</p>
                                </div>
                                <div class="col-md-4 col-sm-4 text-left">
                                    <p class="mb-1"><strong>दूरध्वनी क्र. </strong>०२२२७४५८०४०/४१/४२ </p>
                                </div>
                            </div>
                            <hr>
                            <table style="width:100%">
                                <tr>
                                    <th><p style="float: right"><strong>दिनांक : </strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p></th>
                                </tr>
                            </table>
                            <div class="row pt-0 d-none ">
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
                                    <strong>समाज विकास विभागाअंतर्गत पनवेल महानगरपालिका हदितील दिव्यांग व्यक्ती, जेष्ठ नागरिक व १८ वर्षाखालील विद्यार्थी यांना नवी मुंबई महानगरपालिका परिवहन उपक्रमाअंतर्गत बस भाडयात सवलत मिळणेकामी करावयाचा अर्जाचा नमुना </strong>
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
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मी अर्जदार श्री / श्रीमती {{ $data->f_name }} {{ $data->m_name }} {{ $data->l_name }} समाज विकास विभागाअंतर्गत पनवेल महानगरपालिका हदितील दिव्यांग व्यक्ती, जेष्ठ नागरिक व १८ वर्षाखालील विद्यार्थी यांना नवी मुंबई महानगरपालिका परिवहन उपक्रमाअंतर्गत बस भाडयात सवलत मिळणेकामी अर्ज करत आहे.
                                </p>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 col-sm-12">
                        <table class="table table-bordered nowrap align-middle" style="border:1px solid">

                                <tr>
                                    <td><strong>१</strong></td>
                                    <td><strong>संपूर्ण नावः</strong></td>
                                    <td>{{ $data->f_name }} {{ $data->m_name }} {{ $data->l_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>२</strong></td>
                                    <td><strong>संपुर्ण पत्ताः</strong></td>
                                    <td>{{ $data->full_address }}</td>
                                </tr>
                                <?php $dob = $data->dob;
                                    $dob = new DateTime($dob);
                                    $currentDate = new DateTime();
                                    $age = $currentDate->diff($dob)->y; ?>
                                <tr>
                                    <td><strong>३</strong></td>
                                    <td><strong>जन्म तारीख / वय</strong></td>
                                    <td>{{ date('d-m-Y', strtotime($data->dob)) }}    /  {{ $age}}</td>
                                </tr>
                                <tr>
                                    <td><strong>४</strong></td>
                                    <td><strong>मोबाईल क्र. :</strong></td>
                                    <td>{{ $data->contact }}</td>
                                </tr>
                                <tr>
                                    <td><strong>५</strong></td>
                                    <td><strong>महानगरपालिका क्षेत्रातील वास्तव्याचा पुरावा : <br>भाडे करारनामा, कर भरल्याची पावती/ बिल,<br> रेशनकार्ड, लाईट बिल, मतदान ओळखपत्र  <br>(यापैकी कोणताही १ पुरावा जोडणे)</strong></td>
                                    <td>{{ $data->is_residental_doc }}</td>
                                </tr>

                                <tr>
                                    <td><strong>६</strong></td>
                                    <td><strong>आधारकार्ड क्रमांक व आधारकार्डाची छायांकित प्रतः</strong></td>
                                    <td>{{ $data->adhaar_no }}</td>
                                </tr>

                                <tr>
                                    <td><strong>७</strong></td>
                                    <td><strong>इयत्ता (सद्या शिकत असलेला वर्ग व शाळा कॉलेजचे नाव )</strong></td>
                                    <td>{{ $data->class_name }}  व {{ $data->school_name }} </td>
                                </tr>

                                <tr>
                                    <td><strong>८</strong></td>
                                    <td><strong>शाळा/महाविद्यालयात प्रवेश घेतल्याचे प्रमाणपत्र (Bonafied)</strong></td>
                                    <td>{{ $data->is_bonafied_doc }}</td>
                                </tr>

                                <?php
                                $type_of_discount = '';
                                if($data->type_of_discount == 'daily_commute')
                                {
                                    $type_of_discount='दैनंदिन';
                                }else{
                                    $type_of_discount='मासिक पास';
                                }
                                ?>
                                <tr>
                                    <td><strong>९</strong></td>
                                    <td><strong>सवलतीचा प्रकार<br>

                                        १ दैनंदिन प्रवास<br>
                                        २ मासिक पास</strong></td>
                                    <td>{{ $type_of_discount }}</td>
                                </tr>

                                <tr>
                                    <td><strong>१०</strong></td>
                                    <td><strong>दिव्यांग प्रमाणपत्र</strong></td>
                                    <td></td>
                                </tr>

                        </table>
                        <strong> टिपः सदरची सवलतीसाठी देण्यात येणारे ओळखपत्र फक्त NMMT प्रवासासाठी वैध राहिल. </strong>
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
                            <p class="mb-0">
                                <strong>(नावः {{ $data->f_name }} {{ $data->m_name }} {{ $data->l_name }}) </strong>
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="row text-center">
                           <strong>योजनेच्या आवश्यक लाभासाठी सादर करावयाचे स्वयं घोषणापत्र</strong>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-12 col-sm-12">
                            <p class="mb-0">
                                मी -{{ $data->f_name }} {{ $data->m_name }} {{ $data->l_name }}-राहणार -{{$data->full_address}}- <strong>समाज विकास विभागाअंतर्गत पनवेल महानगरपालिका हदितील दिव्यांग व्यक्ती, जेष्ठ नागरिक व १८ वर्षाखालील विद्यार्थी यांना नवी मुंबई महानगरपालिका परिवहन उपक्रमाअंतर्गत बस भाडयात सवलत मिळणेकामी </strong> अर्ज सादर करत आहे. सदर अर्जासमवेत सदर केलेली सर्व छायांकित कागदपत्रे मी स्वसाक्षांकित केलेली आहेत. अर्जासोबत जोडलेली सर्व कागदपत्रे व सादर केलेली माहिती ही खरी आहे. सदर अर्जावरील माहिती खोटी निघाल्यास भारतीय दंड संहितेच्या कलम १९९ व कलम २०० नुसार होणा-या शिक्षेस मी पात्र राहील. तरी <strong>{{ $scheme->scheme_marathi_name }}</strong> या योजने अंतर्गत मला महानगरपालिकेमार्फत अर्थसहाय्य देण्यात यावे ही नम्र विनंती.
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
                                <strong>  अर्जदाराची सही / अगंठा </strong>
                            </p>
                            <p class="mb-0">
                                <strong>(नावः {{ $data->f_name }} {{ $data->m_name }} {{ $data->l_name }}) </strong>
                            </p>
                        </div>
                    </div>


                        </div>
                    </div>
                    <div class="submit-section text-right pt-5" style="float:right;margin-bottom:50px;">
					    <a href="{{ route('bus.concession.application') }}" class="btn btn-danger btn-lg text-light" >Cancel</a>
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

