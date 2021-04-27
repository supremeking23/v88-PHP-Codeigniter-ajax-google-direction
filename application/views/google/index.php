<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Google Direction API</title>
    <style>
        body {
            background:#eee
        }
        .container {
            background:#fff;
            padding:20px;
            /* height:500px; */
        }
        .navbar {
            -webkit-box-shadow: 3px 6px 24px -1px rgba(42,42,42,1);
            -moz-box-shadow: 3px 6px 24px -1px rgba(42,42,42,1);
            box-shadow: 3px 6px 24px -1px rgba(42,42,42,1);
        }

        .form-control{
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #9e9e9e;
            border-radius: 0;
            outline: none;
            height: 3rem;
            width: 100%;
            font-size: 16px;
            margin: 0 0 8px 0;
            padding: 0;
        }

        .form-control:focus{
            border-bottom: 1px solid #007bff;
            -webkit-box-shadow: 0 1px 0 0 #007bff;
            box-shadow: 0 1px 0 0 #007bff;
        }

        .form-control::placeholder{
            text-align:center
        }

    
    </style>
  </head>
  <body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-brand mb-0 h1">Google Direction API</span>
    </nav>

    <div class="container mt-5">
       
        <form action="google/get_directions" method="POST" class="row">
            <div class="form-group col-md-5">
                <input type="text" class="form-control" id="origin" name="origin" aria-describedby="origin" placeholder="Origin...">
            </div>
            <div class="form-group col-md-5">
                <input type="text" class="form-control" id="destination" name="destination" aria-describedby="destination" placeholder="Destination...">
            </div>

            <div class="form-group col-md-2 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary">Get directions!</button>
            </div>
        </form>

        <div class="directions">
            <h2>Directions from <span class="origin">Makati</span>, <span class="destination">Taguig</span></h2>
            <ol class="direction-list">
                <li>Turn left on El Camino Real</li>
                <li>Enter US 101 North towrds San Fransisco</li>
                <li>Turn left on El Camino Real</li>
                <li>Enter US 101 North towrds San Fransisco</li>
            </ol>
        </div>
            
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){
            $("form").submit(function(){
                if($("#origin").val() == "" || $("#destination").val() == ""){
                    alert("both fields are required");
                }
                $.post($(this).attr("action"),$(this).serialize(),function(response){
                    let html = ``;
                    // console.log(response.routes[0].legs[0].steps);
                    console.log(response.routes[0].legs[0].steps[0].html_instructions);
                    let steps = response.routes[0].legs[0].steps;
                    console.log(steps);
                    for(let i = 0; i < steps.length; i++){
                        html += `<li>${steps[i].html_instructions}</li>`;
                        console.log(steps[i].html_instructions);
                    }

                    $(`.direction-list`).html(html);
                    
                },"json");

                // $.get(`https://maps.googleapis.com/maps/api/directions/json?origin=Disneyland&destination=Universal+Studios+Hollywood&key=AIzaSyBlHXlcGQ4m6BjY0Anhr3R1VZ3Pti6iNuQ`,function(response){
                //     console.log(response);
                // },"jsonp");
                // $.ajax({
                //     type: 'POST',
                //     crossDomain: true,
                //     dataType: 'jsonp',
                //     headers: { 
                //         'Content-Type': 'application/json'
                //     },
                //     url: 'https://maps.googleapis.com/maps/api/directions/json?origin=Disneyland&destination=Universal+Studios+Hollywood&key=AIzaSyBlHXlcGQ4m6BjY0Anhr3R1VZ3Pti6iNuQ',
                //     success: function(jsondata){
                //         console.log(jsondata);
                //     }
                // })

                return false;
            });

            // Want to use async/await? Add the `async` keyword to your outer function/method.
            // async function getUser() {
            //     try {
            //         const response = await axios.get('https://maps.googleapis.com/maps/api/directions/json?origin=Disneyland&destination=Universal+Studios+Hollywood&key=AIzaSyBlHXlcGQ4m6BjY0Anhr3R1VZ3Pti6iNuQ');
            //         console.log(response);
            //     } catch (error) {
            //         console.error(error);
            //     }
            // }
            // // https://enable-cors.org/server.html
            // getUser();
        });
    </script>
  </body>
</html>