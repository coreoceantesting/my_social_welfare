<x-admin.layout>
    <x-slot name="title">Life certificate / हयातीचा दाखला</x-slot>
    <x-slot name="heading">Life certificate / हयातीचा दाखला</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


    <!-- Add Form Start -->
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addHayatichaform" id="addHayatichaform">
                    @csrf
                    <div class="card-header pb-0" style="text-align: center;">
                        <h4>Life certificate / हयातीचा दाखला </h4>
                    </div>
                    <div class="card-body pt-0">

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
                        <button type="submit" class="btn btn-primary" id="addSubmit">Save & Download</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





</x-admin.layout>



<script>
    $("#addHayatichaform").submit(function(e) {

        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('hayatichaDakhlaform.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('hayatichaDakhlaform.pdf-download') }}';

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
            var form = document.getElementById('changePasswordForm');
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


<!-- Open Change Password Modal-->


<!-- Update User Password -->
