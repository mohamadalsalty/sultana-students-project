@extends('layouts.app')

@section('title' , 'Countries')

@section('content')
<a href="/countries/index"><i class="fas fa-backward fs-4" style="color:#445EFE;"></i></a><br><br>
<center><form class="form1" action="{{ url('countries/update/' .$country->id) }}"
    method="post">    
    @csrf
    @method('PUT')
    <div class="form-group has-danger">
        <center><h1><i style="font-size:130px;" class="text-center fas fa-globe-asia"></i></h1></center>
        
        <label class="form-label mt-4" for="name">
            Country name
            <span class="text-danger">*</span>
        </label>
        <input name="name" type="text" value="{{ $country->name }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button class="btn btn-success mt-2 form-control">Submit</button>
</form>



<script>
$(document).ready(function(){

  // jQuery methods go here...
    $("form").on('submit',(function(e) {
        e.preventDefault();  
            $.ajax({
               url: "{{ url('countries/update/'.$country->id) }}",
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



                }
                else {

                }
            },

        });


    }));


});
</script>
@endsection
