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
                                <a href="/usersList/{{ $notification->matched_user_id }}/userProfile" > Match Found with : {{ $notification->matched_user_name }}</a>
                            </li>
                            <li class='markedRead'>
                                <a href="/booksList/{{$notification->matched_book_id }}/add">For the Book : {{ $notification->matched_book_title }}</a>
                            </li>
                            <li class='markedRead'>
                                <a href="/addresses/{{ $notification->matched_location }}/edit"
                                   > with you're  {{ $notification->matched_location_name }}</a>
                            </li>
                            <li class='bg22'>
                            </li>
                        </ul>

                    </div>
                </div>

            </article>
        </div>
    </div>
</div>
@endsection

