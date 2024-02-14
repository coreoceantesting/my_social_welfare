<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="dark" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!--<link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">-->
    <link rel="shortcut icon" href="{{ asset('admin/images/users/PMC-logo.png') }}">
    <script src="{{ asset('admin/js/layout.js') }}"></script>
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    /* .card-title {
    font-size: 23px;
    color: #8c68cd;
    font-weight: bold;
    margin: 0 0 7px 0;
} */

.form-select {
    color: #212529;
}

.form-control {
    color: #212529;
}

.card-bg-fill{
    background-color: #fff;
}

label {
    color: #212529;
}
.form-control:focus {
    color: #000;
}



</style>
</head>

<body>




    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0 card-bg-fill border-0 card-border-effect-none">


                            <div class="row" id="addContainer" >
                                <div class="col-sm-12">
                                    <div class="card">
                                        <form class="theme-form" name="addRegiForm" id="addRegiForm" enctype="multipart/form-data">
                                            @csrf

                                            <div class="card-header" style="text-align: center;">
                                                <h1 style="color: #212529;">Register Account (खाते नोंदणी करा)</h1>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="name">First Name (प्रथम नाव)<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First Name">
                                                        <span class="text-danger is-invalid f_name_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Middle Name(मधले नाव) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name">
                                                        <span class="text-danger is-invalid m_name_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Last Name (आडनाव)<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name">
                                                        <span class="text-danger is-invalid l_name_err"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="name">Gender(लिंग) <span class="text-danger">*</span></label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Male
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Female
                                                            </label>
                                                        </div>
                                                        <span class="text-danger is-invalid gender_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Date Of Birth(जन्मतारीख) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="dob" name="dob" type="date" placeholder="Select Date Of Birth">
                                                        <span class="text-danger is-invalid dob_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Age(वय) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="Age" name="Age" type="text" placeholder="Enter Age">
                                                        <span class="text-danger is-invalid Age_err"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="mobile">Contact Number(संपर्क क्रमांक) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Enter Contact Number">
                                                        <span class="text-danger is-invalid mobile_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="name">Father First Name(वडिलांचे नाव) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="father_fname" name="father_fname" type="text" placeholder="Enter Father First Name">
                                                        <span class="text-danger is-invalid father_fname_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Father Middle Name(वडिलांचे मधले नाव) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="father_mname" name="father_mname" type="text" placeholder="Enter Father Middle Name">
                                                        <span class="text-danger is-invalid father_mname_err"></span>
                                                    </div>

                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Father Last Name(वडिलांचे आडनाव) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="father_lname" name="father_lname" type="text" placeholder="Enter Father Last Name">
                                                        <span class="text-danger is-invalid father_lname_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="name">Mother Name (आईचे नाव)<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="mother_name" name="mother_name" type="text" placeholder="Enter Mother Name">
                                                        <span class="text-danger is-invalid mother_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Category(श्रेणी) <span class="text-danger">*</span></label>
                                                        <select class="form-select mb-3" aria-label="Default select example" name="category" id="category">
                                                            <option value="">--Select Category--</option>
                                                            @foreach($category as $row)
                                                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                                            @endforeach
                                                            {{-- <option value="1">Divyang</option>
                                                            <option value="2">Senior Sitizen</option>
                                                            <option value="3">Below 18 Student</option>
                                                            <option value="3">Women</option> --}}

                                                        </select>
                                                        <span class="text-danger is-invalid category_err"></span>
                                                    </div>

                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Username(वापरकर्ता नाव) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter Username" >
                                                        <span class="text-danger is-invalid name_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="name"> Password (पासवर्ड) <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="password" name="password" type="password" placeholder="Enter PAssword">
                                                        <span class="text-danger is-invalid password_err"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="initial">Confirm Password (पासवर्डची पुष्टी करा)<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Enter Confirm Password">
                                                        <span class="text-danger is-invalid confirm_password_err"></span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="card-footer" style="text-align: center;">

                                              <button class="btn btn-primary w-50" type="submit" id="RegisterForm_submit">Sign Up</button>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
 <!-- JAVASCRIPT -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
 <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>
 <script src="{{ asset('admin/libs/feather-icons/feather.min.js') }}"></script>
 <script src="{{ asset('admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
 {{-- <script src="assets/js/plugins.js"></script> --}}
 <script src="{{ asset('admin/js/pages/password-addon.init.js') }}"></script>

 <!-- validation init -->


    <script>
        $("#addRegiForm").submit(function(e) {
           // alert('hii');
            e.preventDefault();
            $("#RegisterForm_submit").prop('disabled', true);

            var formdata = new FormData(this);

            $.ajax({
                url: '{{ route('signup') }}',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                if (!data.error && !data.error2) {
                        window.location.href = '{{ route('dashboard') }}';
                } else {
                    if (data.error2) {
                        swal("Error!", data.error2, "error");
                        $("#RegisterForm_submit").prop('disabled', false);
                    } else {
                        $("#RegisterForm_submit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(data.error);
                    }
                }
            },
            error: function(error) {
                $("#RegisterForm_submit").prop('disabled', false);
                swal("Error occured!", "Something went wrong please try again", "error");
            },
        });

        function resetErrors() {
            var form = document.getElementById('addRegiForm');
            var data = new FormData(form);
            for (var [key, value] of data) {
                console.log(key, value)
                $('.' + key + '_err').text('');
                $('#' + key).removeClass('is-invalid');
                $('#' + key).addClass('is-valid');
            }
        }

        function printErrMsg(msg) {
            $.each(msg, function(key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);
                $('#' + key).addClass('is-invalid');
            });
        }

    });
    </script>

<script>
    $(document).ready(function () {
        // Function to calculate and update age when Date of Birth changes
        $('#dob').on('change', function () {
           // alert('hii');
            var dob = $(this).val();
            if (dob) {
                var age = calculateAge(new Date(dob));
                $('#Age').val(age);
            }
        });

        // Function to calculate age based on Date of Birth
        function calculateAge(dob) {
            var today = new Date();
            var birthDate = new Date(dob);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }
    });


</script>


</body>


<!-- Mirrored from themesbrand.com/velzon/html/galaxy/auth-signup-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2024 09:25:39 GMT -->
</html>
