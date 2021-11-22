@extends('layouts.app')

@section('title' , 'Students')

@section('content')
<form action="{{ url('students/store') }}" method="post">
    
    <center><h1><i style="font-size:130px;" class="text-center fas fa-user"></i></h1></center>

    @csrf
    <div class="form-group has-danger">
        <label class="form-label mt-4" for="name">
            Name
            <span class="text-danger">*</span>
        </label>
        <input required="" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group has-danger">
        <label class="form-label mt-4" for="class_id">
            Class
            <span class="text-danger">*</span>
        </label>
        <select required="" name="class_id" class="form-control @error('class_id') is-invalid @enderror">
            <option>Choose Class</option>
            @foreach ($classes as $class)
                <option value="{{ $class->id }}">
                    {{ $class->class_name }}
                </option>
            @endforeach
        </select>
        @error('class_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group has-danger">
        <label class="form-label mt-4" for="country_id">
            Country
            <span class="text-danger">*</span>
        </label>
        <select required="" name="country_id" class="form-control @error('country_id') is-invalid @enderror">
            <option>Choose Country</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
        @error('country_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group has-danger">
        <label class="form-label mt-4" for="date">
            Date Of Birth
            <span class="text-danger">*</span>
        </label>
        <input required="" name="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror">
        @error('date_of_birth')
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
               url: "{{ url('students/store') }}",
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

                document.getElementById('name').value = "";                
                }
                else {

                }
            },

        });


    }));


});
</script>

@endsection
