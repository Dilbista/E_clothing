<h1>Categories List</h1>

@if(isset($categories))
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->categories_name }}</li>
        @endforeach
    </ul>
@else
    <p>The variable $categories is not defined.</p>
@endif