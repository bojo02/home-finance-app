<x-layout>
    <div class="container mt-5">
        <div class="clear">
            <a style="float:right;" href="{{route('income.create')}}" class="btn btn-success">Добави Приход</a>
            <h1 style="float:left;" >Всички Приходи</h1>
        </div>
        <hr>
        @foreach ($incomes as $income)
        <a style="text-decoration:none;" href="{{route('income.edit', ['income' => $income->id])}}">
            <div class="card mt-3">
                <div class="card-body">
                  {{$income->amount}}лв | {{$income->note}} | {{$income->category->name}} | {{$income->created_at->format('d/m/Y')}}
                </div>
            </div>
        </a>
        @endforeach
        @if(count($incomes) == 0)
            Все още няма приходи...
        @else
        {{$incomes->links()}}
        @endif
    </div>
</x-layout>