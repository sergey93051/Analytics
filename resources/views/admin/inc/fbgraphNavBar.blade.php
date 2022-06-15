<div class="col-md">
    <img src="{{asset('storage/fc/FacebookAnalyticsLogo.jpg')}}" width="250px" height="auto" alt="">
    </li>
</div>
<nav class="navbar navbar-expand-lg navbar-graph" id="navbar-graph">
    <img src="{{$fcProfile->src}}" alt="" width="80px" class="m-1">
    <strong class="navbar-brand  m-1">{{$fcProfile->name}}</strong>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse m-2" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto fb-hover-navbar">
            <li class="nav-item active av-item-fc">
                <a class="nav-link" href="{{route('fcGraphShow')}}">Feed<span class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item av-item-fc">
                       <a class="nav-link" href="#">Link</a>
                </li>--}}
            <li class="nav-item dropdown av-item-fc">
                <a id="dropdown-Analytics-fcGraphNav" class="nav-link dropdown-toggle dropdown-Analytics" href="#"
                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Analytics
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('pageEngagement')}}">Page Engagement</a>
                    <a class="dropdown-item" href="{{route('PageImpressions')}}">Page Impressions</a>
                    <a class="dropdown-item" href="{{route('pageReactions')}}">Page Reactions</a>
                    <a class="dropdown-item" href="{{route('pageView')}}">Page Views</a>
                    <a class="dropdown-item" href="{{route('pageVideoView')}}">Page Video Views</a>
                    {{-- <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="{{route('ctaClick')}}">Page CTA Clicks</a>
                    <a class="dropdown-item" href="{{route('demographics')}}">Page User Demographics</a>
                </div>
            </li>
            <li class="nav-item av-item-fc">
                <a class="nav-link" href="{{route('stories')}}">Stories</a>
            </li>
        </ul>
    </div>
</nav>
