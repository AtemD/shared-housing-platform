<div class="row">
    <div class="col-md-6">
        <h3 class="mb-1">Place Preference</h3>
        <small class="text-muted text-bold">I prefer a place that matches the following:</small>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Rent Budget </small>
                    <h6 class="text-dark">{{$user->placePreference->min_rent_amount}}-{{$user->placePreference->max_rent_amount}} ETB/month</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Place type</small>
                    <h6 class="text-dark">{{$user->placePreference->place_type}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Furnishing </small>
                    <h6 class="text-dark">Furnished</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Stay period</small>
                    <h6 class="text-dark">6 months</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Desired Amenities </small>
                    <h6>
                        <span class="badge badge-info text-white">parking</span>
                        <span class="badge badge-info text-white">Private shower</span>
                        <span class="badge badge-info text-white">Cooker</span>
                    </h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Location Preference </small>
                    <h6 class="text-dark">
                        <span class="badge badge-secondary">Piassa, Hawassa</span>
                        <span class="badge badge-secondary">Bole, Addis</span>
                    </h6>
                </a>
            </div>
        </div>
    </div>
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