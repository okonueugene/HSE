@include('commons.header')
<style>
    h4 {
        margin-top: 20px;
    }

    select {
        margin-bottom: 10px;
    }

    #dispatch-button {
        margin-top: 20px;
    }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Enviromental Policy Checklist</h4>

        <div class="card card-bordered">
            <div class="card-body">
                <form action="" method="post">
                    <!-- Environmental Policy Section -->
                    <h4>Environmental Policy</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Is the Environmental Policy displayed on site?</label>
                                <select class="form-select" name="policy_displayed" id="policy_displayed">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Is the Policy up to date?</label>
                                <select class="form-select" name="policy_up_to_date" id="policy_up_to_date">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Is the Policy signed by the CEO?</label>
                                <select class="form-select" name="policy_signed_by_ceo" id="policy_signed_by_ceo">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are Environmental factors included in Risk Assessments? </label>
                                <select class="form-select" name="environmental_factors_included_in_risk_assessments"
                                    id="environmental_factors">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are Environmental emergency procedures adequately
                                    addressed and displayed? </label>
                                <select class="form-select"
                                    name="environmental_emergency_procedures_adequately_addressed"
                                    id="environmental_emergency_procedures">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are Environmental issues adequately addressed at site
                                    induction? </label>
                                <select class="form-select"
                                    name="environmental_issues_adequately_addressed_at_site_induction"
                                    id="environmental_issues">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are Environmental control measures described in method
                                    statements? </label>
                                <select class="form-select"
                                    name="environmental_control_measures_described_in_method_statements"
                                    id="environmental_control_measures">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are all operatives briefed and aware of good Environmental
                                    practices? </label>
                                <select class="form-select"
                                    name="operatives_briefed_and_aware_of_good_environmental_practices"
                                    id="operatives_briefed">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are sub-contractors conforming to the company's
                                    Environmental Policy? </label>
                                <select class="form-select"
                                    name="sub_contractors_conforming_to_company_environmental_policy"
                                    id="sub_contractors_conforming">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Site Establishment --}}
                    <h4>Site Establishment</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Are site cabins clean and in good condition?</label>
                                <select class="form-select" name="site_cabins_clean_and_in_good_condition"
                                    id="site_cabins_clean">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are there adequate parking facilities off/onsite?</label>
                                <select class="form-select" name="adequate_parking_facilities_off_onsite"
                                    id="adequate_parking_facilities">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are fences, hoardings, and gates in good condition?</label>
                                <select class="form-select" name="fences_hoardings_and_gates_in_good_condition"
                                    id="fences_hoardings">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Waste Management --}}
                    <h4>Waste Management</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Is there any existing contamination onsite? Is it being dealt
                                    with adequately? </label>
                                <select class="form-select" name="existing_contamination_onsite"
                                    id="existing_contamination_onsite">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are transfer notes (consignment notes for special waste) in
                                    place?</label>
                                <select class="form-select" name="transfer_notes_in_place" id="transfer_notes_in_place">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are adequate segregation measures in place? </label>
                                <select class="form-select" name="adequate_segregation_measures_in_place"
                                    id="adequate_segregation_measures">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Energy Management --}}
                    <h4>Energy Management</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Is electrical power for light and heat kept at a minimum
                                    period?</label>
                                <select class="form-select" name="electrical_power_for_light_and_heat_kept_at_minimum"
                                    id="electrical_power_for_light_and_heat">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Is water usage minimized?</label>
                                <select class="form-select" name="water_usage_minimized" id="water_usage_minimized">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Is plant shut down when not in use?</label>
                                <select class="form-select" name="plant_shut_down_when_not_in_use"
                                    id="plant_shut_down">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Water Protection --}}
                    <h4>Water Protection</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Are consents in place for the discharge of water?</label>
                                <select class="form-select" name="consents_in_place_for_discharge_of_water"
                                    id="consents_in_place_for_discharge_of_water">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are drains identified (surface and sewer)?</label>
                                <select class="form-select" name="drains_identified" id="drains_identified">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Is silt being prevented from discharging to watercourses?</label>
                                <select class="form-select" name="silt_prevented_from_discharging_to_watercourses"
                                    id="silt_prevented_from_discharging">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are fuel tanks, bowsers, and drums within a bund to EA
                                    guidelines? </label>
                                <select class="form-select" name="fuel_tanks_within_bund_to_ea_guidelines"
                                    id="fuel_tanks_within_bund">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are drip trays in place for plant and fuelling points?</label>
                                <select class="form-select" name="drip_trays_in_place_for_plant_and_fuelling_points"
                                    id="drip_trays_in_place">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are emergency measures in place (spill kits)?</label>
                                <select class="form-select" name="emergency_measures_in_place"
                                    id="emergency_measures_in_place">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are all chemicals stored safely and marked?</label>
                                <select class="form-select" name="chemicals_stored_safely_and_marked"
                                    id="chemicals_stored_safely">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Is plant in good condition and without any leaks? </label>
                                <select class="form-select" name="plant_in_good_condition_and_without_any_leaks"
                                    id="plant_in_good_condition">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are plant and materials reasonably kept away from drains
                                    and watercourses?</label>
                                <select class="form-select" name="plant_and_materials_kept_away_from_drains"
                                    id="plant_and_materials_kept_away">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are wheel washes suitably constructed and contained?</label>
                                <select class="form-select" name="wheel_washes_suitably_constructed_and_contained"
                                    id="wheel_washes_suitably_constructed">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Material Management --}}
                    <h4>Material Management</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Are there alternative arrangements for unused materials
                                    other than disposal?</label>
                                <select class="form-select" name="alternative_arrangements_for_unused_materials"
                                    id="alternative_arrangements_for_unused_materials">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are materials such as hardwoods acquired from a sustainable
                                    source?</label>
                                <select class="form-select" name="materials_acquired_from_sustainable_source"
                                    id="materials_acquired_from_sustainable_source">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are there arrangements to reuse/recycle existing site
                                    material? </label>
                                <select class="form-select"
                                    name="arrangements_to_reuse_recycle_existing_site_material"
                                    id="arrangements_to_reuse_recycle_existing_site_material">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    {{-- Nuisance --}}
                    <h4>Nuisance</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Is dust suppression adequate?</label>
                                <select class="form-select" name="dust_suppression_adequate"
                                    id="dust_suppression_adequate">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are noise and vibration within reasonable limits?</label>
                                <select class="form-select" name="noise_and_vibration_within_reasonable_limits"
                                    id="noise_and_vibration_within_reasonable_limits">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are activities smokeless?</label>
                                <select class="form-select" name="activities_smokeless" id="activities_smokeless">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Is there any inessential burning on-site?</label>
                                <select class="form-select" name="inessential_burning_onsite"
                                    id="inessential_burning_onsite">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are deliveries arranged to minimize disruption to neighbors?</label>
                                <select class="form-select"
                                    name="deliveries_arranged_to_minimize_disruption_to_neighbors"
                                    id="deliveries_arranged_to_minimize_disruption_to_neighbors">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are there arrangements to keep neighbors informed and
                                    liaison procedures?</label>
                                <select class="form-select" name="arrangements_to_keep_neighbors_informed"
                                    id="arrangements_to_keep_neighbors_informed">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are site lights positioned away from neighbors?</label>
                                <select class="form-select" name="site_lights_positioned_away_from_neighbors"
                                    id="site_lights_positioned_away_from_neighbors">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are site cabins screened from neighbors as appropriate?</label>
                                <select class="form-select" name="site_cabins_screened_from_neighbors"
                                    id="site_cabins_screened_from_neighbors">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Flora & Fauna --}}
                    <h4>Flora & Fauna</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label>Is adequate protection in place for existing planted areas? </label>
                                <select class="form-select"
                                    name="adequate_protection_in_place_for_existing_planted_areas"
                                    id="adequate_protection_in_place_for_existing_planted_areas">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Are measures in place to protect initial life adequate?</label>
                                <select class="form-select" name="measures_in_place_to_protect_initial_life"
                                    id="measures_in_place_to_protect_initial_life">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Completion and Sign-Off --}}
                    <h4>Completion and Sign-Off</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="futher_comments">Further Comments</label>
                                <textarea class="form-control" name="futher_comments" id="futher_comments" rows="3"></textarea>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="corrective_action">Corrective Action</label>
                                <textarea class="form-control" name="corrective_action" id="corrective_action" rows="3"></textarea>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="project_manager">Project/Site Manager</label>
                                <input type="text" class="form-control" name="project_manager"
                                    id="project_manager">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="auditor">Auditor</label>
                                <input type="text" class="form-control" name="auditor" id="auditor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="dispatch-button">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('environment') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@include('commons.footer')
@push('styles')
@endpush
