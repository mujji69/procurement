@extends('layouts.app')

@section('content')
@section('styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Vendor Registration</h2>
                <p>Fill all form field to go to next step</p>
                <form id="msform" class='px-3' method='POST' action="{{ route('register') }}" enctype='multipart/form-data'>
                    <!-- progressbar -->
                    @csrf
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Account</strong></li>
                        <li id="personal"><strong>Contact</strong></li>
                        <li id='payment'><strong>Company</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div>

                             <label class="fieldlabels">Username: *</label>
                             <input type="text" name="username" placeholder="UserName" />
                              <label class="fieldlabels">Password: *</label>
                              <input type="password" name="password" placeholder="Password" />
                              <label class="fieldlabels">Confirm Password: *</label>
                               <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                        </div> <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Contact Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                            </div>

                             <label class="fieldlabels">First Name.: *</label>
                             <input type="text" name="fname" placeholder="First Name" />
                             <label class="fieldlabels">Last Name.: *</label>
                             <input type="text" name="lname" placeholder="Last Name" />
                             <label class="fieldlabels">Email: *</label>
                             <input type="email" name="email" placeholder="Email Id" />
                             <label class="fieldlabels">Contact No.: *</label>
                             <input type="text" name="contact" placeholder="Contact No." />

                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Company Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                            </div>
                             <label class="fieldlabels">Company Name: *</label>
                             <input type="text" name="org" placeholder="Company Name" />
                             <label class="fieldlabels">Address.: *</label>
                             <input type="text" name="address" placeholder="Address" />
                             <label class="fieldlabels">Services.: *</label><br>
                             <select name='service[]' class="selectpicker" multiple data-dropup-auto="false" data-style='bg-purple ' data-live-search="true">
                                  <option>Equipment for Agriculture / Livestock</option>
                                  <option>IT Equipment</option>
                                  <option>Equipment for Health/Medical Supplies</option>
                                  <option>Water Treatment/Equipment/Products</option>
                                  <option>Equipment for Meteorological</option>
                                  <option>Equipment for Technical & Vocational Training</option>
                                  <option>Computer Hardware</option>
                                  <option>Bullet Proof Vehicles/Parts/Accessories</option>
                                  <option>Equipment for Security/Fire Fighting</option>
                                  <option>Clearing Agents</option>
                                  <option>Equipment for Construction</option>
                                  <option>Equipment for Energy</option>
                                  <option>Equipment for Geological</option>
                                  <option>Disaster Relief Goods (such as Tent, Pills, etc.)</option>
                                  <option>Office Supply (such as Stationery, etc.)</option>
                                  <option>Computer Software</option>
                                  <option>Electronics</option>
                                  <option>General Vehicles/Parts/Accessories</option>
                                  <option>Transport & Storage</option>

                            </select><br><br>
                             <label class="fieldlabels">Sales Tax File.: *</label>
                             <input type="file" name="tax" />
                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                              </div>
                              <div class="col-7">
                                  <h2 class="fs-title">Click Submit Button to Register</h2>
                              </div>
                        </div>
                        <button type="submit" class='btn btn-primary'>Submit</button>
                         <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>
@endsection
