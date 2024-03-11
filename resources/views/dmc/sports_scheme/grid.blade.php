<x-admin.layout>
    <x-slot name="title">
        @if ($status == 0)
        Pending Sports Scheme Application
       @elseif ($status == 1)
        Approve Sports Scheme Application
       @elseif ($status == 2)
        Reject Sports Scheme Application
       @endif
    </x-slot>

    <x-slot name="heading">
    @if ($status == 0)
        Pending Sports Scheme Application
    @elseif ($status == 1)
        Approve Sports Scheme Application
    @elseif ($status == 2)
        Reject Sports Scheme Application
    @endif
  </x-slot>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>

                                    <tr>
                                        <th>Application No</th>
                                        <th>Name</th>
                                        <th>Full Address</th>
                                        <th>Contact</th>
                                        @if (($status == '2'))
                                        <th>Reasons for Rejection</th>
                                        @endif
                                        <th>Action</th>
                                        @if (($status == '1'))
                                        <th>Certificate</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value)
                                        <tr>
                                            <td>{{ $value->application_no }}</td>
                                            <td>{{ $value->full_name }}</td>
                                            <td>{{ $value->full_address }}</td>
                                            <td>{{ $value->contact }}</td>
                                            @if($value->dmc_status == '2')
                                            <td>{{ $value->dmc_reject_reason }}</td>
                                            @endif
                                            <td>  <a href='{{ url("dmc_sports_scheme_application_view/{$value->id}/{$value->dmc_status}") }}' class="btn btn-primary shadow btn-xs sharp me-1"> <i class="fas fa-eye"></i></a></td>
                                            {{-- @if($value->dmc_status == '1')
                                            <td>  <a href='{{ url("sports_scheme_generate_certificate/{$value->id}/{$value->dmc_status}") }}' class="btn btn-primary shadow btn-xs sharp me-1">Generate Certificate</a></td>
                                            @endif --}}
                                        </tr>
                                        @endforeach
                             </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




</x-admin.layout>


