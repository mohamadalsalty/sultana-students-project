@extends('layouts.app')

@section('title' , 'Classes')

@section('content')

<form action="{{ url('classes/store') }}" method="post">
    @csrf
    <a href="/classes/index"><i class="fas fa-backward fs-2" style="color:#02b875;"></i></a><br><br>

    <div class="form-group has-danger">
        <center><h1><i style="font-size:130px;" class="text-center fas fa-users"></i></h1></center>
        <label class="form-label mt-4 justify-content-center" for="class_name">
             
            Class name
            <span class="text-danger">*</span>
        </label>
        <input id="className" required name="class_name" type="text" class="form-control @error('class_name') is-invalid @enderror">
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
               url: "{{ url('classes/store') }}",
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

                document.getElementById('className').value = "";                
                }
                else {

                }
            },

        });


    }));


});
</script>

@endsection
