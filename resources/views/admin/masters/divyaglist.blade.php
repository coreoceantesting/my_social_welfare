<x-admin.layout>
    <x-slot name="title">Divyang List</x-slot>
    <x-slot name="heading">Divyang List</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Life certificate / हयातीचा दाखला</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <input class="form-control" id="user_id" name="user_id" value="{{ $users->id }}" type="hidden" placeholder="Enter User Name">

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">First Name/ पहिले नाव </label>
                                    <input class="form-control" id="name" name="fname" type="text" value="{{ $users->f_name }}" readonly placeholder="Enter User Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">मधले नाव </label>
                                    <input class="form-control" id="name" name="mname" type="text" value="{{ $users->m_name }}" readonly placeholder="Enter User Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Last Name / आडनाव </label>
                                    <input class="form-control" id="name" name="lname" type="text" value="{{ $users->l_name }}" readonly placeholder="Enter User Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Flat No./House No./ building No. /Company No/ Apartmen /फ्लॅट क्रमांक/घर क्रमांक/ इमारत क्रमांक/कंपनी क्रमांक/ अपार्टमेंट <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House No">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Area / Street / क्षेत्र / रस्ता</label>
                                    <input class="form-control" id="area" name="area" type="text" placeholder="Enter Area">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Landmark / महत्त्वाची खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="email"> Pincode / पिन कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="pincode" name="pincode" type="text" placeholder="Enter User Email">
                                    <span class="text-danger is-invalid email_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Town / City / शहर </label>
                                    <input class="form-control" id="city" name="city" type="text" value="Panvel" readonly>
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">State / राज्य </label>
                                    <input class="form-control" id="state" name="state" type="text" value="Maharashtra" readonly >
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">User Contact Number / वापरकर्ता संपर्क क्रमांक </label>
                                    <input class="form-control" id="contact" name="contact" type="number" min="0" value="{{ $users->mobile }}" readonly onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid mobile_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">Alternate Contact Number/ पर्यायी संपर्क क्रमांक </label>
                                    <input class="form-control" id="alternate_contact_no" name="alternate_contact_no" type="number" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid mobile_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text" value="" >
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text" value="" >
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" value="" >
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                        <label for="formFile" lass="col-form-label">Upload Signature / thumb <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="signature" id="signature">
                                    <span class="text-danger is-invalid signature_err"></span>
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

        {{-- upload certificate --}}

        <div class="row" id="uploadContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" action="POST" id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="upload_model_id" name="upload_model_id" value="">
                        <div class="card-header">
                            <h4 class="card-title">Upload Live Certificate</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-6 row">
                                <div class="col-md-4 mt-3">
                                    <label for="formFile" lass="col-form-label"> कृपया हस्ताक्षर केलेली हयातीचा दाखल अपलोड करा / Upload Signatured of live Certificate  <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="sign_uploaded_live_certificate" id="sign_uploaded_live_certificate">
                                <span class="text-danger is-invalid sign_uploaded_live_certificate_err"></span>
                            </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmitfile">Submit</button>
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
                            <h4 class="card-title">Edit Life certificate / हयातीचा दाखला</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                            <div class="mb-3 row">
                                {{-- <input class="form-control" id="user_id" name="user_id" value="{{ $users->id }}" type="hidden" placeholder="Enter User Name"> --}}

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">First Name/ पहिले नाव </label>
                                    <input class="form-control" id="name" name="fname" type="text" value="{{ $users->f_name }}" readonly placeholder="Enter User Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">मधले नाव </label>
                                    <input class="form-control" id="name" name="mname" type="text" value="{{ $users->m_name }}" readonly placeholder="Enter User Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Last Name / आडनाव </label>
                                    <input class="form-control" id="name" name="lname" type="text" value="{{ $users->l_name }}" readonly placeholder="Enter User Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Flat No./House No./ building No. /Company No/ Apartmen /फ्लॅट क्रमांक/घर क्रमांक/ इमारत क्रमांक/कंपनी क्रमांक/ अपार्टमेंट <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House No">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Area / Street / क्षेत्र / रस्ता</label>
                                    <input class="form-control" id="area" name="area" type="text" placeholder="Enter Area">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Landmark / महत्त्वाची खूण<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="email"> Pincode / पिन कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="pincode" name="pincode" type="text" placeholder="Enter User Email">
                                    <span class="text-danger is-invalid email_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Town / City / शहर </label>
                                    <input class="form-control" id="city" name="city" type="text" value="Panvel" readonly>
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">State / राज्य </label>
                                    <input class="form-control" id="state" name="state" type="text" value="Maharashtra" readonly >
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">User Contact Number / वापरकर्ता संपर्क क्रमांक </label>
                                    <input class="form-control" id="contact" name="contact" type="number" min="0" value="{{ $users->mobile }}" readonly onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid mobile_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">Alternate Contact Number/ पर्यायी संपर्क क्रमांक </label>
                                    <input class="form-control" id="alternate_contact_no" name="alternate_contact_no" type="number" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid mobile_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text" value="" >
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text" value="" >
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" value="" >
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                        <label for="formFile" lass="col-form-label">Upload Signature / thumb <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="signature" id="signature">
                                    <span class="text-danger is-invalid signature_err"></span>
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
                                        <th>Contact</th>
                                        <th>Category</th>
                                        <th>Age</th>
                                        <th>Bank Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users)
                                    @foreach ($hayat as $key=> $data)

                                        <tr>
                                            {{-- @foreach ($users as $key=> $data1) --}}
                                                <td>{{$users->f_name}} {{$users->m_name}} {{$users->l_name}}</td>
                                                <td>{{$users->contact}}</td>
                                                <td>{{$users->category}}</td>
                                                <td>{{$users->Age}}</td>
                                                <td>{{ $data->bank_name }}</td>

                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit live certificate" data-id="{{ $data->h_id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete live certificate" data-id="{{ $data->h_id }}"><i data-feather="trash-2"></i> </button>
                                                <button class="upload-element btn text-success px-2 py-1" title="Upload live certificate" data-id="{{ $data->h_id }}"><i data-feather="upload"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5">No records found.</td>
                                    </tr>
                                @endif
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
            url: '{{ route('hayatichaDakhlaform.store') }}',
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
                            window.location.href = '{{ route('hayatichaDakhlaform.index') }}';
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

    });
</script>

{{-- upload certificate --}}

<script>
    $("#buttons-datatables").on("click", ".upload-element", function(e) {


        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('hayatichaDakhlaform.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                //alert(data);
                uploadFormBehaviour();
                if (!data.error)
                {
                    $("#uploadForm input[name='upload_model_id']").val(data.hayatichaDakhlaform.h_id);

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


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('hayatichaDakhlaform.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                //alert(data);
                editFormBehaviour();
                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.hayatichaDakhlaform.h_id);
                    $("#editForm input[name='f_name']").val(data.hayatichaDakhlaform.f_name);
                    $("#editForm input[name='l_name']").val(data.hayatichaDakhlaform.l_name);
                    $("#editForm input[name='house_no']").val(data.hayatichaDakhlaform.house_no);
                    $("#editForm input[name='area']").val(data.hayatichaDakhlaform.area);
                    $("#editForm input[name='landmark']").val(data.hayatichaDakhlaform.landmark);
                    $("#editForm input[name='pincode']").val(data.hayatichaDakhlaform.pincode);
                    $("#editForm input[name='city']").val(data.hayatichaDakhlaform.city);
                    $("#editForm input[name='state']").val(data.hayatichaDakhlaform.state);
                    $("#editForm input[name='contact']").val(data.hayatichaDakhlaform.contact);
                    $("#editForm input[name='alternate_contact_no']").val(data.hayatichaDakhlaform.alternate_contact_no);
                    $("#editForm input[name='bank_name']").val(data.hayatichaDakhlaform.bank_name);
                    $("#editForm input[name='account_no']").val(data.hayatichaDakhlaform.account_no);
                    $("#editForm input[name='ifsc_code']").val(data.hayatichaDakhlaform.ifsc_code);
                    $("#editForm input[name='signature']").val(data.hayatichaDakhlaform.signature);

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
            var url = "{{ route('hayatichaDakhlaform.update', ":model_id") }}";
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
                                window.location.href = '{{ route('hayatichaDakhlaform.index') }}';
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

{{-- upload sign live certificare in databse  --}}

<script>
    $(document).ready(function() {
        $("#uploadForm").submit(function(e) {
            e.preventDefault();
            $("#addSubmitfile").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#upload_model_id').val();
            var url = "{{ route('hayatichaDakhlaform.upload', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#addSubmitfile").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('hayatichaDakhlaform.index') }}';
                            });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#addSubmitfile").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#addSubmitfile").prop('disabled', false);
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
            title: "Are you sure to delete this ?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('hayatichaDakhlaform.destroy', ":model_id") }}";

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
