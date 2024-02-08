<x-admin.layout>
    <x-slot name="title">Divyang Scheme Form</x-slot>
    <x-slot name="heading">Divyang Scheme Form</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Divyang Scheme Form </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                {{-- <input type="hidden" id="h_id" name="h_id" value=""> --}}

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_name">1. Name of disabled person/ दिव्यांग व्यक्‍तीचे नाव</label>
                                    <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Name of disabled person">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">2. Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                                    <span class="text-danger is-invalid full_address_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">3. Gender/ लिंग  <span class="text-danger">*</span></label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male" >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>

                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="female" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                    <span class="text-danger is-invalid gender_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="dob"> Dob/ वय </label>
                                    <input class="form-control" id="dob" name="dob" type="date"  onchange="calculateAge()" placeholder="Enter dob">
                                    <span class="text-danger is-invalid dob_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age"> Age/ वय </label>
                                    <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_name">4. Name and address of father/husband/वडिलांचे/पतीचे नाव व पत्ता <span class="text-danger">*</span></label>
                                    <input class="form-control" id="father_name" name="father_name" type="text" placeholder="Enter Name and address of father/husband">
                                    <span class="text-danger is-invalid father_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_address">4. Name and address of father/husband/वडिलांचे/पतीचे नाव व पत्ता <span class="text-danger">*</span></label>
                                    <input class="form-control" id="father_address" name="father_address" type="text" placeholder="Enter Name and address of father/husband">
                                    <span class="text-danger is-invalid father_address_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact">5. Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="alternate_contact_no"> Alternate Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control" id="alternate_contact_no" name="alternate_contact_no"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid alternate_contact_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="type_of_disability">6. Type of disability/ दिव्यांगत्वाचा प्रकार<span class="text-danger">*</span></label>
                                    <input class="form-control" id="type_of_disability" name="type_of_disability" type="text" placeholder="Enter Type of disability">
                                    <span class="text-danger is-invalid type_of_disability_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="percentage"> Percentage/ टक्केवारी <span class="text-danger">*</span></label>
                                    <input class="form-control" id="percentage" name="percentage" type="text" placeholder="Enter Percentage">
                                    <span class="text-danger is-invalid percentage_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="authority_name">7. Name/designation and details of the competent authority issuing the certificate /  प्रमाणपत्र देणाऱ्या सक्षम अधिकाऱ्याचे नाव / हुद्दा व तपशील</label>
                                    <input class="form-control" id="authority_name" name="authority_name" type="text" >
                                    <span class="text-danger is-invalid authority_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">8. Aadhaar Card Number of Persons with Disabilities:/ दिव्यांग व्यक्तीचा आधारकार्ड नंबर :</label>
                                    <input class="form-control" id="adhaar_no" name="adhaar_no" type="text"  placeholder="Enter Aadhaar Card Number">
                                    <span class="text-danger is-invalid adhaar_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">9. Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text"  placeholder="Enter Bank Name" value="">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="branch_name">Branch / शाखा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text"  placeholder="Enter Branch">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">10. Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text"  placeholder="Enter Bank Account Number">
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  placeholder="Enter IFSC Code">
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="profession">11. Education/job / शिक्षण/नोकरी</label>
                                    <input class="form-control" id="profession" name="profession" type="text" placeholder="Enter Education/job">

                                    <span class="text-danger is-invalid profession_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="number_of_family">12.Number of family member / कुटुंबातील सदस्याची संख्या :-</label>
                                    <input class="form-control" id="number_of_family" name="number_of_family" type="text" placeholder="Enter Number of family member">

                                    <span class="text-danger is-invalid number_of_family_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="agriculture">13. Agriculture / शेती</label>
                                    <input class="form-control" id="agriculture" name="agriculture" type="text" placeholder="Enter Agriculture">

                                    <span class="text-danger is-invalid agriculture_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="personal_benefit">14. Have you benefited from personal benefit schemes before? Yes / No / यापुर्वी वैयक्तीत लाभाच्या योजनेया लाभ मिळालेला आहे का ? होय / नाही </label>
                                        <select class="js-example-basic-single" name="personal_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  personal_benefit_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="received_year">15. When received (year) / कधी मिळालेला होता (वर्ष)</label>
                                    <input class="form-control" id="received_year" name="received_year" type="text" placeholder="Enter When received">

                                    <span class="text-danger is-invalid received_year_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="welfare">16. Are the welfare and other schemes of Central/State Government beneficial?/ केंद्र / राज्य सरकारच्या निराधार व इतर योजनांचा लाभदायक आहे काय?.</label>
                                    <select class="js-example-basic-single" name="welfare_schemes" >
                                        <option value="">--Select--</option>
                                        <option value="yes">Yes</option>
                                      <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid  welfare_schemes_err"></span>

                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="govt_scheme">17. Whether Gharkul was provided under government scheme or not? / शासन योजने अंतर्गत घरकूल मिळाले किंवा नाही :</label>
                                        <select class="js-example-basic-single" name="govt_scheme" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  govt_scheme_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="poverty_number">18. Poverty Line Number/ दारिद्र रेषेचा क्रमांक :</label>
                                    <input class="form-control" id="poverty_number" name="poverty_number" type="text" placeholder="Enter Poverty Line Number">

                                    <span class="text-danger is-invalid poverty_number_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="caste">19. Caste Category / जातीचा प्रवर्ग</label>
                                    <input class="form-control" id="caste" name="caste" type="text"  placeholder="Enter Caste Category">

                                    <span class="text-danger is-invalid caste_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_no">20. Ward No / प्रभाग क्र.:</label>
                                    <input class="form-control" id="ward_no" name="ward_no" type="text" placeholder="Enter Ward No">

                                    <span class="text-danger is-invalid ward_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_id">Ward Name:</label>
                                        <select class="js-example-basic-single" name="ward_id" >
                                            <option value="">--Select--</option>
                                            @foreach ($wards as $ward)
                                            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger is-invalid  ward_id_err"></span>
                                </div>

                                {{-- <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_name">21. Name of Ward Shri Corporator/Municipality  / प्रभागातील मा. नगरसेवक / नगरसेविका यांचे नाव :</label>
                                    <input class="form-control" id="ward_name" name="ward_name" type="text" placeholder="Enter Name of Ward Shri Corporator/Municipality">

                                    <span class="text-danger is-invalid ward_name_err"></span>
                                </div> --}}

                                @foreach ($document as $doc)
                                <div class="col-md-4 mt-3">
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}} @if($doc->is_required==1) <span class="required">*</span> @endif</label>
                                        <input type="hidden" name="document_id[]" class="form-control" value="{{$doc->id}}">
                                        <input type="file" name="document_file[]" class="form-control" multiple>
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
        <form class="form-horizontal form-bordered" method="post" id="editForm">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Divyang Scheme Form</h4>
                </div>
                <div class="card-body py-2">
                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                    <div class="mb-3 row">
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_name">1. Name of disabled person/ दिव्यांग व्यक्‍तीचे नाव</label>
                            <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Name of disabled person">
                            <span class="text-danger is-invalid full_name_err"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_address">2. Full Address / संपूर्ण पत्ता</label>
                            <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                            <span class="text-danger is-invalid full_address_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">3. Gender/ लिंग <span class="text-danger">*</span></label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male">
                                <label class="form-check-label" for="genderMale">
                                    Male
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                                <label class="form-check-label" for="genderFemale">
                                    Female
                                </label>
                            </div>
                            <span class="text-danger is-invalid gender_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="Age"> Age/ वय </label>
                            <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="father_name">4. Name and address of father/husband/वडिलांचे/पतीचे नाव व पत्ता <span class="text-danger">*</span></label>
                            <input class="form-control" id="father_name" name="father_name" type="text" placeholder="Enter Name and address of father/husband">
                            <span class="text-danger is-invalid father_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="father_address">4. Name and address of father/husband/वडिलांचे/पतीचे नाव व पत्ता <span class="text-danger">*</span></label>
                            <input class="form-control" id="father_address" name="father_address" type="text" placeholder="Enter Name and address of father/husband">
                            <span class="text-danger is-invalid father_address_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="contact">5. Mobile No/ मोबाईल नं.:</label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="alternate_contact_no"> Alternate Mobile No/ मोबाईल नं.:</label>
                            <input class="form-control" id="alternate_contact_no" name="alternate_contact_no"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid alternate_contact_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="type_of_disability">6. Type of disability/ दिव्यांगत्वाचा प्रकार<span class="text-danger">*</span></label>
                            <input class="form-control" id="type_of_disability" name="type_of_disability" type="text" placeholder="Enter Type of disability">
                            <span class="text-danger is-invalid type_of_disability_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="percentage"> Percentage/ टक्केवारी <span class="text-danger">*</span></label>
                            <input class="form-control" id="percentage" name="percentage" type="text" placeholder="Enter Percentage">
                            <span class="text-danger is-invalid percentage_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="authority_name">7. Name/designation and details of the competent authority issuing the certificate /  प्रमाणपत्र देणाऱ्या सक्षम अधिकाऱ्याचे नाव / हुद्दा व तपशील</label>
                            <input class="form-control" id="authority_name" name="authority_name" type="text" >
                            <span class="text-danger is-invalid authority_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_no">8. Aadhaar Card Number of Persons with Disabilities:/ दिव्यांग व्यक्तीचा आधारकार्ड नंबर :</label>
                            <input class="form-control" id="adhaar_no" name="adhaar_no" type="text"  placeholder="Enter Aadhaar Card Number">
                            <span class="text-danger is-invalid adhaar_no_err"></span>
                        </div>



                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">9. Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                            <input class="form-control" id="bank_name" name="bank_name" type="text"  placeholder="Enter Bank Name" value="">
                            <span class="text-danger is-invalid bank_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="branch_name">Branch / शाखा <span class="text-danger">*</span></label>
                            <input class="form-control" id="branch_name" name="branch_name" type="text"  placeholder="Enter Branch">
                            <span class="text-danger is-invalid bank_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">10. Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="account_no" name="account_no" type="text"  placeholder="Enter Bank Account Number">
                            <span class="text-danger is-invalid account_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                            <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  placeholder="Enter IFSC Code">
                            <span class="text-danger is-invalid ifsc_code_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="profession">11. Education/job / शिक्षण/नोकरी</label>
                            <input class="form-control" id="profession" name="profession" type="text" placeholder="Enter Education/job">

                            <span class="text-danger is-invalid profession_err"></span>
                        </div>



                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="number_of_family">12.Number of family member / कुटुंबातील सदस्याची संख्या :-</label>
                            <input class="form-control" id="number_of_family" name="number_of_family" type="text" placeholder="Enter Number of family member">

                            <span class="text-danger is-invalid number_of_family_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="agriculture">13. Agriculture / शेती</label>
                            <input class="form-control" id="agriculture" name="agriculture" type="text" placeholder="Enter Agriculture">

                            <span class="text-danger is-invalid agriculture_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="personal_benefit">14. Have you benefited from personal benefit schemes before? Yes / No / यापुर्वी वैयक्तीत लाभाच्या योजनेया लाभ मिळालेला आहे का ? होय / नाही </label>
                                <select class="js-example-basic-single" name="personal_benefit" >
                                    <option value="">--Select--</option>
                                    <option value="yes">Yes</option>
                                  <option value="no">No</option>
                                </select>
                                <span class="text-danger is-invalid  personal_benefit_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="received_year">15. When received (year) / कधी मिळालेला होता (वर्ष)</label>
                            <input class="form-control" id="received_year" name="received_year" type="text" placeholder="Enter When received">

                            <span class="text-danger is-invalid received_year_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="welfare">16. Are the welfare and other schemes of Central/State Government beneficial?/ केंद्र / राज्य सरकारच्या निराधार व इतर योजनांचा लाभदायक आहे काय?.</label>
                            <select class="js-example-basic-single" name="welfare_schemes" >
                                <option value="">--Select--</option>
                                <option value="yes">Yes</option>
                              <option value="no">No</option>
                            </select>
                            <span class="text-danger is-invalid  welfare_schemes_err"></span>

                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="govt_scheme">17. Whether Gharkul was provided under government scheme or not? / शासन योजने अंतर्गत घरकूल मिळाले किंवा नाही :</label>
                                <select class="js-example-basic-single" name="govt_scheme" >
                                    <option value="">--Select--</option>
                                    <option value="yes">Yes</option>
                                  <option value="no">No</option>
                                </select>
                                <span class="text-danger is-invalid  govt_scheme_err"></span>
                        </div>



                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="poverty_number">18. Poverty Line Number/ दारिद्र रेषेचा क्रमांक :</label>
                            <input class="form-control" id="poverty_number" name="poverty_number" type="text" placeholder="Enter Poverty Line Number">

                            <span class="text-danger is-invalid poverty_number_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="caste">19. Caste Category / जातीचा प्रवर्ग</label>
                            <input class="form-control" id="caste" name="caste" type="text"  placeholder="Enter Caste Category">

                            <span class="text-danger is-invalid caste_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="ward_no">20. Ward No / प्रभाग क्र.:</label>
                            <input class="form-control" id="ward_no" name="ward_no" type="text" placeholder="Enter Ward No">

                            <span class="text-danger is-invalid ward_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="ward_id">Ward Name:</label>
                                <select class="js-example-basic-single" id="ward_id" name="ward_id" >


                                </select>
                                <span class="text-danger is-invalid  ward_id_err"></span>
                        </div>

                    </div>

                    <div class="mb-3 row" id="yourDocumentsContainer">

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


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
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
                                        <th>Name</th>
                                        <th>Full Address</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($disable as  $value)
                                        <tr>
                                            <td>{{ $value->full_name }}</td>
                                            <td>{{ $value->full_address }}</td>
                                            <td>{{ $value->contact }}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit category" data-id="{{ $value->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $value->id }}"><i data-feather="trash-2"></i> </button>
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

<script>
    function calculateAge() {
        var dob = new Date(document.getElementById('dob').value);
        var today = new Date();
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        document.getElementById('age').value = age;
    }
</script>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('scheme_form.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('scheme_form.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
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

        function resetErrors() {
            var form = document.getElementById('addForm');
            var data = new FormData(form);
            for (var [key, value] of data) {
                $('.' + key + '_err').text('');
                $('#' + key).removeClass('is-invalid');
                $('#' + key).addClass('is-valid');
            }
        }

        function printErrMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '_err').text(value);
                $('#' + key).addClass('is-invalid');
                $('#' + key).removeClass('is-valid');
            });
        }

    });


</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('scheme_form.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.scheme_form.id);
                    $("#editForm input[name='full_name']").val(data.scheme_form.full_name);
                    $("#editForm input[name='full_address']").val(data.scheme_form.full_address);
                    $("#editForm input[name='gender']").val(data.scheme_form.gender);
                    if (data.scheme_form.gender === 'male') {
                        $("#genderMale").prop('checked', true);
                    } else if (data.scheme_form.gender === 'female') {
                        $("#genderFemale").prop('checked', true);
                    }

                    $("#editForm input[name='age']").val(data.scheme_form.age);
                    $("#editForm input[name='father_name']").val(data.scheme_form.father_name);
                    $("#editForm input[name='father_address']").val(data.scheme_form.father_address);
                    $("#editForm input[name='contact']").val(data.scheme_form.contact);
                    $("#editForm input[name='alternate_contact_no']").val(data.scheme_form.alternate_contact_no);
                    $("#editForm input[name='type_of_disability']").val(data.scheme_form.type_of_disability);
                    $("#editForm input[name='percentage']").val(data.scheme_form.percentage);
                    $("#editForm input[name='bank_name']").val(data.scheme_form.bank_name);
                    $("#editForm input[name='branch_name']").val(data.scheme_form.branch_name);
                    $("#editForm input[name='account_no']").val(data.scheme_form.account_no);
                    $("#editForm input[name='ifsc_code']").val(data.scheme_form.ifsc_code);
                    $("#editForm input[name='authority_name']").val(data.scheme_form.authority_name);
                    $("#editForm input[name='adhaar_no']").val(data.scheme_form.adhaar_no);
                    $("#editForm input[name='profession']").val(data.scheme_form.profession);
                    $("#editForm input[name='number_of_family']").val(data.scheme_form.number_of_family);
                    $("#editForm input[name='agriculture']").val(data.scheme_form.agriculture);

                    $("#editForm select[name='personal_benefit']").val(data.scheme_form.personal_benefit).trigger('change');
                    var selectedValue = $("#editForm select[name='personal_benefit']").val();
                    // console.log(selectedValue);
                    $("#editForm input[name='received_year']").val(data.scheme_form.received_year);
                    $("#editForm select[name='welfare_schemes']").val(data.scheme_form.welfare_schemes).trigger('change');
                    $("#editForm select[name='welfare_schemes']").val();

                    $("#editForm select[name='govt_scheme']").val(data.scheme_form.govt_scheme).trigger('change');
                    $("#editForm select[name='govt_scheme']").val();

                    $("#editForm input[name='poverty_number']").val(data.scheme_form.poverty_number);
                    $("#editForm input[name='caste']").val(data.scheme_form.caste);
                    $("#editForm input[name='ward_no']").val(data.scheme_form.ward_no);
                    // $("#editForm input[name='ward_name']").val(data.scheme_form.ward_name);
                    $("#ward_id").html(data.wardHtml);

                    if (data.documents && data.documents.length > 0) {
                        $("#yourDocumentsContainer").empty();
                    var documentsHtml = '';

                    $.each(data.documents, function(index, document) {
                        var documentUrl = "{{ asset('divyang_nodani_file/') }}/" + document.document_file;
                        var documentName = document.document ? document.document.document_name : '';
                        documentsHtml += '<div class="col-md-4 mt-3">';
                        documentsHtml += '<label class="col-form-label" for="document_name">' + documentName;
                        if (document.is_required == 1) {
                            documentsHtml += ' <span class="required">*</span>';
                        }
                        documentsHtml += '</label>';
                        // documentsHtml += '<input type="hidden" name="document_id[]" class="form-control" value="' + document.id + '">';
                        documentsHtml += '<input type="file" name="document_file[]" class="form-control" multiple>';
                        documentsHtml += '<a href="' + documentUrl + '" class="btn btn-sm btn-primary" target="_blank"> View Document</a>';
                        documentsHtml += '<span class="text-danger is-invalid document_file_err"></span>';
                        documentsHtml += '</div>';
                    });

                    $("#yourDocumentsContainer").append(documentsHtml);
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
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('scheme_form.update', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('scheme_form.index') }}';
                            });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

        });
    });
</script>

<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this Disability Application?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Disability Application"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('scheme_form.destroy', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
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

