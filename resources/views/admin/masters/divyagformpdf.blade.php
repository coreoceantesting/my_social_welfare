<x-admin.layout>
    <x-slot name="title">Life certificate / हयातीचा दाखला</x-slot>
    <x-slot name="heading">Life certificate / हयातीचा दाखला</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}
<style>
    @media print {
            body * {
                visibility: hidden;
                padding: 0;
            }
            header, footer {
                display: none;
            }
            @page {
                size: auto;
                margin: 25px;
            }
            #printableArea, #printableArea * {
                visibility: visible;
            }
            #printableArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                /* text-align: center; Adjust text alignment */
            }
            #printableArea h1 {
                color: blue; /* Adjust text color */
            }

            #printableArea table {
                border-collapse: collapse;
                width: 100%;
                margin: 20px 0;
            }
            #printableArea th, #printableArea td {
                border: 1px solid black;
                padding: 8px;
                text-align: left; /* Adjust cell text alignment */
            }
            #printableArea h1.top_name {
            font-size: 25px;
            font-weight: 600;
            text-align: center;
            }
            .top_namesecsection {
                text-align: center;

            }
            .top_namesecsection {
                text-align: center;

            }
            .col-xl-12 {
                width: 100%;
            }

            .col-lg-6 {
                width: 50%;
            }



            h6 {
                text-align: left;
            }
            button.btn.btn-primary.printButton {
    display: none;
}
button.btn.btn-warning.printButton {
    display: none;
}


        }

</style>

    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card" id="printableArea">

                    <div class="card-header pb-0" style="text-align: center;">
                        <h4>Life certificate / हयातीचा दाखला </h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mt-4">दाखला देण्यात येतो की , श्री ./ श्रीमती   <b>{{ $hayat->f_name }} {{ $hayat->m_name }} {{ $hayat->l_name }} </b>&nbsp;&nbsp;  राहणार &nbsp;&nbsp; <b>{{ $hayat->house_no }},  {{ $hayat->area }} , {{ $hayat->landmark }} , {{ $hayat->city }}- {{ $hayat->pincode }} , {{ $hayat->state }}  </b>  हे आज दिनांक <b>{{ now()->format('d/m/Y') }} </b> रोजी हयात असून त्यांनी माझ्या समोर सही केली आहे . </div>
                        <div class="mt-4">लाभार्थाचा संपर्क - दूरध्वनी /मोबाइल क्र .  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> १)  {{ $hayat->contact }} </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>२) {{ $hayat->alternate_contact_no }} </b></div>
                        <div class="mt-4">बँकेचे नाव -  &nbsp;&nbsp;  <b>{{ $hayat->bank_name }}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
                        <div class="mt-4">बँकेचे खाते क्रमांक  -  &nbsp;&nbsp;  <b>{{ $hayat->account_no }}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IFSC Code - <b>{{ $hayat->ifsc_code }}</b> </div>

                        <div class="row" style="margin-top: 120px;">
                         <div class ="col-lg-6">
                            <div>
                                <img src="{{ asset('storage/' . $hayat->signature) }}" alt="image" class="img-fluid rounded" width="150" height="100" style="max-height:88px;">
                            </div>
                            लाभार्थ्यांचा सही  / अंगठा
                            </div>
                            <div class ="col-lg-6">
                                <div style="height: 64px;">

                                </div>
                           नगरसेवक / पोस्ट मास्तर / राजपत्रित अधिकारी / बँक मॅनेजर या पायकी एक<br>
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
                   <hr>

                   <div class="card-header pb-0" style="text-align: center;">
                    <h4>Affidavit  / प्रतिज्ञापत्र </h4>
                </div>
                <div class="card-body pt-0">
                    <div class="mt-4">१) मी प्रतिज्ञापत्रावर जाहीर करतो / करते  की ,<b>{{ $hayat->f_name }} {{ $hayat->m_name }} {{ $hayat->l_name }} </b> &nbsp;&nbsp;&nbsp;दिनांक  20/ 02/ 2023 अखेर संपणाऱ्या कालावधीत मी कोणतीही सरकारी / निमसरकारी व लष्करी नोकरी करून त्याबद्दल मोहबदला घेतला नाही . तसेच वरील अल्पावधीत केंद्र शासनाच्या वैदकीय सुविधांचा लाभ घेतलेला   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;आहे  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; नाही </div>
                    <div class="mt-4">२) मी प्रतिज्ञेवर लिहीन देते/देतो  कि , मला दोन शासकीय लाभ &nbsp;&nbsp;&nbsp;मिळत नाही &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp; मिळत आहेत . त्यांचा तपशील जोडत आहे  </div>
                    <div class="mt-4">३) मी प्रतिज्ञेवर लिहीन देते/देतो कि, मला या पूर्वी दिव्यांग निधी लाभ प्राप्त झाली &nbsp;&nbsp;&nbsp;आहे &nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;नाही </div>


                    <div class="row" style="margin-top: 120px;">
                     <div class ="col-lg-6">
                        <div>
                            <img src="{{ asset('storage/' . $hayat->signature) }}" alt="image" class="img-fluid rounded" width="150" height="100" style="max-height:88px;">
                        </div>
                        लाभार्थ्यांचा सही  / अंगठा <br>
                        मी प्रामाणिक करतो कि वरील प्रतिज्ञापत्रे माझे समक्ष दिलेली आहेत .
                        </div>
                        <div class ="col-lg-6" style="text-align: center;">
                            <div style="height: 64px;">

                            </div>

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


                    </div>
                    <hr>
                    <div class="card-footer">
                        <button type="submit"  class="btn btn-primary printButton"  onclick="window.print();"><i class="ri-printer-line align-bottom me-1"></i>Print</button>
                        <button type="reset"  class="btn btn-warning  printButton">Reset</button>
                    </div>

            </div>
        </div>
    </div>


</x-admin.layout>
