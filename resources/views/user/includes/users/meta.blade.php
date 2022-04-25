<div class="user-item-meta">
    <div class="user-item-rating">
        <p class="h4 mb-0">
            {{$user->full_name}} &bull; {{$user->basicProfile->dob}} &bull; {{$user->basicProfile->gender}}
            <small class="float-right">
                @if($user->getAttributes()['verification_status'] === App\References\UserVerificationStatus::VERIFIED)
                <span class="badge badge-info"><i class="fas fa-user-check"></i> {{$user->verification_status}}</span>
                @else
                <span class="badge badge-warning"><i class="fas fa-triangle-exclamation"></i> {{$user->verification_status}}</span>
                @endif
            </small>
        </p>

        <a class="product-title"><span class="badge badge-success">80% Compatible</a>
        <p class="text-muted mb-0"><i class="fas fa-map-marker"></i> {{$user->userLocation->locality->name}}, {{$user->userLocation->city->name}}</p>

        <p class="text-muted mb-0"><span class="fas fa-briefcase"></span>
        @forelse($user->basicProfile->occupations as $occupation)
         {{$occupation->name}}, 
        @empty
        No occupations
        @endforelse
        </p>

        <p class="text-muted"><span class="fas fa-globe"></span> Speaks
            @forelse($user->basicProfile->spokenLanguages as $language)
            {{$language->name}},
            @empty
        </p>
        <p>No spoken languages</p>
        @endforelse
    </div>
    <div class="user-item-meta-data">
        <hr>
        <div class="user-item-about-us">
            <h5>Bio</h5>
            <p>{{$user->basicProfile->bio}}</p>
            <div class="row">
                <div class="col-md-6 col-6">
                    <a href="#" class="btn btn-success btn-block">
                        <span class="badge"> <i class="fas fa-paper-plane"></i> Send Request</span>
                    </a>
                </div>
                <div class="col-md-6 col-6">
                    <a href="#" class="btn btn-primary btn-block">
                        <span class="badge"> <i class="fas fa-comments"></i> Send Message</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>