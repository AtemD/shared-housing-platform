@if(Session::has('success'))
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{Session::get('success')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(Session::has('error'))
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        {{Session::get('error')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(Session::has('warning'))
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                        {{Session::get('warning')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(Session::has('info'))
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> info!</h5>
                        {{Session::get('info')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

