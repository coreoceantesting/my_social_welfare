<x-admin.layout>
    <x-slot name="title">Education Scheme Application</x-slot>
    <x-slot name="heading">Education Scheme Application</x-slot>

        <div class="row" >
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Education Scheme Application </h4>
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
                                    <label class="col-form-label" for="email">Email/ ई मेल:</label>
                                    <input class="form-control"  name="email"  type="text" value="{{ $data->email }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="adhaar_no">6.Aadhaar Card Number / आधारकार्ड नंबर : <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" name="adhaar_no" value="{{ $data->adhaar_no }}" readonly>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="beneficiary_relationship">Beneficiary relationship/ लाभार्थ्याचे नाते :<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="beneficiary_relationship" type="text" value="{{ $data->beneficiary_relationship }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="family_name">Name of Head of Family/ कूटुंब प्रमुखाचे नाव :<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="family_name" type="text" value="{{ $data->family_name }}" readonly>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="total_family">Total Number of Family / कुटुंबातील एकूण संख्या ::</label>
                                    <input class="form-control"  name="total_family"  type="text" value="{{ $data->total_family }}" readonly >

                                </div>

                                @foreach ($document as $doc)
                                <div class="col-md-4 mt-3">
                                        <label class="col-form-label" for="document_name">{{$doc->document_name}}</label><br>
                                        <a href="{{ asset('education_scheme_file/'.$doc->document_file) }}" class="btn btn-sm btn-primary"  target="_blank" >View Document</a>
                                </div>
                            @endforeach

                            </div>
                        </div>


                        <div class="card-footer">

                                <div class="form-group row mt-4">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ route('education_scheme.index') }}"><button type="button"  class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>





</x-admin.layout>






