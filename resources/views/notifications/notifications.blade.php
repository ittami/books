@extends('layouts.app')
@section('content')







<div class="inv-blog-wrap bg7 add-padd-xs padding-lg-t150  marg-sm-t50">
    <div class="row">
        <div class="col-md-4 padd-lr0 col-md-offset-1">
            <article class="inv-stories-item inv-stories-item5 inv-stories-post margin-lg-b60 bg6">
                <div class="inv-stories-content">
                    <h3 class="h3">
                        {{ Auth::user()->name }} : Old Notifications
                    </h3>
                    <div class="inv-stories-post">
                        <ul>
                            <li>
                                @foreach(Auth::user()->readNotifications as $notification)
                            </li>
                            <li>
                                <a href="/usersList/{{ $notification->data['matche_user_id'] }}/userProfile" > Match Found with : {{ App\user::find($notification->data['matche_user_id'])->name }}</a>
                            </li>
                            <li>
                                <a href="/booksList/{{$notification->data['book_id'] }}/add">For the Book : {{App\Book::find($notification->data['book_id'])->title }}</a>
                            </li>
                            <li>
                                <a href="/addresses/{{($notification->data['type']== 'want_location_id')? $notification->data['want_location_id']:$notification->data['have_location_id'] }}/edit"
                                   > with you're  {{ ($notification->data['type']== 'want_location_id')? App\Location::find($notification->data['want_location_id'])->name:App\Location::find($notification->data['have_location_id'])->name }}</a>
                            </li>
                            <li>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>

            </article>
        </div>


        <div class="col-md-4 col-md-offset-1">
            <article class="inv-stories-item inv-stories-item5 inv-stories-post margin-lg-b60  bg6">

                <div class="inv-stories-content">
                    <div class="inv-places2-head">
                        <h3 class="h3">
                            {{ Auth::user()->name }} : New Notifications
                        </h3>
                    </div>
                    <div class="inv-stories-post">
                        <ul>
                            <li>
                                @foreach(Auth::user()->unreadNotifications as $notification)
                            </li>
                            <li>
                                <a href="/usersList/{{ $notification->data['matche_user_id'] }}/userProfile" > Match Found with : {{ App\user::find($notification->data['matche_user_id'])->name }}</a>
                            </li>
                            <li>
                                <a href="/booksList/{{$notification->data['book_id'] }}/add">For the Book : {{App\Book::find($notification->data['book_id'])->title }}</a>
                            </li>
                            <li>
                                <a href="/addresses/{{($notification->data['type']== 'want_location_id')? $notification->data['want_location_id']:$notification->data['have_location_id'] }}/edit"
                                   > with you're  {{ ($notification->data['type']== 'want_location_id')? App\Location::find($notification->data['want_location_id'])->name:App\Location::find($notification->data['have_location_id'])->name }}</a>
                            </li>
                            <li>
                                @endforeach
                            </li>
                        </ul>

                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

@endsection