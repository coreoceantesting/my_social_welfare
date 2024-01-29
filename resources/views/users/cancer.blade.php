<x-admin.layout>
    <x-slot name="title">Cancer Scheme Form</x-slot>
    <x-slot name="heading">Cancer Scheme Form</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Cancer Scheme Form </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                {{-- <input type="hidden" id="h_id" name="h_id" value=""> --}}


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="financial_help">1. Applicant's relationship with the beneficiary/ अर्जदाराचे लाभार्थ्याशी असलेले नाते</label>
                                        <select class="js-example-basic-single" name="financial_help" >
                                            <option value="">--Select--</option>
                                            <option value="self">Self/स्वतः </option>
                                          <option value="relationship">Relationship/नाते</option>
                                        </select>
                                        <span class="text-danger is-invalid  financial_help_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">2. संपूर्ण नाव</label>
                                    <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address"> Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                                    <span class="text-danger is-invalid full_address_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age">3. Age of Beneficiary / लाभार्थ्याचे वय </label>
                                    <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="dob"> Date Of Birth/ वय </label>
                                    <input class="form-control" id="dob" name="dob" type="date"  placeholder="Enter Date Of Birth">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name"> Gender/ लिंग  <span class="text-danger">*</span></label>
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
                                    <label class="col-form-label" for="duration_of_residence">4.Duration of residence in Panvel Municipal Corporation area/ पनवेल महानगरपालिका क्षेत्रातील वास्तव्याचा कालावधी  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="duration_of_residence" name="duration_of_residence" type="text" placeholder="Enter Duration of residence">
                                    <span class="text-danger is-invalid duration_of_residence_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">5. Aadhar Card Number  / आधारकार्ड क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="adhaar_no" name="adhaar_no" type="text" placeholder="Enter Adhaar Number">
                                    <span class="text-danger is-invalid adhaar_no_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="income_certificate">6.Income proof (annual income less than Rs. 6 lakhs)/ उत्पन्नाचा दाखला (वार्षीक उत्पन्न रु. ६ लाखांपेक्षा कमी)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="income_certificate" name="income_certificate" type="file" >
                                    <span class="text-danger is-invalid income_certificate_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="type_of_disease">7.Details / type of disease / आजाराचा तपशिल /प्रकार <span class="text-danger">*</span></label>
                                    <input class="form-control" id="type_of_disease" name="type_of_disease" type="text" placeholder="Enter Details / type of disease">
                                    <span class="text-danger is-invalid type_of_disease_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="diagnosis_date">Date of cancer diagnosis / कॅन्सर निदान झालेचा दिनांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="diagnosis_date" name="diagnosis_date" type="text" placeholder="Enter Date of cancer diagnosis">
                                    <span class="text-danger is-invalid diagnosis_date_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="hospital_name">Medical Officer's Certificate Name of the hospital where treatment was received / उपचार घेत असलेल्या रूग्णालयाचे नाव वैद्यकिय अधिका-याचे प्रमाणपत्र <span class="text-danger">*</span></label>
                                    <input class="form-control" id="hospital_name" name="hospital_name" type="text" placeholder="Enter Hospital Name">
                                    <span class="text-danger is-invalid hospital_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passbook_copy">8. Bank Passbook or Canceled Check for RTGS Photocopy/ Bank Account No/ RTGS साठी बँकेचे पासबूकची अथवा रद्द धनादेशाची (Cancelled Cheque) छायांकित प्रत/ बँक खाते नंबर</label>
                                    <input class="form-control" id="passbook_copy" name="passbook_copy" type="file"  >
                                    <span class="text-danger is-invalid passbook_copy_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="signature"> Signature</label>
                                    <input class="form-control" id="signature" name="signature" type="file"  >
                                    <span class="text-danger is-invalid signature_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="profile"> profile</label>
                                    <input class="form-control" id="profile" name="profile" type="file"  >
                                    <span class="text-danger is-invalid profile_err"></span>
                                </div>

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
                    <h4 class="card-title">Edit Cancer Scheme Form</h4>
                </div>
                <div class="card-body py-2">
                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                    <div class="mb-3 row">
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="financial_help">1. Applicant's relationship with the beneficiary/ अर्जदाराचे लाभार्थ्याशी असलेले नाते</label>
                                <select class="js-example-basic-single" name="financial_help" >
                                    <option value="">--Select--</option>
                                    <option value="self">Self/स्वतः </option>
                                  <option value="relationship">Relationship/नाते</option>
                                </select>
                                <span class="text-danger is-invalid  financial_help_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">2. संपूर्ण नाव</label>
                            <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                            <span class="text-danger is-invalid full_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_address"> Full Address / संपूर्ण पत्ता</label>
                            <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                            <span class="text-danger is-invalid full_address_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.:</label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="Age">3. Age of Beneficiary / लाभार्थ्याचे वय </label>
                            <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="dob"> Date Of Birth/ वय </label>
                            <input class="form-control" id="dob" name="dob" type="date"  placeholder="Enter Date Of Birth">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> Gender/ लिंग  <span class="text-danger">*</span></label>
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
                            <label class="col-form-label" for="duration_of_residence">4.Duration of residence in Panvel Municipal Corporation area/ पनवेल महानगरपालिका क्षेत्रातील वास्तव्याचा कालावधी  <span class="text-danger">*</span></label>
                            <input class="form-control" id="duration_of_residence" name="duration_of_residence" type="text" placeholder="Enter Duration of residence">
                            <span class="text-danger is-invalid duration_of_residence_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_no">5. Aadhar Card Number  / आधारकार्ड क्रमांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="adhaar_no" name="adhaar_no" type="text" placeholder="Enter Adhaar Number">
                            <span class="text-danger is-invalid adhaar_no_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="income_certificate">6.Income proof (annual income less than Rs. 6 lakhs)/ उत्पन्नाचा दाखला (वार्षीक उत्पन्न रु. ६ लाखांपेक्षा कमी)<span class="text-danger">*</span></label>
                            <input class="form-control" id="income_certificate" name="income_certificate" type="file" >
                            <span class="text-danger is-invalid income_certificate_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="type_of_disease">7.Details / type of disease / आजाराचा तपशिल /प्रकार <span class="text-danger">*</span></label>
                            <input class="form-control" id="type_of_disease" name="type_of_disease" type="text" placeholder="Enter Details / type of disease">
                            <span class="text-danger is-invalid type_of_disease_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="diagnosis_date">Date of cancer diagnosis / कॅन्सर निदान झालेचा दिनांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="diagnosis_date" name="diagnosis_date" type="text" placeholder="Enter Date of cancer diagnosis">
                            <span class="text-danger is-invalid diagnosis_date_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="hospital_name">Medical Officer's Certificate Name of the hospital where treatment was received / उपचार घेत असलेल्या रूग्णालयाचे नाव वैद्यकिय अधिका-याचे प्रमाणपत्र <span class="text-danger">*</span></label>
                            <input class="form-control" id="hospital_name" name="hospital_name" type="text" placeholder="Enter Hospital Name">
                            <span class="text-danger is-invalid hospital_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="passbook_copy">8. Bank Passbook or Canceled Check for RTGS Photocopy/ Bank Account No/ RTGS साठी बँकेचे पासबूकची अथवा रद्द धनादेशाची (Cancelled Cheque) छायांकित प्रत/ बँक खाते नंबर</label>
                            <input class="form-control" id="passbook_copy" name="passbook_copy" type="file"  >
                            <span class="text-danger is-invalid passbook_copy_err"></span>
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
                                        <th>Application Number</th>
                                        <th>Name</th>
                                        <th>Full Address</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>




                                     <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit category" data-id=""><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete category" data-id=""><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>

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
                            window.location.href = '{{ route('education_scheme.index') }}';
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
        var url = "{{ route('education_scheme.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.education_scheme.id);
                    $("#editForm input[name='full_name']").val(data.education_scheme.full_name);
                    $("#editForm input[name='full_address']").val(data.education_scheme.full_address);
                    $("#editForm input[name='dob']").val(data.education_scheme.dob);
                    $("#editForm input[name='age']").val(data.education_scheme.age);
                    $("#editForm input[name='contact']").val(data.education_scheme.contact);
                    $("#editForm input[name='adhaar_no']").val(data.education_scheme.adhaar_no);
                    $("#editForm input[name='email']").val(data.education_scheme.email);
                    $("#editForm input[name='family_name']").val(data.education_scheme.family_name);
                    $("#editForm input[name='beneficiary_relationship']").val(data.education_scheme.beneficiary_relationship);
                    $("#editForm input[name='total_family']").val(data.education_scheme.total_family);
                    $("#editForm input[name='residence_proof']").val(data.education_scheme.residence_proof);
                    $("#editForm input[name='admission_certificate']").val(data.education_scheme.admission_certificate);
                    $("#editForm input[name='income_certificate']").val(data.education_scheme.income_certificate);
                    $("#editForm input[name='academic_certificate']").val(data.education_scheme.academic_certificate);
                    $("#editForm input[name='passbook_copy']").val(data.education_scheme.passbook_copy);
                    $("#editForm input[name='adhaar_copy']").val(data.education_scheme.adhaar_copy);
                    $("#editForm input[name='recommendation_letter']").val(data.education_scheme.recommendation_letter);
                    $("#editForm input[name='signature']").val(data.education_scheme.signature);
                    $("#editForm input[name='profile']").val(data.education_scheme.profile);

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
            var url = "{{ route('education_scheme.update', ":model_id") }}";
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
                                window.location.href = '{{ route('education_scheme.index') }}';
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
            title: "Are you sure to delete this Education Scheme?",

            icon: "info",
            buttons: ["Cancel", "Education Scheme"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('education_scheme.destroy', ":model_id") }}";

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

