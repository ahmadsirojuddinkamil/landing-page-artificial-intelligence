{{-- search --}}
@if (Request::is('user*'))
@endif
<div class="collapse" id="search-nav">
    <form class="navbar-left navbar-form nav-search mr-md-3" action="{{ url()->current() }}" method="GET">
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="submit" class="btn btn-search pr-1">
                    <i class="fa fa-search search-icon"></i>
                </button>
            </div>
            <input type="search" placeholder="Search ..." class="form-control" name="search"
                value="{{ request('search') }}">
        </div>
    </form>
</div>

{{-- get search --}}
<li class="nav-item toggle-nav-search hidden-caret">
    <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false"
        aria-controls="search-nav">
        <i class="fa fa-search"></i>
    </a>
</li>
