@include('commons.header')

                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Immediate Collective Actions (ICA's)</h4>

                        <!-- DataTable with Buttons -->
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table dataTable" id="DataTables_Table_0">
                                    <thead>
                                        <tr>

                                            <th>id</th>
                                            <th>Name</th>
                                            <th>ICA Title</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- Modal to add new record -->
                        <div class="offcanvas offcanvas-end" id="add-new-record">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow-1">
                                <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework" id="form-add-new-record" onsubmit="return false" novalidate="novalidate">
                                    <div class="col-sm-12 fv-plugins-icon-container">
                                        <label class="form-label" for="basicFullname">Full Name</label>
                                        <div class="input-group input-group-merge has-validation">
                                            <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                                            <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2">
                                        </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-12 fv-plugins-icon-container">
                                        <label class="form-label" for="basicPost">Post</label>
                                        <div class="input-group input-group-merge has-validation">
                                            <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                                            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2">
                                        </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-12 fv-plugins-icon-container">
                                        <label class="form-label" for="basicEmail">Email</label>
                                        <div class="input-group input-group-merge has-validation">
                                            <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                            <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com">
                                        </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                        <div class="form-text">You can use letters, numbers &amp; periods</div>
                                    </div>
                                    <div class="col-sm-12 fv-plugins-icon-container">
                                        <label class="form-label" for="basicDate">Joining Date</label>
                                        <div class="input-group input-group-merge has-validation">
                                            <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                                            <input type="hidden" class="form-control dt-date flatpickr-input" id="basicDate" name="basicDate" aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" readonly="readonly"><input class="form-control dt-date flatpickr-input flatpickr-mobile" tabindex="1" type="date" placeholder="MM/DD/YYYY">
                                        </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-12 fv-plugins-icon-container">
                                        <label class="form-label" for="basicSalary">Salary</label>
                                        <div class="input-group input-group-merge has-validation">
                                            <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                                            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="12000" aria-label="12000" aria-describedby="basicSalary2">
                                        </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 waves-effect waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                                    </div>
                                <input type="hidden"></form>
                            </div>
                        </div>
                        <!--/ DataTable with Buttons -->

                    </div>
                    <!-- / Content -->
@include('commons.footer')
