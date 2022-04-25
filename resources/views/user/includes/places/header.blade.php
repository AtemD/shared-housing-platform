<header class="place-item-header">
    <div class="row pt-4">
        <div class="col-md-6">
            <h2>{{$place->furnishing_type}} {{$place->place_type}}</h2>
            <p>
                <i class="fas fa-map-marker"></i> 
                {{$place->placeLocation->locality->name}} , {{$place->placeLocation->city->name}}
            </p>
            
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <h3>{{$place->rent_amount}} ETB / month <br><small class="text-muted h6">Listed {{$place->created_at->diffForHumans()}}.</small></h3>
            
        </div>
    </div>
</header>