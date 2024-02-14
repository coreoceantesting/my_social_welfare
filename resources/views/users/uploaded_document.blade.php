<x-admin.layout>
    <x-slot name="title">Uploaded List</x-slot>
    <x-slot name="heading">Uploaded List (अपलोड केलेली यादी)</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}




        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Financial Year</th>
                                        <th>Live Certificate</th>
                                        <th>Uploaded Certificate</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users)

                                    @foreach ($hayat as $key=> $data)

                                        <tr>
                                            {{-- @if(isset($data->sign_uploaded_live_certificate)) --}}
                                               <td>{{ $loop->iteration }}</td>
                                                <td>{{$users->title }}</td>
                                                <td><a href="{{ asset('pdfs/'.$data->download_pdf) }}" class="btn btn-primary shadow btn-xs sharp me-1"  download><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                <td>@if(isset($data->sign_uploaded_live_certificate))<a href="{{ asset($data->sign_uploaded_live_certificate)}}" class="btn btn-primary shadow btn-xs sharp me-1" target="_blank"> <i class="fas fa-eye"></i></a>@endif</td>

                                                {{-- @endif --}}
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


