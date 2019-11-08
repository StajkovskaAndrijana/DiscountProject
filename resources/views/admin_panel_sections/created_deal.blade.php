<div class="table-responsive">
    <table class="table table-bordered grey">
        <thead>
            <tr>
                <th>Реден број</th>
                <th>Име на компанија</th>
                <th>Наслов на попустот</th>
                <th>Вид на попуст</th>
                <th>Мејл</th>
                <th>Телефон за контакт</th>
                <th>Дата на креирање на попустот</th>
                <th>Разгледај попуст</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deals as $deal)
                <tr>
                    <td>{{$deal->id}}</td>
                    <td>{{$deal->company->name}}</td>
                    <td>{{$deal->title}}</td>
                    <td>{{$deal->type_of_discount}}</td>
                    <td>{{$deal->company->email}}</td>
                    <td>{{$deal->company->phone}}</td>
                    <td>{{$deal->created_at}}</td>
                    <td><a href="{{URL::to('/deal/detail')}}/{{$deal->id}}"><button class="btn btn-info">Прикажи</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


