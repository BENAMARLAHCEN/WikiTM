<?php $user = $user[0]?>
<div class="card">
    <div class="card-body pt-3">
        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

        </ul>
        <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic"><?=$user->about?></p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">User Name</div>
                    <div class="col-lg-9 col-md-8"><?=$user->username?></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?=$user->Job?></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?=$user->Country?></div>
                </div>


                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?=$user->phone?></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=$user->email?></div>
                </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form>
                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img class=" w-50" src="assets/img/lahcen.JPG" alt="Profile">
                            <div class="pt-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="userName" type="text" class="form-control" id="fullName" value="<?=$user->username?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                        <div class="col-md-8 col-lg-9">
                            <textarea name="about" class="form-control" id="about" style="height: 100px"><?=$user->about?></textarea>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="job" type="text" class="form-control" id="Job" value="<?=$user->Job?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="country" type="text" class="form-control" id="Country" value="<?=$user->Country?>">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="<?=$user->phone?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="<?=$user->email?>">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form><!-- End Profile Edit Form -->

            </div>

            

            <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="post">

                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>

                </form><!-- End Change Password Form -->

            </div>

        </div><!-- End Bordered Tabs -->

    </div>
</div>