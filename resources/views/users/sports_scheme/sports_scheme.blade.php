<x-admin.layout>
    <x-slot name="title">Sports Scheme Form</x-slot>
    <x-slot name="heading">Sports Scheme Form</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" >
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
                                    <label class="col-form-label" for="name">Full Name/संपूर्ण नाव <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text"  name="full_name"  value="" placeholder="Enter Full Name ">
                                    <span class="text-danger is-invalid full_name_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">Full Address / संपूर्ण पत्ता<span class="text-danger">*</span></label>
                                    <input class="form-control"   type="text" name="full_address" value=""  placeholder="Enter Full Address">
                                    <span class="text-danger is-invalid full_address_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="dob">Date Of Birth/जन्म तारीख <span class="text-danger">*</span></label>
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
                                    <label class="col-form-label" for="school_name">Name of School / College/पमपा क्षेत्रातील शाळेचे / कॉलेजचे नांव : <span class="text-danger">*</span></label>
                                    <input class="form-control" id="school_name" name="school_name" type="text" placeholder="Enter School Name">
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
                                        <select class="form-control" name="financial_help" id="financial_help">
                                            <option value="">--Select--</option>
                                            <option value="personal">Personal/वैयक्तिक</option>
                                          <option value="relational">Relational/सांघिक</option>
                                        </select>
                                        <span class="text-danger is-invalid  financial_help_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature / thumb /अर्जदाराची सही / अगंठा<span class="text-danger">*</span></label>
                                    <input class="form-control" id="candidate_signature" name="candidate_signature" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid candidate_signature_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passport_size_photo">Passport Size Photo/अर्जदाराची फोटो<span class="text-danger">*</span></label>
                                    <input class="form-control" id="passport_size_photo" name="passport_size_photo" type="file" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid passport_size_photo_err"></span>
                                </div>

                                @foreach ($document as $doc)
                                    <div class="col-md-4 mt-3">
                                            <label class="col-form-label" for="document_name">{{$doc->document_name}} @if($doc->is_required==1) <span class="text-danger">*</span> @endif</label>
                                            <input type="hidden" name="document_id[]" class="form-control" value="{{$doc->id}}">
                                            <input type="file" name="document_file[]" class="form-control" @if($doc->is_required==1) required @endif multiple>
                                            <span class="text-danger is-invalid document_file_err"></span>
                                    </div>
                                @endforeach

                                <div class="player-details" style="display: none">
                                    <h3 class="text-center mt-5"><Strong>Add Players Detail</Strong></h3>
                                    <div class="add-players-details mt-5">
                                        <div class="row">
                                            <div class="col-md-4 mt-3">
                                                <label for="player_name">Player Name / खेळाडूचे नाव: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="player_name[]" id="player_name" placeholder="Enter Player Name">
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="player_mobile_no">Player Contact No / संपर्क क्र : <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="player_mobile_no[]" id="player_mobile_no" placeholder="Enter Player Contact No">
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="player_name">Player Aadhar No / आधार क्र: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="player_aadhar_no[]" id="player_aadhar_no" placeholder="Enter Player Aadhar No">
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="player_name">Player Signature /स्वाक्षरी: <span class="text-danger">*</span></label>
                                                <input class="form-control" id="player_signature" name="player_signature[]" type="file" accept=".png, .jpg, .jpeg">
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="player_name">Player Photo / प्लेअर फोटो: <span class="text-danger">*</span></label>
                                                <input class="form-control" id="player_photo" name="player_photo[]" type="file" accept=".png, .jpg, .jpeg">
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="player_name">Player Aadhar Card / आधार कार्ड: <span class="text-danger">*</span></label>
                                                <input class="form-control" id="player_aadhar_photo" name="player_aadhar_photo[]" type="file" accept=".png, .jpg, .jpeg">
                                            </div>
                                            <hr class="mt-3">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" id="addPlayer">Add Player</button>
                                    <button type="button" class="btn btn-danger mt-2" id="removePlayer" style="display:none;">Remove Player</button>
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



</x-admin.layout>

<script>
    function calculateAge() {
        var dob = new Date(document.getElementById('dob').value);
        var today = new Date();
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        document.getElementById('age').value = age;
    }
</script>

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
                            window.location.href = '{{ route('sports_scheme.application') }}';
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


