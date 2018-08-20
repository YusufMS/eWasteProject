<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('home') }}">Online E-waste Management System
         @if(Auth::check() && Auth::user()->_usertype == 'seller' || Session::get('user_role') == 'seller')
        <span class="text-muted"> : Seller Portal</span>
        @elseif(Auth::check() && Auth::user()->_usertype == 'buyer' || Session::get('user_role') == 'buyer')
        <span class="text-muted"> : Buyer Portal</span>
        @endif
    
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            {{-- should configure to change for the active page --}}
            <li class="nav-item active">
                <a class="nav-link" href="/posts">Portal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profiles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            

            <li class="nav-item active">
                <a class="nav-link" href='/viewUsersByCategory'>View Users <span class="sr-only">(current)</span></a>
            </li>



        </ul>


        @guest
            <ul class="navbar-nav navbar-right">
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            </ul>
        @else
            <ul class="navbar-nav navbar-right">

                @if(Auth::user()->_usertype == 'seller' || Session::get('user_role') == 'seller')

                    <li class="nav-item dropdown shown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="true">Posts</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item " href="/posts/create">{{ __('Add New Post') }}</a>
                            
                            <a class="dropdown-item"
                                href="/showMyPosts/{{Auth::user()->id}}">{{ __('Your posts') }}</a>
                                <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/posts">{{ __('Portal') }}</a>
                        </div>
                    </li>


                @elseif(Auth::user()->_usertype == 'buyer' || Session::get('user_role') == 'buyer')

                    <li class="nav-item dropdown shown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Posts</a>
                        <div class="dropdown-menu shown dropdown-menu-right">
                            <a class="dropdown-item " href="/posts/create">{{ __('Add New Post') }}</a>
                            <a class="dropdown-item" href="/showMyPosts/{{Auth::user()->id}}">{{ __('Your posts') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/posts">{{ __('Portal') }}</a>
                        </div>
                    </li>
                @endif


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user pr-1"></i>{{ Auth::user()->full_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                            {{ __('Profile') }}
                        </a>


                        @if( Auth::user()->_usertype == "buyer/seller")
                            <hr>
                            <a class="dropdown-item" href="/sellerHome">

                                {{ __('Seller Portal') }}
                                @if(Session::get('user_role') == 'seller')
                                    <kbd class="bg-success mx-1">active</kbd>
                                @endif
                            </a>
                            <a class="dropdown-item" href="/buyerHome">
                                {{ __('Buyer Portal') }}
                                @if(Session::get('user_role') == 'buyer')
                                    <kbd class="bg-success mx-1">active</kbd>
                                @endif
                            </a>
                        @endif
                        <hr>

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
            </ul>
        @endguest


    </div>
</nav>

