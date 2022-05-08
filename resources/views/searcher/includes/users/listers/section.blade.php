<div class="row">
    @forelse($user->places as $place)
    <div class="col-md-12">
        <h3 class="mb-1">My Place Listings</h3>
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/uploads/places/room_3.jpg" class="card-img" alt="..." height="177">
                </div>
                <div class="col-md-8">
                    <div class="card-body pt-1">

                        <h6 class="text-dark">{{$place->place_type}} &bull; {{$place->furnishing_type}}</h6>
                        <h5 class="mt-0 text-dark">{{$place->rent_amount}} ETB/month</h5>

                        <p class="card-text">{!! mb_substr($place->description, 0,120) !!}...</p>

                        <div class="d-flex justify-content-between">
                            <p class="card-text"><small class="text-muted">created {{$place->created_at->diffForHumans()}}</small></p>
                            <a href="{{ route('searcher.matches.places.show', $place->slug) }}" class="btn btn-outline-primary stretched-link">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            This user has not listed any places yet.
        </div>
    </div>
    @endforelse
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        <h3>Personal Preference</h3>
        <small class="text-muted text-bold">The following attributes describe me:</small>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Gender </small>
                    <h6 class="text-dark">{{$user->basicProfile->gender}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Age</small>
                    <h6 class="text-dark">{{$user->basicProfile->dob}} years old</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Marital Status </small>
                    <h6 class="text-dark">{{$user->personalPreference->marital_status}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Diet habits</small>
                    <h6 class="text-dark">{{$user->personalPreference->diet_habit}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Alcohol Habits </small>
                    <h6 class="text-dark">{{$user->personalPreference->alcohol_habit}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Smoking habits</small>
                    <h6 class="text-dark">{{$user->personalPreference->smoking_habit}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Guest Habits </small>
                    <h6 class="text-dark">{{$user->personalPreference->guest_habit}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Partying habits</small>
                    <h6 class="text-dark">{{$user->personalPreference->partying_habit}}</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Compatibility Preference</h3>
        <small class="text-muted text-bold">I prefer a person who match the following:</small>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Preferred Gender </small>
                    <h6 class="text-dark">{{$user->compatibilityPreference->preferred_gender}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Age Range</small>
                    <h6 class="text-dark">22-35 years old</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Marital Status </small>
                    <h6 class="text-dark">{{$user->compatibilityPreference->marital_status}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Diet habits</small>
                    <h6 class="text-dark">{{$user->compatibilityPreference->diet_habit}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Alcohol Habits </small>
                    <h6 class="text-dark">{{$user->compatibilityPreference->alcohol_habit}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Smoking habits</small>
                    <h6 class="text-dark">{{$user->compatibilityPreference->smoking_habit}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Guest Habits </small>
                    <h6 class="text-dark">{{$user->compatibilityPreference->guest_habit}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Partying habits</small>
                    <h6 class="text-dark">{{$user->compatibilityPreference->partying_habit}}</h6>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Interests</h3>
        <small class="text-muted text-bold">My interest are:</small>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Interests </small>

                    <h6 class="text-dark">
                        @forelse($user->interests as $interest)
                        {{$interest->name}},
                        @empty
                        No interest selected
                        @endforelse
                    </h6>
                </a>
            </div>
        </div>
    </div>
</div>