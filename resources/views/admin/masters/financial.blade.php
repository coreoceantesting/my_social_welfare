<x-admin.layout>
    <x-slot name="title">Financial Year</x-slot>
    <x-slot name="heading">Financial Year (आर्थिक वर्ष)</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Financial Year (आर्थिक वर्ष जोडा)</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="category_name">Title (शीर्षक)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="title" name="title" type="text" placeholder="Enter Title">
                                    <span class="text-danger is-invalid title_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_date">From Date (या तारखेपासून)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="from_date" name="from_date" type="date" placeholder="Enter Title">
                                    <span class="text-danger is-invalid  from_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_date">To Date (आजपर्यंत)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="to_date" name="to_date" type="date" placeholder="Enter Title">
                                    <span class="text-danger is-invalid to_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label"for="checkbox-switch-1">Active (सक्रिय)<span class="text-danger">*</span></label>
                                    <input  id="checkbox-switch-1" name="is_active" class="form-check-input" type="checkbox" style="font-size:20px; border:solid 1px;  border-color:#91C714; ">
                                    {{-- <span class="text-danger is-invalid is_active_err"></span> --}}
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
                            <h4 class="card-title">Edit Financial Year (आर्थिक वर्ष संपादित करा)</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="category_name">Title (शीर्षक)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="title" name="title" type="text" placeholder="Enter Title">
                                    <span class="text-danger is-invalid title_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="from_date">From Date (या तारखेपासून)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="from_date" name="from_date" type="date" placeholder="Enter Title">
                                    <span class="text-danger is-invalid  from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="to_date">To Date (आजपर्यंत)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="to_date" name="to_date" type="date" placeholder="Enter Title">
                                    <span class="text-danger is-invalid to_date_err"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="col-form-label"for="checkbox-switch-1">Active (सक्रिय)<span class="text-danger">*</span></label>
                                    <input  id="checkbox-switch-1" name="is_active" class="form-check-input" type="checkbox" style="font-size:20px; border:solid 1px;  border-color:#91C714; ">
                                    {{-- <span class="text-danger is-invalid is_active_err"></span> --}}
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
                    @php
                        $num = 1;
                    @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Year</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($financial as $financials)

                                    @php
                                        $status = "";
                                    @endphp

                                    @if($financials->is_active==1)
                                        @php
                                            $status = "Active";
                                        @endphp
                                    @elseif($financials->is_active==0)
                                        @php
                                            $status = "Inactive";
                                        @endphp
                                    @endif
                                        <tr>
                                            <td>{{ $num++ }}</td>
                                            <td>{{$financials->title}}</td>
                                            <td>{{$financials->from_date}}</td>
                                            <td>{{$financials->to_date}}</td>
                                            <td>{{ $status }}</td>
                                            <td>
                                                <button class="edit-element btn btn-primary text-white px-2 py-1" title="Edit financial year" data-id="{{ $financials->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-danger text-white rem-element px-2 py-1" title="Delete financial year" data-id="{{ $financials->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
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
            url: '{{ route('financial.store') }}',
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
                            window.location.href = '{{ route('financial.index') }}';
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
        var url = "{{ route('financial.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.financial.id);
                    $("#editForm input[name='title']").val(data.financial.title);
                    $("#editForm input[name='from_date']").val(data.financial.from_date);
                    $("#editForm input[name='to_date']").val(data.financial.to_date);
                   $("#editForm input[name='is_active']").prop('checked', data.financial.is_active == 1);

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
            var url = "{{ route('financial.update', ":model_id") }}";
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
                                window.location.href = '{{ route('financial.index') }}';
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
            title: "Are you sure to delete this Financial Year?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('financial.destroy', ":model_id") }}";

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
