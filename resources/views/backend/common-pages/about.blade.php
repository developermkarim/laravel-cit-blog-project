@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item active">Update About Page</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Update About Page</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="myForm" action="{{ route('update.about') }}" method="POST" class="needs-validation ">
            @csrf
            <div class="row">

                <div class="col-12 mb-3">
                    <label for="inputEmail4" class="form-label">Title * </label>
                    <input type="text" name="about_title" class="form-control" value="{{ $aboutText->about_title }}">
                </div>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>

                <div class="col-12 mb-3">
                    <label for="inputEmail4" class="form-label"> Details *</label>
                    <textarea class="form-control" name="about_details">
                                        {{ $aboutText->about_details }}
                                    </textarea>
                </div>

                {{--  <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required="">
                                       <div class="invalid-feedback">
                                           Please provide a valid zip.
                                       </div> --}}

                <div class="d-flex flex-wrap">

                    <div class="form-check me-2">
                        <input class="form-check-input" type="radio" name="status" value="{{ true }}" id="inlineRadio1"
                            @checked($aboutText->about_status=='1')>



                        <label class="form-check-label" for="inlineRadio1">Show In Page</label>
                    </div>

                    <div class="form-check me-2">
                        <input class="form-check-input" type="radio" name="status" value="0" id="inlineRadio2"
                            @checked($aboutText->about_status=='0')>
                        <label class="form-check-label" for="inlineRadio2">Hide In Page</label>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

            </div>

        </form>

    </div>


</div>

<script>
   /*  document.getElementById('myForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Add the "was-validated" class to the form
        this.classList.add(' was-validated');
 */
        // Now you can perform your form submission logic, like AJAX request
        // or just let the regular form submission continue:
        // this.submit();
    });

</script>



@endsection
