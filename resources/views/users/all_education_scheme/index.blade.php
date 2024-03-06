<x-admin.layout>
    <x-slot name="title">Education Schemes (शिक्षण योजना)</x-slot>
    <x-slot name="heading">Education Schemes (शिक्षण योजना)</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4">
                                    <label class="col-form-label" for="full_name">Name Of Applicant / Child ( अर्जदार / पाल्याचे संपूर्ण नाव ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Enter Full Name">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="gender">Gender ( लिंग ): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="text-danger is-invalid gender_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="dob">DOB Of Applicant / Child( अर्जदार / पाल्याची जन्मतारीख ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="dob" name="dob" type="date">
                                    <span class="text-danger is-invalid dob_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="marital_status">Marital Status ( वैवाहिक स्थिती ): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="marital_status" id="marital_status">
                                        <option value="">Select Marital Status</option>
                                        <option value="married">Married(विवाहित)</option>
                                        <option value="unmarried">Unmarried(अविवाहित)</option>
                                        <option value="widower">Widower(विधुर)</option>
                                        <option value="widow">Widow(विधवा)</option>
                                    </select>
                                    <span class="text-danger is-invalid marital_status_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="cast_category">Caste Category ( जातीचा प्रवर्ग ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="cast_category" name="cast_category" type="text" placeholder="Enter Cast Name">
                                    <span class="text-danger is-invalid cast_category_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile No ( मोबाईल क्रमांक ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile No">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Card No ( आधार क्रमांक ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar No">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="father_or_husband_full_name">Name Of Father / Husband (वडिलांचे / पतीचे संपूर्ण नाव) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="father_or_husband_full_name" name="father_or_husband_full_name" type="text" placeholder="Enter Name Of Father / Husband">
                                    <span class="text-danger is-invalid father_or_husband_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mother_full_name">Mother's Name (आईचे नाव) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="mother_full_name" name="mother_full_name" type="text" placeholder="Enter Name Of Mother">
                                    <span class="text-danger is-invalid mother_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Full Address(संपूर्ण पत्ता) : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="occupation">Occupation (व्यवसाय): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="occupation" id="occupation">
                                        <option value="">Select Occupation</option>
                                        <option value="business">Business(व्यवसाय)</option>
                                        <option value="job">Job(नोकरी)</option>
                                        <option value="unemployed">Unemployed(बेरोजगार)</option>
                                        <option value="student">Student(विद्यार्थी)</option>
                                    </select>
                                    <span class="text-danger is-invalid occupation_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="annual_income">Annual Income Of The Family (कुटुंबाचे वार्षिक उत्पन्न) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="annual_income" name="annual_income" type="text" placeholder="Enter Annual Income Of The Family">
                                    <span class="text-danger is-invalid annual_income_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward">Ward Name ( प्रभाग ): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="ward" id="ward">
                                        <option value="">Select Ward</option>
                                       @foreach($wards as $ward)
                                        <option value="{{$ward->name}}">{{$ward->name}}</option>
                                       @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="years_lived_in_ward">How Many Years Have You Lived In This Ward? (या प्रभागात किती वर्षांपासून राहत आहात ?): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="years_lived_in_ward" name="years_lived_in_ward" type="text" placeholder="Enter How Many Years Have You Lived In This Ward">
                                    <span class="text-danger is-invalid years_lived_in_ward_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="educational_qulification">Educational Qualification Of The Applicant( अर्जदाराची शैक्षणिक पात्रता ): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="educational_qulification" name="educational_qulification" type="text" placeholder="Enter Educational Qualification">
                                    <span class="text-danger is-invalid educational_qulification_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="scholarship_name">Scholarship Name( शिष्यवृत्ती नाव ): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="scholarship_name" name="scholarship_name" type="text" placeholder="Enter Scholarship Name">
                                    <span class="text-danger is-invalid scholarship_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="marks_obtained">Marks Obtained In The Scholarship Examination(  शिष्यवृत्ती परीक्षेत मिळालेले गुण ): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="marks_obtained" name="marks_obtained" type="text" placeholder="Enter Marks Obtained In The Scholarship Examination">
                                    <span class="text-danger is-invalid marks_obtained_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="scholarship_year">Scholarship Year(शिष्यवृत्ती वर्ष ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="scholarship_year" name="scholarship_year" type="text" placeholder="Enter Scholarship Year">
                                    <span class="text-danger is-invalid scholarship_year_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="type_of_disability">Type Of Disability(दिव्यांगत्वाचे प्रकार ) (If Required) :</label>
                                    <input class="form-control" id="type_of_disability" name="type_of_disability" type="text" placeholder="Enter Type Of Disability">
                                    <span class="text-danger is-invalid type_of_disability_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="disability_certificate_no">Disability Certificate No(दिव्यांगत्व प्रमाणपत्राचा क्र. ) (If Required) :</label>
                                    <input class="form-control" id="disability_certificate_no" name="disability_certificate_no" type="text" placeholder="Enter Disability Certificate No">
                                    <span class="text-danger is-invalid disability_certificate_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="hospital_name">Name And Address Of The Hospital From Which The Disability Certificate Was Obtained (दिव्यांगाचे प्रमाणपत्र कोणत्या रुग्णालयातून प्राप्त करून घेतले त्याचे नाव व पत्ता) (If Required) :</label>
                                    <textarea class="form-control" name="hospital_name" id="hospital_name" cols="30" rows="2"></textarea>
                                    <span class="text-danger is-invalid hospital_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="degree_of_disability">Degree Of Disability(दिव्यांगाचे प्रमाण) (If Required) :</label>
                                    <input class="form-control" id="degree_of_disability" name="degree_of_disability" type="text" placeholder="Enter Degree Of Disability">
                                    <span class="text-danger is-invalid degree_of_disability_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank_name">Name Of The Bank (बँकेचे नाव) :</label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text" placeholder="Enter Bank Name">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="branch_name">Branch (शाखा ):</label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text" placeholder="Enter Branch Name">
                                    <span class="text-danger is-invalid branch_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="account_holder_name">Name Of The Account Holder (खातेदाराचे नाव):</label>
                                    <input class="form-control" id="account_holder_name" name="account_holder_name" type="text" placeholder="Enter Name Of The Account Holder">
                                    <span class="text-danger is-invalid account_holder_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="account_no">Account Number(खाते क्रमांक):</label>
                                    <input class="form-control" id="account_no" name="account_no" type="text" placeholder="Enter Account Number">
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ifsc_code">IFSC Code(आय.एफ.एस.सी कोड) :</label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" placeholder="Enter IFSC Code">
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature (अर्जदाराची सही) / thumb (अगंठा)  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid candidate_signature_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="passport_size_photo">Passport Size Photo (अर्जदाराची फोटो) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid passport_size_photo_err"></span>
                                </div>

                                @foreach ($document as $doc)
                                    <div class="col-md-4">
                                            <label class="col-form-label" for="document_name">{{$doc->document_name}} @if($doc->is_required==1) <span class="text-danger">*</span> @endif</label>
                                            <input type="hidden" name="document_id[]" class="form-control" value="{{$doc->id}}">
                                            <input type="file" name="document_file[]" class="form-control" multiple @if($doc->is_required==1) required @endif>
                                            <span class="text-danger is-invalid document_file_err"></span>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        {{-- Edit Form --}}
        <div class="row" id="editContainer" style="display:none;">
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm" action="{{ route('update_details') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Details</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">

                                <div class="col-md-4">
                                    <label class="col-form-label" for="full_name">Name Of Applicant / Child ( अर्जदार / पाल्याचे संपूर्ण नाव ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Enter Full Name">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="gender">Gender ( लिंग ): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="text-danger is-invalid gender_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="dob">DOB Of Applicant / Child( अर्जदार / पाल्याची जन्मतारीख ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="dob" name="dob" type="date">
                                    <span class="text-danger is-invalid dob_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="marital_status">Marital Status ( वैवाहिक स्थिती ): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="marital_status" id="marital_status">
                                        <option value="">Select Marital Status</option>
                                        <option value="married">Married(विवाहित)</option>
                                        <option value="unmarried">Unmarried(अविवाहित)</option>
                                        <option value="widower">Widower(विधुर)</option>
                                        <option value="widow">Widow(विधवा)</option>
                                    </select>
                                    <span class="text-danger is-invalid marital_status_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="cast_category">Caste Category ( जातीचा प्रवर्ग ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="cast_category" name="cast_category" type="text" placeholder="Enter Cast Name">
                                    <span class="text-danger is-invalid cast_category_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mobile_no">Mobile No ( मोबाईल क्रमांक ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="mobile_no" name="mobile_no" type="number" placeholder="Enter Mobile No">
                                    <span class="text-danger is-invalid mobile_no_err"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="col-form-label" for="aadhar_no">Aadhar Card No ( आधार क्रमांक ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="aadhar_no" name="aadhar_no" type="number" placeholder="Enter Aadhar No">
                                    <span class="text-danger is-invalid aadhar_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="father_or_husband_full_name">Name Of Father / Husband (वडिलांचे / पतीचे संपूर्ण नाव) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="father_or_husband_full_name" name="father_or_husband_full_name" type="text" placeholder="Enter Name Of Father / Husband">
                                    <span class="text-danger is-invalid father_or_husband_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="mother_full_name">Mother's Name (आईचे नाव) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="mother_full_name" name="mother_full_name" type="text" placeholder="Enter Name Of Mother">
                                    <span class="text-danger is-invalid mother_full_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Full Address(संपूर्ण पत्ता) : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="2"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="occupation">Occupation (व्यवसाय): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="occupation" id="occupation">
                                        <option value="">Select Occupation</option>
                                        <option value="business">Business(व्यवसाय)</option>
                                        <option value="job">Job(नोकरी)</option>
                                        <option value="unemployed">Unemployed(बेरोजगार)</option>
                                        <option value="student">Student(विद्यार्थी)</option>
                                    </select>
                                    <span class="text-danger is-invalid occupation_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="annual_income">Annual Income Of The Family (कुटुंबाचे वार्षिक उत्पन्न) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="annual_income" name="annual_income" type="text" placeholder="Enter Annual Income Of The Family">
                                    <span class="text-danger is-invalid annual_income_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ward">Ward Name ( प्रभाग ): <span class="text-danger">*</span></label>
                                    <select class="form-control" name="ward" id="ward">
                                        <option value="">Select Ward</option>
                                       @foreach($wards as $ward)
                                        <option value="{{$ward->name}}">{{$ward->name}}</option>
                                       @endforeach
                                    </select>
                                    <span class="text-danger is-invalid ward_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="years_lived_in_ward">How Many Years Have You Lived In This Ward? (या प्रभागात किती वर्षांपासून राहत आहात ?): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="years_lived_in_ward" name="years_lived_in_ward" type="text" placeholder="Enter How Many Years Have You Lived In This Ward">
                                    <span class="text-danger is-invalid years_lived_in_ward_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="educational_qulification">Educational Qualification Of The Applicant( अर्जदाराची शैक्षणिक पात्रता ): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="educational_qulification" name="educational_qulification" type="text" placeholder="Enter Educational Qualification">
                                    <span class="text-danger is-invalid educational_qulification_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="scholarship_name">Scholarship Name( शिष्यवृत्ती नाव ): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="scholarship_name" name="scholarship_name" type="text" placeholder="Enter Scholarship Name">
                                    <span class="text-danger is-invalid scholarship_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="marks_obtained">Marks Obtained In The Scholarship Examination(  शिष्यवृत्ती परीक्षेत मिळालेले गुण ): <span class="text-danger">*</span></label>
                                    <input class="form-control" id="marks_obtained" name="marks_obtained" type="text" placeholder="Enter Marks Obtained In The Scholarship Examination">
                                    <span class="text-danger is-invalid marks_obtained_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="scholarship_year">Scholarship Year(शिष्यवृत्ती वर्ष ) : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="scholarship_year" name="scholarship_year" type="text" placeholder="Enter Scholarship Year">
                                    <span class="text-danger is-invalid scholarship_year_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="type_of_disability">Type Of Disability(दिव्यांगत्वाचे प्रकार ) (If Required) :</label>
                                    <input class="form-control" id="type_of_disability" name="type_of_disability" type="text" placeholder="Enter Type Of Disability">
                                    <span class="text-danger is-invalid type_of_disability_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="disability_certificate_no">Disability Certificate No(दिव्यांगत्व प्रमाणपत्राचा क्र. ) (If Required) :</label>
                                    <input class="form-control" id="disability_certificate_no" name="disability_certificate_no" type="text" placeholder="Enter Disability Certificate No">
                                    <span class="text-danger is-invalid disability_certificate_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="hospital_name">Name And Address Of The Hospital From Which The Disability Certificate Was Obtained (दिव्यांगाचे प्रमाणपत्र कोणत्या रुग्णालयातून प्राप्त करून घेतले त्याचे नाव व पत्ता) (If Required) :</label>
                                    <textarea class="form-control" name="hospital_name" id="hospital_name" cols="30" rows="2"></textarea>
                                    <span class="text-danger is-invalid hospital_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="degree_of_disability">Degree Of Disability(दिव्यांगाचे प्रमाण) (If Required) :</label>
                                    <input class="form-control" id="degree_of_disability" name="degree_of_disability" type="text" placeholder="Enter Degree Of Disability">
                                    <span class="text-danger is-invalid degree_of_disability_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank_name">Name Of The Bank (बँकेचे नाव) :</label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text" placeholder="Enter Bank Name">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="branch_name">Branch (शाखा ):</label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text" placeholder="Enter Branch Name">
                                    <span class="text-danger is-invalid branch_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="account_holder_name">Name Of The Account Holder (खातेदाराचे नाव):</label>
                                    <input class="form-control" id="account_holder_name" name="account_holder_name" type="text" placeholder="Enter Name Of The Account Holder">
                                    <span class="text-danger is-invalid account_holder_name_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="account_no">Account Number(खाते क्रमांक):</label>
                                    <input class="form-control" id="account_no" name="account_no" type="text" placeholder="Enter Account Number">
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ifsc_code">IFSC Code(आय.एफ.एस.सी कोड) :</label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" placeholder="Enter IFSC Code">
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature (अर्जदाराची सही) / thumb (अगंठा)  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg">
                                    <a href="" id="view_signature" target="blank">View Document</a>
                                    <span class="text-danger is-invalid candidate_signature_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="passport_size_photo">Passport Size Photo (अर्जदाराची फोटो) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg">
                                    <a href="" id="view_photo" target="blank">View Document</a>
                                    <span class="text-danger is-invalid passport_size_photo_err"></span>
                                </div>

                                <div class="row" id="dynamicDocuments">

                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        {{-- Scheme Listing --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Fill Education Form <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Application No</th>
                                        <th>Full Name</th>
                                        <th>Mobile No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scheme_detail as $index => $scheme)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$scheme->application_no}}</td>
                                            <td>{{$scheme->full_name}}</td>
                                            <td>{{$scheme->mobile_no}}</td>
                                            <td>
                                                <button class="edit-element btn btn-primary text-white px-2 py-1" title="Edit category" data-id="{{ $scheme->all_education_scheme_detail_id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-danger text-white rem-element px-2 py-1" title="Delete category" data-id="{{ $scheme->all_education_scheme_detail_id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('all_education_scheme.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2) {
                        if (data.errors) {
                            // Display validation errors
                            $.each(data.errors, function(field, messages) {
                                $('.' + field + '_err').text(messages); // Display all messages if there are multiple
                                $("[name='"+field+"']").addClass('is-invalid');
                            });
                        } else if (data.success) {
                            swal("Successful!", data.success, "success")
                                .then((action) => {
                                    window.location.href = '{{ route('all_education_scheme.index') }}';
                                });
                        }
                    } else {
                        swal("Error!", data.error2, "error");
                    }
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('all_education_scheme.edit', ":model_id") }}";
        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();

                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.formDetail.all_education_scheme_detail_id);
                    $("#editForm input[name='full_name']").val(data.formDetail.full_name);
                    $("#editForm select[name='gender']").val(data.formDetail.gender);
                    $("#editForm input[name='dob']").val(data.formDetail.dob);
                    $("#editForm select[name='marital_status']").val(data.formDetail.marital_status);
                    $("#editForm input[name='cast_category']").val(data.formDetail.cast_category);
                    $("#editForm input[name='mobile_no']").val(data.formDetail.mobile_no);
                    $("#editForm input[name='aadhar_no']").val(data.formDetail.aadhar_no);
                    $("#editForm input[name='father_or_husband_full_name']").val(data.formDetail.father_or_husband_full_name);
                    $("#editForm input[name='mother_full_name']").val(data.formDetail.mother_full_name);
                    $("#editForm textarea[name='address']").val(data.formDetail.address);
                    $("#editForm select[name='occupation']").val(data.formDetail.occupation);
                    $("#editForm input[name='annual_income']").val(data.formDetail.annual_income);
                    $("#editForm select[name='ward']").val(data.formDetail.ward);
                    $("#editForm input[name='years_lived_in_ward']").val(data.formDetail.years_lived_in_ward);
                    $("#editForm input[name='educational_qulification']").val(data.formDetail.educational_qulification);
                    $("#editForm input[name='scholarship_name']").val(data.formDetail.scholarship_name);
                    $("#editForm input[name='marks_obtained']").val(data.formDetail.marks_obtained);
                    $("#editForm input[name='scholarship_year']").val(data.formDetail.scholarship_year);
                    $("#editForm input[name='type_of_disability']").val(data.formDetail.type_of_disability);
                    $("#editForm input[name='disability_certificate_no']").val(data.formDetail.disability_certificate_no);
                    $("#editForm textarea[name='hospital_name']").val(data.formDetail.hospital_name);
                    $("#editForm input[name='degree_of_disability']").val(data.formDetail.degree_of_disability);
                    $("#editForm input[name='bank_name']").val(data.formDetail.bank_name);
                    $("#editForm input[name='branch_name']").val(data.formDetail.branch_name);
                    $("#editForm input[name='account_holder_name']").val(data.formDetail.account_holder_name);
                    $("#editForm input[name='account_no']").val(data.formDetail.account_no);
                    $("#editForm input[name='ifsc_code']").val(data.formDetail.ifsc_code);
                    var candidate_signature = 'storage/' + data.formDetail.candidate_signature;
                    var passport_size_photo = 'storage/' + data.formDetail.passport_size_photo;
                    $("#view_signature").attr("href", candidate_signature);
                    $("#view_photo").attr("href", passport_size_photo);

                    // dynamicDcoument View
                    if (data.documents && data.documents.length > 0) {
                        $("#dynamicDocuments").empty();
                        var documentsHtml = '';

                        $.each(data.documents, function(index, document) {
                            var documentUrl = "{{ asset('education_scheme_file/') }}/" + document.document_file;
                            var documentName = document.document_name || ''; // Access directly without chaining document.document
                            documentsHtml += '<div class="col-md-4">';
                            documentsHtml += '<label class="col-form-label" for="document_name">' + documentName;
                            if (document.is_required == 1) {
                                documentsHtml += ' <span class="required">*</span>';
                            }
                            documentsHtml += '</label>';
                            documentsHtml += '<input type="hidden" name="document_id[]" class="form-control" value="' + document.document_id + '">';
                            documentsHtml += '<input type="file" name="document_file[]" class="form-control" multiple><br>';
                            documentsHtml += '<a href="' + documentUrl + '" class="btn btn-sm btn-primary" target="_blank"> View Document</a>';
                            documentsHtml += '<span class="text-danger is-invalid document_file_err"></span>';
                            documentsHtml += '</div>';
                        });

                        $("#dynamicDocuments").append(documentsHtml);
                    }

                }
                else
                {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script>


<!-- Update -->
<script>
    // submitting form
    $('#editForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Create FormData object
        var formData = new FormData(this);

        // Make an AJAX request with FormData
        $.ajax({
            url: $(this).attr('action'), 
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (!data.error2) {
                    if (data.errors) {
                        // Display validation errors
                        $.each(data.errors, function(field, messages) {
                            $('.' + field + '_err').text(messages);
                            $("[name='"+field+"']").addClass('is-invalid');
                        });
                    } else if (data.success) {
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('all_education_scheme.index') }}';
                            });
                    }
                } else {
                    swal("Error!", data.error2, "error");
                }
            },
            error: function(error) {
                // Handle error response
                console.log(error);
            }
        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this Form Details?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('all_education_scheme.destroy', ":model_id") }}";
                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        console.log(data)
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>
