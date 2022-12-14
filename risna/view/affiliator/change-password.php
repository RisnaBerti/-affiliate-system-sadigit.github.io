<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Profile 2-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-400px w-xl-350px" id="kt_profile_aside">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body ">
                        <!--begin::User-->
                        <div class="text-center mb-10">
                            <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                <img class="symbol symbol-60 symbol-circle symbol-xl-90" src="<?= base_url('assets/media/users/default.jpg'); ?>">
                                <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                            </div>

                            <h4 class="font-weight-bold my-2">
                                <?= $user['nama_lengkap']; ?>
                            </h4>
                            <div class="text-muted mb-2">
                                Member Since <?= date('d F Y', strtotime($user['created_at'])); ?>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="mb-10 text-center">
                            <a href="<?= $user['link_fb']; ?>" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                <i class="socicon-facebook"></i>
                            </a>
                            <a href="<?= $user['link_ig']; ?>" class="btn btn-icon btn-circle btn-light-instagram mr-2">
                                <i class="socicon-instagram"></i>
                            </a>
                            <a href="<?= $user['link_yutub']; ?>" class="btn btn-icon btn-circle btn-light-youtube">
                                <i class="socicon-youtube"></i>
                            </a>
                        </div>
                        <!--end::Contact-->

                        <!--begin::Contact-->
                        <div class="pt-6 pb-8">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Name:</span>
                                <span class="text-muted"><?= $user['nama_lengkap']; ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Email:</span>
                                <span class="text-muted"><?= $user['email']; ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Phone:</span>
                                <span class="text-muted"><?= $user['no_hp']; ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-weight-bold mr-2">Location:</span>
                                <span class="text-muted"><?= $user['alamat_lengkap']; ?></span>
                            </div>
                        </div>
                        <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="text-muted">Member since <?= date('d F Y', $user['created_at']); ?></span>
                            </div> -->
                        <!--end::Contact-->

                        <!--begin::Nav-->
                        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                            <div class="navi-item mb-2">
                                <a href="<?= base_url('affiliator/Edit_profile') ?>" class="navi-link py-4 ">
                                    <span class="navi-icon mr-2">
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="navi-text font-size-lg">
                                        Personal Information
                                    </span>
                                </a>
                            </div>
                            <div class="navi-item mb-2">
                                <a href="<?= base_url('affiliator/Change_password') ?>" class="navi-link py-4 active">
                                    <span class="navi-icon mr-2">
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="navi-text font-size-lg">
                                        Change Passwort
                                    </span>
                                </a>
                            </div>
                            <div class="navi-item mb-2">
                                <a href="<?= base_url('affiliator/Rekening') ?>" class="navi-link py-4">
                                    <span class="navi-icon mr-2">
										<span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Credit-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
												<rect fill="#000000" x="2" y="8" width="20" height="3"/>
												<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
											</g>
										</svg><!--end::Svg Icon--></span>
                                    </span>
                                    <span class="navi-text font-size-lg">
                                        Rekening
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--end::Nav-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Aside-->

            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-6">
                        <!--begin::List Widget 10-->
                        <div class="card card-custom  card-stretch gutter-b">
                            <!--begin::Card-->
                            <div class="card" style="width: 40rem;">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                                        <span class="text-muted font-weight-bold font-size-sm mt-1">Change your password</span>
                                    </div>
                                </div>
                                <!--end::Header-->

                                <?= $this->session->flashdata('message'); ?>

                                <!--begin::Form-->
                                <form action="<?= base_url('affiliator/change_password'); ?>" method="post" class="form offcanvas-mobile w-350px w-xxl-750px">
                                    <div class="card-body offcanvas-mobile w-40px w-xxl-700px">
                                        <!--begin::Heading-->
                                        <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="password">Current Password</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input class="form-control form-control-lg form-control-solid" type="password" id="password" name="password" required/>
                                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label class="col-xl-6 col-lg-3 col-form-label" for="password1">New Password</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control form-control-lg form-control-solid" type="password" id="password1" name="password1" required/>
                                            </div>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <label id="city_id" name="city_id" class="col-xl-6 col-lg-3 col-form-label" for="password2">Confirm New Password</label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input class="form-control form-control-lg form-control-solid" type="password" id="password2" name="password2" required />
                                            </div>
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>


                                        <!--begin::Form Group-->
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-9">
                                                <button type="sumbit" class="btn btn-success mr-2">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--END::Form Group-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end: List Widget 10-->
                    </div>
                    <!-- end::col -->
                </div>
                <!-- end::row -->

            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile 2-->
    </div>
    <!--end::Container-->

</body>
<!--end::Body-->

</html>