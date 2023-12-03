<div class="col-md-6 contact-us">
    {{--<div class="container">--}}
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-subtitle">
                Contact Us
                <div class="">
                    <a href="https://twitter.com/ATech4all" target="_blank"> <i class="fab fa-twitter fa-1x mr-2" style="color: #55acee;"></i></a>
                    <a href="https://www.instagram.com/techfourall" target="_blank"> <i class="fab fa-instagram fa-1x" style="color: #ac2bac;"></i></a>
                </div>
            </h4>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form_container contact-form">
                <form action="{{route('contact-us.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-lg-12 mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" name="message" placeholder="Write a message"></textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="col-sm-6 btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--</div>--}}
</div>
