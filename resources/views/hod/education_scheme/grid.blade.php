<x-admin.layout>
    <x-slot name="title">
        @if ($status == 0)
        Pending Education Scheme Application
       @elseif ($status == 1)
        Approve Education Scheme Application
       @elseif ($status == 2)
        Reject Education Scheme Application
       @endif
    </x-slot>

    <x-slot name="heading">
    @if ($status == 0)
        Pending Education Scheme Application
    @elseif ($status == 1)
        Approve Education Scheme Application
    @elseif ($status == 2)
        Reject Education Scheme Application
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value)
                                        <tr>
                                            <td>{{ $value->application_no }}</td>
                                            <td>{{ $value->full_name }}</td>
                                            <td>{{ $value->full_address }}</td>
                                            <td>{{ $value->contact }}</td>
                                            @if($value->hod_status == '2')
                                            <td>{{ $value->hod_reject_reason }}</td>
                                            @endif
                                            <td>  <a href='{{ url("education_scheme_application_view/{$value->id}/{$value->hod_status}") }}' class="btn btn-primary shadow btn-xs sharp me-1"> <i class="fas fa-eye"></i></a></td>
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


