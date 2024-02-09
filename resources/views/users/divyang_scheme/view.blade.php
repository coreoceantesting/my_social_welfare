<x-admin.layout>
    <x-slot name="title">Divyang Scheme Application</x-slot>
    <x-slot name="heading">Divyang Scheme Application</x-slot>

        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Divyang Scheme Application </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name"> Name of disabled person/ दिव्यांग व्यक्‍तीचे नाव</label>
                                    <input class="form-control"  type="text"  name="full_name"  value="{{ $data->full_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"  type="text"  name="full_address" value="{{ $data->full_address }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="gender">Gender/ लिंग </label>
                                    <input class="form-control"  type="text"  name="gender" value="{{ $data->gender }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age"> Age/ वय </label>
                                    <input class="form-control"  type="text"  name="age" value="{{ $data->age }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.</label>
                                    <input class="form-control"  type="text" name="contact"  value="{{ $data->contact }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="alternate_contact_no"> Alternate Mobile No/ मोबाईल नं.</label>
                                    <input class="form-control"  name="alternate_contact_no"  type="text" value="{{ $data->alternate_contact_no }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">Aadhaar Card Number of Persons with Disabilities:/ दिव्यांग व्यक्तीचा आधारकार्ड नंबर : <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" name="adhaar_no" value="{{ $data->adhaar_no }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_name"> Name of father/husband/वडिलांचे/पतीचे नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control"  name="father_name" type="text" value="{{ $data->father_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_address"> Address of father/husband/वडिलांचे/पतीचे पत्ता <span class="text-danger">*</span></label>
                                    <input class="form-control"  name="father_address" type="text" value="{{ $data->father_address }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="type_of_disability"> Type of disability/ दिव्यांगत्वाचा प्रकार<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="type_of_disability" type="text" value="{{ $data->type_of_disability }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="percentage"> Percentage/ टक्केवारी <span class="text-danger">*</span></label>
                                    <input class="form-control"  name="percentage" type="text" value="{{ $data->percentage }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="authority_name"> Name/designation and details of the competent authority issuing the certificate /  प्रमाणपत्र देणाऱ्या सक्षम अधिकाऱ्याचे नाव / हुद्दा व तपशील</label>
                                    <input class="form-control"  name="authority_name" type="text" value="{{ $data->authority_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name"> Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text"  value="{{ $data->bank_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="branch_name">Branch / शाखा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text" value="{{ $data->branch_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name"> Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text"  value="{{ $data->account_no }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  value="{{ $data->ifsc_code }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="profession">Education/job / शिक्षण/नोकरी</label>
                                    <input class="form-control" id="profession" name="profession" type="text" value="{{ $data->profession }}" readonly>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="number_of_family">Number of family member / कुटुंबातील सदस्याची संख्या :-</label>
                                    <input class="form-control" id="number_of_family" name="number_of_family" type="text" value="{{ $data->number_of_family }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="agriculture"> Agriculture / शेती</label>
                                    <input class="form-control" id="agriculture" name="agriculture" type="text" value="{{ $data->agriculture }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="personal_benefit">Have you benefited from personal benefit schemes before? Yes / No / यापुर्वी वैयक्तीत लाभाच्या योजनेया लाभ मिळालेला आहे का ? होय / नाही </label>
                                    <input class="form-control" id="personal_benefit" name="personal_benefit" type="text" value="{{ $data->personal_benefit }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="received_year"> When received (year) / कधी मिळालेला होता (वर्ष)</label>
                                    <input class="form-control" id="received_year" name="received_year" type="text" value="{{ $data->received_year }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="welfare"> Are the welfare and other schemes of Central/State Government beneficial?/ केंद्र / राज्य सरकारच्या निराधार व इतर योजनांचा लाभदायक आहे काय?.</label>
                                    <input class="form-control" id="welfare_schemes" name="welfare_schemes" type="text" value="{{ $data->welfare_schemes }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="govt_scheme"> Whether Gharkul was provided under government scheme or not? / शासन योजने अंतर्गत घरकूल मिळाले किंवा नाही </label>
                                    <input class="form-control" id="govt_scheme" name="govt_scheme" type="text" value="{{ $data->govt_scheme }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="poverty_number">Poverty Line Number/ दारिद्र रेषेचा क्रमांक </label>
                                    <input class="form-control" id="poverty_number" name="poverty_number" type="text" value="{{ $data->poverty_number }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="caste">Caste Category / जातीचा प्रवर्ग</label>
                                    <input class="form-control" id="caste" name="caste" type="text"  value="{{ $data->caste }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_no">Ward No / प्रभाग क्र.</label>
                                    <input class="form-control" id="ward_no" name="ward_no" type="text" value="{{ $data->ward_no }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_id">Ward Name/प्रभाग नाव</label>
                                    <input class="form-control" id="ward_id" name="ward_id" type="text" value="{{ $data->name }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature / thumb /अर्जदाराची सही / अगंठा</label><br>
                                    <img src="{{ asset('storage/' . $data->candidate_signature) }}" alt="Photo" style="max-width: 100px; height: auto;">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passport_size_photo">Passport Size Photo</label><br>
                                    <img src="{{ asset('storage/' . $data->passport_size_photo) }}" alt="Photo" style="max-width: 100px; height: auto;">
                                </div>



                                @foreach ($document as $doc)
                                <div class="col-md-4 mt-3">
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}}</label><br>
                                        <a href="{{ asset('divyang_nodani_file/'.$doc->document_file) }}" class="btn btn-sm btn-primary"  target="_blank" >View Document</a>
                                </div>
                            @endforeach

                            </div>
                        </div>



                        <div class="card-footer">

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('scheme_form.index') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>








</x-admin.layout>






