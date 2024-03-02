<x-admin.layout>
    <x-slot name="title">Divyang Scheme Form</x-slot>
    <x-slot name="heading">Divyang Scheme Form (दिव्यांग योजना फॉर्म)</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Divyang Scheme Form (दिव्यांग योजना फॉर्म जोडा) </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                {{-- <input type="hidden" id="h_id" name="h_id" value=""> --}}

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_name">Name of disabled person (दिव्यांग व्यक्‍तीचे नाव)<span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Name of disabled person">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">Full Address (संपूर्ण पत्ता)<span class="text-danger">*</span></label>
                                    <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                                    <span class="text-danger is-invalid full_address_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Gender (लिंग) <span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    {{-- <div class="form-check mb-2">
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
                                    </div> --}}
                                    <span class="text-danger is-invalid gender_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age"> Age (वय)<span class="text-danger">*</span> </label>
                                    <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_name">Name of father/husband (वडिलांचे/पतीचे नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="father_name" name="father_name" type="text" placeholder="Enter Name and address of father/husband">
                                    <span class="text-danger is-invalid father_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_address">Address of father/husband (वडिलांचा/पतीचा पत्ता) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="father_address" name="father_address" type="text" placeholder="Enter Name and address of father/husband">
                                    <span class="text-danger is-invalid father_address_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact">Mobile No (मोबाईल नं.)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="alternate_contact_no">Alternate Mobile No (पर्यायी मोबाईल क्र)</label>
                                    <input class="form-control" id="alternate_contact_no" name="alternate_contact_no"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid alternate_contact_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="type_of_disability">Type of disability (दिव्यांगत्वाचा प्रकार)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="type_of_disability" name="type_of_disability" type="text" placeholder="Enter Type of disability">
                                    <span class="text-danger is-invalid type_of_disability_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="percentage"> Percentage (टक्केवारी) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="percentage" name="percentage" type="text" placeholder="Enter Percentage">
                                    <span class="text-danger is-invalid percentage_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="agriculture">Agriculture (शेती)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="agriculture" name="agriculture" type="text" placeholder="Enter Agriculture">
                                    <span class="text-danger is-invalid agriculture_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">Aadhaar Card Number (दिव्यांग व्यक्तीचा आधारकार्ड नंबर) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="adhaar_no" name="adhaar_no" type="text"  placeholder="Enter Aadhaar Card Number">
                                    <span class="text-danger is-invalid adhaar_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Name (बँकेचे नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text"  placeholder="Enter Bank Name" value="">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="branch_name">Branch (शाखा) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text"  placeholder="Enter Branch">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Account Number (बँक खाते क्रमांक) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Enter Bank Account Number">
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code (आय .एफ .एस .सी कोड) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  placeholder="Enter IFSC Code">
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="profession">Education (शिक्षण)/job (नोकरी) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="profession" name="profession" type="text" placeholder="Enter Education/job">
                                    <span class="text-danger is-invalid profession_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="number_of_family">Number of family member (कुटुंबातील सदस्याची संख्या)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="number_of_family" name="number_of_family" type="text" placeholder="Enter Number of family member">
                                    <span class="text-danger is-invalid number_of_family_err"></span>
                                </div>




                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="authority_name">Name/designation and details of the competent authority issuing the certificate (प्रमाणपत्र देणाऱ्या सक्षम अधिकाऱ्याचे नाव / हुद्दा व तपशील)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="authority_name" name="authority_name" type="text" >
                                    <span class="text-danger is-invalid authority_name_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="personal_benefit">Have you benefited from personal benefit schemes before? Yes / No (यापुर्वी वैयक्तीत लाभाच्या योजनेया लाभ मिळालेला आहे का ? होय / नाही) <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="personal_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  personal_benefit_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="govt_scheme">Whether Gharkul was provided under government scheme or not? (शासन योजने अंतर्गत घरकूल मिळाले किंवा नाही) <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="govt_scheme" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  govt_scheme_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="welfare">What is the benefit of central / state governments poor and other schemes? (केंद्र / राज्य सरकारच्या निराधार व इतर योजनांचा लाभदायक आहे काय?.)<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single" name="welfare_schemes" >
                                        <option value="">--Select--</option>
                                        <option value="yes">Yes</option>
                                      <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid  welfare_schemes_err"></span>

                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="received_year">When received (year) (कधी मिळालेला होता (वर्ष))<span class="text-danger">*</span></label>
                                    <input class="form-control" id="received_year" name="received_year" type="text" placeholder="Enter When received">
                                    <span class="text-danger is-invalid received_year_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="poverty_number">Poverty Line Number (दारिद्र रेषेचा क्रमांक)<span class="text-danger">*</span> </label>
                                    <input class="form-control" id="poverty_number" name="poverty_number" type="text" placeholder="Enter Poverty Line Number">
                                    <span class="text-danger is-invalid poverty_number_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="caste">Caste Category (जातीचा प्रवर्ग)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="caste" name="caste" type="text"  placeholder="Enter Caste Category">
                                    <span class="text-danger is-invalid caste_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_no"> Ward No (प्रभाग क्र.)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="ward_no" name="ward_no" type="text" placeholder="Enter Ward No">
                                    <span class="text-danger is-invalid ward_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_id">Ward Name (प्रभाग नाव)<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="ward_id" >
                                            <option value="">--Select--</option>
                                            @foreach ($wards as $ward)
                                            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger is-invalid  ward_id_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature(अर्जदाराची सही) / thumb (अगंठा) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid candidate_signature_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passport_size_photo">Passport Size Photo (अर्जदाराची फोटो)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid passport_size_photo_err"></span>
                                </div>


                                @foreach ($document as $doc)
                                <div class="col-md-4 mt-3">
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}} @if($doc->is_required==1) <span class="text-danger">*</span> @endif</label>
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





</x-admin.layout>


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
                            window.location.href = '{{ route('divyang.application') }}';
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
            $('span.error-text').text('');
            $('input, select, textarea').removeClass('is-invalid');
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


