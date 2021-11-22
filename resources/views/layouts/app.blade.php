<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> 
    <style> 
        body{ 
            padding:2% 3% 10% 3%; 
            text-align:center; 
            color: red;
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
        
        .theme-switch 
        {
            display: inline-block;
            height: 34px;
            position: relative;
            width: 60px;
            text-align: right;
        }

        .theme-switch input 
        {
            display:none;
        }

        .slider
         {
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

        input:checked + .slider 
        {
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
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
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
    <main>
        <div class="container">
            @yield('action')
            @yield('content')
        </div>
    </main>

<!-- Footer -->
<footer  class="text-center text-white container fixed-bottom" style="background-color: #02b875;">



    <section class="mb-4">
      <p>
        This is a simple students managment web application that helps you to manage and analise your students.
      </p>
    </section>


  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-white"></a>
  </div>



</footer>
<!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://kit.fontawesome.com/26d4a64054.js"></script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
