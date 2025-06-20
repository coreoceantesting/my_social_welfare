<x-admin.layout>
    <x-slot name="title">Bus Concession Scheme Application</x-slot>
    <x-slot name="heading">Bus Concession Scheme Application</x-slot>

    <style>
        .error {
          color: red;
        }
      </style>
        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Bus Concession Scheme Application </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">First Name/पहिले नाव<span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text"  name="f_name"  value="{{ $data->f_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Middle Name/मधले नाव<span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text"  name="m_name"  value="{{ $data->m_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Last Name/आडनाव<span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text"  name="l_name"  value="{{ $data->l_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"  type="text"  name="full_address" value="{{ $data->full_address }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="dob"> Date Of Birth/ जन्म तारीख  </label>
                                    <input class="form-control"  type="text"  name="dob" value="{{ $data->dob }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age"> Age/ वय </label>
                                    <input class="form-control"  type="text"  name="age" value="{{ $data->age }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact"> Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control"  type="text" name="contact"  value="{{ $data->contact }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="class_name">Class (Name of current class)/इयत्ता (सद्या शिकत असलेला वर्ग व शाळा कॉलेजचे नाव ):</label>
                                    <input class="form-control"  name="class_name"  type="text" value="{{ $data->class_name }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">Aadhaar Card Number / आधारकार्ड नंबर : <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" name="adhaar_no" value="{{ $data->adhaar_no }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="school_name">Class (Name of school college)/इयत्ता (सद्या शिकत असलेला वर्ग व शाळा कॉलेजचे नाव ) <span class="text-danger">*</span></label>
                                    <input class="form-control"  name="school_name" type="text" value="{{ $data->school_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="type_of_discount">type of discount/सवलतीचा प्रकार <span class="text-danger">*</span></label>
                                    <input class="form-control"  name="type_of_discount" type="text" value="{{ $data->type_of_discount }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="candidate_signature">Upload Signature (अर्जदाराची सही) / thumb (अगंठा) <span class="text-danger">*</span></label>
                                    <br><a class="btn btn-sm btn-primary" id="candidate_signature" target="_blank" href="{{ asset('storage/'.$data->candidate_signature) }}" >View Document</a>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="passport_size_photo">Passport Size Photo (अर्जदाराची फोटो) <span class="text-danger">*</span></label>
                                    <br><a class="btn btn-sm btn-primary" id="passport_size_photo" target="_blank" href="{{ asset('storage/'.$data->passport_size_photo) }}" >View Document</a>
                                </div>

                                @foreach ($document as $doc)
                                <div class="col-md-4 mt-3">
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}}</label><br>
                                        <a href="{{ asset('bus_concession_file/'.$doc->document_file) }}" class="btn btn-sm btn-primary"  target="_blank" >View Document</a>
                                </div>
                            @endforeach

                            </div>
                        </div>


                        <div class="card-footer">

                            <?php if($data->dmc_status == 0){ ?>
                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('dmc_bus_concession_application_list/0') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>&nbsp;&nbsp;

                                        <button type="button" class="btn btn-success waves-effect m-r-20" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</button>

                                    </div>
                                </div>
                            <?php } elseif($data->dmc_status == 1){ ?>
                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('dmc_bus_concession_application_list/1') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                                    </div>
                                </div>
                            <?php } elseif($data->dmc_status == 2){ ?>
                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('dmc_bus_concession_application_list/2') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>
                            <?php }?>


                        </div>
                    </form>
                </div>
            </div>
        </div>

          {{-- Approve modal --}}

          <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title text-danger" id="largeModalLabel">Approve By DMC</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('bus_concession_application_approve_by_dmc', $data->id ) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control " id="application_no" name="application_no" value="{{ $data->application_no }}" >
                          <input type="hidden" class="form-control " id="contact" name="contact" value="{{ $data->contact }}" >
                        <div class="form-group row">

                            <label class="col-sm-4"><strong>Upload DMC Signature / <br>( विभाग प्रमुख स्वाक्षरी अपलोड करा ) : <span style="color:red;">*</span> </strong></label>
                            <div class="col-sm-8 col-md-8 p-2">
                                <input type="file" name="dmc_sign" id="dmc_sign" class="form-control" value="{{ old('dmc_sign') }}" accept=".jpg, .jpeg, .png" required>
                                {{-- <small class="text-secondary text-justify "> Note : The file should be less than 2MB .</small> --}}
                                {{-- <br> --}}
                                <small class="text-secondary text-justify "> Note : Only files in .jpg, .jpeg, .png format can be uploaded .</small>
                                <br>
                            </div>
                        </div>

                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Remark/शेरा</label>
                                <div class="col-sm-10">
                                    <textarea name="remark" class="form-control" id="remark" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        <div class="form-group row mt-4">
                            <label class="col-md-3"></label>
                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                <a href='{{ url("dmc_bus_concession_application_view/{$data->id}/{$data->dmc_status}") }}'><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

      {{-- Reject Modal --}}

        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title text-danger" id="largeModalLabel">Reject By DMC</h4>
                    </div>
                    <div class="modal-body">
                        <form id="rejectForm" method="POST" action="{{ url('bus_concession_application_reject_by_dmc', $data->id ) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control " id="application_no" name="application_no" value="{{ $data->application_no }}" >
                              <input type="hidden" class="form-control " id="contact" name="contact" value="{{ $data->contact }}" >
                            <div class="form-group row">
                                <label class="col-sm-4"><strong>नकाराचे कारण / <br>  Reason for Rejection  :  <span style="color:red;">*</span></strong></label>
                                <div class="col-sm-8 col-md-8 p-2">
                                    <textarea  class="form-control" name ="dmc_reject_reason" id="dmc_reject_reason" value="" style="height:120px;"></textarea>
                                    <span id="reason-error" class="error"></span>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label class="col-md-3"></label>
                                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                    <a href='{{ url("dmc_bus_concession_application_view/{$data->id}/{$data->dmc_status}") }}'><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



</x-admin.layout>

<script>
    function validateForm() {
        var reason = document.getElementById("dmc_reject_reason").value;
        var errorMessage = document.getElementById("reason-error");

        if (reason.trim() === "") {
            errorMessage.textContent = "Please provide a rejection reason.";
            return false; // Prevent form submission
        }

        // Clear any previous error message
        errorMessage.textContent = "";
        return true; // Allow form submission
    }

    // Attach validation function to form submission
    document.getElementById("rejectForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
</script>




