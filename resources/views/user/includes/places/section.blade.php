<div class="row">
    <div class="col-md-6">
        <h3>Place Details Overview</h3>
        <small class="text-muted">This place has the following attributes:</small>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Rent </small>
                    <h6 class="text-dark">{{$place->rent_amount}} ETB/month</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Security deposit</small>
                    <h6 class="text-dark">1000 ETB (refundable)</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Bills</small>
                    <h6 class="text-dark">{{$place->bills_included}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Furnishing </small>
                    <h6 class="text-dark">{{$place->furnishing_type}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">place size</small>
                    <h6 class="text-dark">20 sq. m</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">property size </small>
                    <h6 class="text-dark">100 sq. m</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Place type</small>
                    <h6 class="text-dark">{{$place->place_type}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Minimum stay</small>
                    <h6 class="text-dark">3 months</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Available Amenities </small>
                    <h6>
                        @forelse($place->amenities as $amenity)
                        <span class="badge badge-info text-white">{{$amenity->name}}</span>
                        @empty
                        No Amenities available
                        @endforelse
                    </h6>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Lister Compatible with</h3>
        <small class="text-muted">I prefer people with the following attributes:</small>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Gender</small>
                    <h6 class="text-dark">{{$place->user->compatibilityPreference->preferred_gender}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Age</small>
                    <h6 class="text-dark">22-35 years old</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Marital Status </small>
                    <h6 class="text-dark">{{$place->user->compatibilityPreference->marital_status}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Diet habits</small>
                    <h6 class="text-dark">{{$place->user->compatibilityPreference->diet_habit}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Alcohol Habits </small>
                    <h6 class="text-dark">{{$place->user->compatibilityPreference->alcohol_habit}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Smoking habits</small>
                    <h6 class="text-dark">{{$place->user->compatibilityPreference->smoking_habit}}</h6>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Guest Habits </small>
                    <h6 class="text-dark">{{$place->user->compatibilityPreference->guest_habit}}</h6>
                </a>
            </div>
            <div class="col-6">
                <a class="product-title text-decoration-none">
                    <small class="text-muted">Partying habits</small>
                    <h6 class="text-dark">{{$place->user->compatibilityPreference->partying_habit}}</h6>
                </a>
            </div>
        </div>
    </div>
</div>