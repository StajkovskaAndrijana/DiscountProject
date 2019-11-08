<div class="table-responsive">
    <table class="table table-bordered grey">
        <thead>
            <tr>
                <th>Реден број</th>
                <th>Име и презиме</th>
                <th>Име на компанија</th>
                <th>Број на вработени</th>
                <th>Телефон за контакт</th>
                <th>Дата на внесување на апликацијата</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->fullName}}</td>
                    <td>{{$customer->companyName}}</td>
                    <td>{{$customer->numberOfEmployees}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


