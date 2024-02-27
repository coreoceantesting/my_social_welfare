<x-admin.layout>
    <x-slot name="title">Bus Concession Form</x-slot>
    <x-slot name="heading">Bus Concession Form (बस सवलत फॉर्म)</x-slot>

{{-- Edit Form --}}
<div class="row" id="editContainer" style="display:none;">
    <div class="col">
        <form class="form-horizontal form-bordered" method="post" id="editForm">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Bus Concession Form (बस सवलत फॉर्म संपादित करा)</h4>
                </div>
                <div class="card-body py-2">
                    <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                    <div class="mb-3 row">
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="name">Full Name (संपूर्ण नाव) <span class="text-danger">*</span></label>
                            <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                            <span class="text-danger is-invalid full_name_err"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="full_address">Full Address (संपूर्ण पत्ता) <span class="text-danger">*</span></label>
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
                            <label class="col-form-label" for="contact">Mobile No (मोबाईल क्र) <span class="text-danger">*</span></label>
                            <input class="form-control" id="contact" name="contact"  type="number"  placeholder="Enter Mobile No" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            <span class="text-danger is-invalid contact_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_no">Aadhar Card Number (आधारकार्ड क्रमांक) <span class="text-danger">*</span></label>
                            <input class="form-control" id="adhaar_no" name="adhaar_no" type="text" placeholder="Enter Adhaar Number">
                            <span class="text-danger is-invalid adhaar_no_err"></span>
                        </div>



                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="class_name"> Name of current class(सध्या शिकत असलेल्या वर्गाचे नाव) <span class="text-danger">*</span></label>
                            <input class="form-control" id="class_name" name="class_name" type="text" placeholder="Enter Class Name">
                            <span class="text-danger is-invalid class_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="school_name"> Name of school college (सध्या शिकत असलेल्या शाळा/कॉलेजचे नाव)<span class="text-danger">*</span></label>
                            <input class="form-control" id="school_name" name="school_name" type="text" placeholder="Enter School/College name">
                            <span class="text-danger is-invalid school_name_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="type_of_discount">type of discount (सवलतीचा प्रकार) : <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single" name="type_of_discount" >
                                    <option value="">--Select--</option>
                                    <option value="daily_commute">daily commute/ दैनंदिन </option>
                                  <option value="mothly_pass">monthly pass/मासिक पास</option>
                                </select>
                                <span class="text-danger is-invalid  type_of_discount_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="candidate_signature">Upload Signature (अर्जदाराची सही) / thumb (अगंठा) <span class="text-danger">*</span></label>
                            <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg"><br>
                            <a class="btn btn-sm btn-primary" id="candidate_signature" target="_blank" href="" >View Document</a>
                            <span class="text-danger is-invalid candidate_signature_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="passport_size_photo">Passport Size Photo (अर्जदाराची फोटो) <span class="text-danger">*</span></label>
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
                    <a href="{{ route('bus.concession.application') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
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
                                        @if (!empty($bus_concession) && count($bus_concession) > 0)
                                            @if($bus_concession[0]->hod_status == 2)
                                                <th>Reasons for Rejection</th>
                                            @elseif($bus_concession[0]->ac_status == 2)
                                                <th>Reasons for Rejection</th>
                                            @elseif($bus_concession[0]->amc_status == 2)
                                                <th>Reasons for Rejection</th>
                                            @elseif($bus_concession[0]->dmc_status == 2)
                                                <th>Reasons for Rejection</th>
                                            @endif
                                        @endif

                                        <th>Action</th>
                                        @if (!empty($bus_concession) && count($bus_concession) > 0)
        								@if($bus_concession[0]->dmc_status == 1)
                                        <th>Certificate</th>
        								@endif
        								 @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bus_concession as $value)
                                     <tr>
                                            <td>{{ $serialNumber++ }}</td>
                                            <td>{{ $value->application_no }}</td>
                                            <td>{{ $value->full_name }}</td>
                                            <td>{{ $value->full_address }}</td>
                                            <td>{{ $value->contact }}</td>

                                            <td>
                                                @if($value->hod_status == 0 && $value->ac_status == 0 && $value->amc_status == 0 && $value->dmc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Pending</button>
                                                @elseif($value->hod_status == 1 && $value->ac_status == 0 && $value->amc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Review</button>
                                                @elseif($value->hod_status == 1 && $value->ac_status == 1 && $value->amc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Review</button>
                                                @elseif($value->hod_status == 1 && $value->ac_status == 1 && $value->amc_status == 1 && $value->dmc_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Review</button>
                                                @elseif($value->hod_status == 1 && $value->ac_status == 1 && $value->amc_status == 1 && $value->dmc_status == 1)
                                                <button type="button" class="btn btn-success waves-effect m-r-20">Approved</button>
                                                @elseif($value->hod_status == 2 || $value->ac_status == 2|| $value->amc_status == 2 || $value->dmc_status == 2)
                                                <button type="button" class="btn btn-danger waves-effect m-r-20">Rejected</button>
                                                @endif
                                              </td>


                                              @if($value->hod_status == 2)
        								      <td>{{ $value->hod_reject_reason }}</td>
        								    @elseif($value->ac_status == 2)
        								      <td>{{ $value->ac_reject_reason }}</td>
        								    @elseif($value->amc_status == 2)
        								      <td>{{ $value->amc_reject_reason }}</td>
                                            @elseif($value->dmc_status == 2)
        								      <td>{{ $value->dmc_reject_reason }}</td>
        								    @endif
                                            <td>
                                                @if($value->hod_status == 0 && $value->ac_status == 0 && $value->amc_status == 0 && $value->dmc_status == 0)
                                                <button class="edit-element btn btn-primary text-white px-2 py-1" title="Edit category" data-id="{{ $value->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-white btn-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $value->id }}"><i data-feather="trash-2"></i> </button>
                                                @elseif($value->hod_status == 2 || $value->ac_status == 2|| $value->amc_status == 2 || $value->dmc_status == 2)
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit category" data-id="{{ $value->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $value->id }}"><i data-feather="trash-2"></i> </button>
                                                @endif
                                                <a href="{{ url('bus_concession_certificate_view/'.$value->id) }}" class="btn btn-info shadow btn-xs sharp me-1 px-2 py-1"> <i class="fas fa-eye"></i></a>
                                            </td>


                                            @if($value->dmc_status == 1)
                                            <td><a href="{{ url('bus_concession_certificate/'.$value->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">Generate Certificate</a></td>
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
        var url = "{{ route('bus_concession.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.bus_concession.id);
                    $("#editForm input[name='full_name']").val(data.bus_concession.full_name);
                    $("#editForm input[name='full_address']").val(data.bus_concession.full_address);
                    $("#editForm input[name='dob']").val(data.bus_concession.dob);
                    $("#editForm input[name='age']").val(data.bus_concession.age);
                    $("#editForm input[name='contact']").val(data.bus_concession.contact);
                    $("#editForm input[name='adhaar_no']").val(data.bus_concession.adhaar_no);
                    $("#editForm input[name='class_name']").val(data.bus_concession.class_name);
                    $("#editForm input[name='school_name']").val(data.bus_concession.school_name);
                    $("#editForm select[name='type_of_discount']").val(data.bus_concession.type_of_discount).trigger('change');
                    $("#editForm select[name='type_of_discount']").val();
                    $("#editForm a#candidate_signature").attr('href', "{{ asset('storage/') }}/" + data.bus_concession.candidate_signature);
                    $("#editForm a#passport_size_photo").attr('href', "{{ asset('storage/') }}/" + data.bus_concession.passport_size_photo);

                    if (data.documents && data.documents.length > 0) {
                        $("#yourDocumentsContainer").empty();
                    var documentsHtml = '';

                    $.each(data.documents, function(index, document) {
                        var documentUrl = "{{ asset('bus_concession_file/') }}/" + document.document_file;
                        var documentName = document.document ? document.document.document_name : '';
                        documentsHtml += '<div class="col-md-4 mt-3">';
                        documentsHtml += '<label class="col-form-label" for="document_name">' + documentName;
                        if (document.is_required == 1) {
                            documentsHtml += ' <span class="text-danger">*</span>';
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
            var url = "{{ route('bus_concession.update', ":model_id") }}";
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
                                window.location.href = '{{ route('bus.concession.application') }}';
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
            title: "Are you sure to delete this Bus Concession?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Delete"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('bus_concession.destroy', ":model_id") }}";

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

