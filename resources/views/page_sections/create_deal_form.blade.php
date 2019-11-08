@extends('main')

@section('content')

<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('homepage')}}"><i class="fas fa-long-arrow-alt-left black"></i></a>
                <h1 class="grey"><strong>Понудете картичка со попуст</strong></h1>
            </div>
        </div>
    </div>
</header>

<div class="create_card_form">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{route('create_deal_submit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label class="bold">Име на компанијата која нуди попуст</label><br>
                        <input type="text" name="name" class="form-control" placeholder="пр. Мајкрософт ДООЕЛ" value="{{ old('name') }}" autocomplete="name">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="bold">Вид на попуст</label><br>
                        <input type="text" name="type_of_discount" class="form-control" placeholder="пр. 50% на купување" value="{{ old('type_of_discount') }}" autocomplete="title" >
                        @if ($errors->has('type_of_discount'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('type_of_discount') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="bold">Наслов на попустот</label><br>
                        <input type="text" name="title" class="form-control" placeholder="пр. Попуст во најновиот фитнес центар" value="{{ old('title') }}" autocomplete="title" >
                        @if ($errors->has('title'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="bold">Цена на купонот</label><br>
                        <input type="number" name="price" class="form-control" placeholder="пр. 750" value="{{ old('price') }}" autocomplete="price" >
                        @if ($errors->has('price'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="bold">Избери категорија</label><br>
                        @foreach ($categories as $category)
                            <label class="btn radio-btn"><input type="radio" name="category" value="{{$category->id}} {{(old('category')==$category->id)? 'selected':''}}"><span class="bold grey text-uppercase">{{$category->name}}</span></input></label>
                        @endforeach
                        @if ($errors->has('category'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="bold">Постави thumbnail</label>
                        <input type="file" name="thumbnail" value="{{ old('thumbnail') }}" autocomplete="thumbnail" id="thumbnail" onchange="loadFile(event)">
                        <img class="thumbnail_upload" id="output"/>
                        <p>Сликата мора да биде во .png формат</p>
                        @if ($errors->has('thumbnail'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('thumbnail') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="bold">Опис на понудата</label>
                        <textarea class="form-control bold text-left" name="description" rows="6" autocomplete="description">Краток опис на вашата понуда</textarea>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="grey">Линк до вашиот вебсајт</label>
                        <input name="websiteLink" type="text" class="form-control" placeholder="пр. http://mojotvebsajt.com" value="{{ old('websiteLink') }}" autocomplete="websiteLink">
                        @if ($errors->has('websiteLink'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('websiteLink') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="grey">Фејсбук страна</label>
                        <input name="facebookLink" type="text" class="form-control" placeholder="пр. https://facebook.com/my_company" value="{{ old('facebookLink') }}" autocomplete="facebookLink">
                        @if ($errors->has('facebookLink'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('facebookLink') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="grey">Телефонски број</label>
                        <input name="phoneNumber" type="tel" class="form-control" placeholder="пр. 07X/XXX-XXX" value="{{ old('phoneNumber') }}" autocomplete="phoneNumber">
                        @if ($errors->has('phoneNumber'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('phoneNumber') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="grey">Вашиот имејл</label>
                        <input name="companyEmail" type="email" class="form-control" placeholder="пр. mojotmail@gmail.com" value="{{ old('companyEmail') }}" autocomplete="companyEmail">
                        @if ($errors->has('companyEmail'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('companyEmail') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="grey">Google maps адреса</label>
                        <input name="googleMapsAddress" type="text" class="form-control" placeholder="пр. https://www.google.com/maps/place/your+place" value="{{ old('googleMapsAddress') }}" autocomplete="googleMapsAddress">
                        @if ($errors->has('googleMapsAddress'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('googleMapsAddress') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="grey">Физичка адреса</label>
                        <input name="address" type="text" class="form-control" placeholder="пр. Партизански херои бб." value="{{ old('address') }}" autocomplete="address">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label class="grey">Фотографии</label>
                        <input type="file" name="image[]" multiple="multiple">
                        <p>Може да изберете максимум 8 слики</p>
                        @if ($errors->has('image'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button class="btn grey-btn bold white send-btn text-uppercase" type="submit">Испрати</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
