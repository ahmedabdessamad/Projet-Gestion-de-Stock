
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="#" />
    @include('plf.admin.inc.head')
</head>
<body>
@include('sweet::alert')
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">
    html,body {
        height: 100%;
        background: #fff;
    }
    .logo{
        max-width:200px;
    }
    .adjustedBox{
        width: 360px;
        padding-bottom: 20px;
    }
    .bgimg {
        background-image: url('#');
        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
    }
</style>

<div class="center-vertical bgimg">
    <div class="center-content row">
        <form class="col-md-4 col-sm-5 col-xs-11 col-lg-3 center-margin adjustedBox" enctype="multipart/form-data" method="POST" action="{{ route('handleUserLogin') }}">
                {{ csrf_field() }}
            <h3 class="mrg5B center-div text-transform-upr pageTitle">Connexion</h3>
            <h5 class="mrg5B center-div text-transform-upr driverTitle dontshow">Connexion à l'espace <b>Responsable</b></h5>
           
            <div id="login-form" class="content-box bg-default adjustedBox">
                <div class="content-box-wrapper pad20A">
                    <img class="mrg25B center-margin radius-all-100 display-block logo" src="{{ asset('templates/logologin.png') }}" alt="Logo">
                    <div class="form-group">
                        <a href="{{route('showAdminLogin')}}" class="btn btn-block btn-primary font-bold responsibleLogin">Admin<label class="pull-right mrg10R">
                            <i class="glyph-icon icon-typicons-right font-white"></i></label></a>
                    
                    </div>
                    <div class="form-group dontshow hiddenForm">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Entrer email">
                        </div>
                    </div>
                    <div class="form-group dontshow hiddenForm">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Mot De Passe">
                        </div>
                    </div>
                    <div class="form-group dontshow hiddenForm">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                    <div class="row dontshow hiddenForm">
                        <div class="checkbox-primary col-md-6" style="height: 20px;">
                            <label>
                                <input type="checkbox" id="loginCheckbox1" class="custom-checkbox">
                                Se Souvenir de moi
                            </label>
                        </div>
                        <div class="text-right col-md-6">
                            <a href="#" class="switch-button"
                                 title="Récupérer le mot de passe">Mot de passe oublié?</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@include('plf.admin.inc.footer')
{{--<script>--}}
    {{--$(document).ready(function(){--}}
        {{--$('.responsibleLogin').click(function(e){--}}
            {{--e.preventDefault();--}}
            {{--$('.responsibleLogin').hide();--}}
            {{--$('.clientLogin').hide();--}}
            {{--$('.pageTitle').hide();--}}
            {{--$('.hiddenForm').fadeIn(1500);--}}
            {{--$('.driverTitle').fadeIn(1500);--}}
        {{--});--}}
        {{--$('.clientLogin').click(function(e){--}}
            {{--e.preventDefault();--}}
            {{--$('.responsibleLogin').hide();--}}
            {{--$('.clientLogin').hide();--}}
            {{--$('.pageTitle').hide();--}}
            {{--$('.hiddenForm').fadeIn(1500);--}}
            {{--$('.clientTitle').fadeIn(1500);--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
</body>
</html>