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

        <!-- <a class="product-title"><span class="badge badge-success">80% Compatible</a> -->
        @if($auth_user->matches->first()->pivot->compatibility_percentage >= 50)
        <a class="product-title"><span class="badge badge-success">{{ $auth_user->matches->first()->pivot->compatibility_percentage }}% Compatible</a>
        @else
        <a class="product-title"><span class="badge badge-secondary">{{ $auth_user->matches->first()->pivot->compatibility_percentage }}% Compatible</a>
        @endif

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
                @if(!empty($requestSentToAuthenticatedUser))
                <div class="col-md-6 col-6">
                    @if($requestSentToAuthenticatedUser->pivot->status == \App\References\PlaceRequestStatus::PENDING)
                    <div class="text-right d-flex justify-content-between">
                        <form method="POST" action="{{ route('lister.place-requests.update', $requestSentToAuthenticatedUser->id) }}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="declined" value="{{\App\References\PlaceRequestStatus::DECLINED}}">
                            <button type="submit" class="btn btn-sm btn-secondary">
                                Decline Request
                            </button>
                        </form>

                        <form method="POST" action="{{ route('lister.place-requests.update', $requestSentToAuthenticatedUser->id) }}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="accepted" value="{{\App\References\PlaceRequestStatus::ACCEPTED}}">
                            <button type="submit" class="btn btn-sm btn-primary ml-2">
                                Accept Request
                            </button>
                        </form>
                    </div>
                    @elseif($requestSentToAuthenticatedUser->pivot->status == \App\References\PlaceRequestStatus::ACCEPTED || $requestSentToAuthenticatedUser->pivot->status == \App\References\PlaceRequestStatus::DECLINED)
                    <div class="text-right d-flex justify-content-between">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Request {{ucfirst(\App\References\PlaceRequestStatus::getName($requestSentToAuthenticatedUser->pivot->status))}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                @foreach(\App\References\PlaceRequestStatus::placeRequestStatusListInPresentTense() as $status)
                                @if($status == \App\References\PlaceRequestStatus::getNameInPresentTense($requestSentToAuthenticatedUser->pivot->status))
                                @continue
                                @endif
                                <!-- <a class="dropdown-item" href="#">{{$status}}</a> -->
                                <form method="POST" action="{{ route('lister.place-requests.update', $requestSentToAuthenticatedUser->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="{{$status}}" value="{{$requestSentToAuthenticatedUser->pivot->status}}">
                                    <button class="btn btn-link dropdown-item" type="submit">{{ucfirst($status)}}</button>
                                </form>
                                @endforeach

                                <form method="POST" action="{{ route('lister.place-requests.update', $requestSentToAuthenticatedUser->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="cancelled" value="{{\App\References\PlaceRequestStatus::PENDING}}">
                                    <button class="btn btn-link dropdown-item" type="submit">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @else
                @if(!empty($requestSentByAuthenticatedUser))
                <div class="col-md-6 col-6">
                    <div class="text-right d-flex justify-content-between">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small> Your Sent Request {{ucfirst(\App\References\PlaceRequestStatus::getName($requestSentByAuthenticatedUser->pivot->status))}} </small>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <form method="POST" action="{{ route('lister.place-requests.destroy', $requestSentByAuthenticatedUser->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-link dropdown-item" type="submit"><small>Delete Your Sent Request</small></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-6 col-6">
                    <form method="POST" action="{{ route('lister.place-requests.store') }}">
                        @csrf
                        <input type="hidden" name="user_to_send_request_to" value="{{$user->slug}}">
                        <input type="hidden" name="place_request" value="{{\App\References\PlaceRequestStatus::PENDING}}">
                        <button type="submit" class="btn btn-success btn-block">
                            <span class="badge"> <i class="fas fa-paper-plane"></i> Send Request</span>
                        </button>
                    </form>
                </div>
                @endif
                @endif
                <div class="col-md-6 col-6">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                        <span class="badge"> <i class="fas fa-comments"></i> Send Message</span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('lister.messages.store') }}">
                                    @csrf
                                    <input type="hidden" name="receiver" value="{{$user->slug}}">

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