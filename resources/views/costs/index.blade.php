<x-layout>
    <div class="container mt-5">
        <div class="clear">
            <a style="float:right;" href="{{route('cost.create')}}" class="btn btn-success">Добави Разход</a>
            <h1 style="float:left;" >Всички Разходи</h1>
        </div>
        <hr>
        @foreach ($costs as $cost)
        <a style="text-decoration:none;" href="{{route('income.edit', ['income' => $income->id])}}">
            <div class="card mt-3">
                <div class="card-body">
                  {{$cost->amount}}лв | {{$cost->note}} | {{$cost->category->name}} | {{$cost->created_at->format('d/m/Y')}}
                </div>
            </div>
        </a>
        @endforeach
        @if(count($costs) == 0)
            Все още няма разходи...
        @else
        {{$incomes->links()}}
        @endif
    </div>
</x-layout>