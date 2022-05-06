<div class="place-item-meta">
    <div class="place-item-rating pt-4 mt-3">
        <li class="item products-list product-list-in-card">
            <div class="product-img">
                <img src="/uploads/places/pic04.jpg" alt="Product Image" class="img-size-100 rounded-circle">
            </div>
            <div class="product-info">
                <a href="{{route('searcher.matches.users.show', $place->user->slug)}}" class="product-title">
                    <small class="text-muted">Listed by</small> {{$place->user->full_name}}

                    @if($place->user->getAttributes()['verification_status'] === App\References\UserVerificationStatus::VERIFIED)
                    <span class="badge badge-info float-right"><i class="fas fa-user-check"></i> {{$place->user->verification_status}}</span>
                    @else
                    <span class="badge badge-warning float-right"><i class="fas fa-triangle-exclamation"></i> {{$place->user->verification_status}}</span>
                    @endif
                </a>

                <span class="product-description">
                    <a class="product-title"><span class="badge badge-success">80% Compatible</a>
                </span>
            </div>
        </li>
    </div>
    <hr>
    <div class="place-item-meta-data">
        <div class="place-item-description">
            <h5>Place Description</h5>
            <p>{{$place->description}}</p>
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