@extends('layouts.app')

@section('title' , 'Countries')

@section('content')
<a href="/"><i class="fas fa-backward fs-2" style="color:#02b875;"></i></a><br><br>
<a href="/countries/create"><button type="submit" class="btn btn-success "> {{__('Create')}} </button></a>
    <table class="table">
        <thead>
            <tr>
                <th>
                    Country name
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
                <tr id="countryName{{$country->id}}">
                    <td>
                        {{ $country->name }}
                    </td>
                    <td>
                                    
                                
                        <div>
                            {{-- @method('delete') --}}
                            <a href="{{ url('countries/edit/'.$country->id) }}" class="btn btn-primary btn-sm  mb-2">{{__('Edit')}}</a>
                            @csrf
                            <button class="btn btn-danger btn-sm  mb-2" onclick="deleteCountry({{$country->id}})">{{__('Delete')}}</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if($countries->hasPages())
        <div class="d-flex justify-content-between">
            <a class="btn btn-info" href="{{ $countries->previousPageUrl() }}">
                Prev
            </a>
            <a class="btn btn-info" href="{{ $countries->nextPageUrl() }}">
                Next
            </a>
        </div>
    @endif


<script>
    function deleteCountry(id)
    {
            $.ajax({
               url: "{{  url('/countries/delete/') }}"+'/'+ id,
               type: "POST",
               data:  {
                '_token': document.getElementsByName('_token')[0].value,
                'id': id
               },
            success: function(data){
                var data = JSON.parse(data);
                if (data['type'] == 'success') {
                    Swal.fire(
                      'Congratulations!',
                      data['msg'],
                      'success'
                    );

                    <?php
                    if (isset($country->id)) {

                    ?>
                    document.getElementById('countryName{{$country->id}}').innerHTML = "";

                    <?php
                    }
                    ?>
                }
                else {

                }
            },

        });
    }
</script>        
@endsection
