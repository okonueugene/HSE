@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row t text-dark text-bold text-center border-bottom py-4">
            <h5 class="mb-0">Site Details</h5>
        </div>
        <div class="row  py-4">
            <!-- Stop Fix Actions -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Site Name</h5>
                        <h4 class="mb-0">12/18</h4>
                    </div>
                </div>
            </div>

            <!-- Total Deviations  -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Project Name</h5>
                        <h4 class="mb-0">2/5</h4>
                    </div>
                </div>
            </div>

            <!-- Total Incidents -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Contractor Lead</h5>
                        <h4 class="mb-0">4</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Auditor Details</h5>
                        <h4 class="mb-0">4</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0 text-center">Time</h5>

                        <div class="text-center text-body text-wrap fw-bold" id="clock">
                            <div id="date-time"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row t text-dark text-bold text-center py-4 border-bottom">
            <h5 class="mb-0">Categories</h5>
        </div>
        <div class="row py-4 ">
            <!-- Stop Fix Actions -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Stop Fix Actions</h5>
                        <h4 class="mb-0">12/18</h4>
                    </div>
                </div>
            </div>

            <!-- Total Deviations  -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Immediate collective Actions(ICA)</h5>
                        <h4 class="mb-0">{{ $data['icas'] }}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Incidents -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Incidents</h5>
                        <h4 class="mb-0">{{ $data['incidents'] }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Reported Hazards</h5>
                        <h4 class="mb-0">{{ $data['incidents'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-4">
            <!-- Todays Attendance -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Reported Hazards</h5>
                        <h4 class="mb-0">{{ $data['reported_hazards'] }}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Deviations  -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Suggested improvements</h5>
                        <h4 class="mb-0">{{ $data['suggested_improvements'] }}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Tasks -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Good practises</h5>
                        <h4 class="mb-0">{{ $data['good_practises'] }}</h4>
                    </div>
                </div>
            </div>

            <!-- Total Incidents -->
            <div class="col-xl-3 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Bad Practises</h5>
                        <h4 class="mb-0">{{ $data['bad_practises'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@include('commons.footer')


<script>
    window.addEventListener("load", () => {
        clock();

        function clock() {
            let value = new Date();
            let date = value.toLocaleString("en-us", {
                weekday: "short",
                month: "short",
                day: "2-digit",
            });

            let time = value.toLocaleString("en-US", {
                hour: "numeric",
                minute: "numeric",
                second: "numeric",
                hour12: true,

            });

            document.getElementById("date-time").innerHTML = `${date} <br> ${time}`;

            setTimeout(clock, 1000);

        }
    });
</script>
