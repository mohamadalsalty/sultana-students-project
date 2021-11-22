@extends('layouts.app')

@section('title' , 'Classes')

@section('content')
<a href="/classes/index"><i class="fas fa-backward fs-2" style="color:#02b875;"></i></a><br><br>
<form action="{{ url('classes/update/'.$classe->id) }}"
    method="post">
    @csrf
    @method('PUT')
    <div class="form-group has-danger">
        <center><h1><i style="font-size:130px;" class="text-center fas fa-users"></i></h1></center>
        
        <label class="form-label mt-4" for="class_name">
            Class name
            <span class="text-danger">*</span>
        </label>
        <input required id="className" name="class_name" type="text" value="{{ $classe->class_name }}" class="form-control @error('class_name') is-invalid @enderror">
        @error('class_name')
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
               url: "{{ url('classes/update/'.$classe->id) }}",
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
