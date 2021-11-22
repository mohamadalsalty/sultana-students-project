@extends('layouts.app')

@section('title' , 'Countries')

@section('content')
<form action="{{url('countries/store')}}" method="POST">
    <a href="/countries/index"><i class="fas fa-backward fs-2" style="color:#02b875;"></i></a><br><br>
    <center><h1><i style="font-size:130px;" class="text-center fas fa-globe-asia"></i></h1></center>

{{-- <form action="{{ route('countries.store') }}" method="post"> --}}
    @csrf
    <div class="form-group has-danger">
        <label class="form-label mt-4" for="name">
            Country name
            <span class="text-danger">*</span>
        </label>
        <input id="countryName" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button class="btn btn-success mt-2 btn-control">Submit</button>
</form>


<script>
$(document).ready(function(){

  // jQuery methods go here...
    $("form").on('submit',(function(e) {
        e.preventDefault();  
            $.ajax({
               url: "{{ url('countries/store') }}",
               type: "POST",
               data:  $( this ).serialize(),
            success: function(data){
                var data = JSON.parse(data);
                if (data['type'] == 'success') {
                    Swal.fire(
                      'Congratulations!',
                      data['msg'],
                      'success'
                    );

                document.getElementById('countryName').value = "";                
                }
                else {

                }
            },

        });


    }));


});
</script>
@endsection
