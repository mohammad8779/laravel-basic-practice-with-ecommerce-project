<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/css/stylelogin.css')}}" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">

            <h2 style="color: green">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', '');
                }
                ?>
            </h2>

            <h2 style="color: red">
                <?php
                $exception = Session::get('exception');
                if ($exception) {
                    echo $exception;
                    Session::put('exception', '');
                }
                ?>
            </h2>
            <h1>Admin Login</h1>
            <!--start form -->
            {!! Form::open(['url' => '/login_check', 'method' => 'post']) !!}

            <div>
                <input type="text" placeholder="Admin Email"  name="admin_email"/>
            </div>
            <div>
                <input type="password" placeholder="Password" name="admin_password"/>
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>
            {!! Form::close() !!} 
            <!--end form -->
            <div class="button">
                <a href="#">Training with live project</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>

