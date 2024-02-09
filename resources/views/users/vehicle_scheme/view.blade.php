<x-admin.layout>
    <x-slot name="title">Vehicle Scheme Application</x-slot>
    <x-slot name="heading">Vehicle Scheme Application</x-slot>

        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Vehicle Scheme Application </h4>
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
                                    <label class="col-form-label" for="dob">Date Of Birth/ वय  </label>
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
                                    <label class="col-form-label" for="adhaar_no">6.Aadhaar Card Number / आधारकार्ड नंबर : <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" name="adhaar_no" value="{{ $data->adhaar_no }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="duration_of_residence">Duration of residence in Panvel Municipal Corporation area/ पनवेल महानगरपालिका क्षेत्रातील वास्तव्याचा कालावधी :<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="duration_of_residence" type="text" value="{{ $data->duration_of_residence }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="details">Details if received training under the said scheme earlier / यापुर्वी सदर योजने अंतर्गत प्रशिक्षण घेतले असल्यास त्याचा तपशिल :<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="details" type="text" value="{{ $data->details }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="four_wheeler">Four Wheeler Training Fee Rs.520 /चारचाकी प्रशिक्षण फि रक्कम रू ५२०/-</label>
                                    <input class="form-control"  name="four_wheeler"  type="text" value="520" readonly >
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="receipt_no">Receipt No. of payment of 10% of training amount. /प्रशिक्षणाची १० टक्के रक्कम भरल्याची पावती क्रमांक.</label>
                                    <input class="form-control"  name="receipt_no"  type="text" value="{{ $data->receipt_no }}" readonly >
                                </div>


                                @foreach ($document as $doc)
                                <div class="col-md-4 mt-3">
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}}</label><br>
                                        <a href="{{ asset('vehicle_scheme_file/'.$doc->document_file) }}" class="btn btn-sm btn-primary"  target="_blank" >View Document</a>
                                </div>
                            @endforeach

                            </div>
                        </div>


                        <div class="card-footer">


                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('vehicle_scheme.index') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>



</x-admin.layout>






