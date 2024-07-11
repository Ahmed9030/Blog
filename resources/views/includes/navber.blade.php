  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>{{$blog->blog_name}}</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Blog</a></li>
          <li class="dropdown"><a href="category.html"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                @foreach ($categoryies as $category)
                <li><a href="{{route('category' , $category->id)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
          </li>

          <li><a href="{{route('about')}}">About</a></li>
          <li><a href="">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form method="GET" action="{{route('search')}}" class="search-form">
            @csrf
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" name="search" class="form-control">
            <button type="submit" class="btn btn-primary"></button>
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->
