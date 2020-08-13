@extends('layouts.app')

@section('title')
    Komodata - Home
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div
                        id="storeCarousel"
                        class="carousel slide"
                        data-ride="carousel"
                    >
                        <ol class="carousel-indicators">
                            <li
                                data-target="#storeCarousel"
                                data-slide-to="0"
                                class="active"
                            ></li>
                            <li
                                data-target="#storeCarousel"
                                data-slide-to="1"
                            ></li>
                            <li
                                data-target="#storeCarousel"
                                data-slide-to="2"
                            ></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img
                                    src="images/banner1.jpg"
                                    class="d-block w-100 rounded"
                                    alt="Carousel Image"
                                />
                            </div>
                            <div class="carousel-item">
                                <img
                                    src="images/banner2.jpg"
                                    class="d-block w-100 rounded"
                                    alt="Carousel Image"
                                />
                            </div>
                            <div class="carousel-item active">
                                <img
                                    src="images/banner3.jpg"
                                    class="d-block w-100 rounded"
                                    alt="Carousel Image"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="custom-categories">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="h3">COMMODITY CATEGORIES</h2>
                </div>
            </div>
            <div class="row">
                @php
                    $incrementCategory = 0;
                @endphp
                @forelse ($categories as $category)
                    <div
                    class="col-6 col-md-3 col-lg-3"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementCategory += 100 }}"
                    >
                        <a class="component-categories d-block" href="{{ route('categories-detail', $category->slug) }}">
                            <div class="categories-image text-center">
                                <img
                                    src="{{ url($category->photo) }}"
                                    alt="{{ $category->name }}"
                                    class="w-50"
                                />
                            </div>
                            <p class="categories-text">
                                {{ $category->name  }}
                            </p>
                        </a>
                    </div>
                @empty
                <h3 class="col-12 text-center py-5 h4 text-secondary"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    Category Not Found
                </h3>
                @endforelse
            </div>
        </div>
    </section>

    <section class="custom-table">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="h3">LATEST COMMODITY PRICES</h2>
                </div>
            </div>
            <div class="row">
                <table class="table"
                        data-aos="fade-up"
                        data-aos-delay="100">
                    <thead>
                        <tr>
                            <th scope="col">Commodity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $increment = 0;
                        @endphp
                        @forelse ($commodities as $commodity)
                        <tr>
                            <td>{{ $commodity->name }}</td>
                            <td>{{ $commodity->price }}</td>
                            <td>{{ $commodity->units }}</td>
                            <td>{{ $commodity->updated_at }}</td>
                        </tr>
                        @empty
                            <th colspan="4" class="text-center">No Commodity</th>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
    
@endsection