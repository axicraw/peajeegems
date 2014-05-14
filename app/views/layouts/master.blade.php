
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Peajeegems</title>

    <!-- Bootstrap core CSS -->
   <link href="/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="/css/style.css">
   @yield('header_includes')

    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Peajeegems</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            

            
            @if(!Auth::guest())
            
              @if ((Auth::user()->username) == 'admin')              
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/users">Users</a></li>
                <li><a href="/posts">Messages</a></li>
                <li><a href="/docs">Files</a></li>
              @endif
              <li><a href="/logout">logout</a></li>
            @endif

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      @yield('content')

    </div><!-- /.container -->


    <div class="footer">
      @yield('footer')
      <div class="copy">
        <p>Peejeegems &copy; All rights reserved 2014.</p>
      </div>
    </div>
  </body>
</html>
