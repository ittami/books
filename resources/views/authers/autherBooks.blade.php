@extends('layouts.app')
@section('content')
<div class="bg7">
    <div style='height: 100px'></div>

    <div class="inv-listing-result inv-listing-result-js2 listpage">
        <div class="container padd-lr0">
            <div class="row">
                <div class="row">
                    <div class="col-xs-12">
                        <header class="inv-listing-header">
                            <h2 class="h2">{{ $auther->name}} Books</h2>
                            <div class="inv-list-btn">
                                <a href="" class="fa fa-th-list " data-list="inv-listing-result-style2"></a>
                                <a href="" class="fa fa-th active" data-list="inv-listing-result-style1"></a>
                            </div>
                        </header>
                    </div>
                    <div class="col-xs-12">
                        <div class="inv-filter-item" data-value='10'>
                            @foreach($books as $book)
                            <div class="change-block-size col-lg-4 col-sm-6">
                                <div class="inv-places2-item">
                                    <div class="inv-places2-head"><img src="{{ $book->cover }}" class="img-thumbnail" alt=""></div>
                                    <div class="bg8 inv-list-style2 inv-places2-row">
                                        <div class="inv-places2-info">
                                            <ul>
                                                <li>
                                                    <h3>
                                                        <a href="/booksList/{{ $book->id }}/add">{{ $book->title }}</a>
                                                    </h3>
                                                    <span>by</span>
                                                    <h3>
                                                        @foreach($book->authers as $auther)
                                                        <a href="/authers/{{$auther->id}}/autherProfile">{{ $auther->name }}</a>
                                                        @endforeach
                                                    </h3>
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
        </div>
    </div>

    @endsection