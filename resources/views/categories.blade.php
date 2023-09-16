    <!-- views/list-category.blade.php -->
    @extends('layouts.home-layout')

    @section('content')
        <div class="list-category">
            @foreach ($categories as $category)
                <div class="card">
                    <img src="{{ $category['images'][0]['image'] }}" alt="{{ $category['name'] }}">
                    <div class="card-content">
                        <a href="{{ url('category', ['slug' => $category['slug']]) }}">
                            <p>{{ $category['name'] }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
