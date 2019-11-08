@extends('main')

@section('content')

<div class="deal_detail">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="thumbnail-logo" src="{{$deal->company->thumbnail}}" width="20%">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button class="btn bold card_category_grid">{{$deal->category->name}}</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{URL::to('/buy_deal')}}/{{$deal->id}}"><button class="btn grey-btn buy-now-btn text-uppercase white"><b>Купи сега</b></button></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h1 class="bold grey">{{$deal->title}}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="bold yellow">50% при купување</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-8">
                <div class="images">
                    <div class="hidden-xs hidden-sm one-image">
                        @foreach ($image as $value)
                            <img class="one-img" src="{{$value}}" width="100%">
                        @endforeach
                    </div>
                    <div class="carousel slide" id="myCarousel">
                        <div class="carousel-inner">
                            @foreach ($deal->images as $key => $image)
                            <div class="item{{$key == 0 ? ' active' : '' }}">
                                <div class="col-xs-12 col-sm-12 col-md-4"><button class="carousel-img"><img src="{{url($image->path)}}" class="img-responsive"></button></div>
                            </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <i class="fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <i class="fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="description">
                    <p class="grey">{{$deal->description}}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 company-details">
                <h2 class="bold white">{{$deal->price}} денари</h2>
                <div class="like-dislike">
                    <i class="fas fa-thumbs-up"></i><span class="white bold">150</span>
                    <i class="fas fa-thumbs-down"></i><span class="white bold">47</span>
                </div>
                <div>
                    <p class="yellow">Имејл</p>
                    <span class="white">{{$deal->company->email}}</span>
                </div>
                <div>
                    <p class="yellow">Физичка адреса</p>
                    <span class="white">{{$deal->company->address}}</span>
                </div>
                <div>
                    <p class="yellow">Вебсајт</p>
                    <span class="white">{{$deal->company->websiteLink}}</span>
                </div>
                <div>
                    <p class="yellow">Фејсбук страна</p>
                    <span class="white">{{$deal->company->facebookLink}}</span>
                </div>
                <div>
                    <p class="yellow">Телефонски број</p>
                    <span class="white">{{$deal->company->phone}}</span>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d21131.21266825253!2d21.43334031945491!3d42.00300739127528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135415a58c9aa2a5%3A0xb2ed88c260872020!2sSkopje!5e0!3m2!1sen!2smk!4v1565880263319!5m2!1sen!2smk" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
