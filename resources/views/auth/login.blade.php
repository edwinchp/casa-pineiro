<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Iniciar sesión</title>
    @include('layouts.links')
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
   
</head>

<body class="fix-menu"> 
<!-- <div class="loading"></div> -->
<div class="loading show">
    <div class="spin"></div>     
</div>  

        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="overlay">
                     <h1 class="deepshadow mt-4">FERRETERÍA CABLES</h1>
                    </div>
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Iniciar sesión</h3>
                                    </div>
                                   
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                             
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Iniciar sesión</button>
                                    </div>
                                </div>
                                <hr/>
                            </div>  
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
       
  
  
    <!-- Required Jquery -->




  

</body>
<style>


    /* position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('images/carga5.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: 1;
    filter: saturate(10);  
*/

.loading {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: 1s all;
        opacity: 0;
    }
    .loading.show {
        opacity: 5;
    }
    .loading .spin {
        border: 5px solid hsla(555, 100%, 62%, 0.2);
        border-top-color: blue;
        border-radius: 100%;
        width: 5em;
        height: 5em;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }            



.overlay .deepshadow{
  font-family: "Avant Garde", 'Avantgarde', "Century Gothic", 'CenturyGothic', "AppleGothic", sans-serif;
  font-size: 50px;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;  
}

.deepshadow{
   color: #fff;   
   letter-spacing: .2em;
   text-shadow: 
     5px 5px 1px #000, 
     7px 7px 0px rgba(0, 0, 0, 0.9);
}

body, html {
    height: 100%;
    background-repeat: no-repeat;
    background: url(/images/layouts/fondo12.jpg) no-repeat center center fixed;
    background-size: 100% 100%;
    background-attachment: fixed;
}


</style>

@include('layouts.scripts')

</html>
