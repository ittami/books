@extends('layouts.app')
@section('content')

<div class="bg7">
    <div class="container padd-lr0">
        <div class="inv-listing-result inv-listing-result-js2 listpage">
            <div class="col-xs-12 col-md-offset-2">
                <div class="row margin-lg-t155">
                    <div class="change-block-size col-lg-8 col-sm-9">
                        <!--                    <div class="inv-places2-item">-->
                        <div class="inv-places2-info bg6">
                            <h3>
                                <a href='/usersList/{{$user->id}}/userProfile' class="h3 offset-2">{{ $user->name }}</a>
                            </h3>
                        </div>
                        <div class="bg8 inv-list-style2 inv-places2-row">
                            <div class="inv-places2-info">
                                <ul>
                                    <li>
                                        @if( $user->registered_from)
                                        User Provider : {{ $user->registered_from }}
                                        @endif
                                    </li>
                                    <li>
                                        Registered At : {{ $user->created_at }}
                                    </li>
                                    <li>    
                                        Email :{{ $user->email }}
                                    </li>
                                    <li>
                                        @if(auth()->user()->password)
                                        <a href="{{ url('/password/reset') }}" class="h6" >Reset Password</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 100px">
        <div class='inv-poput-link col-md-4 col-md-offset-4 '>
        </div>
    </div>


    <div class="container padd-lr0">
        <div class="inv-listing-result inv-listing-result-js2 listpage">
            <div class="inv-listing-header">
                <h6><span>My</span> Authors </h6>
                <div class="inv-list-btn">
                    <a href="" class="fa fa-th-list " data-list="inv-listing-result-style2"></a>
                    <a href="" class="fa fa-th active" data-list="inv-listing-result-style1"></a>
                </div>
            </div>
            <div class="col-xs-12">
                @foreach($user->authers as $auther)                    
                <div class="change-block-size col-lg-4 col-sm-6">
                    <div class="inv-places2-item">
                        <div class="inv-places2-head"><img src="{{ $auther->image }}"  alt=""></div>
                        <div class="bg8 inv-list-style2 inv-places2-row">
                            <div class="inv-places2-info">
                                <h3>
                                    <a href="/usersList/{{$auther->id}}/autherProfile">{{ $auther->name }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div style="height: 100px">
        <div class='inv-poput-link col-md-4 col-md-offset-4 '>
        </div>
    </div>

    <div class="container padd-lr0">
        <div class="inv-listing-result inv-listing-result-js2 listpage">
            <div class="inv-listing-header">
                <h6><span>My</span> Books </h6>
            </div>
            <div class="col-xs-12">

                @foreach($user->books as $book)
                <div class="change-block-size col-lg-4 col-sm-6">
                    <div class="inv-places2-item">
                        <div class="inv-places2-head"><img src="{{ $book->cover }}" class="img-thumbnail" alt=""></div>
                        <div class="bg8 inv-list-style2 inv-places2-row">
                            <div class="inv-places2-info">
                                <h3>
                                    <a href="booksList/{{ $book->id }}/add">{{ $book->title }}</a>
                                </h3>
                                <span>by</span>
                                <h3>
                                    @foreach($book->authers as $auther)
                                    <a href="/authers/{{$auther->id}}/autherProfile">{{ $auther->name }}</a>
                                    @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div style="height: 100px">
        <div class='inv-poput-link col-md-4 col-md-offset-4 '>
        </div>
    </div>


    <div class="container padd-lr0">
        <div class="inv-listing-result inv-listing-result-js2 listpage">
            <div class="row">
                <div class="col-xs-12">
                    <div class="inv-filter-item" data-value='100'>
                        @foreach($user->locations as $location)
                        <div class="change-block-size col-lg-4 col-sm-6">
                            <div class="inv-places2-item">
                                <div class="inv-places2-info bg6">
                                    <h3>
                                        <a href="addresses/{{ $location->id }}/edit" class="fa fa-map">{{ $location->name }}</a>
                                    </h3>
                                    <ul>
                                        <li>
                                            Registered At : {{ $user->created_at }}
                                        </li>
                                        <li>
                                            {{ $location->longitude }} : {{ $location->latitude }}
                                        </li>
                                        <li>
                                            <div class="fillter-wrap">
                                                <form role='form' method="POST" action="/updateProfile/addresses/{{ $location->id }}/delete">
                                                    {{ csrf_field()}} {{ method_field('DELETE') }}

                                                    <button class="button activbut" type='submit'> DELETE ADDRESS </button>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class='inv-poput-link col-md-4 col-md-offset-4 '>
        <a href="{{ url('/updateProfile/addresses') }}" class=" fa fa-map-marker bg12">Add Address</a>
    </div>
    <div style="height: 140px">   </div>
</div>







@endsection
