<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <img class="img" src="{{asset('photo/wifi.jpg')}}" alt="..">&nbsp;iNet
        <a class="navbar-brand" href="{{url('/')}} " style="font-family: Ink Free; font-weight:bolder;font-size:22px">iNet</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">            
            </ul>            
            
            <ul class="navbar-nav">   
                @if(Auth::check())                

                    @if(Auth::user()->hasRole('Manager') || Auth::user()->hasRole('PostCreator'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Customers
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{url('admin/due/customer')}}" class="dropdown-item">due</a>
                                <a href="{{url('admin/active/customer')}}" class="dropdown-item">active</a>
                                <a href="{{url('admin/all/customer')}}" class="dropdown-item">all</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Service
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{url('admin/installation/create')}}" class="dropdown-item">create</a>
                                <a href="{{url('admin/installation')}}" class="dropdown-item">view</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Survey
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{url('admin/customer/create')}}" class="dropdown-item">create</a>
                                <a href="{{url('admin/customer')}}" class="dropdown-item">view</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Spliter
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{url('admin/spliter/create')}}" class="dropdown-item">create</a>
                                <a href="{{url('admin/spliter')}}" class="dropdown-item">view</a>
                            </div>
                        </li>
                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Post
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{url('postcreator/post/create')}}" class="dropdown-item">create</a>
                                <a href="{{url('postcreator/post')}}" class="dropdown-item">view</a>
                            </div>
                        </li>                        
                    @endif

                    @if(Auth::user()->hasRole('Manager'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/')}}">Admin</a>
                    </li>   
                    @endif  
                @endif
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                        <a class="dropdown-item" href="{{url('user/logout')}}">logout</a>
                        @else
                        <a class="dropdown-item" href="{{url('login')}}">login</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=" {{url('user/register')}} ">register</a>
                        @endif                    
                    </div>
                </li>            
            </ul>
        </div>
    </div>
</nav><br><br>