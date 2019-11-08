<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="grey"><strong>Купете картичка со попуст за вашите <br> вработени.</strong></h1>
                <p>Најдобрите онлајн попусти за производи, услуги, фитнес центри, <br> ресторани, едукација и кариера.</p>
            </div>
        </div>
    </div>
</header>

<div class="search">
    <div class="container">
        <div class="row">
            <form action="" method="POST" class="form-inline col-md-10">
            @csrf
                <div class="form-group">
                    <input name="search" id="search" type="text" class="form-control search_discount" placeholder="Пребарај попусти">
                </div>
                <div class="form-group">
                    <div class="dropdown">
                        <select name="category" class="btn dropdown-toggle search_category grey">
                            <option value="">Сите</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <div class="hidden-xs col-md-2 col-sm-12 text-right">
                <button class="grid-btn"><i class="fas fa-th yellow"></i></button>
                <button class="list-btn"><i class="fas fa-list white"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="cards">
    <div class="container">
        <div class="row">
            @foreach ($deals as $deal)
            <div class="col-md-4 col-sm-6 discount">
                <div class="thumbnail thumbnail-grid text-center">
                    <img class="thumbnail-logo thumbnail-logo-grid" src="{{$deal->company->thumbnail}}">
                    <div class="caption caption_grid_view">
                        <h3 class="bold grey">{{$deal->title}}</h3>
                        <p class="yellow bold card_discount_grid">{{$deal->type_of_discount}}</p>
                        <button class="btn bold card_category_grid grey">{{$deal->category->name}}</button>
                    </div>
                    <div class="body body_grid_view">
                        <p class="bold grey"><i class="fas fa-thumbs-up"></i> <span>142</span> <i class="fas fa-thumbs-down"></i></p>
                        <a href="{{URL::to('/deal_details')}}/{{$deal->id}}"><button class="btn btn-block grey-btn text-uppercase white bold">Види повеќе</button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 white">
                <h1><strong>Дали сте заинтересирани вашата <br> компанија да понуди попуст?</strong></h1>
                <p>Најдобрите онлајн попусти за производи, услуги, фитнес центри,<br> ресторани, едукација и кариера.</p>
                <a href="{{ route('create_deal') }}"><button class="btn yellow-btn text-uppercase grey"><b>Креирај попуст</b></button></a>
            </div>
        </div>
    </div>
</footer>


