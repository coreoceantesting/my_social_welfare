<x-admin.layout>
    <x-slot name="title">Sports Scheme Application</x-slot>
    <x-slot name="heading">Sports Scheme Application</x-slot>
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
                            <h4 class="card-title">Sports Scheme Application </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Full Name/संपूर्ण नाव</label>
                                    <input class="form-control"  type="text"  name="full_name"  value="{{ $data->full_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"  type="text"  name="full_address" value="{{ $data->full_address }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                   <label class="col-form-label" for="dob">Date Of Birth/ जन्म तारीख  </label>
                                    <input class="form-control"  type="text"  name="dob" value="{{ $data->dob }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age">Age/ वय </label>
                                    <input class="form-control"  type="text"  name="age" value="{{ $data->age }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact">Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control"  type="text" name="contact"  value="{{ $data->contact }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="email">Email/ ई मेल:</label>
                                    <input class="form-control"  name="email"  type="text" value="{{ $data->email }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="school_name">Name of School / College in Pampa Area/पमपा क्षेत्रातील शाळेचे / कॉलेजचे नांव : <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" name="school_name" value="{{ $data->school_name }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="financial_help">financial help/ आर्थिक मदत:<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="financial_help" type="text" value="{{ $data->financial_help }}" readonly>
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
                                        <a href="{{ asset('sports_scheme_file/'.$doc->document_file) }}" class="btn btn-sm btn-primary"  target="_blank" >View Document</a>
                                </div>
                                @endforeach

                            </div>

                            <hr>
                            <br>
                            @if(!empty($player_details))
                                <h4 class="text-center">Player Details</h4>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered nowrap align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Aadhar No</th>
                                                <th>Photo</th>
                                                <th>Aadhar Card</th>
                                                <th>Signature</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($player_details as $index => $detail)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{$detail->player_name}}</td>
                                                <td>{{$detail->player_mobile_no}}</td>
                                                <td>{{$detail->player_aadhar_no}}</td>
                                                <td><a href="{{ asset('storage/' . $detail->player_photo) }}" target="_blank"><img src="{{ asset('storage/' . $detail->player_photo) }}" height="100" width="100" alt="test"></a></td>
                                                <td><a href="{{ asset('storage/' . $detail->player_aadhar_photo) }}" target="_blank"><img src="{{ asset('storage/'. $detail->player_aadhar_photo) }}" height="100" width="100" alt="test"></a></td>
                                                <td><a href="{{ asset('storage/' . $detail->player_signature) }}" target="_blank"><img src="{{ asset('storage/'. $detail->player_signature) }}" height="100" width="100" alt="test"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>


                        <div class="card-footer">

                            <?php if($data->dmc_status == 0){ ?>
                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('dmc_sports_scheme_application_list/0') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success waves-effect m-r-20" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</button>

                                    </div>
                                </div>
                            <?php } elseif($data->dmc_status == 1){ ?>
                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('dmc_sports_scheme_application_list/1') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                                    </div>
                                </div>
                            <?php } elseif($data->dmc_status == 2){ ?>
                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url('dmc_sports_scheme_application_list/2') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
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
                    <form method="POST" action="{{ url('sports_scheme_application_approve_by_dmc', $data->id ) }}" enctype="multipart/form-data">
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
                            <label for="inputPassword" class="col-sm-2 col-form-label">Remark/शेरा :</label>
                            <div class="col-sm-10">
                                <textarea name="remark" class="form-control" id="remark" cols="30" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label class="col-md-3"></label>
                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                <a href='{{ url("dmc_sports_scheme_application_view/{$data->id}/{$data->dmc_status}") }}'><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
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
                        <form id="rejectForm" method="POST" action="{{ url('sports_scheme_application_reject_by_dmc', $data->id ) }}" enctype="multipart/form-data">
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
                                    <a href='{{ url("dmc_sports_scheme_application_view/{$data->id}/{$data->dmc_status}") }}'><button type="button"  class="btn btn-danger">Cancel</button></a>&nbsp;&nbsp;
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
            return false;
        }
        errorMessage.textContent = "";
        return true;
    }

    document.getElementById("rejectForm").addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
</script>






