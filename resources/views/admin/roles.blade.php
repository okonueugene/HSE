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
                        <h4 class="fw-semibold mb-4">Roles List</h4>

                        <p class="mb-4">
                            A role provided access to predefined menus and features so that depending on <br> assigned role an administrator can have access to what user needs.
                        </p>
                        <!-- Role cards -->
                        <div class="row g-4">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="fw-normal mb-2">Total 4 users</h6>
                                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Vinnie Mostowy" data-bs-original-title="Vinnie Mostowy">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar">
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar">
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Julee Rossignol" data-bs-original-title="Julee Rossignol">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar">
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kaith D'souza" data-bs-original-title="Kaith D'souza">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="Avatar">
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="John Doe" data-bs-original-title="John Doe">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end mt-1">
                                            <div class="role-heading">
                                                <h4 class="mb-1">Administrator</h4>
                                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                        </div>
                        <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="fw-normal mb-2">Total 7 users</h6>
                                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Jimmy Ressula" data-bs-original-title="Jimmy Ressula">
                                                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="John Doe" data-bs-original-title="John Doe">
                                                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kristi Lawker" data-bs-original-title="Kristi Lawker">
                                                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kaith D'souza" data-bs-original-title="Kaith D'souza">
                                                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Danny Paul" data-bs-original-title="Danny Paul">
                                                        <img class="rounded-circle" src="../../assets/img/avatars/7.png" alt="Avatar">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-end mt-1">
                                                <div class="role-heading">
                                                    <h4 class="mb-1">Manager</h4>
                                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                        </div>
                        <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="fw-normal mb-2">Total 5 users</h6>
                                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Andrew Tye" data-bs-original-title="Andrew Tye">
                                                            <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar">
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Rishi Swaat" data-bs-original-title="Rishi Swaat">
                                                            <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar">
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Rossie Kim" data-bs-original-title="Rossie Kim">
                                                            <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar">
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kim Merchent" data-bs-original-title="Kim Merchent">
                                                            <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar">
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Sam D'souza" data-bs-original-title="Sam D'souza">
                                                            <img class="rounded-circle" src="../../assets/img/avatars/13.png" alt="Avatar">
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-end mt-1">
                                                    <div class="role-heading">
                                                        <h4 class="mb-1">Users</h4>
                                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                        </div>
                        <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="fw-normal mb-2">Total 3 users</h6>
                                                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kim Karlos" data-bs-original-title="Kim Karlos">
                                                                <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="Avatar">
                                                            </li>
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Katy Turner" data-bs-original-title="Katy Turner">
                                                                <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar">
                                                            </li>
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Peter Adward" data-bs-original-title="Peter Adward">
                                                                <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="Avatar">
                                                            </li>
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kaith D'souza" data-bs-original-title="Kaith D'souza">
                                                                <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar">
                                                            </li>
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="John Parker" data-bs-original-title="John Parker">
                                                                <img class="rounded-circle" src="../../assets/img/avatars/11.png" alt="Avatar">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-end mt-1">
                                                        <div class="role-heading">
                                                            <h4 class="mb-1">Support</h4>
                                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                        </div>
                        <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="fw-normal mb-2">Total 2 users</h6>
                                                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Kim Merchent" data-bs-original-title="Kim Merchent">
                                                                    <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar">
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Sam D'souza" data-bs-original-title="Sam D'souza">
                                                                    <img class="rounded-circle" src="../../assets/img/avatars/13.png" alt="Avatar">
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Nurvi Karlos" data-bs-original-title="Nurvi Karlos">
                                                                    <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar">
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Andrew Tye" data-bs-original-title="Andrew Tye">
                                                                    <img class="rounded-circle" src="../../assets/img/avatars/8.png" alt="Avatar">
                                                                </li>
                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Rossie Kim" data-bs-original-title="Rossie Kim">
                                                                    <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar">
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-end mt-1">
                                                            <div class="role-heading">
                                                                <h4 class="mb-1">Restricted User</h4>
                                                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                        </div>
                        <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6">
                                                    <div class="card h-100">
                                                        <div class="row h-100">
                                                            <div class="col-sm-5">
                                                                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                                                                    <img src="../../assets/img/illustrations/add-new-roles.png" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <div class="card-body text-sm-end text-center ps-sm-0">
                                                                    <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-new-role waves-effect waves-light">
                            Add New Role
                          </button>
                                                                    <p class="mb-0 mt-1">Add role, if it does not exist</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <!-- Role Table -->
                                                    <div class="card">
                                                        <div class="card-datatable table-responsive">
                                                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row mx-2"><div class="col-sm-12 col-md-4 col-lg-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-12 col-md-8 col-lg-6"><div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center align-items-center flex-sm-nowrap flex-wrap me-1"><div class="me-3"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search<input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0"></label></div></div><div class="user_role w-px-200 pb-3 pb-sm-0"><select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option><option value="Admin" class="text-capitalize">Admin</option><option value="Author" class="text-capitalize">Author</option><option value="Editor" class="text-capitalize">Editor</option><option value="Maintainer" class="text-capitalize">Maintainer</option><option value="Subscriber" class="text-capitalize">Subscriber</option></select></div></div></div></div><table class="datatables-users table border-top dataTable no-footer dtr-column collapsed" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 909px;">
                                                                <thead>
                                                                    <tr><th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 1px;" aria-label=""></th><th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 245px;" aria-label="User: activate to sort column ascending" aria-sort="descending">User</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-label="Role: activate to sort column ascending">Role</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 69px;" aria-label="Plan: activate to sort column ascending">Plan</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 136px;" aria-label="Billing: activate to sort column ascending">Billing</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 64px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Actions">Actions</th></tr>
                                                                </thead><tbody><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Zsazsa McCleverty</span></a><small class="text-muted">@zmcclevertye@soundcloud.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-primary me-3 w-px-30 h-px-30"><i class="ti ti-chart-pie-2 ti-sm"></i></span>Maintainer</span></td><td><span class="fw-semibold">Enterprise</span></td><td>Auto Debit</td><td><span class="badge bg-label-success" text-capitalized="">Active</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Yoko Pottie</span></a><small class="text-muted">@ypottiec@privacy.gov.au</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-warning me-3 w-px-30 h-px-30"><i class="ti ti-user ti-sm"></i></span>Subscriber</span></td><td><span class="fw-semibold">Basic</span></td><td>Auto Debit</td><td><span class="badge bg-label-secondary" text-capitalized="">Inactive</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Wesley Burland</span></a><small class="text-muted">@wburlandj@uiuc.edu</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-info me-3 w-px-30 h-px-30"><i class="ti ti-edit ti-sm"></i></span>Editor</span></td><td><span class="fw-semibold">Team</span></td><td>Auto Debit</td><td><span class="badge bg-label-secondary" text-capitalized="">Inactive</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">VK</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Vladamir Koschek</span></a><small class="text-muted">@vkoschek17@abc.net.au</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-success me-3 w-px-30 h-px-30"><i class="ti ti-settings ti-sm"></i></span>Author</span></td><td><span class="fw-semibold">Team</span></td><td>Manual - Paypal</td><td><span class="badge bg-label-success" text-capitalized="">Active</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-secondary">TW</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Tyne Widmore</span></a><small class="text-muted">@twidmore12@bravesites.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-warning me-3 w-px-30 h-px-30"><i class="ti ti-user ti-sm"></i></span>Subscriber</span></td><td><span class="fw-semibold">Team</span></td><td>Manual - Cash</td><td><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">TB</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Travus Bruntjen</span></a><small class="text-muted">@tbruntjeni@sitemeter.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-secondary me-3 w-px-30 h-px-30"><i class="ti ti-device-laptop ti-sm"></i></span>Admin</span></td><td><span class="fw-semibold">Enterprise</span></td><td>Manual - Cash</td><td><span class="badge bg-label-success" text-capitalized="">Active</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Stu Delamaine</span></a><small class="text-muted">@sdelamainek@who.int</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-success me-3 w-px-30 h-px-30"><i class="ti ti-settings ti-sm"></i></span>Author</span></td><td><span class="fw-semibold">Basic</span></td><td>Auto Debit</td><td><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-secondary">SO</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Saunder Offner</span></a><small class="text-muted">@soffner19@mac.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-primary me-3 w-px-30 h-px-30"><i class="ti ti-chart-pie-2 ti-sm"></i></span>Maintainer</span></td><td><span class="fw-semibold">Enterprise</span></td><td>Auto Debit</td><td><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-info">SM</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Stephen MacGilfoyle</span></a><small class="text-muted">@smacgilfoyley@bigcartel.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-primary me-3 w-px-30 h-px-30"><i class="ti ti-chart-pie-2 ti-sm"></i></span>Maintainer</span></td><td><span class="fw-semibold">Company</span></td><td>Manual - Paypal</td><td><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" tabindex="0" style=""></td><td class="sorting_1"><div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">Skip Hebblethwaite</span></a><small class="text-muted">@shebblethwaite10@arizona.edu</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-secondary me-3 w-px-30 h-px-30"><i class="ti ti-device-laptop ti-sm"></i></span>Admin</span></td><td><span class="fw-semibold">Company</span></td><td>Manual - Cash</td><td><span class="badge bg-label-secondary" text-capitalized="">Inactive</span></td><td class="dtr-hidden" style="display: none;"><div class="d-flex align-items-center"><a href="app-user-view-account.html" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" "="" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr></tbody>
                                                            </table><div class="row mx-2"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                                                        </div>
                                                    </div>
                                                    <!--/ Role Table -->
                                                </div>
                                            </div>
                                            <!--/ Role cards -->

                                            <!-- Add Role Modal -->
                                            <!-- Add Role Modal -->
                                            <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                                                    <div class="modal-content p-3 p-md-5">
                                                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        <div class="modal-body">
                                                            <div class="text-center mb-4">
                                                                <h3 class="role-title mb-2">Add New Role</h3>
                                                                <p class="text-muted">Set role permissions</p>
                                                            </div>
                                                            <!-- Add role form -->
                                                            <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
                                                                <div class="col-12 mb-4 fv-plugins-icon-container">
                                                                    <label class="form-label" for="modalRoleName">Role Name</label>
                                                                    <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="Enter a role name" tabindex="-1">
                                                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                                <div class="col-12">
                                                                    <h5>Role Permissions</h5>
                                                                    <!-- Permission table -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-flush-spacing">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">
                                                                                        Administrator Access
                                                                                        <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Allows a full access to the system" data-bs-original-title="Allows a full access to the system"></i>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                                                                            <label class="form-check-label" for="selectAll"> Select All </label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">User Management</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="userManagementRead">
                                                                                                <label class="form-check-label" for="userManagementRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="userManagementWrite">
                                                                                                <label class="form-check-label" for="userManagementWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="userManagementCreate">
                                                                                                <label class="form-check-label" for="userManagementCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">Content Management</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="contentManagementRead">
                                                                                                <label class="form-check-label" for="contentManagementRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="contentManagementWrite">
                                                                                                <label class="form-check-label" for="contentManagementWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="contentManagementCreate">
                                                                                                <label class="form-check-label" for="contentManagementCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">Disputes Management</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="dispManagementRead">
                                                                                                <label class="form-check-label" for="dispManagementRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="dispManagementWrite">
                                                                                                <label class="form-check-label" for="dispManagementWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="dispManagementCreate">
                                                                                                <label class="form-check-label" for="dispManagementCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">Database Management</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="dbManagementRead">
                                                                                                <label class="form-check-label" for="dbManagementRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="dbManagementWrite">
                                                                                                <label class="form-check-label" for="dbManagementWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="dbManagementCreate">
                                                                                                <label class="form-check-label" for="dbManagementCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">Financial Management</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="finManagementRead">
                                                                                                <label class="form-check-label" for="finManagementRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="finManagementWrite">
                                                                                                <label class="form-check-label" for="finManagementWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="finManagementCreate">
                                                                                                <label class="form-check-label" for="finManagementCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">Reporting</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="reportingRead">
                                                                                                <label class="form-check-label" for="reportingRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="reportingWrite">
                                                                                                <label class="form-check-label" for="reportingWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="reportingCreate">
                                                                                                <label class="form-check-label" for="reportingCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">API Control</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="apiRead">
                                                                                                <label class="form-check-label" for="apiRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="apiWrite">
                                                                                                <label class="form-check-label" for="apiWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="apiCreate">
                                                                                                <label class="form-check-label" for="apiCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">Repository Management</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="repoRead">
                                                                                                <label class="form-check-label" for="repoRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="repoWrite">
                                                                                                <label class="form-check-label" for="repoWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="repoCreate">
                                                                                                <label class="form-check-label" for="repoCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-nowrap fw-semibold">Payroll</td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="payrollRead">
                                                                                                <label class="form-check-label" for="payrollRead"> Read </label>
                                                                                            </div>
                                                                                            <div class="form-check me-3 me-lg-5">
                                                                                                <input class="form-check-input" type="checkbox" id="payrollWrite">
                                                                                                <label class="form-check-label" for="payrollWrite"> Write </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" id="payrollCreate">
                                                                                                <label class="form-check-label" for="payrollCreate"> Create </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- Permission table -->
                                                                </div>
                                                                <div class="col-12 text-center mt-4">
                                                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
                                                                    <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                          </button>
                                                                </div>
                                                            <input type="hidden"></form>
                                                            <!--/ Add role form -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Add Role Modal -->

                                            <!-- / Add Role Modal -->
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