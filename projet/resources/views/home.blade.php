@extends('layouts.app')
@section('content')
    <div class="slide-one-item home-slider owl-carousel">
        @foreach ($props as $prop)
            <div class="site-blocks-cover overlay"
                style="background-image: url({{ asset('assets/images/' . $prop->image . '') }});" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10">
                            @if ($prop->type == 'Buy')
                                <span
                                    class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                            @elseif ($prop->type == 'Rent')
                                <span
                                    class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                            @else
                                <span
                                    class="d-inline-block bg-warning text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                            @endif

                            <h1 class="mb-2">{{ $prop->title }}</h1>
                            <p class="mb-5"><strong class="h2 text-success font-weight-bold">$
                                    {{ $prop->price }}</strong>
                            </p>
                            <p><a href="{{ route('single.prop', $prop->id) }}"
                                    class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See
                                    Details</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
     <div class="site-section site-section-sm pb-0">
            <div class="container">
                <div class="row">
                    <form action="{{ route('search.prop') }}" method="POST" class="form-search col-md-12"
                        style="margin-top: -100px;">
                        @csrf
                        <div class="row align-items-end">
                              <div class="col-md-3">
                                <label for="list-types">Listing Types</label>
                                <div class="select-wrap">
                                    <span class="icon icon-arrow_drop_down"></span>
                                    <select name="home_type" id="list-types" class="form-control d-block rounded-0">
                                       <option value="">All</option>
                                        <option value="oberge">oberge</option>
                                        <option value="villa">villa</option>
                                        <option value="maison">maison </option>
                                    </select>
                                </div>
                            </div>
                              <div class="col-md-3">
                                <label for="offer_types">Offer Type</label>
                                <div class="select-wrap">
                                    <span class="icon icon-arrow_drop_down"></span>
                                    <select name="type" id="offer-types" class="form-control d-block rounded-0">
                                    <option value="">All</option>
                                        <option value="Buy">Buy</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Lease">Lease</option>
                                    </select>
                                </div>
                            </div>  
                             <div class="col-md-3">
                                <label for="city">Select City</label>
                                <div class="select-wrap">
                                    <span class="icon icon-arrow_drop_down"></span>
                                    <select name="city" id="select-city" class="form-control d-block rounded-0">
                                         <option value="">All</option>
                                        <option value="New York">New York</option>
                                        <option value="Brooklyn">Brooklyn</option>
                                        <option value="London">London</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Philippines">Philippines</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input name="submit" type="submit" class="btn btn-success text-white btn-block rounded-0"
                                    value="Search">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="row">
    <div class="col-md-12">
        <div class="bg-white py-3 px-4 d-flex flex-wrap justify-content-between align-items-center shadow-sm rounded border">
            <div class="mb-2 mb-md-0">
                <a href="{{ route('home') }}" class="btn btn-outline-primary me-2 {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="icon-view_module"></i> Grid View
                </a>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('home') }}"
                   class="btn btn-outline-secondary {{ request()->routeIs('home') ? 'active' : '' }}">
                    All
                </a>
                <a href="{{ route('price.asc.prop') }}"
                   class="btn btn-outline-secondary {{ request()->routeIs('price.asc.prop') ? 'active' : '' }}">
                    Price ↑
                </a>
                <a href="{{ route('price.desc.prop') }}"
                   class="btn btn-outline-secondary {{ request()->routeIs('price.desc.prop') ? 'active' : '' }}">
                    Price ↓
                </a>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>

       

    {{-- properties --}}
    <div class="site-section site-section-sm bg-light ">
        <div class="container">
            <div class="row mb-5">
                @foreach ($props as $prop)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $prop->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-danger">Sale</span>
                                    <span class="offer-type bg-success">{{ $prop->type }}</span>
                                </div>
                                <img src="{{ asset('assets/images/' . $prop->image . '') }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title"><a
                                        href="{{ route('single.prop', $prop->id) }}">{{ $prop->title }}</a>
                                </h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                    {{ $prop->location }}
                                </span>
                                <strong
                                    class="property-price text-primary mb-3 d-block text-success">${{ $prop->price }}</strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $prop->beds }} <sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">{{ $prop->baths }}</span>
                                        <span class="property-specs-number">2</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $prop->sq_ft }}</span>

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    {{-- why choose us section starts --}}
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="site-section-title">
                        <h2>Why Choose Us?</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe
                        architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur
                        corporis, eaque, deleniti cupiditate officia.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-house"></span>
                        <h2 class="service-heading">Research Subburbs</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus
                            perspiciatis ex odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-sold"></span>
                        <h2 class="service-heading">Sold Houses</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus
                            perspiciatis ex odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-camera"></span>
                        <h2 class="service-heading">Security Priority</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus
                            perspiciatis ex odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
            </div>
        </div>
    </div>



    {{-- why choose us section ends --}}
    {{-- Avis Clients --}}
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="site-section-title">Avis des Clients</h2>
                <p>Ce que disent nos clients à propos de notre service de location.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($reviews as $review)
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="team-member text-center p-4 border rounded bg-white">
                        {{-- Image utilisateur (avatar vide par défaut) --}}
                        <img src="{{ asset('assets/images/Profile_avatar_placeholder_large.png') }}"
                             alt="User Avatar"
                             class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">

                        <div class="text">
                            <h4 class="text-black">{{ $review->user->name ?? 'Utilisateur Anonyme' }}</h4>
                            <p class="text-muted">Note : {{ $review->rating }}/5</p>
                            <p>"{{ $review->comment }}"</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


    {{-- our agents ends --}}
@endsection
