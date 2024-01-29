<x-admin.layout>
    <x-slot name="title">Marriage Scheme Form</x-slot>
    <x-slot name="heading">Marriage Scheme Form</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Marriage Scheme Form </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name"> संपूर्ण नाव</label>
                                    <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address"> Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                                    <span class="text-danger is-invalid full_address_err"></span>
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
                                    <label class="col-form-label" for="Age"> Age/ वय </label>
                                    <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                                    <span class="text-danger is-invalid age_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name_address_father_or_husband">4. Name and address of father/husband/वडिलांचे/पतीचे नाव व पत्ता <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name_address_father_or_husband" name="name_address_father_or_husband" type="text" placeholder="Enter Name and address of father/husband">
                                    <span class="text-danger is-invalid name_address_father_or_husband_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact">Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no"> Aadhaar Card Number / आधारकार्ड नंबर :</label>
                                    <input class="form-control" id="adhaar_no" name="adhaar_no" type="text"  placeholder="Enter Aadhaar Card Number">
                                    <span class="text-danger is-invalid adhaar_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name"> Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text"  placeholder="Enter Bank Name" value="">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="branch_name">Branch / शाखा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text"  placeholder="Enter Branch">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name"> Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text"  placeholder="Enter Bank Account Number">
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  placeholder="Enter IFSC Code">
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="profession">Education/job / शिक्षण/नोकरी</label>
                                    <input class="form-control" id="profession" name="profession" type="text" placeholder="Enter Education/job">

                                    <span class="text-danger is-invalid profession_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="agriculture">Agriculture / शेती</label>
                                    <input class="form-control" id="agriculture" name="agriculture" type="text" placeholder="Enter Agriculture">

                                    <span class="text-danger is-invalid agriculture_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="caste">Caste Category / जातीचा प्रवर्ग</label>
                                    <input class="form-control" id="caste" name="caste" type="text"  placeholder="Enter Caste Category">

                                    <span class="text-danger is-invalid caste_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_no">Ward No / प्रभाग क्र.:</label>
                                    <input class="form-control" id="ward_no" name="ward_no" type="text" placeholder="Enter Ward No">

                                    <span class="text-danger is-invalid ward_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_name">Ward Name</label>
                                    <input class="form-control" id="ward_name" name="ward_name" type="text" placeholder="Enter Name of Ward Shri Corporator/Municipality">

                                    <span class="text-danger is-invalid ward_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="identity_proof"> Proof Of Identity Card – Aadhaar Card / Voter ID Card.</label>
                                    <input class="form-control" id="identity_proof" name="identity_proof" type="file"  >
                                    <span class="text-danger is-invalid identity_proof_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passbook_copy"> Photocopy of Passbook of Nationalized Bank/ राष्ट्रियकृत बँकेच्या पासबूकची छायांकित प्रतः</label>
                                    <input class="form-control" id="passbook_copy" name="passbook_copy" type="file"  >
                                    <span class="text-danger is-invalid passbook_copy_err"></span>

                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="marriage_certificate"> Attach The Marriage Registration Certificate</label>
                                    <input class="form-control" id="marriage_certificate" name="marriage_certificate" type="file"  >
                                    <span class="text-danger is-invalid marriage_certificate_err"></span>

                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="wedding_photo"> Wedding Photo Of Bride And Groom Together.</label>
                                    <input class="form-control" id="wedding_photo" name="wedding_photo" type="file"  >
                                    <span class="text-danger is-invalid wedding_photo_err"></span>

                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="self_declaration_letter"> Self-Declaration Letter Of Non-Benefited From Other Scheme Of Central / State Govt. On Rs.100/- Stamp Paper.</label>
                                    <input class="form-control" id="self_declaration_letter" name="self_declaration_letter" type="file"  >
                                    <span class="text-danger is-invalid self_declaration_letter_err"></span>

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
                    <h4 class="card-title">Edit Marriage Scheme Form</h4>
                </div>
                <div class="card-body py-2">
                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                    <div class="mb-3 row">
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> संपूर्ण नाव</label>
                            <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                            <span class="text-danger is-invalid full_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_address"> Full Address / संपूर्ण पत्ता</label>
                            <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                            <span class="text-danger is-invalid full_address_err"></span>
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
                            <label class="col-form-label" for="Age"> Age/ वय </label>
                            <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name_address_father_or_husband">4. Name and address of father/husband/वडिलांचे/पतीचे नाव व पत्ता <span class="text-danger">*</span></label>
                            <input class="form-control" id="name_address_father_or_husband" name="name_address_father_or_husband" type="text" placeholder="Enter Name and address of father/husband">
                            <span class="text-danger is-invalid name_address_father_or_husband_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="contact">Mobile No/ मोबाईल नं.:</label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_no"> Aadhaar Card Number / आधारकार्ड नंबर :</label>
                            <input class="form-control" id="adhaar_no" name="adhaar_no" type="text"  placeholder="Enter Aadhaar Card Number">
                            <span class="text-danger is-invalid adhaar_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                            <input class="form-control" id="bank_name" name="bank_name" type="text"  placeholder="Enter Bank Name" value="">
                            <span class="text-danger is-invalid bank_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="branch_name">Branch / शाखा <span class="text-danger">*</span></label>
                            <input class="form-control" id="branch_name" name="branch_name" type="text"  placeholder="Enter Branch">
                            <span class="text-danger is-invalid bank_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="account_no" name="account_no" type="text"  placeholder="Enter Bank Account Number">
                            <span class="text-danger is-invalid account_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                            <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  placeholder="Enter IFSC Code">
                            <span class="text-danger is-invalid ifsc_code_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="profession">Education/job / शिक्षण/नोकरी</label>
                            <input class="form-control" id="profession" name="profession" type="text" placeholder="Enter Education/job">

                            <span class="text-danger is-invalid profession_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="agriculture">Agriculture / शेती</label>
                            <input class="form-control" id="agriculture" name="agriculture" type="text" placeholder="Enter Agriculture">

                            <span class="text-danger is-invalid agriculture_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="caste">Caste Category / जातीचा प्रवर्ग</label>
                            <input class="form-control" id="caste" name="caste" type="text"  placeholder="Enter Caste Category">

                            <span class="text-danger is-invalid caste_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="ward_no">Ward No / प्रभाग क्र.:</label>
                            <input class="form-control" id="ward_no" name="ward_no" type="text" placeholder="Enter Ward No">

                            <span class="text-danger is-invalid ward_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="ward_name">Ward Name:</label>
                            <input class="form-control" id="ward_name" name="ward_name" type="text" placeholder="Enter Name of Ward Shri Corporator/Municipality">

                            <span class="text-danger is-invalid ward_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="identity_proof"> Proof Of Identity Card – Aadhaar Card / Voter ID Card.</label>
                            <input class="form-control" id="identity_proof" name="identity_proof" type="file"  >
                            <span class="text-danger is-invalid identity_proof_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="passbook_copy"> Photocopy of Passbook of Nationalized Bank/ राष्ट्रियकृत बँकेच्या पासबूकची छायांकित प्रतः</label>
                            <input class="form-control" id="passbook_copy" name="passbook_copy" type="file"  >
                            <span class="text-danger is-invalid passbook_copy_err"></span>

                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="marriage_certificate"> Attach The Marriage Registration Certificate</label>
                            <input class="form-control" id="marriage_certificate" name="marriage_certificate" type="file"  >
                            <span class="text-danger is-invalid marriage_certificate_err"></span>

                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="wedding_photo"> Wedding Photo Of Bride And Groom Together.</label>
                            <input class="form-control" id="wedding_photo" name="wedding_photo" type="file"  >
                            <span class="text-danger is-invalid wedding_photo_err"></span>

                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="self_declaration_letter"> Self-Declaration Letter Of Non-Benefited From Other Scheme Of Central / State Govt. On Rs.100/- Stamp Paper.</label>
                            <input class="form-control" id="self_declaration_letter" name="self_declaration_letter" type="file"  >
                            <span class="text-danger is-invalid self_declaration_letter_err"></span>

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
                    $("#editForm input[name='name']").val(data.scheme_form.name);
                    $("#editForm input[name='full_address']").val(data.scheme_form.full_address);
                    $("#editForm input[name='gender']").val(data.scheme_form.gender);
                    if (data.scheme_form.gender === 'male') {
                        $("#genderMale").prop('checked', true);
                    } else if (data.scheme_form.gender === 'female') {
                        $("#genderFemale").prop('checked', true);
                    }

                    $("#editForm input[name='age']").val(data.scheme_form.age);
                    $("#editForm input[name='name_address_father_or_husband']").val(data.scheme_form.name_address_father_or_husband);
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
                    $("#editForm input[name='ward_name']").val(data.scheme_form.ward_name);

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

