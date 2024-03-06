<x-admin.layout>
    <x-slot name="title">Education Scheme Form</x-slot>
    <x-slot name="heading">Education Scheme Form (शिक्षण योजना फॉर्म)</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" >
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Education Scheme Form </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                {{-- <input type="hidden" id="h_id" name="h_id" value=""> --}}

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Full Name (संपूर्ण नाव)<span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">Full Address (संपूर्ण पत्ता)<span class="text-danger">*</span></label>
                                    <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                                    <span class="text-danger is-invalid full_address_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="dob">Date Of Birth (जन्म तारीख) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="dob" name="dob" type="date"  onchange="calculateAge()" placeholder="Enter Date Of Birth">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age"> Age (वय) </label>
                                    <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact"> Mobile No (मोबाईल क्र.)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="email"> Email (ई मेल आयडी)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email" name="email"  type="text"  placeholder="Enter Email" >
                                    <span class="text-danger is-invalid email_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="beneficiary_relationship"> Beneficiary relationship (लाभार्थ्याचे नाते)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="beneficiary_relationship" name="beneficiary_relationship"  type="text"  placeholder="Enter Beneficiary relationship" >
                                    <span class="text-danger is-invalid beneficiary_relationship_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="family_name">Name of Head of Family (कूटुंब प्रमुखाचे नाव)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="family_name" name="family_name"  type="text"  placeholder="Enter family name" >
                                    <span class="text-danger is-invalid family_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="total_family">Total Number of Family (कुटुंबातील एकूण संख्या)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="total_family" name="total_family"  type="text"  placeholder="Enter total family" >
                                    <span class="text-danger is-invalid total_family_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">Aadhar Card Number (आधारकार्ड क्रमांक)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="adhaar_no" name="adhaar_no" type="text" placeholder="Enter Adhaar Number">
                                    <span class="text-danger is-invalid adhaar_no_err"></span>
                                </div>

                                {{-- add yes no option --}}
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="is_residence_proof">Proof of residence for 3 years in municipal area? (महानगरपालिका क्षेत्रातील ३ वर्ष वास्तव्याचा पुरावा आहे?)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_residence_proof" id="is_residence_proof">
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_residence_proof_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="is_low_income_proof">Low income proof from Tehsildar? (तहसिलदाराकडील अल्प उत्पन्नाचा दाखला आहे?)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_low_income_proof" id="is_low_income_proof">
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_low_income_proof_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="is_medical_admission_proof">Have a medical college admission certificate? (वैद्यकिय महाविद्यालयात प्रवेश घेतल्याचे प्रमाणपत्र आहे ?)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_medical_admission_proof" id="is_medical_admission_proof">
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_medical_admission_proof_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="is_first_year_proof">Have a copy of first academic year result? (पहिल्या शैक्षणिक वर्षाच्या निकालाची प्रत आहे?)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_first_year_proof" id="is_first_year_proof">
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_first_year_proof_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="is_pass_book_doc">Have a photocopy of nationalized bank passbook? (राष्ट्रीयकृत बँकेच्या पासबुकची छायांकित प्रत आहे ?)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_pass_book_doc" id="is_pass_book_doc">
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_pass_book_doc_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="is_recommendation_doc">Hon. Is there a recommendation letter from the corporator?(मा.नगरसेवक / नगरसेविका यांचे शिफारस पत्र आहे ?)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_recommendation_doc" id="is_recommendation_doc">
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <span class="text-danger is-invalid is_recommendation_doc_err"></span>
                                </div>
                                {{-- end yes no option section --}}

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature / thumb (अर्जदाराची सही / अगंठा)<span class="text-danger">*</span></label>
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
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}} @if($doc->is_required==1) <span class="required">*</span> @endif</label>
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
            url: '{{ route('education_scheme.store') }}',
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
                            window.location.href = '{{ route('education_scheme.application') }}';
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


