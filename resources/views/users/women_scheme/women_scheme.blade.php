<x-admin.layout>
    <x-slot name="title">Women Sewing/Beautisians Scheme Form</x-slot>
    <x-slot name="heading">Women Sewing/Beautisians Scheme Form</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Women Sewing/Beautisians Scheme Form </h4>
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
                                    <label class="col-form-label" for="ward_id">Ward Name:</label>
                                        <select class="js-example-basic-single" name="ward_id" >
                                            <option value="">--Select--</option>
                                            @foreach ($wards as $ward)
                                            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger is-invalid  ward_id_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="dob">4.  Date Of Birth/ वय </label>
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
                                    <label class="col-form-label" for="duration_of_residence">5.Duration of residence in Panvel Municipal Corporation area/ पनवेल महानगरपालिका क्षेत्रातील वास्तव्याचा कालावधी  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="duration_of_residence" name="duration_of_residence" type="text" placeholder="Enter Duration of residence">
                                    <span class="text-danger is-invalid duration_of_residence_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">6. Aadhar Card Number  / आधारकार्ड क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="adhaar_no" name="adhaar_no" type="text" placeholder="Enter Adhaar Number">
                                    <span class="text-danger is-invalid adhaar_no_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="details">7.Details if received training under the said scheme earlier / यापुर्वी सदर योजने अंतर्गत प्रशिक्षण घेतले असल्यास त्याचा तपशिल<span class="text-danger">*</span></label>
                                    <input class="form-control" id="details" name="details" type="text" placeholder="Enter Details if received training under the said scheme earlier">
                                    <span class="text-danger is-invalid details_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature / thumb /अर्जदाराची सही / अगंठा</label>
                                    <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid candidate_signature_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passport_size_photo">Passport Size Photo/अर्जदाराची फोटो</label>
                                    <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid passport_size_photo_err"></span>
                                </div>

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
                    <h4 class="card-title">Edit Women Sewing/Beautisians Form</h4>
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
                            <label class="col-form-label" for="ward_id">Ward Name:</label>
                                <select class="js-example-basic-single" name="ward_id" id="ward_id">

                                </select>
                                <span class="text-danger is-invalid  ward_id_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="dob">4.  Date Of Birth/ वय </label>
                            <input class="form-control" id="dob" name="dob" type="date"  placeholder="Enter Date Of Birth">
                            <span class="text-danger is-invalid dob_err"></span>
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
                            <label class="col-form-label" for="duration_of_residence">5.Duration of residence in Panvel Municipal Corporation area/ पनवेल महानगरपालिका क्षेत्रातील वास्तव्याचा कालावधी  <span class="text-danger">*</span></label>
                            <input class="form-control" id="duration_of_residence" name="duration_of_residence" type="text" placeholder="Enter Duration of residence">
                            <span class="text-danger is-invalid duration_of_residence_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="adhaar_no">6. Aadhar Card Number  / आधारकार्ड क्रमांक <span class="text-danger">*</span></label>
                            <input class="form-control" id="adhaar_no" name="adhaar_no" type="text" placeholder="Enter Adhaar Number">
                            <span class="text-danger is-invalid adhaar_no_err"></span>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="details">7.Details if received training under the said scheme earlier / यापुर्वी सदर योजने अंतर्गत प्रशिक्षण घेतले असल्यास त्याचा तपशिल<span class="text-danger">*</span></label>
                            <input class="form-control" id="details" name="details" type="text" placeholder="Enter Details if received training under the said scheme earlier">
                            <span class="text-danger is-invalid details_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="candidate_signature">Upload Signature / thumb /अर्जदाराची सही / अगंठा</label>
                            <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg">
                            <a class="btn btn-sm btn-primary" id="candidate_signature" target="_blank" href="" >View Document</a>
                            <span class="text-danger is-invalid candidate_signature_err"></span>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="col-form-label" for="passport_size_photo">Passport Size Photo/अर्जदाराची फोटो</label>
                            <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg">
                            <a class="btn btn-sm btn-primary" id="passport_size_photo" target="_blank" href="" >View Document</a>
                            <span class="text-danger is-invalid passport_size_photo_err"></span>
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
                                        <th>Application Number</th>
                                        <th>Name</th>
                                        <th>Full Address</th>
                                        <th>Contact</th>
                                        <th>Application Status</th>
                                        <th>Action</th>
                                        <th>Scheme Certificate</th>

                                        @if (!empty($women) && count($women) > 0)
        								@if($women[0]->dmc_status == 1)
                                        <th>Certificate</th>
        								@endif
        								 @endif
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($women as $row)

                                     <tr>
                                            <td>{{ $row->application_no }}</td>
                                            <td>{{ $row->full_name }}</td>
                                            <td>{{ $row->full_address }}</td>
                                            <td>{{ $row->contact }}</td>

                                            <td>
                                                @if($row->hod_status == 0)
                                                <button type="button" class="btn btn-primary waves-effect m-r-20">Pending</button>
                                                @elseif($row->hod_status == 1)
                                                <button type="button" class="btn btn-success waves-effect m-r-20">Approved</button>
                                                @elseif($row->hod_status == 2)
                                                <button type="button" class="btn btn-danger waves-effect m-r-20">Rejected</button>
                                                @endif
                                              </td>


                                            <td>
                                                @if($row->hod_status == '0' && $row->ac_status == '0' && $row->amc_status == '0' && $row->dmc_status == '0')
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @elseif($row->hod_status == '2' || $row->ac_status == '2'|| $row->amc_status == '2' || $row->dmc_status == '2')
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit category" data-id="{{ $row->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete category" data-id="{{ $row->id }}"><i data-feather="trash-2"></i> </button>
                                                @endif

                                                <a href="{{ url('women_view/'.$row->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"> <i class="fas fa-eye"></i></a>
                                            </td>

                                                <td>  <a href="{{ url('women_scheme_certificate_view') }}" class="btn btn-primary shadow btn-xs sharp me-1"> <i class="fas fa-eye"></i></a> </td>

                                            @if($row->dmc_status == 1)
                                            <td><a href="{{ url('women_certificate/'.$row->id) }}" class="btn btn-primary shadow btn-xs sharp me-1">Generate Certificate</a></td>
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


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('women_scheme.store') }}',
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
                            window.location.href = '{{ route('women_scheme.index') }}';
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


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('women_scheme.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.women_scheme.id);
                    $("#editForm input[name='full_name']").val(data.women_scheme.full_name);
                    $("#editForm input[name='full_address']").val(data.women_scheme.full_address);
                    $("#ward_id").html(data.wardHtml);
                    $("#editForm input[name='dob']").val(data.women_scheme.dob);
                    $("#editForm input[name='age']").val(data.women_scheme.age);
                    $("#editForm input[name='contact']").val(data.women_scheme.contact);
                    $("#editForm input[name='duration_of_residence']").val(data.women_scheme.duration_of_residence);
                    $("#editForm input[name='adhaar_no']").val(data.women_scheme.adhaar_no);
                    $("#editForm input[name='details']").val(data.women_scheme.details);

                    if (data.documents && data.documents.length > 0) {
                        $("#yourDocumentsContainer").empty();
                    var documentsHtml = '';

                    $.each(data.documents, function(index, document) {
                        var documentUrl = "{{ asset('women_scheme_file/') }}/" + document.document_file;
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
            var url = "{{ route('women_scheme.update', ":model_id") }}";
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
                                window.location.href = '{{ route('women_scheme.index') }}';
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
            title: "Are you sure to delete this Women Scheme?",

            icon: "info",
            buttons: ["Cancel", "Women Scheme"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('women_scheme.destroy', ":model_id") }}";

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

