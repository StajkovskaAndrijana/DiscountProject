@extends('main')

@section('content')

    <div class="container update_deal">
        <div class="row">
            <form action="{{route('update_deal_submit')}}" method="POST" enctype="multipart/form-data">
            @csrf
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="form-group col-md-12">
                    <label class="bold">Име на компанија</label><br>
                    <input type="text" value="{{ $deal->company->name }}" name="name" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Наслов на купонот</label><br>
                    <input type="text" value="{{ $deal->title }}" name="title" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Вид на купонот</label><br>
                    <input type="text" value="{{ $deal->type_of_discount }}" name="type_of_discount" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Цена на купонот</label><br>
                    <input type="number" value="{{ $deal->price }}" name="price" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Категорија</label><br>
                    <select name="category">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Смени thumbnail</label><br>
                    <input type="file" name="thumbnail">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Опис на понудата</label><br>
                    <input type="text" value="{{ $deal->description }}" name="description" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Вебсајт на компанијата</label><br>
                    <input type="text" value="{{ $deal->company->websiteLink }}" name="websiteLink" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Фејсбук линк на компанијата</label><br>
                    <input type="text" value="{{ $deal->company->facebookLink }}" name="facebookLink" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Телефонски број</label><br>
                    <input type="tel" value="{{ $deal->company->phone }}" name="phoneNumber" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Мејл на компанијата</label><br>
                    <input type="email" value="{{ $deal->company->email }}" name="companyEmail" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Google Maps адреса</label><br>
                    <input type="text" value="{{ $deal->company->googleMapsAddress }}" name="googleMapsAddress" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Физичка адреса</label><br>
                    <input type="tel" value="{{ $deal->company->address }}" name="address" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">Фотографии</label><br>
                    <input type="file" name="image[]" multiple="multiple" value="">
                </div>
                <input type="hidden" name="company_id" value="{{$deal->company->id}}">
                <input type="hidden" name="deal_id" value="{{$deal->id}}">
                <button class="btn grey-btn bold white send-btn text-uppercase" type="submit">Испрати</button>
            </form>
        </div>
    </div>

@endsection
