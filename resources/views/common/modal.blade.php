<input hidden id="currentEvent" value="">
@if($modal == 'addOrganization')
    <div id="org-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="org-modal-title">  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="organizationForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="org-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="org-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="orgEmail" class="form-label">Work Email</label>
                                                        <input type="email" class="form-control" id="orgEmail" name="email" autocomplete="off" placeholder="Enter Work Email">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="orgName" class="form-label">Organization Name</label>
                                                        <input type="text" class="form-control" id="orgName" name="orgName" placeholder="Enter Organization Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="paymentType"> Payment Method </label>
                                                        <select id="paymentType" name="paymentType" class="form-select">
                                                            <option selected disabled>Choose Payment Method</option>
                                                            <option value="online">Online</option>
                                                            <option value="offline">Offline</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="amount" class="form-label">Amount</label>
                                                        <input type="number" class="form-control" id="amount" autocomplete="off" name="amount" placeholder="Enter Amount">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="end_date">Expiry Date</label>
                                                        <input id="end_date"  name="end_date" type="date" class="form-control " placeholder="Enter Visit Date">
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="numOfUsers" class="form-label">Number of Users</label>
                                                        <input type="number" class="form-control" id="numOfUsers" name="numOfUsers" placeholder="Enter Number Of Users">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button style="display: none" id="org-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="orgId" value="">
                        <input style="display: none" class="btn btn-primary" id="org-update-btn" type="submit" value="Update">
                        <input class="btn btn-primary" id="org-submit-btn" type="submit" value="Registration">
                    </div>
                </form>

            </div>
        </div>
    </div>


@elseif($modal == 'addEmployee')
    <div id="emp-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="org-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="employeeForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="emp-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="emp-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="empFirstName" class="form-label">Full Name <span class="hd-required">*</span></label>
                                                        <input type="text" class="form-control" id="empFirstName" name="first_name" autocomplete="off" placeholder="Enter Employee Full Name">
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="empLastName" class="form-label">Last Name</label>--}}
{{--                                                        <input type="text" class="form-control" id="empLastName" name="last_name" autocomplete="off" placeholder="Enter Employee Last Name">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="empNickName" class="form-label">Nick Name</label>--}}
{{--                                                        <input type="text" class="form-control" id="empNickName" name="nick_name" autocomplete="off" placeholder="Enter Employee Nick Name">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="empType" class="form-label">Type <span class="hd-required">*</span></label>
                                                        <select class="form-control" name="empType" id="empType">
                                                            <option value="sales_manager">Sales Manager</option>
                                                            <option value="sales_supervisor">Sales Supervisor</option>
                                                            <option value="rep">Rep</option>
                                                            <option value="accountant">Accountant</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="empTeam" class="form-label">Select Team</label>
                                                        <select class="form-control hd-select2" name="empTeam" id="empTeam">
                                                            <?php foreach ($teams as $team) { ?>
                                                                <option value="<?= $team->id; ?>"><?= $team->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
			                                        <?php
			                                        $dialCodes = getDialCodes();
			                                        ?>
                                                    <label class="form-label">Mobile Number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="flex: 1 !important;">
                                                            <select name="empDialCode" id="empDialCode"  class="form-control hd-select" data-width="100%">
						                                        <?php foreach($dialCodes as $i => $code) {
						                                        ?>
                                                                <option value="{{ $i }}">+{{ $i }}</option>
						                                        <?php
						                                        } ?>
                                                            </select>
                                                        </div>
                                                        <input type="tel" id="empMobile" name="empMobile" class="form-control" placeholder="Enter Employee Mobile Number" style="flex: 4 !important;">
                                                    </div>
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="empMobile" class="form-label">Mobile Number</label>--}}
{{--                                                            <input type="number" class="form-control" id="empMobile" name="empMobile" placeholder="Enter Employee Mobile Number">--}}
{{--                                                        </div>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="empEmail" class="form-label">Email Address <span class="hd-required">*</span></label>
                                                        <input type="email" class="form-control" id="empEmail" name="empEmail" autocomplete="off" placeholder="Enter Employee Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="empDutyStart" class="form-label">Duty Start</label>
                                                        <input type="time" class="form-control" id="empDutyStart" name="empDutyStart" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="empDutyEnd" class="form-label">Duty End</label>
                                                        <input type="time" class="form-control" id="empDutyEnd" name="empDutyEnd" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="empComment" class="form-label">Comment</label>
                                                        <input type="text" class="form-control" name="empComment" id="empComment" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="emp-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="empId" value="">
                        <input style="display: none" class="btn btn-primary" id="emp-update-btn" type="submit" value="Update Employee">
                        <input class="btn btn-primary" id="emp-submit-btn" type="submit" value="Add Employee">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addMarketingMaterial')
    <div id="marMat-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="marMat-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="marketingMaterialForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="marMat-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="marMat-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="marMatName" class="form-label">Name <span class="hd-required">*</span></label>
                                                        <input type="text" class="form-control" id="marMatName" name="marMatName" autocomplete="off" placeholder="Enter Marketing Material Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="marMatType" class="form-label">Type <span class="hd-required">*</span></label>
                                                        <select class="form-control" name="marMatType" id="marMatType">
                                                            <option value="Image">Image</option>
                                                            <option value="PDF">PDF</option>
                                                            <option value="Presentation">Presentation</option>
                                                            <option value="Video">Video</option>
                                                            <option value="None">None</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="marMat-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="marMatId" value="">
                        <input style="display: none" class="btn btn-primary" id="marMat-update-btn" type="submit" value="Update Marketing Material">
                        <input class="btn btn-primary" id="marMat-submit-btn" type="submit" value="Add Marketing Material">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addFamilyProduct')
    <div id="familyProduct-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="familyProduct-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="familyProductForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="familyProduct-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="familyProduct-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="familyProduct-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="familyProductName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="familyProductName" name="familyProductName" autocomplete="off" placeholder="Enter Family Product Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="familyProductComment" class="form-label">Comment</label>
                                                        <input type="text" class="form-control" id="familyProductComment" name="familyProductComment" autocomplete="off" placeholder="Enter Family Product Comment">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="familyProduct-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="familyProductId" value="">
                        <input style="display: none" class="btn btn-primary" id="familyProduct-update-btn" type="submit" value="Update Family Product">
                        <input class="btn btn-primary" id="familyProduct-submit-btn" type="submit" value="Add Family Product">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addProduct')
    <div id="product-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="productForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="product-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="product-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="product-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="productType" class="form-label">Type <span class="hd-required">*</span></label>
                                                        <input type="text" class="form-control" id="productType" name="productType" autocomplete="off" placeholder="Enter Product Type">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="productBarcode" class="form-label">Barcode <span class="hd-required">*</span></label>
                                                        <input type="text" class="form-control" id="productBarcode" name="productBarcode" autocomplete="off" placeholder="Enter Product Barcode">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="productPrice" class="form-label">Retail Unit Price <span class="hd-required">*</span></label>
                                                        <input type="number" class="form-control" id="productPrice" name="productPrice" autocomplete="off" placeholder="Enter Product Type">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="productComment" class="form-label">Comment</label>
                                                        <input type="text" class="form-control" id="productComment" name="productComment" autocomplete="off" placeholder="Enter Comment">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="productFamily" class="form-label">Product Family <span class="hd-required">*</span></label>
                                                        <select class="form-control" name="productFamily" id="productFamily">
                                                            @foreach($families as $family)
                                                                <option value="{{ $family->id }}">{{ $family->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="product-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="productId" value="">
                        <input style="display: none" class="btn btn-primary" id="product-update-btn" type="submit" value="Update Product">
                        <input class="btn btn-primary" id="product-submit-btn" type="submit" value="Add Product">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addArea')
    <div id="area-modal" class="modal fade bd-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="area-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="areaForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="area-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="area-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="area-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
	                                                    <?php
	                                                    $cities = getCities();
	                                                    ?>
                                                        <select id="areaCity" name="areaCity" class="form-control hd-select" data-width="100%" tabindex="-1">
		                                                    <?php foreach ($cities as $city) { ?>
                                                            <option value="<?= $city; ?>"><?= $city; ?></option>
		                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Area</label>
                                                        <select id="areaArea" name="areaArea" class="form-control hd-select" data-width="100%" multiple>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="area-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="areaId" value="">
                        <input style="display: none" class="btn btn-primary" id="area-update-btn" type="submit" value="Update Area">
                        <input class="btn btn-primary" id="area-submit-btn" type="submit" value="Add Area">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addTeam')
    <div id="team-modal" class="modal fade bd-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="team-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="teamForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="team-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="team-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="team-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">City <span class="hd-required">*</span></label>
														<?php
														$cities = getCities();
														?>
                                                        <select id="teamCity" name="teamCity" class="form-control hd-select" data-width="100%" tabindex="-1">
															<?php foreach ($cities as $city) { ?>
                                                            <option value="<?= $city; ?>"><?= $city; ?></option>
															<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Area <span class="hd-required">*</span></label>
                                                        <select id="teamArea" name="teamArea" class="form-control hd-select" data-width="100%" multiple>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Name <span class="hd-required">*</span></label>
                                                        <input id="teamName" name="teamName" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Supervisor</label>
                                                        <select id="teamSupervisor" name="teamSupervisor" class="form-control hd-select" data-width="100%">
                                                            <?php foreach ($supervisors as $supervisor) { ?>
                                                                <option value="<?= $supervisor->id; ?>"><?= $supervisor->first_name . " " . $supervisor->last_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Members</label>
                                                        <select id="teamMembers" name="teamMembers" class="form-control hd-select" data-width="100%" multiple>
					                                        <?php foreach ($members as $member) { ?>
                                                            <option value="<?= $member->id; ?>"><?= $member->first_name . " " . $member->last_name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Comment</label>
                                                        <input id="teamComment" name="teamComment" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="team-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="teamId" value="">
                        <input style="display: none" class="btn btn-primary" id="team-update-btn" type="submit" value="Update Team">
                        <input class="btn btn-primary" id="team-submit-btn" type="submit" value="Add Team">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addCompanyType')
    <div id="companyType-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="companyType-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="companyTypeForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="companyType-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="companyType-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="companyType-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="companyTypeName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="companyTypeName" name="companyTypeName" autocomplete="off" placeholder="Enter Type Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="companyType-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="companyTypeId" value="">
                        <input style="display: none" class="btn btn-primary" id="companyType-update-btn" type="submit" value="Update Type">
                        <input class="btn btn-primary" id="companyType-submit-btn" type="submit" value="Add Type">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addCompanySector')
    <div id="companySector-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="companySector-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="companySectorForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="companySector-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="companySector-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="companySector-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="companySectorName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="companySectorName" name="companySectorName" autocomplete="off" placeholder="Enter Sector Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="companySector-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="companySectorId" value="">
                        <input style="display: none" class="btn btn-primary" id="companySector-update-btn" type="submit" value="Update Type">
                        <input class="btn btn-primary" id="companySector-submit-btn" type="submit" value="Add Type">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addCompanyGroup')
    <div id="companyGroup-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="companyGroup-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="companyGroupForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="companyGroup-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="companyGroup-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="companyGroup-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="companyGroupName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="companyGroupName" name="companyGroupName" autocomplete="off" placeholder="Enter Group Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="companyGroup-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="companyGroupId" value="">
                        <input style="display: none" class="btn btn-primary" id="companyGroup-update-btn" type="submit" value="Update Type">
                        <input class="btn btn-primary" id="companyGroup-submit-btn" type="submit" value="Add Type">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addCompany')
    <div id="company-modal" class="modal fade bd-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="company-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="companyForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="company-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="company-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="company-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Name <i class="hd-required">*</i></label>
                                                        <input id="companyName" name="companyName" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Group</label>
                                                        <select id="companyGroup" name="companyGroup" class="form-control hd-select" data-width="100%" tabindex="-1">
                                                            <option>Select Group</option>
					                                        <?php foreach ($groups as $group) { ?>
                                                            <option value="<?= $group->id; ?>"><?= $group->name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Logo</label>
                                                        <input id="companyLogo" name="companyLogo" class="form-control" type="file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Sector <i class="hd-required">*</i></label>
                                                        <select id="companySector" name="companySector" class="form-control hd-select" data-width="100%" tabindex="-1">
                                                            <option value="" disabled>Select Sector</option>
                                                            <?php foreach ($sectors as $sector) { ?>
                                                            <option value="<?= $sector->id; ?>"><?= $sector->name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Type <i class="hd-required">*</i></label>
                                                        <select id="companyType" name="companyType" class="form-control hd-select" data-width="100%" tabindex="-1">
                                                            <option value="" disabled>Select Type</option>
                                                            <?php foreach ($types as $type) { ?>
                                                            <option value="<?= $type->id; ?>"><?= $type->name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">City <i class="hd-required">*</i></label>
														<?php
														$cities = getCities();
														?>
                                                        <select id="companyCity" name="companyCity" class="form-control hd-select" data-width="100%" tabindex="-1">
															<?php foreach ($cities as $city) { ?>
                                                            <option value="<?= $city; ?>"><?= $city; ?></option>
															<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Area <i class="hd-required">*</i></label>
                                                        <select id="companyArea" name="companyArea" class="form-control hd-select" data-width="100%">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Working Hours</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="form-label">From</label>
                                                                <input type="time" id="companyFrom" name="companyFrom" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">To</label>
                                                                <input type="time" id="companyTo" name="companyTo" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input id="companyEmail" name="companyEmail" class="form-control" type="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Comments</label>
                                                        <input id="companyComment" name="companyComment" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Latitude</label>
                                                        <input id="lat" name="companyLat" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Longitude</label>
                                                        <input id="lng" name="companyLng" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <input type="text" id="address" class="form-control google_address_search">
                                                   <div id="map"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="company-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="companyId" value="">
                        <input style="display: none" class="btn btn-primary" id="company-update-btn" type="submit" value="Update Company">
                        <input class="btn btn-primary" id="company-submit-btn" type="submit" value="Add Company">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addLeadSpeciality')
    <div id="leadSpeciality-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leadSpeciality-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="leadSpecialityForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="leadSpeciality-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="leadSpeciality-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="leadSpeciality-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="leadSpecialityName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="leadSpecialityName" name="leadSpecialityName" autocomplete="off" placeholder="Enter Speciality Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="leadSpeciality-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="leadSpecialityId" value="">
                        <input style="display: none" class="btn btn-primary" id="leadSpeciality-update-btn" type="submit" value="Update Speciality">
                        <input class="btn btn-primary" id="leadSpeciality-submit-btn" type="submit" value="Add Speciality">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addLeadDesignation')
    <div id="leadDesignation-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leadDesignation-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="leadDesignationForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="leadDesignation-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="leadDesignation-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="leadDesignation-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="leadDesignationName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="leadDesignationName" name="leadDesignationName" autocomplete="off" placeholder="Enter Designation Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="leadDesignation-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="leadDesignationId" value="">
                        <input style="display: none" class="btn btn-primary" id="leadDesignation-update-btn" type="submit" value="Update Designation">
                        <input class="btn btn-primary" id="leadDesignation-submit-btn" type="submit" value="Add Designation">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addLeadPotentialClass')
    <div id="leadPotentialClass-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leadPotentialClass-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="leadPotentialClassForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="leadPotentialClass-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="leadPotentialClass-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="leadPotentialClass-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="leadPotentialClassName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="leadPotentialClassName" name="leadPotentialClassName" autocomplete="off" placeholder="Enter Potential Class Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="leadPotentialClass-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="leadPotentialClassId" value="">
                        <input style="display: none" class="btn btn-primary" id="leadPotentialClass-update-btn" type="submit" value="Update Designation">
                        <input class="btn btn-primary" id="leadPotentialClass-submit-btn" type="submit" value="Add Designation">
                    </div>
                </form>

            </div>
        </div>
    </div>

@elseif($modal == 'addLead')
    <div id="lead-modal" class="modal fade bd-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lead-modal-title"> {{$modal_title ?? ''}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form id="leadForm" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div style="display: none" id="modal-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="lead-error-msg" class="alert alert-danger">Something went wrong.</div>
                                        <div style="display: none" id="lead-blank-error-msg" class="alert alert-danger"></div>
                                        <div style="display: none" id="lead-email-error-msg" class="alert alert-danger">The email has been already taken.</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="leadName" class="form-label">Lead Type <span class="hd-required">*</span></label>
                                                        <div style="display: block;">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input leadType" name="radioInline" id="radioInline" value="Individual">
                                                                <label class="form-check-label" for="radioInline">
                                                                    Individual
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input leadType" name="radioInline" id="radioInline1" value="Business" checked>
                                                                <label class="form-check-label" for="radioInline1">
                                                                    Business
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="leadName" class="form-label">Name <span class="hd-required">*</span></label>
                                                        <input type="text" class="form-control" id="leadName" name="leadName" autocomplete="off" placeholder="Enter Lead Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="leadGender" class="form-label">Gender <span class="hd-required">*</span></label>
                                                        <select class="form-control" name="leadGender" id="leadGender">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Nationality</label>
                                                        <?php $countries = getCountries(); ?>
                                                        <select id="leadCountry" name="leadCountry" class="form-control hd-select" data-width="100%" tabindex="-1">
			                                                <?php foreach ($countries as $country) { ?>
                                                            <option value="<?= $country; ?>"><?= $country; ?></option>
			                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Spoken Languages</label>
				                                        <?php $languages = getLanguages(); ?>
                                                        <select id="leadSpokenLanguage" name="leadSpokenLanguage" class="form-control hd-select" data-width="100%" tabindex="-1" multiple>
					                                        <?php foreach ($languages as $language) { ?>
                                                            <option value="<?= $language; ?>"><?= $language; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 leadBusiness">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Company <i class="hd-required">*</i></label>
                                                        <select id="leadCompany" name="leadCompany" class="form-control hd-select" data-width="100%" tabindex="-1">
                                                            <option value="">Select Company</option>
                                                            <?php foreach ($companies as $company) { ?>
                                                            <option value="<?= $company->id; ?>"><?= $company->name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 leadBusiness">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Designation <i class="hd-required">*</i></label>
                                                        <select id="leadDesignation" name="leadDesignation" class="form-control hd-select" data-width="100%" tabindex="-1">
                                                            <option value="">Select Designation</option>
					                                        <?php foreach ($designations as $designation) { ?>
                                                            <option value="<?= $designation->id; ?>"><?= $designation->name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 leadBusiness">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Speciality</label>
                                                        <select id="leadSpeciality" name="leadSpeciality" class="form-control hd-select" data-width="100%" tabindex="-1">
                                                            <option value="">Select Speciality</option>
					                                        <?php foreach ($specialities as $speciality) { ?>
                                                            <option value="<?= $speciality->id; ?>"><?= $speciality->name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="form-label">City</label>--}}
{{--				                                        <?php--}}
{{--				                                        $cities = getCities();--}}
{{--				                                        ?>--}}
{{--                                                        <select id="leadCity" name="leadCity" class="form-control hd-select" data-width="100%" tabindex="-1">--}}
{{--					                                        <?php foreach ($cities as $city) { ?>--}}
{{--                                                            <option value="<?= $city; ?>"><?= $city; ?></option>--}}
{{--					                                        <?php } ?>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="mb-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="form-label">Area</label>--}}
{{--                                                        <select id="leadArea" name="leadArea" class="form-control hd-select" data-width="100%">--}}

{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Potential Class <i class="hd-required">*</i></label>
                                                        <select id="leadPotentialClass" name="leadPotentialClass" class="form-control hd-select" data-width="100%" tabindex="-1">
                                                            <option value="">Select Potential Class</option>
                                                            <?php foreach ($potential_classes as $potentialClass) { ?>
                                                            <option value="<?= $potentialClass->id; ?>"><?= $potentialClass->name; ?></option>
					                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Working Hours</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <div class="form-group">
                                                                        <label class="form-label">From</label>
                                                                        <input type="time" id="leadFrom" name="leadFrom" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <div class="form-group">
                                                                        <label class="form-label">To</label>
                                                                        <input type="time" id="leadTo" name="leadTo" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="leadEmail" id="leadEmail" placeholder="Enter Lead Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
	                                                <?php
	                                                $dialCodes = getDialCodes();
	                                                ?>
                                                    <label class="form-label">Contact Number <span class="hd-required">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="flex: 1 !important;">
                                                            <select name="leadDialCode" id="leadDialCode"  class="form-control hd-select" data-width="100%">
				                                                <?php foreach($dialCodes as $i => $code) {
				                                                ?>
                                                                <option value="{{ $i }}">+{{ $i }}</option>
				                                                <?php
				                                                } ?>
                                                            </select>
                                                        </div>
                                                        <input type="tel" id="leadPhone" name="leadPhone" class="form-control" placeholder="Enter Lead Contact Number" style="flex: 4 !important;">
                                                    </div>
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="form-label">Contact Number <span class="hd-required">*</span></label>--}}
{{--                                                        <input type="number" id="leadPhone" name="leadPhone" class="form-control" placeholder="Enter Lead Contact Number">--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Work Days</label>
                                                        <div class="mb-3">
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input leadWorkingDays" id="leadWorkingDays" name="leadWorkingDays" value="Mon" multiple>
                                                                <label class="form-check-label" for="checkInline">
                                                                    Mon
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input leadWorkingDays" id="leadWorkingDays" name="leadWorkingDays" value="Tue" multiple>
                                                                <label class="form-check-label" for="checkInlineChecked">
                                                                    Tues
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input leadWorkingDays" id="leadWorkingDays" name="leadWorkingDays" value="Wed" multiple>
                                                                <label class="form-check-label" for="checkInlineChecked">
                                                                    Wed
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input leadWorkingDays" id="leadWorkingDays" name="leadWorkingDays" value="Thurs" multiple>
                                                                <label class="form-check-label" for="checkInlineChecked">
                                                                    Thurs
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input leadWorkingDays" id="leadWorkingDays" name="leadWorkingDays" value="Fri" multiple>
                                                                <label class="form-check-label" for="checkInline">
                                                                    Fri
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input leadWorkingDays" id="leadWorkingDays" name="leadWorkingDays" value="Sat" multiple>
                                                                <label class="form-check-label" for="checkInlineChecked">
                                                                    Sat
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input leadWorkingDays" id="leadWorkingDays" name="leadWorkingDays" value="Sun" multiple>
                                                                <label class="form-check-label" for="checkInlineChecked">
                                                                    Sun
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">KOL <i class="hd-required">*</i></label>
                                                        <div class="mb-4">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input leadKOL" name="leadKOL" id="leadKOL" value="1">
                                                                <label class="form-check-label" for="radioInline">
                                                                    YES
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input leadKOL" name="leadKOL" id="leadKOL" value="0">
                                                                <label class="form-check-label" for="radioInline1">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Comment</label>
                                                        <input type="text" id="leadComment" name="leadComment" class="form-control" placeholder="Enter Lead Comment">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button style="display: none" id="lead-submit-loading-btn" class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>

                        <input hidden id="leadId" value="">
                        <input style="display: none" class="btn btn-primary" id="lead-update-btn" type="submit" value="Update Lead">
                        <input class="btn btn-primary" id="lead-submit-btn" type="submit" value="Add Lead">
                    </div>
                </form>

            </div>
        </div>
    </div>


@endif



