<x-admin.layout>
    <x-slot name="title">Divyang Scheme Application</x-slot>
    <x-slot name="heading">Divyang Scheme Application</x-slot>

<section class="content">
    <div class="container">
        <div class="pass" id="divToPrint">
            <div class="card" style="border: 1px solid black">
    
                <div class="card-header" style="text-align: center;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 10%;">
                                <!-- Left Logo -->
                                <img src="{{ asset('admin/images/users/PMC-logo.png') }}" alt="Left Logo" height="100">
                            </td>
                            <td style="width: 70%; text-align: center;">
                                <!-- Company Name and Additional Info -->
                                <h1><strong>पनवेल महानगरपालिका</strong></h1>
                                <h4><strong>जेष्ठ नागरिक / दिव्यांग / विद्यार्थी </strong></h4>
                            </td>
                            <td style="width: 20%;">
                                <!-- Any content you want on the right side -->
                            </td>
                        </tr>
                    </table>
                </div>
    
                <div class="card-body">
                    <table style="width:100%;">
                        <thead>
                        <tr>
                            <!-- Left side with name and address -->
                            <th style="width: 50%;">
                            <ul style="list-style-type: none; margin: 10px; padding: 10px;">
                                <li><strong>नाव : </strong> {{ $data->f_name }} {{ $data->m_name }} {{ $data->l_name }}</li>
                                <li><strong>पत्ता  : </strong> {{ $data->full_address }}</li>
                            </ul>
                            </th>
                            <!-- Right side with the image -->
                            <th style="width: 20%;">
                            <img src="{{ asset('storage/' . $data->candidate_signature) }}" alt="logo" style="max-width: 60%;">
                            </th>
                        </tr>
                        </thead>
                    </table>
    
                    <table style="width:100%;">
                        <thead>
                            <tr>
                            <th style="text-align:left;width: 50%; padding-left:20px">लाभधारक:</th>
                            <th style="text-align:left">वय : {{$data->age}}</th>
                            </tr>
                            <tr>
                            <th style="text-align:left;padding-left:20px">निर्गमित केल्याचा दिनांक : {{ \Carbon\Carbon::parse($data->dmc_approval_date)->format('Y-m-d') }} </th>
                            </tr>
                        </thead>
                    </table>
    
                    <table style="width:100%;">
                        <thead>
                          <tr>
                            <th style="text-align:left;width: 50%; padding-left:20px"">NMMT प्रवाश्यानसाठी वैध</th>
                            <th>विभाग प्रमुख </th>
                          </tr>
                        </thead>
                    </table>
                </div>
    
            </div>
    
            <div class="card" style="border: 1px solid black">
                <div class="card-body">
                    <ul style="list-style-type: none;padding-top:5px">
                        <li><strong>आधार कार्ड नंबर :</strong> {{$data->adhaar_no}} </li>
                        <li><strong>दूरध्वनी क्रमांक :</strong> {{$data->contact}} </li>
                    </ul>
                    <ol>
                        <li><strong>सदर ओळखपत्र हे हस्तांतरणीय नाही .</strong></li>
                        <li><strong>सदर ओळखपत्राचा गैरवापर करण्यात येऊ नये .</strong></li>
                        <li><strong>हे ओळखपत्र सापडल्यास कृपया पनवेल महानगरपालिका समाजकल्याण विभागात जमा करावे . </strong></li>
                        <li><strong>सदरचे ओळखपत्र हे एक वर्षापर्यंत वैध राहील .</strong></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('bus_concession.index') }}" class="btn btn-danger btn-lg text-light" >Cancel</a>
            <button  class="btn btn-success btn-lg" type="button" onClick="printDiv('divToPrint')" ><i class="fa fa-print fa-lg text-light"></i> &nbsp;&nbsp;Print</button>
        </div>
    </div>
</section>

</x-admin.layout>
<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
