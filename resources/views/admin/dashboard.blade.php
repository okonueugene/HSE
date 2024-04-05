@include('commons.header')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="clock mx-auto w-25 pt-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <span id="date-time"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid w-100 h-100 pt-3">
        <div class="row w-100 h-50 pt-5 mx-auto text-center">
            <!-- First Row -->
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header">Site Name</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['attendance'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header">Supervisor’s Detail</div>
                    <div class="card-body">
                        <div class="content">
                        </div>
                        <div class="footer">{{ $data['supervisor'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header"> Fire Marshal Detail</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['fire_marshal'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header"> First Aider’s Detail</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['first_aider'] }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row w-100 h-50 pt-5 mx-auto text-center">
            <!-- First Row -->
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header"> Live Number Of People On Site</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['personells'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header">Supervisor’s Detail</div>
                    <div class="card-body">
                        <div class="content">
                        </div>
                        <div class="footer">{{ $data['supervisor'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header"> Tasks Of The Day</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['tasks'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header"> Incidents Recorded </div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['incidents'] }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row w-100 h-50 pt-4 mx-auto text-center">
            <!-- First Row -->
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header">Immediate Corrective Actions</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['icas'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header"> Safety Observation Record</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">{{ $data['sors'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header">Environmental Concerns</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">7</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 h-50 shadow-lg">
                    <div class="card-header">Permits Applicable</div>
                    <div class="card-body">
                        <div class="content">

                        </div>
                        <div class="footer">7</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<div class="footer" style="position: fixed; bottom: 0; width: 100%;">
    @include('commons.footer')
</div>


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
