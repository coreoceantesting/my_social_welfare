<x-admin.layout>
    <x-slot name="title">Sports Scheme Form</x-slot>
    <x-slot name="heading">Sports Scheme Form</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Sports Scheme Form </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                {{-- <input type="hidden" id="h_id" name="h_id" value=""> --}}

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">1. संपूर्ण नाव</label>
                                    <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">2. Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                                    <span class="text-danger is-invalid full_address_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="dob">3.  Date Of Birth/ वय </label>
                                    <input class="form-control" id="dob" name="dob" type="date"  placeholder="Enter Date Of Birth">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age"> Age/ वय </label>
                                    <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="email"> Email/ ई मेल:</label>
                                    <input class="form-control" id="email" name="email"  type="text"  placeholder="Enter Email" >
                                    <span class="text-danger is-invalid email_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="school_name">4. Name of School / College in Pampa Area/पमपा क्षेत्रातील शाळेचे / कॉलेजचे नांव : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="school_name" name="school_name" type="text" placeholder="Enter Ward Name">
                                    <span class="text-danger is-invalid school_name_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="consent_letter">5. Consent Letter from School/College:/ शाळा / महाविद्यालयाचे संमतीपत्रक : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="consent_letter" name="consent_letter" type="file" >
                                    <span class="text-danger is-invalid consent_letter_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_copy">6. Aadhaar Card Copy :  / आधारकार्ड प्रत : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="adhaar_copy" name="adhaar_copy" type="file" >
                                    <span class="text-danger is-invalid adhaar_copy_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passbook_copy">7. Photocopy of the bank account passbook /प्रत्येक पात्र लाभार्थी खेळाडूच्या नावाचे राष्ट्रियकृत बँकेतील बँक खात्याच्या पासयूकची छायांकित प्रत जोडणे बंधनकारक राहिल <span class="text-danger">*</span></label>
                                    <input class="form-control" id="passbook_copy" name="passbook_copy" type="file" >
                                    <span class="text-danger is-invalid passbook_copy_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="sports_certificate">8. Photocopy of specialization certificate at State level/National level/ राज्य स्तर / राष्ट्रीय स्तर यामध्ये विशेष प्राविण्य मिळविल्याचे प्रमाणपत्राची छायांकित प्रत : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="sports_certificate" name="sports_certificate" type="file" >
                                    <span class="text-danger is-invalid sports_certificate_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="recommendation_letter">9. Letter of recommendation from corporators/ नगरसेवकांचे शिफारस पत्र : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="recommendation_letter" name="recommendation_letter" type="file" >
                                    <span class="text-danger is-invalid recommendation_letter_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="financial_help">10. financial help/ आर्थिक मदत :</label>
                                        <select class="js-example-basic-single" name="financial_help" >
                                            <option value="">--Select--</option>
                                            <option value="personal">personal/वैयक्तिक</option>
                                          <option value="relational">relational/सांधिक</option>
                                        </select>
                                        <span class="text-danger is-invalid  financial_help_err"></span>
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
                    <h4 class="card-title">Edit Sports Form</h4>
                </div>
                <div class="card-body py-2">
                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                    <div class="mb-3 row">
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">1. संपूर्ण नाव</label>
                            <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                            <span class="text-danger is-invalid full_name_err"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_address">2. Full Address / संपूर्ण पत्ता</label>
                            <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                            <span class="text-danger is-invalid full_address_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="dob">3.  Date Of Birth/ वय </label>
                            <input class="form-control" id="dob" name="dob" type="date"  placeholder="Enter Date Of Birth">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="Age"> Age/ वय </label>
                            <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.:</label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="email"> Email/ ई मेल:</label>
                            <input class="form-control" id="email" name="email"  type="text"  placeholder="Enter Email" >
                            <span class="text-danger is-invalid email_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="school_name">4. Name of School / College in Pampa Area/पमपा क्षेत्रातील शाळेचे / कॉलेजचे नांव : <span class="text-danger">*</span></label>
                            <input class="form-control" id="school_name" name="school_name" type="text" placeholder="Enter Ward Name">
                            <span class="text-danger is-invalid school_name_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="consent_letter">5. Consent Letter from School/College:/ शाळा / महाविद्यालयाचे संमतीपत्रक : <span class="text-danger">*</span></label>
                            <input class="form-control" id="consent_letter" name="consent_letter" type="file" >
                            <span class="text-danger is-invalid consent_letter_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_copy">6. Aadhaar Card Copy :  / आधारकार्ड प्रत : <span class="text-danger">*</span></label>
                            <input class="form-control" id="adhaar_copy" name="adhaar_copy" type="file" >
                            <span class="text-danger is-invalid adhaar_copy_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="passbook_copy">7. प्रत्येक पात्र लाभार्थी खेळाडूच्या नावाचे राष्ट्रियकृत बँकेतील बँक खात्याच्या पासयूकची छायांकित प्रत जोडणे बंधनकारक राहिल <span class="text-danger">*</span></label>
                            <input class="form-control" id="passbook_copy" name="passbook_copy" type="file" >
                            <span class="text-danger is-invalid passbook_copy_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="sports_certificate">8. Photocopy of specialization certificate at State level/National level/ राज्य स्तर / राष्ट्रीय स्तर यामध्ये विशेष प्राविण्य मिळविल्याचे प्रमाणपत्राची छायांकित प्रत : <span class="text-danger">*</span></label>
                            <input class="form-control" id="sports_certificate" name="sports_certificate" type="file" >
                            <span class="text-danger is-invalid sports_certificate_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="recommendation_letter">9. Letter of recommendation from corporators/ नगरसेवकांचे शिफारस पत्र : <span class="text-danger">*</span></label>
                            <input class="form-control" id="recommendation_letter" name="recommendation_letter" type="file" >
                            <span class="text-danger is-invalid recommendation_letter_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="financial_help">10. financial help/ आर्थिक मदत :</label>
                                <select class="js-example-basic-single" name="financial_help" >
                                    <option value="">--Select--</option>
                                    <option value="personal">personal/वैयक्तिक</option>
                                  <option value="relational">relational/सांधिक</option>
                                </select>
                                <span class="text-danger is-invalid  financial_help_err"></span>
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
            url: '{{ route('sports_scheme.store') }}',
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
                            window.location.href = '{{ route('sports_scheme.index') }}';
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
        var url = "{{ route('sports_scheme.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.sports_scheme.id);
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
            var url = "{{ route('sports_scheme.update', ":model_id") }}";
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
                                window.location.href = '{{ route('sports_scheme.index') }}';
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
            title: "Are you sure to delete this Sports Scheme?",

            icon: "info",
            buttons: ["Cancel", "Sports Scheme"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('sports_scheme.destroy', ":model_id") }}";

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

