
<x-admin.layout>
    <x-slot name="title">Sports Scheme Form</x-slot>
    <x-slot name="heading">Sports Scheme Form</x-slot>
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
                            <label class="col-form-label" for="dob">Date Of Birth/ जन्म तारीख <span class="text-danger">*</span></label>
                            <input class="form-control" id="dob" name="dob" type="date"  onchange="calculateAge()" placeholder="Enter Date Of Birth">
                            <span class="text-danger is-invalid dob_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="Age"> Age/ वय </label>
                            <input class="form-control" id="age" name="age" type="text"  placeholder="Enter Age">
                            <span class="text-danger is-invalid age_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.:<span class="text-danger">*</span></label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="email"> Email/ ई मेल:<span class="text-danger">*</span></label>
                            <input class="form-control" id="email" name="email"  type="text"  placeholder="Enter Email" >
                            <span class="text-danger is-invalid email_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="school_name">Name of School / College in Pampa Area/पमपा क्षेत्रातील शाळेचे / कॉलेजचे नांव : <span class="text-danger">*</span></label>
                            <input class="form-control" id="school_name" name="school_name" type="text" placeholder="Enter Ward Name">
                            <span class="text-danger is-invalid school_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="school_certificate">Consent letter from school/college?/ शाळा / महाविद्यालयाचे  संमतीपत्रक आहे ? :<span class="text-danger">*</span></label>
                                <select class="form-control" name="school_certificate" id="school_certificate">
                                    <option value="">--Select--</option>
                                    <option value="yes">Yes / हो</option>
                                  <option value="no">No / नाही</option>
                                </select>
                                <span class="text-danger is-invalid  school_certificate_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="state_or_national_certificate">Photocopy of Certificate of Specialization in State Level / National Level ?/ राज्यस्तर / राष्ट्रीयस्तर यामध्ये विशेष प्राविण्य  मिळवल्याचे प्रमाणपत्राची  छायांकित प्रत आहे ? :<span class="text-danger">*</span></label>
                                <select class="form-control" name="state_or_national_certificate" id="state_or_national_certificate">
                                    <option value="">--Select--</option>
                                    <option value="yes">Yes / हो</option>
                                  <option value="no">No / नाही</option>
                                </select>
                                <span class="text-danger is-invalid  state_or_national_certificate_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="recommendation_letter">Have a letter of recommendation from a councillor? / नगरसेवकांचे शिफारस पत्र आहे?:<span class="text-danger">*</span></label>
                                <select class="form-control" name="recommendation_letter" id="recommendation_letter">
                                    <option value="">--Select--</option>
                                    <option value="yes">Yes / हो</option>
                                  <option value="no">No / नाही</option>
                                </select>
                                <span class="text-danger is-invalid  recommendation_letter_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="financial_help">financial help/ आर्थिक मदत :<span class="text-danger">*</span></label>
                                <select class="form-control" name="financial_help" id='financial_help'>
                                    <option value="">--Select--</option>
                                    <option value="personal">Personal/वैयक्तिक</option>
                                  <option value="relational">Relational/सांघिक</option>
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
                    </div>
                    <div class="mb-3 row" id="yourDocumentsContainer">

                    </div>

                    <div class="player-details" style="display: none">
                        <h3 class="text-center mt-5"><Strong>Add Players Detail</Strong></h3>
                        <div class="add-players-details mt-5">

                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addPlayer">Add Player</button>
                        <button type="button" class="btn btn-danger mt-2" id="removePlayer" style="display:none;">Remove Player</button>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="editSubmit">Submit</button>
                    <a href="{{ route('sports_scheme.application') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
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
                                        @if (!empty($sports) && count($sports) > 0)
                                        @if($sports[0]->hod_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($sports[0]->ac_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($sports[0]->amc_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @elseif($sports[0]->dmc_status == 2)
                                            <th>Reasons for Rejection</th>
                                        @endif
                                    @endif
                                        <th>Action</th>
                                        {{-- @if (!empty($sports) && count($sports) > 0)
        								@if($sports[0]->dmc_status == 1)
                                        <th>Certificate</th>
        								@endif
        								 @endif --}}
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($sports as $row)


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
                                                <button class="edit-element btn btn-success btn-sm text-white px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-white btn-danger btn-sm rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @elseif($row->hod_status == 2 || $row->ac_status == 2|| $row->amc_status == 2 || $row->dmc_status == 2)
                                                <button class="edit-element btn btn-success btn-sm text-white px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-white btn-danger btn-sm rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @endif

                                                <a href="{{ url('sports_scheme_certificate_view/'.$row->id) }}" class="btn btn-primary shadow btn-sm sharp me-1"> <i class="fas fa-eye"></i></a>
                                            </td>

                                            {{-- @if($row->dmc_status == 1)
                                            <td><a href="{{ url('sports_certificate/'.$row->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">Generate Certificate</a></td>
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
                    $("#editForm input[name='full_name']").val(data.sports_scheme.full_name);
                    $("#editForm input[name='full_address']").val(data.sports_scheme.full_address);
                    $("#editForm input[name='dob']").val(data.sports_scheme.dob);
                    $("#editForm input[name='age']").val(data.sports_scheme.age);
                    $("#editForm input[name='contact']").val(data.sports_scheme.contact);
                    $("#editForm input[name='school_name']").val(data.sports_scheme.school_name);
                    $("#editForm input[name='email']").val(data.sports_scheme.email);
                    $("#editForm select[name='financial_help']").val(data.sports_scheme.financial_help).trigger('change');
                    $("#editForm select[name='financial_help']").val();
                    $("#editForm select[name='recommendation_letter']").val(data.sports_scheme.recommendation_letter);
                    $("#editForm select[name='state_or_national_certificate']").val(data.sports_scheme.state_or_national_certificate);
                    $("#editForm select[name='school_certificate']").val(data.sports_scheme.school_certificate);

                    $("#editForm a#candidate_signature").attr('href', "{{ asset('storage/') }}/" + data.sports_scheme.candidate_signature);
                    $("#editForm a#passport_size_photo").attr('href', "{{ asset('storage/') }}/" + data.sports_scheme.passport_size_photo);

                    if (data.documents && data.documents.length > 0) {
                        $("#yourDocumentsContainer").empty();
                    var documentsHtml = '';

                    $.each(data.documents, function(index, document) {
                        var documentUrl = "{{ asset('sports_scheme_file/') }}/" + document.document_file;
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

                    // player details
                    if(data.sports_scheme.financial_help == 'relational')
                    {
                        $('.player-details').css('display','block');
                        $(".add-players-details").append(data.player_details_html);
                    }
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
                                window.location.href = '{{ route('sports_scheme.application') }}';
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


{{-- add more player details --}}
<script>
    $(document).ready(function () {
        // Show/hide player details based on the selected option
        $("#financial_help").change(function () {
            if ($(this).val() === "relational") {
                $(".player-details").show();
            } else {
                $(".player-details").hide();
            }
        });

        // Add player details fields dynamically
        $("#addPlayer").click(function () {
            var clonedRow = $(".add-players-details .row:first").clone();
            clonedRow.find("input").val(""); // Clear input fields in the cloned row
            clonedRow.find(".documents").css('display', 'none');
            clonedRow.appendTo(".add-players-details");
            $("#removePlayer").show();
        });

        // Remove player details fields
        $("#removePlayer").click(function () {
            if ($(".add-players-details .row").length > 1) {
                $(".add-players-details .row:last").remove();
            }
            if ($(".add-players-details .row").length === 1) {
                $("#removePlayer").hide();
            }
        });
    });
</script>