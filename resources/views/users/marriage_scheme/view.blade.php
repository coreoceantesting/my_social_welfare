<x-admin.layout>
    <x-slot name="title">Marriage Scheme Application</x-slot>
    <x-slot name="heading">Marriage Scheme Application</x-slot>

        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Marriage Scheme Application </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">संपूर्ण नाव</label>
                                    <input class="form-control"  type="text"  name="full_name"  value="{{ $data->full_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="full_address">Full Address / संपूर्ण पत्ता</label>
                                    <input class="form-control"  type="text"  name="full_address" value="{{ $data->full_address }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="gender">Gender/ लिंग </label>
                                    <input class="form-control"  type="text"  name="gender" value="{{ $data->gender }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="Age"> Age/ वय </label>
                                    <input class="form-control"  type="text"  name="age" value="{{ $data->age }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="contact">4. Mobile No/ मोबाईल नं.:</label>
                                    <input class="form-control"  type="text" name="contact"  value="{{ $data->contact }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">Aadhaar Card Number / आधारकार्ड नंबर: <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" name="adhaar_no" value="{{ $data->adhaar_no }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_name">father/husband Name/वडिलांचे/पतीचे नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control"  name="father_name" type="text" value="{{ $data->father_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="father_address">father/husband address/वडिलांचे/पतीचे नाव  <span class="text-danger">*</span></label>
                                    <input class="form-control"  name="father_address" type="text" value="{{ $data->father_address }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">9. Bank Name / बँकेचे नाव <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text"  value="{{ $data->bank_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="branch_name">Branch / शाखा <span class="text-danger">*</span></label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text" value="{{ $data->branch_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Account Number / बँक खाते क्रमांक <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text"  value="{{ $data->account_no }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code / आय .एफ .एस .सी कोड <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text"  value="{{ $data->account_no }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="profession">Education/job / शिक्षण/नोकरी</label>
                                    <input class="form-control" id="profession" name="profession" type="text" value="{{ $data->profession }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="agriculture">13. Agriculture / शेती</label>
                                    <input class="form-control" id="agriculture" name="agriculture" type="text" value="{{ $data->agriculture }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="caste">19. Caste Category / जातीचा प्रवर्ग</label>
                                    <input class="form-control" id="caste" name="caste" type="text"  value="{{ $data->caste }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_no">20. Ward No / प्रभाग क्र.:</label>
                                    <input class="form-control" id="ward_no" name="ward_no" type="text" value="{{ $data->ward_no }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="ward_id">Ward Name:</label>
                                    <input class="form-control" id="ward_id" name="ward_id" type="text" value="{{ $data->name }}" readonly>
                                </div>

                                @foreach ($document as $doc)
                                <div class="col-md-4 mt-3">
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}}</label><br>
                                        <a href="{{ asset('marriage_scheme_file/'.$doc->document_file) }}" class="btn btn-sm btn-primary"  target="_blank" >View Document</a>
                                </div>
                            @endforeach

                            </div>
                        </div>




                        <div class="card-footer">


                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('marriage_scheme.index') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>





</x-admin.layout>






