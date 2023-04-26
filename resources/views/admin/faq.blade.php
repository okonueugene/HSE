<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - HSE | Askari</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>


  
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

      @include('commons.admin.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                                    <i class="ti ti-search ti-md me-2"></i>
                                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                                </a>
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Language -->
                            <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="fi fi-us fis rounded-circle me-1 fs-3"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                                            <i class="fi fi-us fis rounded-circle me-1 fs-3"></i>
                                            <span class="align-middle">English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                                            <i class="fi fi-fr fis rounded-circle me-1 fs-3"></i>
                                            <span class="align-middle">French</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                                            <i class="fi fi-de fis rounded-circle me-1 fs-3"></i>
                                            <span class="align-middle">German</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                                            <i class="fi fi-pt fis rounded-circle me-1 fs-3"></i>
                                            <span class="align-middle">Portuguese</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Language -->

                            <!-- Style Switcher -->
                            <li class="nav-item me-2 me-xl-0">
                                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                    <i class="ti ti-md"></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- Quick links  -->
                            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="ti ti-layout-grid-add ti-md"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end py-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                                            <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="ti ti-sm ti-apps"></i
                        ></a>
                                        </div>
                                    </div>
                                    <div class="dropdown-shortcuts-list scrollable-container">
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-calendar fs-4"></i>
                          </span>
                                                <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                                <small class="text-muted mb-0">Appointments</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-file-invoice fs-4"></i>
                          </span>
                                                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                                <small class="text-muted mb-0">Manage Accounts</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-users fs-4"></i>
                          </span>
                                                <a href="app-user-list.html" class="stretched-link">User App</a>
                                                <small class="text-muted mb-0">Manage Users</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-lock fs-4"></i>
                          </span>
                                                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                                <small class="text-muted mb-0">Permission</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-chart-bar fs-4"></i>
                          </span>
                                                <a href="index.html" class="stretched-link">Dashboard</a>
                                                <small class="text-muted mb-0">User Profile</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-settings fs-4"></i>
                          </span>
                                                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                                <small class="text-muted mb-0">Account Settings</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-help fs-4"></i>
                          </span>
                                                <a href="pages-help-center-landing.html" class="stretched-link">Help Center</a>
                                                <small class="text-muted mb-0">FAQs & Articles</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                            <i class="ti ti-square fs-4"></i>
                          </span>
                                                <a href="modal-examples.html" class="stretched-link">Modals</a>
                                                <small class="text-muted mb-0">Useful Popups</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Quick links -->

                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="ti ti-bell ti-md"></i>
                                    <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">Notification</h5>
                                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i
                        ></a>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                                        <p class="mb-0">Won the monthly best seller gold badge</p>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Charles Franklin</h6>
                                                        <p class="mb-0">Accepted your connection</p>
                                                        <small class="text-muted">12hr ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/2.png" alt class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">New Message ✉️</h6>
                                                        <p class="mb-0">You have new message from Natalie</p>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-shopping-cart"></i
                                ></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                                                        <p class="mb-0">ACME Inc. made new order $1,154</p>
                                                        <small class="text-muted">1 day ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/9.png" alt class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Application has been approved 🚀</h6>
                                                        <p class="mb-0">Your ABC project application has been approved.</p>
                                                        <small class="text-muted">2 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-chart-pie"></i
                                ></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Monthly report is generated</h6>
                                                        <p class="mb-0">July monthly financial report is generated</p>
                                                        <small class="text-muted">3 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/5.png" alt class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Send connection request</h6>
                                                        <p class="mb-0">Peter sent you connection request</p>
                                                        <small class="text-muted">4 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="../../assets/img/avatars/6.png" alt class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">New message from Jane</h6>
                                                        <p class="mb-0">Your have new message from Jane</p>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-label-warning"><i class="ti ti-alert-triangle"></i
                                ></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">CPU is running high</h6>
                                                        <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                                                        <small class="text-muted">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span
                              ></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span
                              ></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-menu-footer border-top">
                                        <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                        View all notifications
                      </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Notification -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">John Doe</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-profile-user.html">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="ti ti-settings me-2 ti-sm"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                                            <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span
                          >
                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-help-center-landing.html">
                                            <i class="ti ti-lifebuoy me-2 ti-sm"></i>
                                            <span class="align-middle">Help</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-faq.html">
                                            <i class="ti ti-help me-2 ti-sm"></i>
                                            <span class="align-middle">FAQ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-pricing.html">
                                            <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                                            <span class="align-middle">Pricing</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>

                <!-- / Navbar -->
                 <!-- Content wrapper -->
              
                 <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="faq-header d-flex flex-column justify-content-center align-items-center rounded">
                            <h3 class="text-center">Hello, how can we help?</h3>
                            <div class="input-wrapper mb-3 input-group input-group-lg input-group-merge">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                            <p class="text-center mb-0 px-3">or choose a category to quickly find the help you need</p>
                        </div>

                        <div class="row mt-4">
                            <!-- Navigation -->
                            <div class="col-lg-3 col-md-4 col-12 mb-md-0 mb-3">
                                <div class="d-flex justify-content-between flex-column mb-2 mb-md-0">
                                    <ul class="nav nav-align-left nav-pills flex-column" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#payment" aria-selected="true" role="tab">
                          <i class="ti ti-credit-card me-1 ti-sm"></i>
                          <span class="align-middle fw-semibold">Payment</span>
                        </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#delivery" aria-selected="false" tabindex="-1" role="tab">
                          <i class="ti ti-briefcase me-1 ti-sm"></i>
                          <span class="align-middle fw-semibold">Delivery</span>
                        </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cancellation" aria-selected="false" tabindex="-1" role="tab">
                          <i class="ti ti-rotate-clockwise-2 me-1 ti-sm"></i>
                          <span class="align-middle fw-semibold">Cancellation &amp; Return</span>
                        </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orders" aria-selected="false" tabindex="-1" role="tab">
                          <i class="ti ti-box me-1 ti-sm"></i>
                          <span class="align-middle fw-semibold">My Orders</span>
                        </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#product" aria-selected="false" tabindex="-1" role="tab">
                          <i class="ti ti-settings me-1 ti-sm"></i>
                          <span class="align-middle fw-semibold">Product &amp; Services</span>
                        </button>
                                        </li>
                                    </ul>
                                    <div class="d-none d-md-block">
                                        <div class="mt-4">
                                            <img src="../../assets/img/illustrations/girl-sitting-with-laptop.png" class="img-fluid" width="270" alt="FAQ Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Navigation -->

                            <!-- FAQ's -->
                            <div class="col-lg-9 col-md-8 col-12">
                                <div class="tab-content py-0">
                                    <div class="tab-pane fade show active" id="payment" role="tabpanel">
                                        <div class="d-flex mb-3 gap-3">
                                            <div>
                                                <span class="badge bg-label-primary rounded-2 p-2">
                            <i class="ti ti-credit-card ti-lg"></i>
                          </span>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">
                                                    <span class="align-middle">Payment</span>
                                                </h4>
                                                <small>Get help with payment</small>
                                            </div>
                                        </div>
                                        <div id="accordionPayment" class="accordion">
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionPayment-1" aria-controls="accordionPayment-1">
                              Q1: When is payment taken for my order?
                            </button>
                                                </h2>

                                                <div id="accordionPayment-1" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        Payment is taken during the checkout process when you pay for your order. The order number that appears on the confirmation screen indicates payment has been successfully processed.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPayment-2" aria-controls="accordionPayment-2">
                              Q2: How do I pay for my order?
                            </button>
                                                </h2>
                                                <div id="accordionPayment-2" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        We accept Visa®, MasterCard®, American Express®, and PayPal®. Our servers encrypt all information submitted to them, so you can be confident that your credit card information will be kept safe and secure.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPayment-3" aria-controls="accordionPayment-3">
                              Q3: What should I do if I'm having trouble placing an order?
                            </button>
                                                </h2>
                                                <div id="accordionPayment-3" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        For any technical difficulties you are experiencing with our website, please contact us at our
                                                        <a href="javascript:void(0);">support portal</a>, or you can call us toll-free at
                                                        <strong>1-000-000-000</strong>, or email us at
                                                        <a href="javascript:void(0);">order@companymail.com</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPayment-4" aria-controls="accordionPayment-4">
                              Q4: Which license do I need for an end product that is only accessible to paying users?
                            </button>
                                                </h2>
                                                <div id="accordionPayment-4" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        If you have paying users or you are developing any SaaS products then you need an Extended License. For each products, you need a license. You can get free lifetime updates as well.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionPayment-5" aria-controls="accordionPayment-5">
                              Q5: Does my subscription automatically renew?
                            </button>
                                                </h2>
                                                <div id="accordionPayment-5" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        No, This is not subscription based item.Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll bonbon muffin liquorice. Wafer lollipop sesame snaps.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="delivery" role="tabpanel">
                                        <div class="d-flex mb-3 gap-3">
                                            <div>
                                                <span class="badge bg-label-primary rounded-2 p-2">
                            <i class="ti ti-briefcase ti-lg"></i>
                          </span>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">
                                                    <span class="align-middle">Delivery</span>
                                                </h4>
                                                <small>Lorem ipsum, dolor sit amet.</small>
                                            </div>
                                        </div>
                                        <div id="accordionDelivery" class="accordion">
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionDelivery-1" aria-controls="accordionDelivery-1">
                              Q1: How would you ship my order?
                            </button>
                                                </h2>

                                                <div id="accordionDelivery-1" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        For large products, we deliver your product via a third party logistics company offering you the “room of choice” scheduled delivery service. For small products, we offer free parcel delivery.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionDelivery-2" aria-controls="accordionDelivery-2">
                              Q2: What is the delivery cost of my order?
                            </button>
                                                </h2>
                                                <div id="accordionDelivery-2" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        The cost of scheduled delivery is $69 or $99 per order, depending on the destination postal code. The parcel delivery is free.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionDelivery-4" aria-controls="accordionDelivery-4">
                              Q3: What to do if my product arrives damaged?
                            </button>
                                                </h2>
                                                <div id="accordionDelivery-4" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        We will promptly replace any product that is damaged in transit. Just contact our
                                                        <a href="javascript:void(0);">support team</a>, to notify us of the situation within 48 hours of product arrival.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="cancellation" role="tabpanel">
                                        <div class="d-flex mb-3 gap-3">
                                            <div>
                                                <span class="badge bg-label-primary rounded-2 p-2">
                            <i class="ti ti-rotate-clockwise-2 ti-lg"></i>
                          </span>
                                            </div>
                                            <div>
                                                <h4 class="mb-0"><span class="align-middle">Cancellation &amp; Return</span></h4>
                                                <small>Lorem ipsum, dolor sit amet.</small>
                                            </div>
                                        </div>
                                        <div id="accordionCancellation" class="accordion">
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionCancellation-1" aria-controls="accordionCancellation-1">
                              Q1: Can I cancel my order?
                            </button>
                                                </h2>

                                                <div id="accordionCancellation-1" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        <p>
                                                            Scheduled delivery orders can be cancelled 72 hours prior to your selected delivery date for full refund.
                                                        </p>
                                                        <p class="mb-0">
                                                            Parcel delivery orders cannot be cancelled, however a free return label can be provided upon request.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCancellation-2" aria-controls="accordionCancellation-2">
                              Q2: Can I return my product?
                            </button>
                                                </h2>
                                                <div id="accordionCancellation-2" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        You can return your product within 15 days of delivery, by contacting our
                                                        <a href="javascript:void(0);">support team</a>, All merchandise returned must be in the original packaging with all original items.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-controls="accordionCancellation-3" data-bs-target="#accordionCancellation-3">
                              Q3: Where can I view status of return?
                            </button>
                                                </h2>
                                                <div id="accordionCancellation-3" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        <p>Locate the item from Your <a href="javascript:void(0);">Orders</a></p>
                                                        <p class="mb-0">Select <strong>Return/Refund</strong> status</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="d-flex mb-3 gap-3">
                                            <div>
                                                <span class="badge bg-label-primary rounded-2 p-2">
                            <i class="ti ti-box ti-lg"></i>
                          </span>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">
                                                    <span class="align-middle">My Orders</span>
                                                </h4>
                                                <small>Lorem ipsum, dolor sit amet.</small>
                                            </div>
                                        </div>
                                        <div id="accordionOrders" class="accordion">
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionOrders-1" aria-controls="accordionOrders-1">
                              Q1: Has my order been successful?
                            </button>
                                                </h2>

                                                <div id="accordionOrders-1" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        <p>
                                                            All successful order transactions will receive an order confirmation email once the order has been processed. If you have not received your order confirmation email within 24 hours, check your junk email or spam folder.
                                                        </p>
                                                        <p class="mb-0">
                                                            Alternatively, log in to your account to check your order summary. If you do not have a account, you can contact our Customer Care Team on <strong>1-000-000-000</strong>.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionOrders-2" aria-controls="accordionOrders-2">
                              Q2: My Promotion Code is not working, what can I do?
                            </button>
                                                </h2>
                                                <div id="accordionOrders-2" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        If you are having issues with a promotion code, please contact us at
                                                        <strong>1 000 000 000</strong> for assistance.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionOrders-3" aria-controls="accordionOrders-3">
                              Q3: How do I track my Orders?
                            </button>
                                                </h2>
                                                <div id="accordionOrders-3" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        <p>
                                                            If you have an account just sign into your account from
                                                            <a href="javascript:void(0);">here</a> and select <strong>“My Orders”</strong>.
                                                        </p>
                                                        <p class="mb-0">
                                                            If you have a a guest account track your order from
                                                            <a href="javascript:void(0);">here</a> using the order number and the email address.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="product" role="tabpanel">
                                        <div class="d-flex mb-3 gap-3">
                                            <div>
                                                <span class="badge bg-label-primary rounded-2 p-2">
                            <i class="ti ti-camera ti-lg"></i>
                          </span>
                                            </div>
                                            <div>
                                                <h4 class="mb-0">
                                                    <span class="align-middle">Product &amp; Services</span>
                                                </h4>
                                                <small>Lorem ipsum, dolor sit amet.</small>
                                            </div>
                                        </div>
                                        <div id="accordionProduct" class="accordion">
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#accordionProduct-1" aria-controls="accordionProduct-1">
                              Q1: Will I be notified once my order has shipped?
                            </button>
                                                </h2>

                                                <div id="accordionProduct-1" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        Yes, We will send you an email once your order has been shipped. This email will contain tracking and order information.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProduct-2" aria-controls="accordionProduct-2">
                              Q2: Where can I find warranty information?
                            </button>
                                                </h2>
                                                <div id="accordionProduct-2" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        We are committed to quality products. For information on warranty period and warranty services, visit our Warranty section <a href="javascript:void(0);">here</a>.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProduct-3" aria-controls="accordionProduct-3">
                              Q3: How can I purchase additional warranty coverage?
                            </button>
                                                </h2>
                                                <div id="accordionProduct-3" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        For the peace of your mind, we offer extended warranty plans that add additional year(s) of protection to the standard manufacturer’s warranty provided by us. To purchase or find out more about the extended warranty program, visit Extended Warranty section
                                                        <a href="javascript:void(0);">here</a>.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ's -->
                        </div>

                        <!-- Contact -->
                        <div class="row mt-5">
                            <div class="col-12 text-center mb-4">
                                <div class="badge bg-label-primary">Question?</div>
                                <h4 class="my-2">You still have a question?</h4>
                                <p>If you can't find question in our FAQ, you can contact us. We'll answer you shortly!</p>
                            </div>
                        </div>
                        <div class="row text-center justify-content-center gap-sm-0 gap-3">
                            <div class="col-sm-6">
                                <div class="py-3 rounded bg-faq-section text-center">
                                    <span class="badge bg-label-primary my-3 rounded-2 p-2">
                      <i class="ti ti-phone ti-md"></i>
                    </span>
                                    <h4 class="mb-2"><a class="text-body" href="tel:+(810)25482568">+ (810) 2548 2568</a></h4>
                                    <p>We are always happy to help</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="py-3 rounded bg-faq-section text-center">
                                    <span class="badge bg-label-primary my-3 rounded-2 p-2">
                      <i class="ti ti-mail ti-md"></i>
                    </span>
                                    <h4 class="mb-2"><a class="text-body" href="mailto:help@help.com">help@help.com</a></h4>
                                    <p>Best way to get a quick answer</p>
                                </div>
                            </div>
                        </div>
                        <!-- /Contact -->
                    </div>
                    <!-- / Content -->
  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
            <div>
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
            </div>
            <div>
                <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>

<a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

<a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
</div>
</div>
</div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

<script src="../../assets/vendor/libs/hammer/hammer.js"></script>
<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../../assets/js/dashboards-crm.js"></script>
</body>
</html>