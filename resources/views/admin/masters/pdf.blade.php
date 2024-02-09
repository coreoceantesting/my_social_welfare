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

.page-break {
    page-break-before: always;
}

</style>
<body>
    {{-- <div class="container"> --}}
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card" id="printableArea">

                    <div class="card-header pb-0" style="text-align: center;">
                        <u><h1><strong>हयातीचा दाखला</strong></h1></u>
                    </div>
                    <div class="card-body pt-0" style="padding: 10px;">
                        <br><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12" >
                                <p class="mb-4">दाखला देण्यात येतो की , श्री / श्रीमती ------------------</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12" >
                                <p class="mb-4">राहणार --------------------</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                हे आज दिनांक :
                                   {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <p class="mb-4"> रोजी हयात असुन त्यानी माझे समोर सही केली आहे</p>

                                 </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12" >
                                    <p class="mb-4">लाभार्थाचा संपर्क - दूरध्वनी /मोबाइल क्र.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12" >
                                    <p class="mb-4">बँकेचे नाव:</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6" >
                                    <p class="mb-4">बँकेचे खाते क्रमांक:</p>
                                </div>

                                <div class="col-md-6 col-sm-6" >
                                    <p class="mb-4"><strong>IFSC CODE:</strong></p>
                                </div>
                            </div>
                            <br><br><br><br> <br><br><br><br>

                            <div class="row">
                                <div class="col-md-4 col-sm-4" >
                                    <img src="" alt="image" class="img-fluid rounded" width="150" height="100" style="max-height:88px;">
                                    <p class="mb-4">लाभार्थ्यांचा सही  / अंगठा</p>
                                </div>

                                <div class="col-md-8 col-sm-8" >
                                    <p class="mb-4">नगरसेवक/ पोस्ट मास्तर/ राजपत्रित अधिकारी/ बँक मॅनेजर या पैकी एक <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       दाखला देणाऱ्याची सही / हुद्दा व शिक्का </p>
                                </div>
                            </div>

                            <br><br>
                        <div class="row pt-3">
                            <div class="col-sm-12">
                                <p class="mb-0">
                                    <strong>सुचना:- १) खालील प्रमाणे आपल्या प्रभागातील नगरसेवक/सर्व पोस्ट मास्तर/ राजपत्रित अधिकारी किंवा बँक मॅनेजर यापैकी कोणासमोरही पुर्ण करुन या कार्यालयाकडे त्वरीत पाठवावे.</strong>
                                </p>

                                <p class="mb-0">
                                    <strong>२) तहसिलदाराचे चालु उत्पन्नाचा दाखला जोडणे. </strong>
                                </p>
                            </div>
                        </div>


                        <div class="page-break"></div>

                   <div class="card-header pb-0" style="text-align: center;">
                    <u><h1><strong>प्रतिज्ञापत्र</strong></h1></u>
                </div>
                <div class="card-body pt-0">
                    <br><br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" >
                            <p class="mb-4"><strong>१. मी प्रतिज्ञापत्रावर जाहीर करतो/करते की, ------------------
                                दि. {{ \Carbon\Carbon::now()->format('d/m/Y') }} अखेर सपंणाऱ्या कालावधीत मी कोणतीही सरकारी/निमसरकारी व लष्करी नोकरी करुन
                                त्याबद्दल मोहबदला घेतला नाही. तसेच वरील अल्पावधीत केंद्र शासनाच्या वैद्यकीय सुविधांचा लाभ घेतलेला आहे/ नाही.</strong>
                            </p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-sm-12" >
                            <p class="mb-4"><strong>२. मी प्रतिज्ञेवर लिहुन देतो/देते की, मला दोन शासकीय लाभ मिळत नाही/मिळत आहेत. त्यांचा तपशिल जोड आहे. </strong>
                            </p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-sm-12" >
                            <p class="mb-4"><strong>३. मी प्रतिज्ञेवर लिहुन देतो/देते की, मला यापूर्वी दिव्यांग निधी लाभ प्राप्त झाले आहे / नाही. </strong>
                            </p>
                        </div>
                    </div>


                   <br><br><br><br>
                    <div class="row">
                        <div class="col-md-2 col-sm-2" >
                        </div>

                        <div class="col-md-10 col-sm-10" >
                            <img src="" alt="image" class="img-fluid rounded" width="150" height="100" style="max-height:88px;">
                            <p class="mb-4"><strong>लाभार्थ्यांची सही/ अंगठा</strong></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12" >
                            <p class="mb-4"><strong>मी प्रमाणित करतो की वरील प्रतिज्ञापत्रे माझे समक्ष दिलेली आहेत.</strong></p>
                        </div>
                    </div>



                    <br><br><br><br>
                    <div class="row">
                        <div class="col-md-2 col-sm-2" >
                        </div>

                        <div class="col-md-10 col-sm-10" >
                            <div>
                                <img src="" alt="image" class="img-fluid rounded" width="150" height="100" style="max-height:88px;">
                            </div>
                            <p class="mb-4"><strong>दाखला देणाऱ्याची सही/ हुद्दा व शिक्का</strong></p>
                        </div>
                    </div>


                    <br><br><br><br>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" >
                            <p class="mb-0"><strong>सुचना:- १) खालील प्रमाणे आपल्या प्रभागातील नगरसेवक/सर्व पोस्ट मास्तर/ राजपत्रित अधिकारी किंवा बँक यापैकी कोणासमोरही पुर्ण करुन या कार्यालयाकडे त्वरीत पाठवावे.</strong></p>
                            <p class="mb-0"><strong>२) तहसिलदाराचे चालु उत्पन्नाचा दाखला जोडणे.</strong></p>
                        </div>
                    </div>


                    </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
</body>

