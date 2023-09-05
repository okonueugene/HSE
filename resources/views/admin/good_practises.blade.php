@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Suggested Improvements</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table dataTable" id="DataTables_Table_0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->

    @include('commons.footer')
