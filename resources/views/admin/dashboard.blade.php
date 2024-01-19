<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <div class="row">
        <div class="col-xxl-5">
            <div class="d-flex flex-column h-100">


                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background-color: #8c68cd;color: white;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <p class="text-uppercase fw-medium  mb-0" style="text-align: center;font-size: 20px;">Divyang</p>
                                                    </div>

                                                </div>
                                                <div class=" mt-4" >
                                                    <div class="mt-3" style="text-align: center;">
                                                        <a href="{{ route('terms_conditions') }}" class="btn btn-success">Apply</a>
                                                    </div>


                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->


                                </div> <!-- end row-->





            </div>
        </div>


    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
