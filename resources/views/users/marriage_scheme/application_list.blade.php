<x-admin.layout>
    <x-slot name="title">Marriage Scheme Form</x-slot>
    <x-slot name="heading">Marriage Scheme Form (विवाह योजना फॉर्म)</x-slot>

 {{-- Edit Form --}}
 <div class="row" id="editContainer" style="display:none;">
    <div class="col">
        <form class="form-horizontal form-bordered" method="post" id="editForm">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Marriage Scheme Form (विवाह योजना फॉर्म संपादित करा)</h4>
                </div>
                <div class="card-body py-2">
                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                    <div class="mb-3 row" >
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> Full Name (संपूर्ण नाव)<span class="text-danger">*</span></label>
                            <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                            <span class="text-danger is-invalid full_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_address"> Full Address (संपूर्ण पत्ता) <span class="text-danger">*</span></label>
                            <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                            <span class="text-danger is-invalid full_address_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> Gender (लिंग)<span class="text-danger">*</span></label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            {{-- <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male" >
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div> --}}
                            <span class="text-danger is-invalid gender_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="Age"> Age (वय) </label>
                            <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="father_name">Name of father/husband (वडिलांचे/पतीचे नाव) <span class="text-danger">*</span></label>
                            <input class="form-control" id="father_name" name="father_name" type="text" placeholder="Enter Name of father/husband">
                            <span class="text-danger is-invalid father_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="father_address">Address of father/husband (वडिलांचे/पतीचे पत्ता) <span class="text-danger">*</span></label>
                            <input class="form-control" id="father_address" name="father_address" type="text" placeholder="Enter Name of father/husband">
                            <span class="text-danger is-invalid father_address_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="contact">Mobile No (मोबाईल नं.):<span class="text-danger">*</span></label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_no"> Aadhaar Card Number (आधारकार्ड नंबर):<span class="text-danger">*</span></label>
                            <input class="form-control" id="adhaar_no" name="adhaar_no" type="text"  placeholder="Enter Aadhaar Card Number">
                            <span class="text-danger is-invalid adhaar_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> Bank Name (बँकेचे नाव) <span class="text-danger">*</span></label>
                            <input class="form-control" id="bank_name" name="bank_name" type="text"  placeholder="Enter Bank Name" value="">
                            <span class="text-danger is-invalid bank_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="branch_name">Branch (शाखा) <span class="text-danger">*</span></label>
                            <input class="form-control" id="branch_name" name="branch_name" type="text"  placeholder="Enter Branch">
                            <span class="text-danger is-invalid bank_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name"> Bank Account Number (बँक खाते क्रमांक) <span class="text-danger">*</span></label>
                            <input class="form-control" id="account_no" name="account_no" type="text"  placeholder="Enter Bank Account Number">
                            <span class="text-danger is-invalid account_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">IFSC Code (आय .एफ .एस .सी कोड) <span class="text-danger">*</span></label>
                            <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  placeholder="Enter IFSC Code">
                            <span class="text-danger is-invalid ifsc_code_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="profession">Education/job (शिक्षण/नोकरी)<span class="text-danger">*</span></label>
                            <input class="form-control" id="profession" name="profession" type="text" placeholder="Enter Education/job">

                            <span class="text-danger is-invalid profession_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="agriculture">Agriculture (शेती)<span class="text-danger">*</span></label>
                            <input class="form-control" id="agriculture" name="agriculture" type="text" placeholder="Enter Agriculture">

                            <span class="text-danger is-invalid agriculture_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="caste">Caste Category (जातीचा प्रवर्ग)<span class="text-danger">*</span></label>
                            {{-- <input class="form-control" id="caste" name="caste" type="text"  placeholder="Enter Caste Category"> --}}
                            <select class="form-control" name="caste" id="caste">
                                <option value="">Caste Category (जातीचा प्रवर्ग)</option>
                                <option value="open">Open</option>
                                <option value="obc">OBC</option>
                                <option value="sbc">SBC</option>
                                <option value="sc">SC</option>
                                <option value="nt-a">NT-A</option>
                                <option value="nt-b">NT-B</option>
                                <option value="nt-c">NT-C</option>
                                <option value="nt-d">NT-D</option>
                                <option value="st">ST</option>
                            </select>
                            <span class="text-danger is-invalid caste_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="ward_no">Ward No (प्रभाग क्र.)<span class="text-danger">*</span></label>
                            <input class="form-control" id="ward_no" name="ward_no" type="text" placeholder="Enter Ward No">

                            <span class="text-danger is-invalid ward_no_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="ward_id">Ward Name (प्रभाग नाव)<span class="text-danger">*</span></label>
                                <select class="js-example-basic-single" id="ward_id" name="ward_id" >

                                </select>
                                <span class="text-danger is-invalid  ward_id_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="candidate_signature">Upload Signature / thumb (अर्जदाराची सही / अगंठा)<span class="text-danger">*</span></label>
                            <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg"><br>
                            <a class="btn btn-sm btn-primary" id="candidate_signature" target="_blank" href="" >View Document</a>
                            <span class="text-danger is-invalid candidate_signature_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="passport_size_photo">Passport Size Photo (अर्जदाराची फोटो)<span class="text-danger">*</span></label>
                            <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg"><br>
                            <a class="btn btn-sm btn-primary" id="passport_size_photo" target="_blank" href="" >View Document</a>
                            <span class="text-danger is-invalid passport_size_photo_err"></span>
                        </div>
                    </div>

                    <div class="mb-3 row" id="yourDocumentsContainer">

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="editSubmit">Submit</button>
                    <a href="{{ route('marriage_scheme.application') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                </div>
            </div>
        </form>
    </div>
</div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @php
                     $serialNumber = 1;
                    @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>



                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Application Number</th>
                                        <th>Name</th>
                                        <th>Full Address</th>
                                        <th>Contact</th>
                                        <th>Application Status</th>
                                        @if (!empty($marriage) && count($marriage) > 0)
                                        @if($marriage[0]->hod_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($marriage[0]->ac_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($marriage[0]->amc_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($marriage[0]->dmc_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @endif
                                    @endif

                                        <th>Action</th>

                                        {{-- @if (!empty($marriage) && count($marriage) > 0)
        								@if($marriage[0]->dmc_status == 1)
                                        <th>Certificate</th>
        								@endif
        								 @endif --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($marriage as $row)


                                        <tr>
                                            <td>{{ $serialNumber++ }}</td>
                                            <td>{{ $row->application_no }}</td>
                                            <td>{{ $row->full_name }}</td>
                                            <td>{{ $row->full_address }}</td>
                                            <td>{{ $row->contact }}</td>
                                            <td>
                                                @if($row->hod_status == 0 && $row->ac_status == 0 && $row->amc_status == 0 && $row->dmc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Pending</button>
                                                @elseif($row->ac_status == 1 && $row->hod_status == 0 && $row->amc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Approved by Clerk</button>
                                                @elseif($row->hod_status == 1 && $row->ac_status == 1 && $row->amc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Approved by Hod</button>
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
                                                @if($row->hod_status == '0' && $row->ac_status == '0' && $row->amc_status == '0' && $row->dmc_status == '0')
                                                <button class="edit-element btn btn-primary text-white px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-white btn-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @elseif($row->hod_status == '2' || $row->ac_status == '2'|| $row->amc_status == '2' || $row->dmc_status == '2')
                                                <button class="edit-element btn btn-primary text-white px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-white btn-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @endif

                                                <a href="{{ url('marriage_view/'.$row->id) }}" class="btn btn-success px-2 py-1"> <i class="fas fa-eye"></i></a>
                                            </td>

                                            {{-- @if($row->dmc_status == 1)
                                            <td><a href="{{ url('marriage_certificate/'.$row->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">Generate Certificate</a></td>
                                            @endif --}}
                                        </tr>
                                        @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-admin.layout>




<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('marriage_scheme.edit', ":model_id") }}";

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
                    console.log(data);
                    $("#editForm input[name='edit_model_id']").val(data.marriage_scheme.id);
                    $("#editForm input[name='full_name']").val(data.marriage_scheme.full_name);
                    $("#editForm input[name='full_address']").val(data.marriage_scheme.full_address);
                    $("#editForm select[name='gender']").val(data.marriage_scheme.gender);
                    // if (data.marriage_scheme.gender === 'male') {
                    //     $("#genderMale").prop('checked', true);
                    // } else if (data.marriage_scheme.gender === 'female') {
                    //     $("#genderFemale").prop('checked', true);
                    // }

                    $("#editForm input[name='age']").val(data.marriage_scheme.age);
                    $("#editForm input[name='father_name']").val(data.marriage_scheme.father_name);
                    $("#editForm input[name='father_address']").val(data.marriage_scheme.father_address);
                    $("#editForm input[name='contact']").val(data.marriage_scheme.contact);
                    $("#editForm input[name='bank_name']").val(data.marriage_scheme.bank_name);
                    $("#editForm input[name='branch_name']").val(data.marriage_scheme.branch_name);
                    $("#editForm input[name='account_no']").val(data.marriage_scheme.account_no);
                    $("#editForm input[name='ifsc_code']").val(data.marriage_scheme.ifsc_code);
                    $("#editForm input[name='adhaar_no']").val(data.marriage_scheme.adhaar_no);
                    $("#editForm input[name='profession']").val(data.marriage_scheme.profession);
                    $("#editForm input[name='agriculture']").val(data.marriage_scheme.agriculture);
                    $("#editForm select[name='caste']").val(data.marriage_scheme.caste);
                    $("#editForm input[name='ward_no']").val(data.marriage_scheme.ward_no);
                    $("#ward_id").html(data.wardHtml);
                    $("#editForm a#candidate_signature").attr('href', "{{ asset('storage/') }}/" + data.marriage_scheme.candidate_signature);
                    $("#editForm a#passport_size_photo").attr('href', "{{ asset('storage/') }}/" + data.marriage_scheme.passport_size_photo);

                    if (data.documents && data.documents.length > 0) {
                        $("#yourDocumentsContainer").empty();
                    var documentsHtml = '';

                    $.each(data.documents, function(index, document) {
                        var documentUrl = "{{ asset('marriage_scheme_file/') }}/" + document.document_file;
                        var documentName = document.document ? document.document.document_name : '';
                        documentsHtml += '<div class="col-md-4 mt-3">';
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
            var url = "{{ route('marriage_scheme.update', ":model_id") }}";
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
                                window.location.href = '{{ route('marriage_scheme.application') }}';
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
            title: "Are you sure to delete this Marriage Application?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Marriage Application"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('marriage_scheme.destroy', ":model_id") }}";

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
