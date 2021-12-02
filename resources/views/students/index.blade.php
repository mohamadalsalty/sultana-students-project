@extends('layouts.app')

@section('title' , 'Students')

@section('content')
<br><br>
<a href="/"><i class="fas fa-backward fs-4" style="color:#445EFE;"></i></a>&nbsp;&nbsp;
<a href="/students/create"><button type="submit" class="btn btn-primary "> {{__('Create')}} </button></a><br><br>

    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Class
                </th>
                <th>
                    Country
                </th>
                <th>
                    Date Of Birth
                </th>
                <th>
                    Options
                </th>
            </tr>
        </thead>
        <tbody class="table-light">
            @foreach ($students as $student)
                <tr id="studentName{{$student->id}}">
                    <td>
                        {{ $student->name }}
                    </td>
                    <td>
                        {{ $student->class->class_name }}
                    </td>
                    <td>
                        {{ $student->country->name }}
                    </td>
                    <td>
                        {{ $student->date_of_birth }}
                    </td>
                    <td>
                        <div action="{{ url('/students/delete/'.$student->id) }}" method="POST">
                            {{-- @method('delete') --}}
                            <a href="{{ url('students/edit/'.$student->id) }}" class="btn btn-primary btn-sm  mb-2">{{__('Edit')}}</a>
                            @csrf
                            <button class="btn btn-danger btn-sm  mb-2" onclick="deleteStudent({{$student->id}})">{{__('Delete')}}</button>
                        </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if($students->hasPages())
        <div class="d-flex justify-content-between">
            <a class="btn btn-success" href="{{ $students->previousPageUrl() }}">
                Prev
            </a>
            <a class="btn btn-success" href="{{ $students->nextPageUrl() }}">
                Next
            </a>
        </div>
    @endif


<script>
    function deleteStudent(id)
    {
            $.ajax({
               url: "{{  url('/students/delete/') }}"+'/'+ id,
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
                    if (isset($student->id)) {

                    ?>
                    document.getElementById('studentName{{$student->id}}').innerHTML = "";

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
