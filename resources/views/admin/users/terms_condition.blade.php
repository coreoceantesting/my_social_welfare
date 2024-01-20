<x-admin.layout>
    <x-slot name="title">Terms and Conditions</x-slot>
    <x-slot name="heading">Terms and Conditions</x-slot>



                    <!-- start page title -->


                    <div class="row justify-content-center">
                        <div class="col-xxl-9">
                            <div class="card">
                                <form class="needs-validation" novalidate id="invoice_form">
                                    <div class="card-body border-bottom border-bottom-dashed p-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="">
                                                    <h4 class="mb-sm-0" style="text-align: center !important;">आटी व शर्ती </h4>
                                                </div>
                                                <div>

                                                </div>
                                            </div>
                                            <!--end col-->

                                        </div>
                                        <!--end row-->
                                    </div>

                                    <div class="card-body p-4">
                                        <!--end row-->
                                        <div class="mt-4">
                                            <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                            {!! $terms->rules_regulations ?? ''!!}
                                        </div>
                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">

                                            <a href="{{ route('hayatichaDakhlaform.index') }}" class="btn btn-primary"> Continue</a>
                                            <a href="{{ route('dashboard') }}" class="btn btn-secondary"> Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->



@push('scripts')
@endpush

</x-admin.layout>
