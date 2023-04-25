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
                        <!-- Help Center Header -->
                        <div class="help-center-header rounded d-flex flex-column justify-content-center align-items-center bg-help-center">
                            <h3 class="text-center">Hello, how can we help?</h3>
                            <div class="input-wrapper mb-3 input-group input-group-lg input-group-merge">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                            <p class="text-center px-3 mb-0">Common troubleshooting topics: eCommerce, Blogging to payment</p>
                        </div>
                        <!-- /Help Center Header -->

                        <!-- Popular Articles -->
                        <div class="help-center-popular-articles bg-help-center py-5">
                            <div class="container-xl">
                                <h3 class="text-center my-4">Popular Articles</h3>
                                <div class="row">
                                    <div class="col-lg-10 mx-auto mb-4">
                                        <div class="row">
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <div class="card border shadow-none">
                                                    <div class="card-body text-center">
                                                        <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.2">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M48.2351 33.6218L41.1211 25.0804C41.393 30.314 40.1016 36.4086 36.1141 43.364L42.9109 48.8015C43.1526 48.9935 43.4393 49.1205 43.7438 49.1706C44.0484 49.2207 44.3607 49.1922 44.6511 49.0879C44.9415 48.9835 45.2005 48.8067 45.4035 48.5742C45.6065 48.3417 45.7467 48.0612 45.8109 47.7593L48.5976 35.1625C48.6648 34.8954 48.667 34.6161 48.6039 34.348C48.5408 34.08 48.4144 33.8309 48.2351 33.6218ZM9.62888 33.7578L16.7429 25.239C16.4711 30.4726 17.7625 36.5672 21.75 43.5L14.9531 48.9375C14.7129 49.1294 14.4279 49.257 14.1248 49.3084C13.8217 49.3598 13.5106 49.3333 13.2206 49.2314C12.9305 49.1294 12.6712 48.9554 12.467 48.7256C12.2628 48.4958 12.1203 48.2179 12.0531 47.9179L9.26638 35.2984C9.1992 35.0313 9.19705 34.7521 9.26013 34.484C9.3232 34.2159 9.44966 33.9669 9.62888 33.7578Z" fill="currentColor"></path>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M48.2351 33.6218L41.1211 25.0804C41.393 30.314 40.1016 36.4086 36.1141 43.364L42.9109 48.8015C43.1526 48.9935 43.4393 49.1205 43.7438 49.1706C44.0484 49.2207 44.3607 49.1922 44.6511 49.0879C44.9415 48.9835 45.2005 48.8067 45.4035 48.5742C45.6065 48.3417 45.7467 48.0612 45.8109 47.7593L48.5976 35.1625C48.6648 34.8954 48.667 34.6161 48.6039 34.348C48.5408 34.08 48.4144 33.8309 48.2351 33.6218ZM9.62888 33.7578L16.7429 25.239C16.4711 30.4726 17.7625 36.5672 21.75 43.5L14.9531 48.9375C14.7129 49.1294 14.4279 49.257 14.1248 49.3084C13.8217 49.3598 13.5106 49.3333 13.2206 49.2314C12.9305 49.1294 12.6712 48.9554 12.467 48.7256C12.2628 48.4958 12.1203 48.2179 12.0531 47.9179L9.26638 35.2984C9.1992 35.0313 9.19705 34.7521 9.26013 34.484C9.3232 34.2159 9.44966 33.9669 9.62888 33.7578Z" fill="white" fill-opacity="0.2"></path>
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M27.235 3.71096C27.7312 3.30004 28.3553 3.07507 28.9999 3.07507C29.6459 3.07507 30.2715 3.30111 30.7683 3.71388C32.9647 5.50218 37.7192 9.93865 40.3437 16.7605C41.2551 19.1295 41.9046 21.7738 42.1067 24.6785L49.1354 33.1129C49.416 33.4422 49.6141 33.8337 49.7132 34.2549C49.8117 34.6734 49.8096 35.1092 49.7073 35.5266L46.9233 48.1336L46.9226 48.1367C46.8183 48.6021 46.5973 49.0334 46.2804 49.3899C45.9635 49.7465 45.5611 50.0165 45.1111 50.1747C44.6611 50.3329 44.1782 50.3741 43.7079 50.2943C43.2376 50.2145 42.7953 50.0165 42.4226 49.7187L42.4222 49.7183L35.8992 44.5H22.1007L15.5778 49.7183L15.5773 49.7187C15.2046 50.0165 14.7624 50.2146 14.2921 50.2943C13.8218 50.3741 13.3389 50.333 12.8889 50.1748C12.4389 50.0165 12.0365 49.7465 11.7196 49.3899C11.4027 49.0334 11.1817 48.6021 11.0773 48.1367L11.0766 48.1336L8.29268 35.5266C8.19032 35.1092 8.18824 34.6734 8.28671 34.2549C8.38587 33.8335 8.58413 33.4418 8.86498 33.1124L15.7606 24.8552C15.9445 21.8769 16.6066 19.1694 17.5467 16.749C20.1971 9.92535 25.0133 5.48954 27.235 3.71096ZM40.1374 25.2385C40.1225 25.1572 40.1179 25.0747 40.1232 24.9929C39.9491 22.2126 39.3336 19.705 38.4771 17.4787C36.0283 11.1135 31.5663 6.94197 29.5015 5.26152L29.4916 5.25349L29.4917 5.25343C29.3537 5.1382 29.1796 5.07507 28.9999 5.07507C28.8201 5.07507 28.646 5.1382 28.5081 5.25343L28.4917 5.26678C26.4054 6.93588 21.8836 11.1072 19.411 17.4732C18.5219 19.7622 17.8919 22.3492 17.7428 25.2243C17.7435 25.2674 17.7414 25.3105 17.7365 25.3534C17.5077 30.2529 18.6768 35.9841 22.3314 42.5H35.6625C39.2712 35.9325 40.398 30.163 40.1374 25.2385ZM47.6029 34.398L42.1455 27.8491C41.9426 32.4347 40.608 37.5834 37.5337 43.2463L43.6711 48.1562C43.7787 48.2422 43.9065 48.2994 44.0424 48.3225C44.1782 48.3455 44.3177 48.3337 44.4477 48.2879C44.5777 48.2422 44.694 48.1642 44.7855 48.0612C44.8768 47.9585 44.9406 47.8343 44.9708 47.7003L44.9711 47.6992L47.7571 35.0828L47.7604 35.0681L47.7638 35.0544C47.792 34.9425 47.7929 34.8254 47.7664 34.713C47.74 34.6006 47.687 34.4962 47.6118 34.4086L47.6028 34.398L47.6029 34.398ZM15.7471 27.9916L10.3964 34.3988L10.3882 34.4086L10.3881 34.4086C10.313 34.4962 10.26 34.6006 10.2335 34.713C10.2071 34.8254 10.208 34.9425 10.2362 35.0544C10.2385 35.0639 10.2408 35.0733 10.2429 35.0828L13.0289 47.6992L13.0292 47.7004C13.0594 47.8344 13.1232 47.9586 13.2144 48.0612C13.306 48.1642 13.4222 48.2423 13.5522 48.288C13.6822 48.3337 13.8217 48.3455 13.9576 48.3225C14.0934 48.2995 14.2212 48.2422 14.3289 48.1562L20.4604 43.251C17.3566 37.647 15.985 32.5442 15.7471 27.9916ZM24.375 50.75C24.375 50.1977 24.8227 49.75 25.375 49.75H32.625C33.1773 49.75 33.625 50.1977 33.625 50.75C33.625 51.3022 33.1773 51.75 32.625 51.75H25.375C24.8227 51.75 24.375 51.3022 24.375 50.75ZM31.7187 21.75C31.7187 23.2515 30.5015 24.4687 29 24.4687C27.4985 24.4687 26.2812 23.2515 26.2812 21.75C26.2812 20.2484 27.4985 19.0312 29 19.0312C30.5015 19.0312 31.7187 20.2484 31.7187 21.75Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M27.235 3.71096C27.7312 3.30004 28.3553 3.07507 28.9999 3.07507C29.6459 3.07507 30.2715 3.30111 30.7683 3.71388C32.9647 5.50218 37.7192 9.93865 40.3437 16.7605C41.2551 19.1295 41.9046 21.7738 42.1067 24.6785L49.1354 33.1129C49.416 33.4422 49.6141 33.8337 49.7132 34.2549C49.8117 34.6734 49.8096 35.1092 49.7073 35.5266L46.9233 48.1336L46.9226 48.1367C46.8183 48.6021 46.5973 49.0334 46.2804 49.3899C45.9635 49.7465 45.5611 50.0165 45.1111 50.1747C44.6611 50.3329 44.1782 50.3741 43.7079 50.2943C43.2376 50.2145 42.7953 50.0165 42.4226 49.7187L42.4222 49.7183L35.8992 44.5H22.1007L15.5778 49.7183L15.5773 49.7187C15.2046 50.0165 14.7624 50.2146 14.2921 50.2943C13.8218 50.3741 13.3389 50.333 12.8889 50.1748C12.4389 50.0165 12.0365 49.7465 11.7196 49.3899C11.4027 49.0334 11.1817 48.6021 11.0773 48.1367L11.0766 48.1336L8.29268 35.5266C8.19032 35.1092 8.18824 34.6734 8.28671 34.2549C8.38587 33.8335 8.58413 33.4418 8.86498 33.1124L15.7606 24.8552C15.9445 21.8769 16.6066 19.1694 17.5467 16.749C20.1971 9.92535 25.0133 5.48954 27.235 3.71096ZM40.1374 25.2385C40.1225 25.1572 40.1179 25.0747 40.1232 24.9929C39.9491 22.2126 39.3336 19.705 38.4771 17.4787C36.0283 11.1135 31.5663 6.94197 29.5015 5.26152L29.4916 5.25349L29.4917 5.25343C29.3537 5.1382 29.1796 5.07507 28.9999 5.07507C28.8201 5.07507 28.646 5.1382 28.5081 5.25343L28.4917 5.26678C26.4054 6.93588 21.8836 11.1072 19.411 17.4732C18.5219 19.7622 17.8919 22.3492 17.7428 25.2243C17.7435 25.2674 17.7414 25.3105 17.7365 25.3534C17.5077 30.2529 18.6768 35.9841 22.3314 42.5H35.6625C39.2712 35.9325 40.398 30.163 40.1374 25.2385ZM47.6029 34.398L42.1455 27.8491C41.9426 32.4347 40.608 37.5834 37.5337 43.2463L43.6711 48.1562C43.7787 48.2422 43.9065 48.2994 44.0424 48.3225C44.1782 48.3455 44.3177 48.3337 44.4477 48.2879C44.5777 48.2422 44.694 48.1642 44.7855 48.0612C44.8768 47.9585 44.9406 47.8343 44.9708 47.7003L44.9711 47.6992L47.7571 35.0828L47.7604 35.0681L47.7638 35.0544C47.792 34.9425 47.7929 34.8254 47.7664 34.713C47.74 34.6006 47.687 34.4962 47.6118 34.4086L47.6028 34.398L47.6029 34.398ZM15.7471 27.9916L10.3964 34.3988L10.3882 34.4086L10.3881 34.4086C10.313 34.4962 10.26 34.6006 10.2335 34.713C10.2071 34.8254 10.208 34.9425 10.2362 35.0544C10.2385 35.0639 10.2408 35.0733 10.2429 35.0828L13.0289 47.6992L13.0292 47.7004C13.0594 47.8344 13.1232 47.9586 13.2144 48.0612C13.306 48.1642 13.4222 48.2423 13.5522 48.288C13.6822 48.3337 13.8217 48.3455 13.9576 48.3225C14.0934 48.2995 14.2212 48.2422 14.3289 48.1562L20.4604 43.251C17.3566 37.647 15.985 32.5442 15.7471 27.9916ZM24.375 50.75C24.375 50.1977 24.8227 49.75 25.375 49.75H32.625C33.1773 49.75 33.625 50.1977 33.625 50.75C33.625 51.3022 33.1773 51.75 32.625 51.75H25.375C24.8227 51.75 24.375 51.3022 24.375 50.75ZM31.7187 21.75C31.7187 23.2515 30.5015 24.4687 29 24.4687C27.4985 24.4687 26.2812 23.2515 26.2812 21.75C26.2812 20.2484 27.4985 19.0312 29 19.0312C30.5015 19.0312 31.7187 20.2484 31.7187 21.75Z" fill="white" fill-opacity="0.2"></path>
                              </svg>

                                                        <h5 class="my-2">Getting Started</h5>
                                                        <p>Whether you're new or you're a power user, this article will…</p>
                                                        <a class="btn btn-sm btn-label-primary waves-effect" href="./pages-help-center-article.html">Read More</a>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4">
                          <div class="card border shadow-none">
                            <div class="card-body text-center">
                              <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M32.2689 8.56722C31.7876 9.05354 31.3688 9.84814 31.029 10.8704C30.6946 11.8767 30.4652 13.0152 30.31 14.1032C30.1553 15.1872 30.0776 16.197 30.0386 16.9371C30.0358 16.991 30.0332 17.0434 30.0307 17.0943C30.0816 17.0918 30.134 17.0892 30.1879 17.0864C30.928 17.0475 31.9378 16.9697 33.0218 16.815C34.1098 16.6598 35.2483 16.4304 36.2546 16.096C37.2769 15.7562 38.0715 15.3374 38.5578 14.8561C39.3907 14.0223 39.8587 12.8919 39.8587 11.7133C39.8587 10.5339 39.3901 9.4028 38.5562 8.56883C37.7222 7.73487 36.5911 7.26636 35.4117 7.26636C34.2331 7.26636 33.1027 7.73427 32.2689 8.56722ZM39.2633 15.5649L39.9704 16.272C41.1794 15.0629 41.8587 13.4231 41.8587 11.7133C41.8587 10.0035 41.1794 8.36365 39.9704 7.15462C38.7614 5.94559 37.1216 5.26636 35.4117 5.26636C33.7019 5.26636 32.0621 5.94559 30.853 7.15461L30.8499 7.15774C30.0518 7.96296 29.5111 9.09639 29.1311 10.2396C29.0855 10.3767 29.0418 10.5154 28.9999 10.6551C28.958 10.5154 28.9143 10.3767 28.8688 10.2396C28.4888 9.09639 27.9481 7.96296 27.1499 7.15774L27.1468 7.15462C25.9378 5.94559 24.298 5.26636 22.5882 5.26636C20.8783 5.26636 19.2385 5.94559 18.0295 7.15462C16.8205 8.36366 16.1412 10.0035 16.1412 11.7133C16.1412 13.4231 16.8205 15.0629 18.0295 16.272L18.7366 15.5649L18.0326 16.2751C18.3589 16.5985 18.7391 16.8797 19.152 17.125H9.0625C7.5092 17.125 6.25 18.3842 6.25 19.9375V27.1875C6.25 28.7408 7.5092 30 9.0625 30H9.875V45.3125C9.875 46.0584 10.1713 46.7738 10.6988 47.3012C11.2262 47.8287 11.9416 48.125 12.6875 48.125H29H45.3125C46.0584 48.125 46.7738 47.8287 47.3012 47.3012C47.8287 46.7738 48.125 46.0584 48.125 45.3125V30H48.9375C50.4908 30 51.75 28.7408 51.75 27.1875V19.9375C51.75 18.3842 50.4908 17.125 48.9375 17.125H38.8479C39.2608 16.8797 39.641 16.5985 39.9673 16.2751L39.2633 15.5649ZM9.0625 19.125C8.61377 19.125 8.25 19.4888 8.25 19.9375V27.1875C8.25 27.6362 8.61377 28 9.0625 28H10.875H28V19.125H9.0625ZM30 19.125V28H47.125H48.9375C49.3862 28 49.75 27.6362 49.75 27.1875V19.9375C49.75 19.4888 49.3862 19.125 48.9375 19.125H30ZM28 30H11.875V45.3125C11.875 45.528 11.9606 45.7347 12.113 45.887C12.2653 46.0394 12.472 46.125 12.6875 46.125H28V30ZM30 46.125V30H46.125V45.3125C46.125 45.528 46.0394 45.7347 45.887 45.887C45.7347 46.0394 45.528 46.125 45.3125 46.125H30ZM21.7452 16.096C20.723 15.7562 19.9284 15.3374 19.4421 14.8562C18.6091 14.0223 18.1412 12.8919 18.1412 11.7133C18.1412 10.5339 18.6097 9.4028 19.4437 8.56883C20.2777 7.73487 21.4088 7.26636 22.5882 7.26636C23.7668 7.26636 24.8972 7.73428 25.731 8.56725C26.2123 9.05357 26.6311 9.84816 26.9708 10.8704C27.3053 11.8767 27.5346 13.0152 27.6899 14.1032C27.8445 15.1872 27.9223 16.197 27.9613 16.9371C27.9641 16.991 27.9667 17.0434 27.9691 17.0943C27.9183 17.0918 27.8659 17.0892 27.812 17.0864C27.0719 17.0475 26.0621 16.9697 24.978 16.815C23.89 16.6598 22.7516 16.4304 21.7452 16.096Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M32.2689 8.56722C31.7876 9.05354 31.3688 9.84814 31.029 10.8704C30.6946 11.8767 30.4652 13.0152 30.31 14.1032C30.1553 15.1872 30.0776 16.197 30.0386 16.9371C30.0358 16.991 30.0332 17.0434 30.0307 17.0943C30.0816 17.0918 30.134 17.0892 30.1879 17.0864C30.928 17.0475 31.9378 16.9697 33.0218 16.815C34.1098 16.6598 35.2483 16.4304 36.2546 16.096C37.2769 15.7562 38.0715 15.3374 38.5578 14.8561C39.3907 14.0223 39.8587 12.8919 39.8587 11.7133C39.8587 10.5339 39.3901 9.4028 38.5562 8.56883C37.7222 7.73487 36.5911 7.26636 35.4117 7.26636C34.2331 7.26636 33.1027 7.73427 32.2689 8.56722ZM39.2633 15.5649L39.9704 16.272C41.1794 15.0629 41.8587 13.4231 41.8587 11.7133C41.8587 10.0035 41.1794 8.36365 39.9704 7.15462C38.7614 5.94559 37.1216 5.26636 35.4117 5.26636C33.7019 5.26636 32.0621 5.94559 30.853 7.15461L30.8499 7.15774C30.0518 7.96296 29.5111 9.09639 29.1311 10.2396C29.0855 10.3767 29.0418 10.5154 28.9999 10.6551C28.958 10.5154 28.9143 10.3767 28.8688 10.2396C28.4888 9.09639 27.9481 7.96296 27.1499 7.15774L27.1468 7.15462C25.9378 5.94559 24.298 5.26636 22.5882 5.26636C20.8783 5.26636 19.2385 5.94559 18.0295 7.15462C16.8205 8.36366 16.1412 10.0035 16.1412 11.7133C16.1412 13.4231 16.8205 15.0629 18.0295 16.272L18.7366 15.5649L18.0326 16.2751C18.3589 16.5985 18.7391 16.8797 19.152 17.125H9.0625C7.5092 17.125 6.25 18.3842 6.25 19.9375V27.1875C6.25 28.7408 7.5092 30 9.0625 30H9.875V45.3125C9.875 46.0584 10.1713 46.7738 10.6988 47.3012C11.2262 47.8287 11.9416 48.125 12.6875 48.125H29H45.3125C46.0584 48.125 46.7738 47.8287 47.3012 47.3012C47.8287 46.7738 48.125 46.0584 48.125 45.3125V30H48.9375C50.4908 30 51.75 28.7408 51.75 27.1875V19.9375C51.75 18.3842 50.4908 17.125 48.9375 17.125H38.8479C39.2608 16.8797 39.641 16.5985 39.9673 16.2751L39.2633 15.5649ZM9.0625 19.125C8.61377 19.125 8.25 19.4888 8.25 19.9375V27.1875C8.25 27.6362 8.61377 28 9.0625 28H10.875H28V19.125H9.0625ZM30 19.125V28H47.125H48.9375C49.3862 28 49.75 27.6362 49.75 27.1875V19.9375C49.75 19.4888 49.3862 19.125 48.9375 19.125H30ZM28 30H11.875V45.3125C11.875 45.528 11.9606 45.7347 12.113 45.887C12.2653 46.0394 12.472 46.125 12.6875 46.125H28V30ZM30 46.125V30H46.125V45.3125C46.125 45.528 46.0394 45.7347 45.887 45.887C45.7347 46.0394 45.528 46.125 45.3125 46.125H30ZM21.7452 16.096C20.723 15.7562 19.9284 15.3374 19.4421 14.8562C18.6091 14.0223 18.1412 12.8919 18.1412 11.7133C18.1412 10.5339 18.6097 9.4028 19.4437 8.56883C20.2777 7.73487 21.4088 7.26636 22.5882 7.26636C23.7668 7.26636 24.8972 7.73428 25.731 8.56725C26.2123 9.05357 26.6311 9.84816 26.9708 10.8704C27.3053 11.8767 27.5346 13.0152 27.6899 14.1032C27.8445 15.1872 27.9223 16.197 27.9613 16.9371C27.9641 16.991 27.9667 17.0434 27.9691 17.0943C27.9183 17.0918 27.8659 17.0892 27.812 17.0864C27.0719 17.0475 26.0621 16.9697 24.978 16.815C23.89 16.6598 22.7516 16.4304 21.7452 16.096Z" fill="white" fill-opacity="0.2"></path>
                                <g opacity="0.2">
                                  <path d="M47.125 29V45.3125C47.125 45.7932 46.934 46.2542 46.5941 46.5941C46.2542 46.934 45.7932 47.125 45.3125 47.125H12.6875C12.2068 47.125 11.7458 46.934 11.4059 46.5941C11.066 46.2542 10.875 45.7932 10.875 45.3125V29H47.125Z" fill="currentColor"></path>
                                  <path d="M47.125 29V45.3125C47.125 45.7932 46.934 46.2542 46.5941 46.5941C46.2542 46.934 45.7932 47.125 45.3125 47.125H12.6875C12.2068 47.125 11.7458 46.934 11.4059 46.5941C11.066 46.2542 10.875 45.7932 10.875 45.3125V29H47.125Z" fill="white" fill-opacity="0.2"></path>
                                </g>
                              </svg>

                              <h5 class="my-2">First Steps</h5>
                              <p>Are you a new customer wondering how to get started?</p>
                              <a class="btn btn-sm btn-label-primary waves-effect" href="./pages-help-center-article.html">Read More</a>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="card border shadow-none">
                            <div class="card-body text-center">
                              <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.2">
                                  <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="currentColor"></path>
                                  <path d="M50.6367 12.6875H7.36328C6.2997 12.6875 5.4375 13.5497 5.4375 14.6133V43.3867C5.4375 44.4503 6.2997 45.3125 7.36328 45.3125H50.6367C51.7003 45.3125 52.5625 44.4503 52.5625 43.3867V14.6133C52.5625 13.5497 51.7003 12.6875 50.6367 12.6875Z" fill="white" fill-opacity="0.2"></path>
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.6875 14.6133C6.6875 14.2401 6.99006 13.9375 7.36328 13.9375H50.6367C51.0099 13.9375 51.3125 14.2401 51.3125 14.6133V43.3867C51.3125 43.7599 51.0099 44.0625 50.6367 44.0625H7.36328C6.99006 44.0625 6.6875 43.7599 6.6875 43.3867V14.6133ZM7.36328 11.4375C5.60935 11.4375 4.1875 12.8593 4.1875 14.6133V43.3867C4.1875 45.1407 5.60935 46.5625 7.36328 46.5625H50.6367C52.3907 46.5625 53.8125 45.1407 53.8125 43.3867V14.6133C53.8125 12.8593 52.3907 11.4375 50.6367 11.4375H7.36328ZM12.6875 20.75C12.1352 20.75 11.6875 21.1977 11.6875 21.75C11.6875 22.3023 12.1352 22.75 12.6875 22.75H45.3125C45.8648 22.75 46.3125 22.3023 46.3125 21.75C46.3125 21.1977 45.8648 20.75 45.3125 20.75H12.6875ZM12.6875 28C12.1352 28 11.6875 28.4477 11.6875 29C11.6875 29.5523 12.1352 30 12.6875 30H45.3125C45.8648 30 46.3125 29.5523 46.3125 29C46.3125 28.4477 45.8648 28 45.3125 28H12.6875ZM11.6875 36.25C11.6875 35.6977 12.1352 35.25 12.6875 35.25H14.5C15.0523 35.25 15.5 35.6977 15.5 36.25C15.5 36.8023 15.0523 37.25 14.5 37.25H12.6875C12.1352 37.25 11.6875 36.8023 11.6875 36.25ZM21.75 35.25C21.1977 35.25 20.75 35.6977 20.75 36.25C20.75 36.8023 21.1977 37.25 21.75 37.25H36.25C36.8023 37.25 37.25 36.8023 37.25 36.25C37.25 35.6977 36.8023 35.25 36.25 35.25H21.75ZM42.5 36.25C42.5 35.6977 42.9477 35.25 43.5 35.25H45.3125C45.8648 35.25 46.3125 35.6977 46.3125 36.25C46.3125 36.8023 45.8648 37.25 45.3125 37.25H43.5C42.9477 37.25 42.5 36.8023 42.5 36.25Z" fill="white" fill-opacity="0.2"></path>
                              </svg>

                              <h5 class="my-2">Add External Content</h5>
                              <p>This article will show you how to expand the functionality of...</p>
                              <a class="btn btn-sm btn-label-primary waves-effect" href="./pages-help-center-article.html">Read More</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Popular Articles -->

              <!-- Knowledge Base -->
              <div class="help-center-knowledge-base py-5 help-center-bg-alt bg-help-center">
                <div class="container-xl">
                  <h3 class="text-center mt-4">Knowledge Base</h3>
                  <div class="row">
                    <div class="col-lg-10 mx-auto">
                      <div class="row">
                        <div class="col-md-4 col-sm-6 mb-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-label-success p-2 rounded me-2"><i class="ti ti-shopping-cart ti-sm"></i></span>
                                <h5 class="fw-semibold mt-3 ms-1">eCommerce</h5>
                              </div>
                              <ul>
                                <li class="text-primary py-1">
                                  <a href="./pages-help-center-categories.html">Pricing Wizard</a>
                                                        </li>
                                                        <li class="text-primary pb-1">
                                                            <a href="./pages-help-center-categories.html">Square Sync</a>
                                                        </li>
                                                        </ul>
                                                        <p class="mb-0 fw-semibold">
                                                            <a href="javascript:void(0);">56 articles</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="badge bg-label-info p-2 rounded me-2"><i class="ti ti-device-laptop ti-sm"></i></span>
                                                            <h5 class="fw-semibold mt-3 ms-1">Building Your Website</h5>
                                                        </div>
                                                        <ul>
                                                            <li class="text-primary py-1">
                                                                <a href="./pages-help-center-categories.html">First Steps</a>
                                                            </li>
                                                            <li class="text-primary pb-1">
                                                                <a href="./pages-help-center-categories.html">Add Images</a>
                                                            </li>
                                                        </ul>
                                                        <p class="mb-0 fw-semibold">
                                                            <a href="javascript:void(0);">111 articles</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="badge bg-label-primary p-2 rounded me-2"><i class="ti ti-users ti-sm"></i></span>
                                                            <h5 class="fw-semibold mt-3 ms-1">Your Account</h5>
                                                        </div>
                                                        <ul>
                                                            <li class="text-primary py-1">
                                                                <a href="./pages-help-center-categories.html">Insights</a>
                                                            </li>
                                                            <li class="text-primary pb-1">
                                                                <a href="./pages-help-center-categories.html">Manage Your Orders</a>
                                                            </li>
                                                        </ul>
                                                        <p class="mb-0 fw-semibold">
                                                            <a href="javascript:void(0);">29 articles</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="badge bg-label-danger p-2 rounded me-2"><i class="ti ti-world ti-sm"></i></span>
                                                            <h5 class="fw-semibold mt-3 ms-1">Domains and Email</h5>
                                                        </div>
                                                        <ul>
                                                            <li class="text-primary py-1">
                                                                <a href="./pages-help-center-categories.html">Access to Admin Account</a>
                                                            </li>
                                                            <li class="text-primary pb-1">
                                                                <a href="./pages-help-center-categories.html">Send Email From an Alias</a>
                                                            </li>
                                                        </ul>
                                                        <p class="mb-0 fw-semibold">
                                                            <a href="javascript:void(0);">22 articles</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="badge bg-label-warning p-2 rounded me-2"><i class="ti ti-device-mobile ti-sm"></i></span>
                                                            <h5 class="fw-semibold mt-3 ms-1">Mobile Apps</h5>
                                                        </div>
                                                        <ul>
                                                            <li class="text-primary py-1">
                                                                <a href="./pages-help-center-categories.html">Getting Started with the App</a>
                                                            </li>
                                                            <li class="text-primary pb-1">
                                                                <a href="./pages-help-center-categories.html">Getting Started with Android</a>
                                                            </li>
                                                        </ul>
                                                        <p class="mb-0 fw-semibold">
                                                            <a href="javascript:void(0);">24 articles</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="badge bg-label-secondary p-2 rounded me-2"><i class="ti ti-mail ti-sm"></i></span>
                                                            <h5 class="fw-semibold mt-3 ms-1">Email Marketing</h5>
                                                        </div>
                                                        <ul>
                                                            <li class="text-primary py-1">
                                                                <a href="./pages-help-center-categories.html">Getting Started</a>
                                                            </li>
                                                            <li class="text-primary pb-1">
                                                                <a href="./pages-help-center-categories.html">How does this work?</a>
                                                            </li>
                                                        </ul>
                                                        <p class="mb-0 fw-semibold">
                                                            <a href="javascript:void(0);">27 articles</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Knowledge Base -->

                        <!-- Keep Learning -->
                        <div class="help-center-keep-learning bg-help-center py-5">
                            <div class="container-xl">
                                <h3 class="text-center my-4">Keep Learning</h3>
                                <div class="row">
                                    <div class="col-lg-10 mx-auto mb-4">
                                        <div class="row">
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <div class="card border shadow-none">
                                                    <div class="card-body text-center">
                                                        <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.2">
                                  <path d="M9.0625 39.875V16.3125C9.0625 15.3511 9.44442 14.4291 10.1242 13.7492C10.8041 13.0694 11.7261 12.6875 12.6875 12.6875H45.3125C46.2739 12.6875 47.1959 13.0694 47.8758 13.7492C48.5556 14.4291 48.9375 15.3511 48.9375 16.3125V39.875H9.0625Z" fill="currentColor"></path>
                                  <path d="M9.0625 39.875V16.3125C9.0625 15.3511 9.44442 14.4291 10.1242 13.7492C10.8041 13.0694 11.7261 12.6875 12.6875 12.6875H45.3125C46.2739 12.6875 47.1959 13.0694 47.8758 13.7492C48.5556 14.4291 48.9375 15.3511 48.9375 16.3125V39.875H9.0625Z" fill="white" fill-opacity="0.2"></path>
                                </g>
                                <path d="M8.0625 39.875C8.0625 40.4273 8.51022 40.875 9.0625 40.875C9.61478 40.875 10.0625 40.4273 10.0625 39.875H8.0625ZM12.6875 12.6875L12.6875 11.6875L12.6875 12.6875ZM45.3125 12.6875V11.6875V12.6875ZM47.9375 39.875C47.9375 40.4273 48.3852 40.875 48.9375 40.875C49.4898 40.875 49.9375 40.4273 49.9375 39.875H47.9375ZM5.4375 39.875V38.875C4.88522 38.875 4.4375 39.3227 4.4375 39.875H5.4375ZM52.5625 39.875H53.5625C53.5625 39.3227 53.1148 38.875 52.5625 38.875V39.875ZM5.4375 43.5H4.4375H5.4375ZM32.625 20.9375C33.1773 20.9375 33.625 20.4898 33.625 19.9375C33.625 19.3852 33.1773 18.9375 32.625 18.9375V20.9375ZM25.375 18.9375C24.8227 18.9375 24.375 19.3852 24.375 19.9375C24.375 20.4898 24.8227 20.9375 25.375 20.9375V18.9375ZM10.0625 39.875V16.3125H8.0625V39.875H10.0625ZM10.0625 16.3125C10.0625 15.6163 10.3391 14.9486 10.8313 14.4563L9.41713 13.0421C8.54978 13.9095 8.0625 15.0859 8.0625 16.3125H10.0625ZM10.8313 14.4563C11.3236 13.9641 11.9913 13.6875 12.6875 13.6875L12.6875 11.6875C11.4609 11.6875 10.2845 12.1748 9.41713 13.0421L10.8313 14.4563ZM12.6875 13.6875H45.3125V11.6875H12.6875V13.6875ZM45.3125 13.6875C46.0087 13.6875 46.6764 13.9641 47.1687 14.4563L48.5829 13.0421C47.7155 12.1748 46.5391 11.6875 45.3125 11.6875V13.6875ZM47.1687 14.4563C47.6609 14.9486 47.9375 15.6163 47.9375 16.3125H49.9375C49.9375 15.0859 49.4502 13.9095 48.5829 13.0421L47.1687 14.4563ZM47.9375 16.3125V39.875H49.9375V16.3125H47.9375ZM5.4375 40.875H52.5625V38.875H5.4375V40.875ZM51.5625 39.875V43.5H53.5625V39.875H51.5625ZM51.5625 43.5C51.5625 44.1962 51.2859 44.8639 50.7937 45.3562L52.2079 46.7704C53.0752 45.903 53.5625 44.7266 53.5625 43.5H51.5625ZM50.7937 45.3562C50.3014 45.8484 49.6337 46.125 48.9375 46.125V48.125C50.1641 48.125 51.3405 47.6377 52.2079 46.7704L50.7937 45.3562ZM48.9375 46.125H9.0625V48.125H48.9375V46.125ZM9.0625 46.125C8.36631 46.125 7.69863 45.8484 7.20634 45.3562L5.79213 46.7704C6.65949 47.6377 7.83587 48.125 9.0625 48.125V46.125ZM7.20634 45.3562C6.71406 44.8639 6.4375 44.1962 6.4375 43.5H4.4375C4.4375 44.7266 4.92478 45.903 5.79213 46.7704L7.20634 45.3562ZM6.4375 43.5V39.875H4.4375V43.5H6.4375ZM32.625 18.9375H25.375V20.9375H32.625V18.9375Z" fill="currentColor"></path>
                                <path d="M8.0625 39.875C8.0625 40.4273 8.51022 40.875 9.0625 40.875C9.61478 40.875 10.0625 40.4273 10.0625 39.875H8.0625ZM12.6875 12.6875L12.6875 11.6875L12.6875 12.6875ZM45.3125 12.6875V11.6875V12.6875ZM47.9375 39.875C47.9375 40.4273 48.3852 40.875 48.9375 40.875C49.4898 40.875 49.9375 40.4273 49.9375 39.875H47.9375ZM5.4375 39.875V38.875C4.88522 38.875 4.4375 39.3227 4.4375 39.875H5.4375ZM52.5625 39.875H53.5625C53.5625 39.3227 53.1148 38.875 52.5625 38.875V39.875ZM5.4375 43.5H4.4375H5.4375ZM32.625 20.9375C33.1773 20.9375 33.625 20.4898 33.625 19.9375C33.625 19.3852 33.1773 18.9375 32.625 18.9375V20.9375ZM25.375 18.9375C24.8227 18.9375 24.375 19.3852 24.375 19.9375C24.375 20.4898 24.8227 20.9375 25.375 20.9375V18.9375ZM10.0625 39.875V16.3125H8.0625V39.875H10.0625ZM10.0625 16.3125C10.0625 15.6163 10.3391 14.9486 10.8313 14.4563L9.41713 13.0421C8.54978 13.9095 8.0625 15.0859 8.0625 16.3125H10.0625ZM10.8313 14.4563C11.3236 13.9641 11.9913 13.6875 12.6875 13.6875L12.6875 11.6875C11.4609 11.6875 10.2845 12.1748 9.41713 13.0421L10.8313 14.4563ZM12.6875 13.6875H45.3125V11.6875H12.6875V13.6875ZM45.3125 13.6875C46.0087 13.6875 46.6764 13.9641 47.1687 14.4563L48.5829 13.0421C47.7155 12.1748 46.5391 11.6875 45.3125 11.6875V13.6875ZM47.1687 14.4563C47.6609 14.9486 47.9375 15.6163 47.9375 16.3125H49.9375C49.9375 15.0859 49.4502 13.9095 48.5829 13.0421L47.1687 14.4563ZM47.9375 16.3125V39.875H49.9375V16.3125H47.9375ZM5.4375 40.875H52.5625V38.875H5.4375V40.875ZM51.5625 39.875V43.5H53.5625V39.875H51.5625ZM51.5625 43.5C51.5625 44.1962 51.2859 44.8639 50.7937 45.3562L52.2079 46.7704C53.0752 45.903 53.5625 44.7266 53.5625 43.5H51.5625ZM50.7937 45.3562C50.3014 45.8484 49.6337 46.125 48.9375 46.125V48.125C50.1641 48.125 51.3405 47.6377 52.2079 46.7704L50.7937 45.3562ZM48.9375 46.125H9.0625V48.125H48.9375V46.125ZM9.0625 46.125C8.36631 46.125 7.69863 45.8484 7.20634 45.3562L5.79213 46.7704C6.65949 47.6377 7.83587 48.125 9.0625 48.125V46.125ZM7.20634 45.3562C6.71406 44.8639 6.4375 44.1962 6.4375 43.5H4.4375C4.4375 44.7266 4.92478 45.903 5.79213 46.7704L7.20634 45.3562ZM6.4375 43.5V39.875H4.4375V43.5H6.4375ZM32.625 18.9375H25.375V20.9375H32.625V18.9375Z" fill="white" fill-opacity="0.2"></path>
                              </svg>

                                                        <h5 class="my-2">Blogging</h5>
                                                        <p class="mb-3">
                                                            Expert tips and tools to improve your website or online store using our blog.
                                                        </p>
                                                        <a class="btn btn-sm btn-label-primary waves-effect" href="./pages-help-center-categories.html">Read More</a>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4">
                          <div class="card border shadow-none">
                            <div class="card-body text-center">
                              <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.2">
                                  <path d="M17.8304 37.8359C15.6726 36.1581 13.925 34.0112 12.7199 31.5579C11.5148 29.1045 10.8839 26.4091 10.8749 23.6757C10.8296 13.8429 18.7367 5.66403 28.5695 5.43747C32.375 5.34725 36.1123 6.45746 39.2514 8.61062C42.3904 10.7638 44.7719 13.8506 46.0581 17.4333C47.3442 21.016 47.4698 24.9127 46.4169 28.5707C45.364 32.2288 43.1861 35.4625 40.1921 37.8132C39.5308 38.3245 38.995 38.9802 38.6259 39.7302C38.2568 40.4802 38.0641 41.3047 38.0624 42.1406V43.5C38.0624 43.9807 37.8715 44.4417 37.5316 44.7816C37.1917 45.1215 36.7307 45.3125 36.2499 45.3125H21.7499C21.2692 45.3125 20.8082 45.1215 20.4683 44.7816C20.1284 44.4417 19.9374 43.9807 19.9374 43.5V42.1406C19.9318 41.3109 19.7394 40.4932 19.3747 39.748C19.0099 39.0029 18.4821 38.3493 17.8304 37.8359V37.8359Z" fill="currentColor"></path>
                                  <path d="M17.8304 37.8359C15.6726 36.1581 13.925 34.0112 12.7199 31.5579C11.5148 29.1045 10.8839 26.4091 10.8749 23.6757C10.8296 13.8429 18.7367 5.66403 28.5695 5.43747C32.375 5.34725 36.1123 6.45746 39.2514 8.61062C42.3904 10.7638 44.7719 13.8506 46.0581 17.4333C47.3442 21.016 47.4698 24.9127 46.4169 28.5707C45.364 32.2288 43.1861 35.4625 40.1921 37.8132C39.5308 38.3245 38.995 38.9802 38.6259 39.7302C38.2568 40.4802 38.0641 41.3047 38.0624 42.1406V43.5C38.0624 43.9807 37.8715 44.4417 37.5316 44.7816C37.1917 45.1215 36.7307 45.3125 36.2499 45.3125H21.7499C21.2692 45.3125 20.8082 45.1215 20.4683 44.7816C20.1284 44.4417 19.9374 43.9807 19.9374 43.5V42.1406C19.9318 41.3109 19.7394 40.4932 19.3747 39.748C19.0099 39.0029 18.4821 38.3493 17.8304 37.8359V37.8359Z" fill="white" fill-opacity="0.2"></path>
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M38.6857 9.43527C35.7198 7.4009 32.1887 6.35195 28.5932 6.43719L28.5925 6.4372C28.3515 6.44275 28.1116 6.45338 27.8731 6.46896L28.5464 4.43773C32.5617 4.34269 36.5049 5.51414 39.817 7.78597C43.1293 10.0579 45.6422 13.3151 46.9993 17.0954C48.3564 20.8758 48.4889 24.9875 47.3779 28.8473C46.2669 32.7072 43.9688 36.1193 40.8097 38.5998L40.8037 38.6045L40.8037 38.6044C40.263 39.0224 39.8249 39.5585 39.5232 40.1717C39.2215 40.7847 39.0639 41.4585 39.0625 42.1416V42.1425V43.5C39.0625 44.2459 38.7661 44.9613 38.2387 45.4887C37.7112 46.0161 36.9959 46.3125 36.25 46.3125H21.75C21.004 46.3125 20.2887 46.0161 19.7612 45.4887C19.2338 44.9613 18.9375 44.2459 18.9375 43.5V42.1441C18.9323 41.4657 18.7748 40.7971 18.4765 40.1877C18.1781 39.5781 17.7466 39.0434 17.2138 38.6231L17.8866 36.5936C18.069 36.7483 18.255 36.8993 18.4442 37.0465L17.8304 37.836L18.4492 37.0504C19.2189 37.6567 19.8421 38.4284 20.2729 39.3084C20.7036 40.1884 20.9307 41.154 20.9374 42.1338L20.9375 42.1406L20.9375 43.5C20.9375 43.7155 21.0231 43.9221 21.1754 44.0745C21.3278 44.2269 21.5345 44.3125 21.75 44.3125H36.25C36.4654 44.3125 36.6721 44.2269 36.8245 44.0745C36.9768 43.9221 37.0625 43.7155 37.0625 43.5V42.1406V42.1387C37.0644 41.1503 37.2923 40.1754 37.7287 39.2886C38.1646 38.4029 38.7969 37.6285 39.5775 37.0244C42.4048 34.8035 44.4614 31.7492 45.4559 28.2941C46.4507 24.8379 46.3321 21.1562 45.1169 17.7712C43.9017 14.3862 41.6516 11.4696 38.6857 9.43527ZM17.8865 36.5936L17.8866 36.5936L27.8731 6.46896L27.8724 6.469L28.5458 4.43775C18.1651 4.67729 9.8275 13.3058 9.87496 23.6797C9.88451 26.5645 10.5504 29.4094 11.8223 31.9987C13.0938 34.5872 14.9375 36.8525 17.2138 38.6231L17.8865 36.5936ZM17.8865 36.5936C16.1041 35.0827 14.6499 33.2189 13.6175 31.117C12.4793 28.7998 11.8834 26.254 11.8749 23.6725L11.8749 23.6711C11.8332 14.6214 18.9246 7.05389 27.8724 6.469L17.8865 36.5936ZM18.9376 52.5625C18.9376 52.0102 19.3853 51.5625 19.9376 51.5625H38.0626C38.6149 51.5625 39.0626 52.0102 39.0626 52.5625C39.0626 53.1148 38.6149 53.5625 38.0626 53.5625H19.9376C19.3853 53.5625 18.9376 53.1148 18.9376 52.5625ZM31.0024 11.8828C30.4579 11.7905 29.9416 12.1571 29.8493 12.7016C29.757 13.2461 30.1236 13.7624 30.6681 13.8547C32.6793 14.1956 34.535 15.1524 35.9792 16.5929C37.4235 18.0334 38.385 19.8867 38.731 21.897C38.8247 22.4413 39.3419 22.8066 39.8862 22.7129C40.4304 22.6192 40.7957 22.102 40.702 21.5577C40.2857 19.1394 39.129 16.9098 37.3916 15.1769C35.6543 13.4439 33.4218 12.293 31.0024 11.8828Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M38.6857 9.43527C35.7198 7.4009 32.1887 6.35195 28.5932 6.43719L28.5925 6.4372C28.3515 6.44275 28.1116 6.45338 27.8731 6.46896L28.5464 4.43773C32.5617 4.34269 36.5049 5.51414 39.817 7.78597C43.1293 10.0579 45.6422 13.3151 46.9993 17.0954C48.3564 20.8758 48.4889 24.9875 47.3779 28.8473C46.2669 32.7072 43.9688 36.1193 40.8097 38.5998L40.8037 38.6045L40.8037 38.6044C40.263 39.0224 39.8249 39.5585 39.5232 40.1717C39.2215 40.7847 39.0639 41.4585 39.0625 42.1416V42.1425V43.5C39.0625 44.2459 38.7661 44.9613 38.2387 45.4887C37.7112 46.0161 36.9959 46.3125 36.25 46.3125H21.75C21.004 46.3125 20.2887 46.0161 19.7612 45.4887C19.2338 44.9613 18.9375 44.2459 18.9375 43.5V42.1441C18.9323 41.4657 18.7748 40.7971 18.4765 40.1877C18.1781 39.5781 17.7466 39.0434 17.2138 38.6231L17.8866 36.5936C18.069 36.7483 18.255 36.8993 18.4442 37.0465L17.8304 37.836L18.4492 37.0504C19.2189 37.6567 19.8421 38.4284 20.2729 39.3084C20.7036 40.1884 20.9307 41.154 20.9374 42.1338L20.9375 42.1406L20.9375 43.5C20.9375 43.7155 21.0231 43.9221 21.1754 44.0745C21.3278 44.2269 21.5345 44.3125 21.75 44.3125H36.25C36.4654 44.3125 36.6721 44.2269 36.8245 44.0745C36.9768 43.9221 37.0625 43.7155 37.0625 43.5V42.1406V42.1387C37.0644 41.1503 37.2923 40.1754 37.7287 39.2886C38.1646 38.4029 38.7969 37.6285 39.5775 37.0244C42.4048 34.8035 44.4614 31.7492 45.4559 28.2941C46.4507 24.8379 46.3321 21.1562 45.1169 17.7712C43.9017 14.3862 41.6516 11.4696 38.6857 9.43527ZM17.8865 36.5936L17.8866 36.5936L27.8731 6.46896L27.8724 6.469L28.5458 4.43775C18.1651 4.67729 9.8275 13.3058 9.87496 23.6797C9.88451 26.5645 10.5504 29.4094 11.8223 31.9987C13.0938 34.5872 14.9375 36.8525 17.2138 38.6231L17.8865 36.5936ZM17.8865 36.5936C16.1041 35.0827 14.6499 33.2189 13.6175 31.117C12.4793 28.7998 11.8834 26.254 11.8749 23.6725L11.8749 23.6711C11.8332 14.6214 18.9246 7.05389 27.8724 6.469L17.8865 36.5936ZM18.9376 52.5625C18.9376 52.0102 19.3853 51.5625 19.9376 51.5625H38.0626C38.6149 51.5625 39.0626 52.0102 39.0626 52.5625C39.0626 53.1148 38.6149 53.5625 38.0626 53.5625H19.9376C19.3853 53.5625 18.9376 53.1148 18.9376 52.5625ZM31.0024 11.8828C30.4579 11.7905 29.9416 12.1571 29.8493 12.7016C29.757 13.2461 30.1236 13.7624 30.6681 13.8547C32.6793 14.1956 34.535 15.1524 35.9792 16.5929C37.4235 18.0334 38.385 19.8867 38.731 21.897C38.8247 22.4413 39.3419 22.8066 39.8862 22.7129C40.4304 22.6192 40.7957 22.102 40.702 21.5577C40.2857 19.1394 39.129 16.9098 37.3916 15.1769C35.6543 13.4439 33.4218 12.293 31.0024 11.8828Z" fill="white" fill-opacity="0.2"></path>
                              </svg>

                              <h5 class="my-2">Inspiration Center</h5>
                              <p class="mb-3">Inspiration from experts to help you start and grow your big ideas.</p>
                              <a class="btn btn-sm btn-label-primary waves-effect" href="./pages-help-center-categories.html">Read More</a>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4">
                          <div class="card border shadow-none">
                            <div class="card-body text-center">
                              <svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.2">
                                  <path d="M22.8829 41.2571L20.1415 46.6946C19.9651 47.0654 19.6651 47.3632 19.293 47.5369C18.9209 47.7105 18.4999 47.7491 18.1024 47.6462C12.5517 46.2868 7.74854 43.9305 4.25947 40.8946C3.99643 40.6625 3.80541 40.3599 3.70904 40.0226C3.61267 39.6853 3.61499 39.3275 3.71572 38.9915L11.3962 13.3446C11.4709 13.0821 11.6062 12.8409 11.7912 12.6402C11.9761 12.4395 12.2055 12.285 12.461 12.1891C14.631 11.2989 16.875 10.6014 19.1673 10.1047C19.6078 10.0083 20.0684 10.0774 20.4612 10.2988C20.854 10.5203 21.1515 10.8787 21.297 11.3055L23.0868 16.7204C27.0103 16.1766 30.9899 16.1766 34.9134 16.7204V16.7204L36.7032 11.3055C36.8487 10.8787 37.1462 10.5203 37.539 10.2988C37.9318 10.0774 38.3924 10.0083 38.8329 10.1047C41.1252 10.6014 43.3692 11.2989 45.5392 12.1891C45.7947 12.285 46.0241 12.4395 46.209 12.6402C46.394 12.8409 46.5293 13.0821 46.604 13.3446L54.2845 38.9915C54.3852 39.3275 54.3875 39.6853 54.2912 40.0226C54.1948 40.3599 54.0038 40.6625 53.7407 40.8946C50.2517 43.9305 45.4485 46.2868 39.8978 47.6462C39.5003 47.7491 39.0793 47.7105 38.7072 47.5369C38.3351 47.3632 38.0351 47.0654 37.8587 46.6946L35.1173 41.2571C33.0907 41.5421 31.0467 41.6859 29.0001 41.6876C26.9535 41.6859 24.9095 41.5421 22.8829 41.2571V41.2571Z" fill="currentColor"></path>
                                  <path d="M22.8829 41.2571L20.1415 46.6946C19.9651 47.0654 19.6651 47.3632 19.293 47.5369C18.9209 47.7105 18.4999 47.7491 18.1024 47.6462C12.5517 46.2868 7.74854 43.9305 4.25947 40.8946C3.99643 40.6625 3.80541 40.3599 3.70904 40.0226C3.61267 39.6853 3.61499 39.3275 3.71572 38.9915L11.3962 13.3446C11.4709 13.0821 11.6062 12.8409 11.7912 12.6402C11.9761 12.4395 12.2055 12.285 12.461 12.1891C14.631 11.2989 16.875 10.6014 19.1673 10.1047C19.6078 10.0083 20.0684 10.0774 20.4612 10.2988C20.854 10.5203 21.1515 10.8787 21.297 11.3055L23.0868 16.7204C27.0103 16.1766 30.9899 16.1766 34.9134 16.7204V16.7204L36.7032 11.3055C36.8487 10.8787 37.1462 10.5203 37.539 10.2988C37.9318 10.0774 38.3924 10.0083 38.8329 10.1047C41.1252 10.6014 43.3692 11.2989 45.5392 12.1891C45.7947 12.285 46.0241 12.4395 46.209 12.6402C46.394 12.8409 46.5293 13.0821 46.604 13.3446L54.2845 38.9915C54.3852 39.3275 54.3875 39.6853 54.2912 40.0226C54.1948 40.3599 54.0038 40.6625 53.7407 40.8946C50.2517 43.9305 45.4485 46.2868 39.8978 47.6462C39.5003 47.7491 39.0793 47.7105 38.7072 47.5369C38.3351 47.3632 38.0351 47.0654 37.8587 46.6946L35.1173 41.2571C33.0907 41.5421 31.0467 41.6859 29.0001 41.6876C26.9535 41.6859 24.9095 41.5421 22.8829 41.2571V41.2571Z" fill="white" fill-opacity="0.2"></path>
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.4688 32.625C24.4688 34.1265 23.2515 35.3438 21.75 35.3438C20.2485 35.3438 19.0312 34.1265 19.0312 32.625C19.0312 31.1235 20.2485 29.9062 21.75 29.9062C23.2515 29.9062 24.4688 31.1235 24.4688 32.625ZM38.9688 32.625C38.9688 34.1265 37.7515 35.3438 36.25 35.3438C34.7485 35.3438 33.5312 34.1265 33.5312 32.625C33.5312 31.1235 34.7485 29.9062 36.25 29.9062C37.7515 29.9062 38.9688 31.1235 38.9688 32.625Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.4688 32.625C24.4688 34.1265 23.2515 35.3438 21.75 35.3438C20.2485 35.3438 19.0312 34.1265 19.0312 32.625C19.0312 31.1235 20.2485 29.9062 21.75 29.9062C23.2515 29.9062 24.4688 31.1235 24.4688 32.625ZM38.9688 32.625C38.9688 34.1265 37.7515 35.3438 36.25 35.3438C34.7485 35.3438 33.5312 34.1265 33.5312 32.625C33.5312 31.1235 34.7485 29.9062 36.25 29.9062C37.7515 29.9062 38.9688 31.1235 38.9688 32.625Z" fill="white" fill-opacity="0.2"></path>
                                <path d="M16.8563 18.1251C20.7855 16.8936 24.8826 16.2821 29.0001 16.3126C33.1176 16.2821 37.2147 16.8936 41.1439 18.1251M41.1439 39.8751C37.2147 41.1065 33.1176 41.718 29.0001 41.6876C24.8826 41.718 20.7855 41.1065 16.8563 39.8751M35.1173 41.2571L37.8587 46.6946C38.0351 47.0654 38.3351 47.3632 38.7072 47.5368C39.0793 47.7105 39.5003 47.7491 39.8978 47.6462C45.4485 46.2868 50.2517 43.9305 53.7407 40.8946C54.0038 40.6625 54.1948 40.3599 54.2912 40.0226C54.3875 39.6853 54.3852 39.3275 54.2845 38.9915L46.604 13.3446C46.5293 13.0821 46.394 12.8409 46.209 12.6402C46.0241 12.4395 45.7947 12.285 45.5392 12.1891C43.3692 11.2989 41.1252 10.6014 38.8329 10.1047C38.3924 10.0083 37.9318 10.0774 37.539 10.2988C37.1462 10.5203 36.8487 10.8787 36.7032 11.3055L34.9134 16.7204M22.8829 41.2571L20.1415 46.6946C19.9651 47.0654 19.6651 47.3632 19.293 47.5368C18.9209 47.7105 18.4999 47.7491 18.1024 47.6462C12.5517 46.2868 7.74854 43.9305 4.25947 40.8946C3.99643 40.6625 3.80541 40.3599 3.70904 40.0226C3.61267 39.6853 3.61499 39.3275 3.71572 38.9915L11.3962 13.3446C11.4709 13.0821 11.6062 12.8409 11.7912 12.6402C11.9761 12.4395 12.2055 12.285 12.461 12.1891C14.631 11.2989 16.875 10.6014 19.1673 10.1047C19.6078 10.0083 20.0684 10.0774 20.4612 10.2988C20.854 10.5203 21.1515 10.8787 21.297 11.3055L23.0868 16.7204" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16.8563 18.1251C20.7855 16.8936 24.8826 16.2821 29.0001 16.3126C33.1176 16.2821 37.2147 16.8936 41.1439 18.1251M41.1439 39.8751C37.2147 41.1065 33.1176 41.718 29.0001 41.6876C24.8826 41.718 20.7855 41.1065 16.8563 39.8751M35.1173 41.2571L37.8587 46.6946C38.0351 47.0654 38.3351 47.3632 38.7072 47.5368C39.0793 47.7105 39.5003 47.7491 39.8978 47.6462C45.4485 46.2868 50.2517 43.9305 53.7407 40.8946C54.0038 40.6625 54.1948 40.3599 54.2912 40.0226C54.3875 39.6853 54.3852 39.3275 54.2845 38.9915L46.604 13.3446C46.5293 13.0821 46.394 12.8409 46.209 12.6402C46.0241 12.4395 45.7947 12.285 45.5392 12.1891C43.3692 11.2989 41.1252 10.6014 38.8329 10.1047C38.3924 10.0083 37.9318 10.0774 37.539 10.2988C37.1462 10.5203 36.8487 10.8787 36.7032 11.3055L34.9134 16.7204M22.8829 41.2571L20.1415 46.6946C19.9651 47.0654 19.6651 47.3632 19.293 47.5368C18.9209 47.7105 18.4999 47.7491 18.1024 47.6462C12.5517 46.2868 7.74854 43.9305 4.25947 40.8946C3.99643 40.6625 3.80541 40.3599 3.70904 40.0226C3.61267 39.6853 3.61499 39.3275 3.71572 38.9915L11.3962 13.3446C11.4709 13.0821 11.6062 12.8409 11.7912 12.6402C11.9761 12.4395 12.2055 12.285 12.461 12.1891C14.631 11.2989 16.875 10.6014 19.1673 10.1047C19.6078 10.0083 20.0684 10.0774 20.4612 10.2988C20.854 10.5203 21.1515 10.8787 21.297 11.3055L23.0868 16.7204" stroke="white" stroke-opacity="0.2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>

                              <h5 class="my-2">Community</h5>
                              <p class="mb-3">A group of people living in the same place or having a particular.</p>
                              <a class="btn btn-sm btn-label-primary waves-effect" href="./pages-help-center-categories.html">Read More</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Keep Learning -->

              <!-- Help Area -->
              <div class="help-center-contact-us help-center-bg-alt">
                <div class="container-xl">
                  <div class="row justify-content-center py-5">
                    <div class="col-md-8 col-lg-6 text-center mt-4">
                      <h3>Still need help?</h3>
                      <p class="mb-3">
                        Our specialists are always happy to help. Contact us during standard business hours or email us
                        24/7 and we'll get back to you.
                      </p>
                      <div class="d-flex justify-content-center flex-wrap gap-4">
                        <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Visit our community</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Contact us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Help Area -->
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
                </script>2023
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