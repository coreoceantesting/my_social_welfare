<x-admin.layout>
    <x-slot name="title">Hayaticha Dakhla Form List</x-slot>
    <x-slot name="heading">Hayaticha Dakhla Form List (हयातीचा दाखला फॉर्म लिस्ट)</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form"  name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Life certificate (हयातीचा दाखला)</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <input class="form-control" id="user_id" name="user_id" value="{{ $users->id }}" type="hidden" >
                                <input type="hidden" id="fy_id" name="fy_id" value="{{ $fy->id }}" >
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">First Name (पहिले नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="fname" type="text" value="{{ $users->f_name }}"  placeholder="Enter User Name">
                                    <span class="text-danger is-invalid fname_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Middle Name (मधले नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="mname" type="text" value="{{ $users->m_name }}" placeholder="Enter User Name">
                                    <span class="text-danger is-invalid mname_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Last Name (आडनाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="lname" type="text" value="{{ $users->l_name }}" placeholder="Enter User Name">
                                    <span class="text-danger is-invalid lname_err"></span>
                                </div>




                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Area / Street (क्षेत्र / रस्ता) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="area" name="area" type="text" placeholder="Enter Area">
                                    <span class="text-danger is-invalid area_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Landmark (महत्त्वाची खूण)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark">
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="email"> Pincode (पिन कोड) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="pincode" name="pincode" type="text" placeholder="Enter User Email">
                                    <span class="text-danger is-invalid pincode_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Town / City (शहर) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="city" name="city" type="text" value="Panvel">
                                    <span class="text-danger is-invalid city_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">State (राज्य) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="state" name="state" type="text" value="Maharashtra" >
                                    <span class="text-danger is-invalid state_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">User Contact Number (वापरकर्ता संपर्क क्रमांक) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact" name="contact" type="number" min="0" value="{{ $users->mobile }}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">Alternate Contact Number(पर्यायी संपर्क क्रमांक)</label>
                                    <input class="form-control" id="alternate_contact_no" name="alternate_contact_no" type="number" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid alternate_contact_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Name (बँकेचे नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text" placeholder="Enter Bank Name" value="" >
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="branch_name">Branch Name (शाखा नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="branch_name" name="branch_name" type="text" placeholder="Enter Branch Name" value="" >
                                    <span class="text-danger is-invalid branch_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Account Number (बँक खाते क्रमांक) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" placeholder="Enter Account Number" type="text" value="" >
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code (आय .एफ .एस .सी कोड) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" placeholder="Enter IFSC Code" type="text" value="" >
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                        <label for="formFile" lass="col-form-label">Upload Signature / thumb (अर्जदाराची सही / अगंठा) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="signature" id="signature" accept=".png, .jpg, .jpeg">
                                    <span class="text-danger is-invalid signature_err"></span>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label" for="name">Flat No./House No./ building No. / Apartmen (फ्लॅट क्र./घर क्र./ इमारत क्र./कंपनी क्र./ अपार्टमेंट) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House No">
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label" for="govt_benefit">I write on the affidavit that I am/are not getting two government benefits. Adding their details. (मी प्रतिज्ञेवर लिहुन देतो/देते की, मला दोन शासकीय लाभ मिळत नाही/मिळत आहेत. त्यांचा तपशिल जोडत आहे.) <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="govt_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  govt_benefit_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="disability_benefit">I write on the affidavit that I have / have not received Disability Fund Benefit in the past. (मी प्रतिज्ञेवर लिहुन देतो/देते की, मला यापूर्वी दिव्यांग निधी लाभ प्राप्त झाले आहे / नाही.) <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="disability_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  disability_benefit_err"></span>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <label class="col-form-label" for="medical_benefit">I do on affidavit that, dt. / In the last 20 days, I did not mention the temptation of changing the government/Nimsar and fighting the battle. Also availed of all the facilities of Central Govt. in short term: (मी प्रतिज्ञापत्रावर जाहीर करतो/करते की, दि. / २० अखेर सपंणाऱ्या कालावधीत मी कोणतीही सरकारी/निमसरकारी व लष्करी नोकरी करुन त्याबद्दल मोहबदला घेतला नाही. तसेच वरील अल्पावधीत केंद्र शासनाच्या वैद्यकीय सुविधांचा लाभ घेतलेला आहे/ नाही ): <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="medical_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  medical_benefit_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    {{-- <label class="col-form-label" for="title">Financial Year</label> --}}
                                    <input class="form-control"   type="hidden" value="{{ $fy->title }}" readonly >
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit & Download</button>
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
                                    <label class="col-form-label" for="name">First Name (पहिले नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="fname" type="text" value="{{ $users->f_name }}" placeholder="Enter User Name">
                                    <span class="text-danger is-invalid fname_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Middle Name (मधले नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="mname" type="text" value="{{ $users->m_name }}"  placeholder="Enter User Name">
                                    <span class="text-danger is-invalid mname_err"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Last Name (आडनाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="lname" type="text" value="{{ $users->l_name }}"  placeholder="Enter User Name">
                                    <span class="text-danger is-invalid lname_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Flat No./House No./ building No. /Company No/ Apartmen (फ्लॅट क्र./घर क्र./ इमारत क्र./कंपनी क्र./ अपार्टमेंट) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="house_no" name="house_no" type="text" placeholder="Enter House No">
                                    <span class="text-danger is-invalid house_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Area / Street (क्षेत्र / रस्ता) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="area" name="area" type="text" placeholder="Enter Area">
                                    <span class="text-danger is-invalid area_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Landmark (महत्त्वाची खूण)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark">
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="email"> Pincode (पिन कोड) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="pincode" name="pincode" type="text" placeholder="Enter User Email">
                                    <span class="text-danger is-invalid pincode_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Town / City (शहर) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="city" name="city" type="text" value="Panvel" >
                                    <span class="text-danger is-invalid city_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">State (राज्य) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="state" name="state" type="text" value="Maharashtra"  >
                                    <span class="text-danger is-invalid state_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">User Contact Number (वापरकर्ता संपर्क क्रमांक) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact" name="contact" type="number" min="0" value="{{ $users->mobile }}"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid contact_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="mobile">Alternate Contact Number (पर्यायी संपर्क क्रमांक)</label>
                                    <input class="form-control" id="alternate_contact_no" name="alternate_contact_no" type="number" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                        placeholder="Enter User Mobile">
                                    <span class="text-danger is-invalid alternate_contact_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Name (बँकेचे नाव) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_name" name="bank_name" type="text" value="">
                                    <span class="text-danger is-invalid bank_name_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">Bank Account Number (बँक खाते क्रमांक) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_no" name="account_no" type="text" value="">
                                    <span class="text-danger is-invalid account_no_err"></span>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="name">IFSC Code (आय .एफ .एस .सी कोड) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" value="">
                                    <span class="text-danger is-invalid ifsc_code_err"></span>
                                </div>


                                <div class="col-md-4 mt-3">
                                        <label for="formFile" lass="col-form-label">Upload Signature / thumb (अर्जदाराची सही / अगंठा) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="signature" id="signature" accept=".png, .jpg, .jpeg">
                                        <a class="btn btn-sm btn-primary" id="signature" target="_blank" href="" >View Document</a>
                                    <span class="text-danger is-invalid signature_err"></span>
                                </div>



                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label" for="govt_benefit">I write on the affidavit that I am/are not getting two government benefits. Adding their details. (मी प्रतिज्ञेवर लिहुन देतो/देते की, मला दोन शासकीय लाभ मिळत नाही/मिळत आहेत. त्यांचा तपशिल जोडत आहे.) <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="govt_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  govt_benefit_err"></span>
                                </div>



                                <div class="col-md-4 mt-3">
                                    <label class="col-form-label" for="disability_benefit">I write on the affidavit that I have / have not received Disability Fund Benefit in the past./ मी प्रतिज्ञेवर लिहुन देतो/देते की, मला यापूर्वी दिव्यांग निधी लाभ प्राप्त झाले आहे / नाही. <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="disability_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  disability_benefit_err"></span>
                                </div>

                                <div class="col-md-4 mb-5">
                                    <label class="col-form-label" for="medical_benefit">I declare on affidavit that, dt. / During the period ending 20th, I have not received any compensation for doing any government/semi-government and military job. Also availed / not availed the medical facilities of the Central Government during the above short period: (मी प्रतिज्ञापत्रावर जाहीर करतो/करते की, दि. / २० अखेर सपंणाऱ्या कालावधीत मी कोणतीही सरकारी/निमसरकारी व लष्करी नोकरी करुन त्याबद्दल मोहबदला घेतला नाही. तसेच वरील अल्पावधीत केंद्र शासनाच्या वैद्यकीय सुविधांचा लाभ घेतलेला आहे/ नाही) : <span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single" name="medical_benefit" >
                                            <option value="">--Select--</option>
                                            <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                        <span class="text-danger is-invalid  medical_benefit_err"></span>
                                </div>


                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Submit & Download</button>

                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


          {{-- upload certificate --}}

          <div class="row" id="uploadContainer" style="display:none;">
            <div class="col">
                <form  class="form-horizontal form-bordered" method="post" id="uploadForm" enctype="multipart/form-data">

                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Upload Live Certificate</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="upload_model_id" name="upload_model_id" value="">

                            <div class="mb-3 row">



                                <div class="col-md-4 mt-3">
                                    <label for="formFile" lass="col-form-label"> कृपया हस्ताक्षर केलेली हयातीचा दाखल अपलोड करा / Upload Signatured of live Certificate  <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="sign_uploaded_live_certificate" id="sign_uploaded_live_certificate" >
                                <span class="text-danger is-invalid sign_uploaded_live_certificate_err"></span>
                            </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmitfile">Submit</button>
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
                        $serialNumber = 1;
                    @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>financial Year</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Age</th>
                                        <th>Bank Name</th>
                                        <th>Action</th>
                                        <th>Upload Signatured of live Certificate</th>
                                        <th>Live Certificate</th>
                                        <th>Uploaded Certificate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users)
                                    @foreach ($hayat as $key=> $data)

                                        <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{$data->f_name}} {{$data->m_name}} {{$data->l_name}}</td>
                                                <td>{{$data->contact}}</td>
                                                <td>{{$data->Age}}</td>
                                                <td>{{ $data->bank_name }}</td>

                                            <td>
                                                <button class="edit-element btn btn-secondary px-2 py-1" title="Edit live certificate" data-id="{{ $data->h_id }}"><i data-feather="edit"></i></button>
                                                <button class="btn btn-danger rem-element px-2 py-1" title="Delete live certificate" data-id="{{ $data->h_id }}"><i data-feather="trash-2"></i> </button>  
                                            </td>
                                            <td> <button class="upload-element btn btn-primary  px-2 py-1" title="Upload live certificate" data-id="{{ $data->h_id }}">Upload </button></td>
                                            <td>@if(isset($data->download_pdf))<a href="{{ asset('pdfs/'.$data->download_pdf) }}" class="btn btn-primary shadow btn-sm sharp me-1"  download><i class="fa fa-download" aria-hidden="true"></i></a>@endif</td>
                                            <td>@if(isset($data->sign_uploaded_live_certificate))<a href="{{ asset('storage/' . $data->sign_uploaded_live_certificate) }}"  class="btn btn-primary shadow btn-sm sharp me-1" target="_blank"> <i class="fas fa-eye"></i></a>@endif</td>
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
    $("#addForm").submit(function (e) {
     e.preventDefault();
     $("#addSubmit").prop('disabled', true);

     var formdata = new FormData(this);
     $.ajax({
         url: '{{ route('hayatichaDakhlaform.store') }}',
         type: 'POST',
         data: formdata,
         contentType: false,
         processData: false,
         success: function (data) {
             $("#addSubmit").prop('disabled', false);

             if (!data.error2) {

                 swal("Successful!", data.success, "success");
                 setTimeout(function () {
                     var iframe = document.createElement('iframe');
                     iframe.style.display = 'none';
                     iframe.src = data.file_path;
                     document.body.appendChild(iframe);
                     window.open(data.file_path, '_blank');
                     window.location.reload();
                 }, 1000);
             } else {
                 swal("Error!", data.error2, "error");
             }
         },
         statusCode: {
             422: function (responseObject, textStatus, jqXHR) {
                 $("#addSubmit").prop('disabled', false);
                 resetErrors();
                 printErrMsg(responseObject.responseJSON.errors);
             },
             500: function (responseObject, textStatus, errorThrown) {
                 $("#addSubmit").prop('disabled', false);
                 swal("Error occurred!", "Something went wrong, please try again", "error");
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
                    $("#editForm a#signature").attr('href', "{{ asset('storage/') }}/" + data.hayatichaDakhlaform.signature);
                    $("#editForm select[name='medical_benefit']").val(data.hayatichaDakhlaform.medical_benefit).trigger('change');
                    var selectedValue = $("#editForm select[name='medical_benefit']").val();
                    $("#editForm select[name='govt_benefit']").val(data.hayatichaDakhlaform.govt_benefit).trigger('change');
                    $("#editForm select[name='govt_benefit']").val();
                    $("#editForm select[name='disability_benefit']").val(data.hayatichaDakhlaform.disability_benefit).trigger('change');
                    $("#editForm select[name='disability_benefit']").val();

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
                //     if (!data.error2)
                //         swal("Successful!", data.success, "success")
                //             .then((action) => {
                //                 window.location.href = '{{ route('hayatichaDakhlaform.index') }}';
                //             });
                //     else
                //         swal("Error!", data.error2, "error");
                // },

                if (!data.error2) {

                swal("Successful!", data.success, "success");
                setTimeout(function () {
                    var iframe = document.createElement('iframe');
                    iframe.style.display = 'none';
                    iframe.src = data.file_path;
                    document.body.appendChild(iframe);
                    window.open(data.file_path, '_blank');
                    window.location.reload();
                }, 1000);
                } else {
                swal("Error!", data.error2, "error");
                }
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



