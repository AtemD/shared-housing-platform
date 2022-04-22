<header class="shop-item-header">
    <div class="row pt-4">
        <div class="col-md-6">
            <h2>{{$user->basicProfile->dob}} year old {{$user->basicProfile->gender}}</h2>
            <p>
                <i class="fas fa-map-marker"></i> 
                {{$user->userLocation->locality->name}}, {{$user->userLocation->city->name}}
            </p>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <i class="fas fa-heart fa-2x"></i>
        </div>
    </div>
</header>