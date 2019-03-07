
<nav class="navbar navbar-expand-lg navbar-light static-top" style="background-color:white">
        <div class="container">
          
<a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/storage/logo100x.png" alt="" 
             >
                  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">HOME</a>
                        </li>
                    <li class="nav-item">
                            <a class="nav-link" href="/motorhomes">MOTORHOMES</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/about">ABOUT</a>
                            </li>
                        <li class="nav-item" style="margin-right:10px">
                                <a href="{{ route('login') }}">  <button type="button" class="btn btn-outline-dark" >LOGIN</button></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item" style="margin-right:10px">
                               
                                <a href="{{ route('register') }}">  <button type="button" class="btn btn-outline-dark" >REGISTER</button></a> 
                            </li>
                        @endif
                    @else
                    <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">HOME</a>
                        </li>
                    <li class="nav-item">
                            <a class="nav-link" href="/motorhomes">MOTORHOMES</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/about">ABOUT</a>
                            </li>

                            @if(!Auth::guest())
                                @if(Auth::user()->admin == 1)
                                <li class="nav-item">
                                       <a class="nav-link" href="/rvmodels">MODELS</a>
                                   </li>
                                   <li class="nav-item">
                                           <a class="nav-link" href="/brands">BRADNS</a>
                                       </li>
                                       <li class="nav-item">
                                            <a class="nav-link" href="/rents">RENTS</a>
                                        </li>
                                @endif
                            @endif
                        <li class="nav-item">
                            {{ Form::open(['action' => 'MotorhomeController@search', 'method' => 'POST'] )}}
                            {{ Form::text('search', '', ['placeholder' => 'search']) }}
                            {{ Form::close() }}
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                           

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/users/{{Auth::user()->id}}/edit">Edit profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                               

                            </div>
                            
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
