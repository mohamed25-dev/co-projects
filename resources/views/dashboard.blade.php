<x-app-layout>
    <x-slot name="header">

    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="col-lg-3 col-md-4 col-6" style="margin-bottom:10px">
            <div class="d-block mb-2 h-100 border rounded" style="padding:10px">
                <a href="#" style="color:#555555">
                    <img class="img-fluid img-thumbnail" src="{{ asset('storage/images/default.jpeg') }}" alt="">
                    <b>
                        <p style="height:25px">Title</p>
                    </b>
                </a>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>
