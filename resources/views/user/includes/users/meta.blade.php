<div class="shop-item-meta">
    <div class="shop-item-rating pt-4 mt-2">
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
        <!-- <p class="text-muted pt-0"><small>male</small></p> -->
        <a class="product-title"><span class="badge badge-success">80% Compatible</a>
        @forelse($user->basicProfile->occupations as $occupation)
        <p class="text-muted mb-0"><span class="fas fa-briefcase"></span> {{$occupation->name}}</p>
        @empty
        <p>No occupations</p>
        @endforelse

        <p class="text-muted"><span class="fas fa-globe"></span> Speaks
            @forelse($user->basicProfile->spokenLanguages as $language)
            {{$language->name}},
            @empty
        </p>
        <p>No spoken languages</p>
        @endforelse
    </div>
    <div class="shop-item-meta-data">
        <hr>
        <div class="shop-item-about-us">
            <h5>Bio</h5>
            <p>
                {{$user->basicProfile->bio}}
            </p>
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