<div class="shop-item-meta">
    <div class="shop-item-rating pt-4 mt-2">
        <p class="h4 mb-0">{{$user->full_name}}, {{$user->basicProfile->dob}}, {{$user->basicProfile->gender}} <span class="badge badge-info float-right"><small><span class="fas fa-user-check"></span> Verified</p></small>
        <!-- <p class="text-muted pt-0"><small>male</small></p> -->
        <a class="product-title"><span class="badge badge-success">80% Compatible</a>
        <p class="text-muted mb-0"><span class="fas fa-briefcase"></span> Software Engineer @Meta</p>
        <p class="text-muted"><span class="fas fa-globe"></span> Speaks English, Kiswahili & Amharic</p>
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
                    <a href="#menu" class="btn btn-success btn-block">
                        <span class="badge"> <i class="fas fa-paper-plane"></i> Request</span>
                    </a>
                </div>
                <div class="col-md-6 col-6">
                    <a href="#menu" class="btn btn-primary btn-block">
                        <span class="badge"> <i class="fas fa-comments"></i> Message</span>
                    </a>
                </div>
            </div>


        </div>

    </div>
</div>