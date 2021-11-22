@extends('layouts.main')

@section('title' , 'Homepage')

@section('content')

<a href="/countries/index"><button type="submit" class="btn btn-success "> {{__('Countries')}} </button></a>
<a href="/students/index"><button type="submit" class="btn btn-success "> {{__('Students')}} </button></a>
<a href="/classes/index"><button type="submit" class="btn btn-success "> {{__('Classes')}} </button></a>
<br><br>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#stdPerClass">
            Students per class
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#stdPerCountry">
            Students per country
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#stdAvg">
            Average age of students 
        </a>
    </li>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade show active" id="stdPerClass">
            <center><br>
                <center><h1><i style="font-size:130px;color:#02b875;" class="text-center fas fa-users"></i></h1></center>
            </center>

        <table class="table">
            <thead>
                <tr>
                    <th>
                        Class
                    </th>
                    <th>
                        Students
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <tr>
                        <td>
                            {{ $class->class_name }}
                        </td>
                        <td>
                            {{ $class->students->count()  }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="stdPerCountry">
            <center><br>
                <center><h1><i style="font-size:130px;color:#02b875;" class="text-center fas fa-globe-asia"></i></h1></center>
            </center>        
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Country
                    </th>
                    <th>
                        Students
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                    <tr>
                        <td>
                            {{ $country->name }}
                        </td>
                        <td>
                            {{ $country->students->count()  }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="stdAvg">
        <table class="table">
        
       
        <tr>
            <center><br>
                <center><h1><i style="font-size:130px; color:#02b875;"class="text-center fas fa-lightbulb"></i></h1></center>
                <h1 style="color:#02b875;">the average of the students is:<br><p style="color:red;">{{$averageAge}}</p></h1>
            </center>
        </tr>
    </table>
    </div>
</div>
@endsection
