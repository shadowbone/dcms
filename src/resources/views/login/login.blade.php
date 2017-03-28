<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>SIMRS</title>
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    {!! Html::style('assets/css/bootstrap.min.css'); !!}
    {!! Html::style('assets/font-awesome/4.5.0/css/font-awesome.min.css'); !!}
    {!! Html::style('assets/css/fonts.googleapis.com.css'); !!}
    {!! Html::style('assets/css/ace.min.css'); !!}
    {!! Html::style('assets/css/ace-rtl.min.css'); !!}
</head>
<body class="login-layout light-login">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <h1>
                  <i class="ace-icon fa fa-leaf green"></i>
                  <span class="red">Simrs</span>
                  <span class="white" id="id-text2">Application</span>
                </h1>
                <h4 class="blue" id="id-company-text">&copy; Bone</h4>
              </div>

              <div class="space-6"></div>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Please Enter Your Information
                      </h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {!! csrf_field() !!}
                      <div class="space-6"></div>
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" name="email" class="form-control" placeholder="Email" value="{!! old('email') !!}" required/>
                              <i class="ace-icon fa fa-user"></i>
                              <div style="color:red;font-size: 12px;">
                              </div>
                            </span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" name="password" class="form-control" placeholder="Password" />
                              <i class="ace-icon fa fa-lock"></i>
                              <div style="color:red;font-size: 12px;">
                              </div>
                            </span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                          </label>

                          <div class="space"></div>

                          <div class="clearfix">
                            <label class="inline">
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>

                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Login</span>
                            </button>
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>
                      <div class="space-6"></div>
                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div><!-- /.login-box -->

              </div><!-- /.position-relative -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div>
{!! Html::script(asset('assets/js/scripts.min.js')) !!}
</body>
</html>