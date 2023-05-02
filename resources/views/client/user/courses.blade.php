@extends('layouts/app')
<link>
@section('content')
    @component('client.components.breadcrumb')
        @slot('title') Менің курстарым @endslot
        @slot('parent') Басты бет @endslot
        @slot('active') Менің курстарым @endslot
    @endcomponent
    <section class="courses">
        <div class="container">
            <div class="course-items">
                @forelse($courses as $course)
                    <div class="course-card ">
                        <img class="course-card-img" width="100%" height="auto"
                             src="{{asset($course->image
                                    ? (\App\Models\Course::IMAGE_PATH . $course->image)
                                    : 'images/course_1.png')}}" alt="Course image">
                        <div class="course-card-body">
                            @if(!empty($course->author))
                                <div class="author">
                                    Авторы: {{ $course->author }}
                                </div>
                            @endif
                            <h3 class="title">{{$course->name}}</h3>

                            <div class="price">
                                {{ \App\Services\NumberFormatService::money($course->price)  }} ₸
                                @if($course->old_price)
                                    <span class="old-price">
                                    {{ \App\Services\NumberFormatService::money($course->old_price)  }} ₸
                                </span>
                                @endif
                            </div>
                        </div>
                        <a class="default-btn btn-open" href="{{ route('courses.show', $course) }}">
                            Толық ашу
                        </a>
                    </div>
                @empty
                    <h2>Менің курстарым бос</h2>
                @endforelse
            </div>
        </div>
    </section>
@endsection
