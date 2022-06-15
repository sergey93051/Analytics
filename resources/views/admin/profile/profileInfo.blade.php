<ul class="list-group profile-info">
    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong>
        &nbsp;{{Auth::user()->name}}</li>
    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">surname:</strong>
        &nbsp;{{Auth::user()->surname}}</li>
    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
        &nbsp;{{Auth::user()->email}}</li>
    {{-- <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li> --}}
    {{-- <li class="list-group-item border-0 ps-0 pb-0">
        <strong class="text-dark text-sm">Social:</strong> &nbsp;
        <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
            <i class="fab fa-facebook fa-lg"></i>
        </a>
        <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
        <i class="fab fa-twitter fa-lg"></i>
      </a>
      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
        <i class="fab fa-instagram fa-lg"></i>
      </a>
    </li> --}}
</ul>
