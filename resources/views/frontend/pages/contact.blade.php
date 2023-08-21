@extends('frontend.home_dashboard')
@section('home')

@section('title','FAQ')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $contact->contact_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ "HOME" }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $contact->contact_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $contact->contact_details !!}
            </div>
            <div class="col-lg-6 col-md-12">
                <form action="{{ route('contact.form.submit') }}" method="post" class="form_contact_ajax">
                    @csrf
                    <div class="contact-form">
                        <div class="mb-3">
                            <label for="" class="form-label">{{ "NAME" }}</label>
                            <input type="text" class="form-control" name="name">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">{{ "EMAIL_ADDRESS" }}</label>
                            <input type="text" class="form-control" name="email">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">{{ "MESSAGE" }}</label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                            <span class="text-danger error-text message_error"></span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">{{ "SEND_MESSAGE" }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    {!! $contact->contact_map !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
(function($){
    $('.form_contact_ajax').on('submit',function(e){
        e.preventDefault();
        $('#loader').show();

        var form = this;
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            contentType:false,
            dataType:'json',
            beforeSend:function(){
                $(form).find('span.error-text').text('')
            },
            success:function(data){
                $('#loader').hide();
                if(data.code == 0){
                    $.each(data.error_message,function(prefix,val){
                        $(form).find('span.' + prefix + '_error').text(val[0])
                    })
                }else if(data.code==1){
                    $(form)[0].reset();
                    iziToast.success({
                        title:'',
                        position:'topRight',
                        message:data.success_message,
                    })
                }
            }
        })
    })
})(jQuery)
</script>
<div id="loader"></div>
@endsection