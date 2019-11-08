@extends('main')

@section('content')

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{URL::to('/deal_details')}}/{{$deal->id}}"><i class="fas fa-long-arrow-alt-left black"></i></a>
                <h1 class="grey"><strong>Купи картичка за вработените</strong></h1>
            </div>
        </div>
    </div>
</header>

<div class="buy_card_form">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{route('buy_deal_submit')}}" method="POST">
                @csrf
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label class="bold">Име и презиме</label><br>
                        <input type="text" name="fullName" class="form-control" placeholder="пр. Кристијан Ѓорѓиевски" value="{{ old('fullName') }}" autocomplete="fullName">
                        @if ($errors->has('fullName'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('fullName') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label class="bold">Име на компанија</label><br>
                        <input type="text" name="companyName" class="form-control" placeholder="пр. Мајкрософт ДООЕЛ" value="{{ old('companyName') }}" autocomplete="companyName">
                        @if ($errors->has('companyName'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('companyName') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label class="bold">Број на вработени</label>
                        <input type="number" name="numberOfEmployees" class="form-control" placeholder="пр. 200" value="{{ old('numberOfEmployees') }}" autocomplete="numberOfEmployees">
                        @if ($errors->has('numberOfEmployees'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('numberOfEmployees') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label class="bold">Телефон за контакт</label>
                        <input type="tel" name="phone" class="form-control" placeholder="пр. 07X/XXX-XXX" value="{{ old('phone') }}" autocomplete="phone">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback red" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <input type="hidden" name="deal_id" value="{{$deal->id}}">
                    <button class="btn grey-btn bold white send-btn text-uppercase" type="submit">Испрати</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
