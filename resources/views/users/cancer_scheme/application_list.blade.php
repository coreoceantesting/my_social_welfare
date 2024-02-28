<x-admin.layout>
    <x-slot name="title">Cancer Scheme Form</x-slot>
    <x-slot name="heading">Cancer Scheme Form</x-slot>

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
                            <label class="col-form-label" for="name">Full Name/संपूर्ण नाव<span class="text-danger">*</span></label>
                            <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                            <span class="text-danger is-invalid full_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_address">Full Address / संपूर्ण पत्ता<span class="text-danger">*</span></label>
                            <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                            <span class="text-danger is-invalid full_address_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.:<span class="text-danger">*</span></label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="dob"> Date Of Birth/ जन्म दिनांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="dob" name="dob" type="date"  onchange="calculateAge()" placeholder="Enter Date Of Birth">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="Age">Age of Beneficiary / लाभार्थ्याचे वय </label>
                            <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>



                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_no"> Aadhar Card Number  / आधारकार्ड क्रमांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="adhaar_no" name="adhaar_no" type="text" placeholder="Enter Adhaar Number">
                            <span class="text-danger is-invalid adhaar_no_err"></span>
                        </div>



                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">Gender/ लिंग <span class="text-danger">*</span></label>
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
                            <label class="col-form-label" for="type_of_disease">Details / type of disease / आजाराचा तपशिल /प्रकार <span class="text-danger">*</span></label>
                            <input class="form-control" id="type_of_disease" name="type_of_disease" type="text" placeholder="Enter Details / type of disease">
                            <span class="text-danger is-invalid type_of_disease_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="diagnosis_date">Date of cancer diagnosis / कॅन्सर निदान झालेचा दिनांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="diagnosis_date" name="diagnosis_date" type="date" placeholder="Enter Date of cancer diagnosis">
                            <span class="text-danger is-invalid diagnosis_date_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="hospital_name">Name of Hospital where treatment is being given / उपचार घेत असलेल्या रूग्णालयाचे नाव <span class="text-danger">*</span></label>
                            <input class="form-control" id="hospital_name" name="hospital_name" type="text" placeholder="Enter Hospital Name">
                            <span class="text-danger is-invalid hospital_name_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="duration_of_residence">Duration of residence in Panvel Municipal Corporation area/ पनवेल महानगरपालिका क्षेत्रातील वास्तव्याचा कालावधी  <span class="text-danger">*</span></label>
                            <input class="form-control" id="duration_of_residence" name="duration_of_residence" type="text" placeholder="Enter Duration of residence">
                            <span class="text-danger is-invalid duration_of_residence_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="financial_help">Applicant's relationship with the beneficiary/ अर्जदाराचे लाभार्थ्याशी असलेले नाते<span class="text-danger">*</span></label>
                                <select class="js-example-basic-single" name="financial_help" id="financial_help">
                                    <option value="">--Select--</option>
                                    <option value="self">Self/स्वतः </option>
                                  <option value="relationship">Relationship/नाते</option>
                                </select>
                                <span class="text-danger is-invalid  financial_help_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="candidate_signature">Upload Signature / thumb /अर्जदाराची सही / अगंठा<span class="text-danger">*</span></label>
                            <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg"><br>
                            <a class="btn btn-sm btn-primary" id="candidate_signature" target="_blank" href="" >View Document</a>
                            <span class="text-danger is-invalid candidate_signature_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="passport_size_photo">Passport Size Photo/अर्जदाराची फोटो<span class="text-danger">*</span></label>
                            <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg"><br>
                            <a class="btn btn-sm btn-primary" id="passport_size_photo" target="_blank" href="" >View Document</a>
                            <span class="text-danger is-invalid passport_size_photo_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="account_no">बँक खाते नंबर<span class="text-danger">*</span></label>
                            <input class="form-control" id="account_no" name="account_no" type="text" placeholder="Enter Account Number">
                            <span class="text-danger is-invalid account_no_err"></span>
                        </div>

                    </div>

                    <div class="mb-3 row" id="yourDocumentsContainer">

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="editSubmit">Submit</button>
                    <a href="{{ route('cancer_scheme.application') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                </div>
            </div>
        </form>
    </div>
</div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>



                                    <tr>
                                        <th>Application Number</th>
                                        <th>Name</th>
                                        <th>Full Address</th>
                                        <th>Contact</th>
                                        <th>Application Status</th>
                                        @if (!empty($cancer) && count($cancer) > 0)
                                        @if($cancer[0]->hod_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($cancer[0]->ac_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($cancer[0]->amc_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($cancer[0]->dmc_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @endif
                                    @endif
                                        <th>Action</th>
                                        @if (!empty($cancer) && count($cancer) > 0)
        								@if($cancer[0]->dmc_status == 1)
                                        <th>Certificate</th>
        								@endif
        								 @endif
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($cancer as $row)

                                     <tr>
                                            <td>{{ $row->application_no }}</td>
                                            <td>{{ $row->full_name }}</td>
                                            <td>{{ $row->full_address }}</td>
                                            <td>{{ $row->contact }}</td>

                                            <td>
                                                @if($row->hod_status == 0 && $row->ac_status == 0 && $row->amc_status == 0 && $row->dmc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Pending</button>
                                                @elseif($row->hod_status == 1 && $row->ac_status == 0 && $row->amc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Review</button>
                                                @elseif($row->hod_status == 1 && $row->ac_status == 1 && $row->amc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Review</button>
                                                @elseif($row->hod_status == 1 && $row->ac_status == 1 && $row->amc_status == 1 && $row->dmc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Review</button>
                                                @elseif($row->hod_status == 1 && $row->ac_status == 1 && $row->amc_status == 1 && $row->dmc_status == 1)
                                                <button type="button" class="btn btn-success waves-effect m-r-20">Approved</button>
                                                @elseif($row->hod_status == 2 || $row->ac_status == 2|| $row->amc_status == 2 || $row->dmc_status == 2)
                                                <button type="button" class="btn btn-danger waves-effect m-r-20">Rejected</button>
                                                @endif
                                              </td>

                                              @if($row->hod_status == 2)
        								      <td>{{ $row->hod_reject_reason }}</td>
        								    @elseif($row->ac_status == 2)
        								      <td>{{ $row->ac_reject_reason }}</td>
        								    @elseif($row->amc_status == 2)
        								      <td>{{ $row->amc_reject_reason }}</td>
                                            @elseif($row->dmc_status == 2)
        								      <td>{{ $row->dmc_reject_reason }}</td>
        								    @endif
                                            <td>
                                                @if($row->hod_status == 0 && $row->ac_status == 0 && $row->amc_status == 0 && $row->dmc_status == 0)
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @elseif($row->hod_status == 2 || $row->ac_status == 2|| $row->amc_status == 2 || $row->dmc_status == 2)
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @endif

                                                <a href="{{ url('cancer_scheme_certificate_view/'.$row->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"> <i class="fas fa-eye"></i></a>
                                            </td>

                                            @if($row->dmc_status == 1)
                                            <td><a href="{{ url('cancer_certificate/'.$row->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">Generate Certificate</a></td>
                                            @endif
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

    <!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('cancer_scheme.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.cancer_scheme.id);

                    $("#editForm select[name='financial_help']").val(data.cancer_scheme.financial_help).trigger('change');
                    $("#editForm select[name='financial_help']").val();
                    $("#editForm input[name='full_name']").val(data.cancer_scheme.full_name);
                    $("#editForm input[name='full_address']").val(data.cancer_scheme.full_address);
                    $("#editForm input[name='contact']").val(data.cancer_scheme.contact);
                    $("#editForm input[name='age']").val(data.cancer_scheme.age);
                    $("#editForm input[name='dob']").val(data.cancer_scheme.dob);
                    $("#editForm input[name='gender']").val(data.cancer_scheme.gender);
                    if (data.cancer_scheme.gender === 'male') {
                        $("#genderMale").prop('checked', true);
                    } else if (data.cancer_scheme.gender === 'female') {
                        $("#genderFemale").prop('checked', true);
                    }

                    $("#editForm input[name='duration_of_residence']").val(data.cancer_scheme.duration_of_residence);
                    $("#editForm input[name='adhaar_no']").val(data.cancer_scheme.adhaar_no);
                    $("#editForm input[name='type_of_disease']").val(data.cancer_scheme.type_of_disease);
                    $("#editForm input[name='diagnosis_date']").val(data.cancer_scheme.diagnosis_date);
                    $("#editForm input[name='hospital_name']").val(data.cancer_scheme.hospital_name);
                    $("#editForm input[name='account_no']").val(data.cancer_scheme.account_no);
                    $("#editForm a#candidate_signature").attr('href', "{{ asset('storage/') }}/" + data.cancer_scheme.candidate_signature);
                    $("#editForm a#passport_size_photo").attr('href', "{{ asset('storage/') }}/" + data.cancer_scheme.passport_size_photo);

                    if (data.documents && data.documents.length > 0) {
                        $("#yourDocumentsContainer").empty();
                    var documentsHtml = '';

                    $.each(data.documents, function(index, document) {
                        var documentUrl = "{{ asset('cancer_scheme_file/') }}/" + document.document_file;
                        var documentName = document.document ? document.document.document_name : '';
                        documentsHtml += '<div class="col-md-4 mt-3">';
                        documentsHtml += '<label class="col-form-label" for="document_name">' + documentName;
                        if (document.is_required == 1) {
                            documentsHtml += ' <span class="required">*</span>';
                        }
                        documentsHtml += '</label>';
                        // documentsHtml += '<input type="hidden" name="document_id[]" class="form-control" value="' + document.id + '">';
                        documentsHtml += '<input type="file" name="document_file[]" class="form-control" multiple><br>';
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
            var url = "{{ route('cancer_scheme.update', ":model_id") }}";
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
                                window.location.href = '{{ route('cancer_scheme.application') }}';
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
            title: "Are you sure to delete this Cancer Scheme?",
            icon: "info",
            buttons: ["Cancel", "Cancer Scheme"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('cancer_scheme.destroy', ":model_id") }}";

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
