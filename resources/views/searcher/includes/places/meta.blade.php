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
                    @if($auth_user->matches->first()->pivot->compatibility_percentage >= 50)
                    <a class="product-title"><span class="badge badge-success">{{ $auth_user->matches->first()->pivot->compatibility_percentage }}% Compatible</a>
                    @else
                    <a class="product-title"><span class="badge badge-secondary">{{ $auth_user->matches->first()->pivot->compatibility_percentage }}% Compatible</a>
                    @endif
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
                    @if($placeRequestSentBySearcherToLister === NULL)
                    <form method="POST" action="{{ route('searcher.place-requests.store') }}">
                        @csrf
                        <input type="hidden" name="user_to_send_request_to" value="{{$place->user->slug}}">
                        <input type="hidden" name="requested_place" value="{{$place->slug}}">
                        <input type="hidden" name="place_request" value="{{\App\References\PlaceRequestStatus::PENDING}}">
                        <button type="submit" class="btn btn-success btn-block">
                            <span class="badge"> <i class="fas fa-paper-plane"></i> Send Place Request</span>
                        </button>
                    </form>
                    @else
                    <!-- 
                    show the status,
                    if status is pending, then show PENDING
                    if status is accepted, the show accepted,
                    Not, once request is accepted, the user cannot revert it,
                    If status is pending, the user can revert it back to the original send place request
                    -->

                    @if($placeRequestSentBySearcherToLister->pivot->status == \App\References\PlaceRequestStatus::PENDING)
                    <div class="text-right d-flex justify-content-between">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Your Request {{ucfirst(\App\References\PlaceRequestStatus::getName($placeRequestSentBySearcherToLister->pivot->status))}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <form method="POST" action="{{ route('searcher.place-requests.destroy', $placeRequestSentBySearcherToLister->pivot->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="delete_sent_request" value="1">
                                    <button class="btn btn-link dropdown-item" type="submit">Cancel Sent Request</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                    @endif
                </div>
                <div class="col-md-6 col-6">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                        <span class="badge"> <i class="fas fa-comments"></i> Send Message</span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('searcher.messages.store') }}">
                                    @csrf
                                    <input type="hidden" name="receiver" value="{{$place->user->slug}}">

                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <textarea class="form-control @error('message') is-invalid @enderror" id="validationTextarea" placeholder="type your message..." rows="3" name="message">{{ old('message') }}</textarea>

                                                @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>