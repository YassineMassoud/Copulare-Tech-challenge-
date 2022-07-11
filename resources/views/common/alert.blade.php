<div style="display: none" id="{{ $module_id }}-success-msg" class="alert alert-success text-center">
    <h6>The form has successfully submitted.</h6>
    <p>New {{ $module }} Added Successfully.</p>
</div>

<div style="display: none" id="{{ $module_id }}-update-msg" class="alert alert-success text-center">
    <h6>The form has successfully updated.</h6>
    <p>{{ $module }} information updated successfully.</p>
</div>

<div style="display: none" id="{{ $module_id }}-delete-msg" class="alert alert-success text-center">
    <h6>Deleted Successfully.</h6>
    <p>{{ $module }} is deleted successfully from the organization.</p>
</div>

<div style="display: none" id="error-msg" class="alert alert-danger text-center">

</div>

@if(session()->has('message'))
    @if(session('message') == 'resend_activation_email')
        <div style="display: block; width: 100%;" id="resend-msg" class="alert alert-success text-center">
            <h6>Email Sent Successfully.</h6>
            <p>New Activation Email Sent Successfully.</p>
        </div>
    @elseif(session('message') == 'not_resend_activation_email')
        <div style="display: block; width: 100%;" id="resend-msg" class="alert alert-danger text-center">
            <h6>Failed to Send.</h6>
            <p>Email not sent properly. Try Again!</p>
        </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('resend-msg').style.display = 'none'
        }, 5000)
    </script>
@endif

@if(session()->has('message'))
    @if(session('message') == 'password_updated')
        <div style="display: block; width: 100%;" id="password-update-msg" class="alert alert-success text-center">
            <h6>Password Updated Successfully.</h6>
            <p>User New Password to log into your account.</p>
        </div>
    @elseif(session('message') == 'password_not_updated')
        <div style="display: block; width: 100%;" id="password-update-msg" class="alert alert-danger text-center">
            <h6>Failed to Update.</h6>
            <p>Password not updated properly. Try Again!</p>
        </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('password-update-msg').style.display = 'none'
        }, 5000)
    </script>
@endif

@if(session()->has('message'))
    @if(session('message') == 'profile_updated')
        <div style="display: block; width: 100%;" id="profile-update-msg" class="alert alert-success text-center">
            <h6>Profile Updated Successfully.</h6>
            <p>Profile Information are updated Successfully.</p>
        </div>
    @elseif(session('message') == 'profile_not_updated')
        <div style="display: block; width: 100%;" id="profile-update-msg" class="alert alert-danger text-center">
            <h6>Failed to Update.</h6>
            <p>Profile not updated properly. Try Again!</p>
        </div>
    @endif
    <script>
        setTimeout(function() {
            document.getElementById('profile-update-msg').style.display = 'none'
        }, 5000)
    </script>
@endif