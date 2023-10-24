<x-layout>
    <div class="container mt-5">
        <div class="clear">
            <a style="float:right;" href="{{route('income-category.create')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Добави Категория</a>
            <h1 style="float:left;" >Категории Приходи</h1>
        </div>
        <hr>
        @foreach ($categories as $category)
        <a style="text-decoration:none;" href="{{route('income-category.edit', ['incomeCategory' => $category])}}">
            <div class="card mt-3">
                <div class="card-body">
                  {{$category->name}}
                </div>
            </div>
        </a>
        @endforeach
        @if(count($categories) == 0)
            Все още няма категории за приходи...
        @else
        {{$categories->links()}}
        @endif
    </div>
</x-layout>