    <!-- views/list-category.blade.php -->
    @extends('layouts.home-layout')

    @section('content')
        <div class="list-category">
            @foreach ($categories as $category)
                <a href="{{ url('category', ['slug' => $category['slug']]) }}" class="card">
                    <img src="{{ $category['images'][0]['image'] }}" alt="{{ $category['name'] }}">
                    <div class="card-content">
                        <p>{{ $category['name'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endsection
