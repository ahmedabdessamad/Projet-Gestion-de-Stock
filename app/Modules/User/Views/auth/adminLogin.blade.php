
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
</style>

<div class="center-vertical">
    <div class="center-content row">
        <form class="col-md-4 col-sm-5 col-xs-11 col-lg-3 center-margin adjustedBox" enctype="multipart/form-data" method="POST" action="{{ route('handleUserLogin') }}">
                {{ csrf_field() }}
            <div id="login-form" class="content-box bg-default adjustedBox">
                <div class="content-box-wrapper pad20A">
                    <img class="mrg25B center-margin radius-all-100 display-block logo" src="{{ asset('templates/logologin.png') }}" alt="Logo">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Entrer email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Mot De Passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                    <div class="row">
                        <div class="checkbox-primary col-md-6" style="height: 20px;">
                            <label>
                                <input type="checkbox" id="loginCheckbox1" class="custom-checkbox">
                                Se Souvenir de moi
                            </label>
                        </div>
                        <div class="text-right col-md-6">
                            <a href="#" class="switch-button" title="Récupérer mot de passe">Mot de passe oublié?</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="login-forgot" class="content-box bg-default hide">
                <div class="content-box-wrapper pad20A">
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email address:</label>
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                    </div>
                </div>
                <div class="button-pane text-center">
                    <button type="submit" class="btn btn-md btn-primary">Recover Password</button>
                    <a href="#" class="btn btn-md btn-link switch-button" title="Cancel">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@include('plf.admin.inc.footer')
</body>
</html>