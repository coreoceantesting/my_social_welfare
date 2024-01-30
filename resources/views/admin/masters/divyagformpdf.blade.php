<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body {
            font-family: 'freeserif', 'normal';
            margin: 0;

    font-size: var(--vz-body-font-size);
    font-weight: var(--vz-body-font-weight);
    line-height: var(--vz-body-line-height);
    color: var(--vz-body-color);
    text-align: var(--vz-body-text-align);
    background-color: var(--vz-body-bg);
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
        }

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: var(--vz-card-spacer-y) var(--vz-card-spacer-x);
    color: var(--vz-card-color);
}

@media (min-width: 768px){
.col-md-6 {
    flex: 0 0 auto;
    width: 50%;
}
}

.alert-primary {
    color: #084298;
    background-color: #cfe2ff;
    border-color: #b6d4fe;
}

</style>
<body>
    {{-- <div class="container"> --}}
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card" id="printableArea">

                    <div class="card-header pb-0" style="text-align: center;">
                        <h4 style="font-size: 24px;">Life certificate / हयातीचा दाखला </h4>
                    </div>
                    <div class="card-body pt-0" style="padding: 10px;">
                        <div class="mt-4">दाखला देण्यात येतो की , श्री ./ श्रीमती   <b>{{ $hayat->f_name }} {{ $hayat->m_name }} {{ $hayat->l_name }} </b>&nbsp;&nbsp;  राहणार &nbsp;&nbsp; <b>{{ $hayat->house_no }},  {{ $hayat->area }} , {{ $hayat->landmark }} , {{ $hayat->city }}- {{ $hayat->pincode }} , {{ $hayat->state }}  </b>  हे आज दिनांक <b>{{ now()->format('d/m/Y') }} </b> रोजी हयात असून त्यांनी माझ्या समोर सही केली आहे . </div><br><br>
                        <div class="mt-4">लाभार्थाचा संपर्क - दूरध्वनी /मोबाइल क्र .  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> १)  {{ $hayat->contact }} </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>२) {{ $hayat->alternate_contact_no }} </b></div>
                        <div class="mt-4">बँकेचे नाव -  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>{{ $hayat->bank_name }}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
                        <div class="mt-4">बँकेचे खाते क्रमांक  -  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>{{ $hayat->account_no }}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IFSC Code - <b>{{ $hayat->ifsc_code }}</b> </div>

                        <div class="row" style="margin-top: 105px;">
                         <div class ="col-md-12 col-sm-4">
                            <div>
                                <img src="{{ public_path('storage/' . $hayat->signature) }}" alt="image" class="img-fluid rounded" width="150" height="100" style="max-height:88px;">
                            </div>
                            लाभार्थ्यांचा सही  / अंगठा &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;नगरसेवक / पोस्ट मास्तर / राजपत्रित अधिकारी / बँक मॅनेजर या पायकी एक<br>
                            दाखला देणाऱ्यांची सही  / हुद्दा व सही
                            </div>

                        </div>

                        <div class="" style="margin-top: 80px;">
                        <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">सुचना </label>
                        <p class="form-control alert alert-primary" id="exampleFormControlTextarea1" placeholder="Notes" rows="2" required>

                                    १) खालील प्रमाणे आपल्या प्रभागातील नगरसेवक /सर्व पोस्ट मास्तर  / राजपत्रित अधिकारी किंवा  बँक मॅनेजर या पैकी कोणासमोरही पूर्ण करून या कार्यालयाकडे त्वरित पाठवावे .
                                <br>
                                    २) तहसीलदाराचे चालू उत्पनाचा दाखला जोडावे .

                        </p>
                    </div>


                   <div class="card-header pb-0" style="text-align: center;margin-top: 200px;">
                    <h4 style="font-size: 24px;">Affidavit  / प्रतिज्ञापत्र </h4>
                </div>
                <div class="card-body pt-0">
                    <div class="mt-4">१) मी प्रतिज्ञापत्रावर जाहीर करतो / करते  की ,<b>{{ $hayat->f_name }} {{ $hayat->m_name }} {{ $hayat->l_name }} </b> &nbsp;&nbsp;&nbsp;दिनांक  20/ 02/ 2023 अखेर संपणाऱ्या कालावधीत मी कोणतीही सरकारी / निमसरकारी व लष्करी नोकरी करून त्याबद्दल मोहबदला घेतला नाही . तसेच वरील अल्पावधीत केंद्र शासनाच्या वैदकीय सुविधांचा लाभ घेतलेला   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;आहे  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही </div>
                    <div class="mt-4">२) मी प्रतिज्ञेवर लिहीन देते/देतो  कि , मला दोन शासकीय लाभ &nbsp;&nbsp;&nbsp;मिळत नाही &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp; मिळत आहेत . त्यांचा तपशील जोडत आहे  </div>
                    <div class="mt-4">३) मी प्रतिज्ञेवर लिहीन देते/देतो कि, मला या पूर्वी दिव्यांग निधी लाभ प्राप्त झाली &nbsp;&nbsp;&nbsp;आहे &nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;नाही </div>

                    <div class="row" style="margin-top: 120px;">
                     <div class ="col-md-12 col-sm-4">
                        <div>
                            <img src="{{ public_path('storage/' . $hayat->signature) }}" alt="image" class="img-fluid rounded" width="150" height="100" style="max-height:88px;">
                        </div>
                        लाभार्थ्यांचा सही  / अंगठा &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   दाखला देणाऱ्यांची सही  / हुद्दा व सही <br>
                        मी प्रामाणिक करतो कि वरील <br>प्रतिज्ञापत्रे माझे समक्ष दिलेली आहेत .
                        </div>

                    </div>

                    <div class="" style="margin-top: 80px;">
                    <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">सुचना </label>
                    <p class="form-control alert alert-primary" id="exampleFormControlTextarea1" placeholder="Notes" rows="2" required>

                                १) खालील प्रमाणे आपल्या प्रभागातील नगरसेवक /सर्व पोस्ट मास्तर  / राजपत्रित अधिकारी किंवा  बँक मॅनेजर या पैकी कोणासमोरही पूर्ण करून या कार्यालयाकडे त्वरित पाठवावे .
                            <br>
                                २) तहसीलदाराचे चालू उत्पनाचा दाखला जोडावे .

                    </p>
                </div>


                    </div>


            </div>
        </div>
    {{-- </div> --}}
</div>
</body>

