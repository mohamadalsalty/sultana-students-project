<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style> 
    
        body{ 
        /* padding:2% 3% 10% 3%;  */
        text-align:center; 

        } 
        h1{ 
        color: #03aa96; 
        margin-top:30px; 
        }                 
        .dark{ 
            background-color: #222; 
            color: #e6e6e6; 
        } 
        .theme-switch-wrapper {
            display: flex;
            align-items: center;  
            float: right;                      
        }        
        .theme-switch {
        display: inline-block;
        height: 34px;
        position: relative;
        width: 60px;
        text-align: right;
        }
        .theme-switch input {
        display:none;
        }
        .slider {
        background-color: #ccc;
        bottom: 0;
        cursor: pointer;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transition: .4s;
        }
        .slider:before {
        background-color: #fff;
        bottom: 4px;
        content: "";
        height: 26px;
        left: 4px;
        position: absolute;
        transition: .4s;
        width: 26px;
        }
        input:checked + .slider {
        background-color: #66bb6a;
        }
        input:checked + .slider:before {
        transform: translateX(26px);
        }
        .slider.round {
        border-radius: 34px;
        }
        .slider.round:before {
        border-radius: 50%;
        }
    </style> 
    {{-- <title>
        @yield('title')
    </title> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg- navPadding">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Students Site</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="/">Index</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/countries/index">Countries</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/students/index">Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/classes/index">Classes</a>
              </li>
            
            </ul>
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                  <input type="checkbox" id="checkbox" />
                  <div class="slider round"></div>
              </label>
            <label style="margin-left: 10px;">Select Mode</label>
          </div>
          <script> 
              $(document).ready(function(){
                  $('#checkbox').click(function(){
                      var element = document.body;         
                      element.classList.toggle("dark"); 
                  });
              });        
          </script>
          </div>
        </nav>
    
           

      </div>
<body>
   
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://kit.fontawesome.com/26d4a64054.js"></script>    

</body>
</html>
