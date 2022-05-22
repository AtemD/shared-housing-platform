@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box">
                <div class="inner">
                    <h3>176</h3>

                    <p>Match Results</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-code-compare"></i>
                </div>

                <a href="{{ route('searcher.matches.places.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box">
                <div class="inner">
                    <h3>16</h3>

                    <p>Notifications</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bell"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box">
                <div class="inner">
                    <h3>33</h3>

                    <p>Requests</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box">
                <div class="inner">
                    <h3>15</h3>

                    <p>Messages</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box">
                <div class="inner">
                    <h3>150</h3>

                    <p>Favorites</p>
                </div>
                <div class="icon">
                    <i class="fas fa-heart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box">
                <div class="inner">
                    <h3>20/50</h3>

                    <p>Questions</p>
                </div>
                <div class="icon">
                    <i class="fas fa-question-circle"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection