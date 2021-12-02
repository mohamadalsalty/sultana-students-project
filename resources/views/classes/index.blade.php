@extends('layouts.app')

@section('title' , 'classes')

@section('content')
<br><br>
<a href="/"><i class="fas fa-backward fs-4" style="color:#445EFE;"></i></a>&nbsp;&nbsp;
<a href="/classes/create"><button type="submit" class="btn btn-primary "> {{__('Create')}} </button></a>
<br><br>
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th>
                    Class name
                </th>
                <th>
                    Options
                </th>
            </tr>
        </thead>
        <tbody class="table-light">
            @foreach ($classes as $classe)
                <tr id="className{{$classe->id}}">
                    <td>
                        {{ $classe->class_name }}
                    </td>
                    <td>
                        <div>
                            {{-- @method('delete') --}}
                            <a href="{{ url('classes/edit/'.$classe->id) }}" class="btn btn-primary btn-sm  mb-2">{{__('Edit')}}</a>
                            @csrf
                            <button class="btn btn-danger btn-sm  mb-2" id="class{{$classe->id}}" onclick="deleteClass({{$classe->id}})">{{__('Delete')}}</button>
                        </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if($classes->hasPages())
        <div class="d-flex justify-content-between">
            <a class="btn btn-info" href="{{ $classes->previousPageUrl() }}">
                Prev
            </a>
            <a class="btn btn-info" href="{{ $classes->nextPageUrl() }}">
                Next
            </a>
        </div>
    @endif


<script>
    function deleteClass(id)
    {
            $.ajax({
               url: "{{  url('/classes/delete/') }}"+'/'+ id,
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
                    if (isset($classe->id)) {

                    ?>
                    document.getElementById('className{{$classe->id}}').innerHTML = "";

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
<br><br><br>  <br><br><br>     
@endsection
