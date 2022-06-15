
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <span>
                        {{ Breadcrumbs::render(
                                  Request::route()->getName()
                                )
                           }}
                    </span>
                </li>
                {{-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li> --}}
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    {{-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
   					<input type="text" class="form-control" placeholder="Type here..."> --}}
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                @if (Request()->route()->getPrefix()=="private/admin/fb")
                <li class="p-1">
                    <div class="dropdown">
                        <form class='form d-flex justify-content-end' action="{{route('fbApi')}}" method="post">
                            @csrf
                            <select name="fbAccaunt" class="form-control m-1 FbId-select">

                                @foreach ($fbApi as $key => $item)
                                <option @if(session()->get('fbinput')==$item->FCACCAUNT) selected @endif
                                    value="{{$item->FCACCAUNT}}">
                                    {{$item->FCNAME}}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primery m-1 change-FbId">change FB page</button>
                        </form>
                    </div>
                </li>
                @else
                <li class="p-1">
                    <div class="dropdown">
                        <form class='form d-flex justify-content-end' action="{{route('chooseApi')}}" method="post">
                            @csrf
                            <select name="shopifyDomen" class="form-control m-1 shopifyDomen-select">
                                @foreach ($shopifyApiDomen as $key => $item)
                                <option @if(session()->get('input')==$item) selected @endif
                                    value="{{$item}}">
                                    {{$item}}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primery m-1 change-shopify">change shopify</button>
                        </form>
                    </div>
                </li>
                @endif
                <li class="p-1">
                    <div class="dropdown justify-content-end">
                        <div id="dropdown__SettProf__btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="profil-img-navbar">
                                @if (!empty(Auth::user()->fb_img))
                                <img src="{{asset(Auth::user()->fb_img)}}" alt="profile_image">
                                @elseif (!empty(Auth::user()->gl_img))
                                <img src="{{asset(Auth::user()->gl_img)}}" alt="profile_image">
                                @elseif (!empty(Auth::user()->img))
                                <img src="{{asset('/storage/user/'.Auth::user()->img)}}" alt="profile_image">
                                @else
                                <img src="{{asset('/storage/user/defaultProfileImg.png')}}" alt="profile_image">
                                @endif
                            </span>
                            <span class="p-1">
                                {{Auth::user()->name}}&nbsp;{{Auth::user()->surname}}
                            </span>
                        </div>
                        <ul class="dropdown-menu dropdown__SettProf__show" aria-labelledby='dropdown__SettProf__btn'>
                            <li><a class="dropdown-item" href="{{route('profile.index')}}"
                                    @if(\Request::route()->getName()=="profile.index")
                                    onclick="return false;"
                                    @endif>
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("logout")}}" class="dropdown-item">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <span class="d-sm-inline d-none">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
