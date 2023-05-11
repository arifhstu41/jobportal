@extends('admin.layouts.app')
@section('title')
    {{ $user->name }} {{ __('details') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title line-height-36">
                        {{ __('details') }}
                    </h3>
                    <a href="{{ route('candidate.index') }}"
                        class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-left"></i>
                        &nbsp; {{ __('back') }}
                    </a>
                </div>
                <div class="row m-2">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset($candidate->photo) }}" alt="image" class="image-fluid"
                            height="350px" width="350px">
                    </div>
                    <div class="col-md-8">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <tbody>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Applicant's Name</td>
                                    <td style=""> {{ $candidate->user->name ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Applicant's
                                        Name (বাংলা)
                                    </td>
                                    <td style="">
                                        {{ $candidate->name_bn ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Father's Name
                                    </td>
                                    <td style="">
                                        {{ $candidate->father_name ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Father's Name
                                        (বাংলা)
                                    </td>
                                    <td style="">
                                        {{ $candidate->father_name_bn ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Mother's Name
                                    </td>
                                    <td style="">
                                        {{ $candidate->mother_name ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Mother's Name
                                        (বাংলা)
                                    </td>
                                    <td style="">
                                        {{ $candidate->mother_name_bn ?? '' }}</td>
                                </tr>
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Date of Birth
                                    </td>
                                    <td style="">
                                        {{ $candidate->birth_date ? date('d M Y', strtotime($candidate->birth_date)) : '' }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Contact Mobile</td>
                                    <td style="">{{ $candidate->user->phone ?? '' }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">E-Mail</td>
                                    <td style="">{{ $candidate->user->email ?? '' }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Gender</td>
                                    <td style="">{{ ucwords($candidate->gender) }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Religion</td>
                                    <td style="">{{ ucwords($candidate->religion) }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Quota</td>
                                    <td style="">{{ ucwords($candidate->quota) }}</td>
                                </tr>
                
                                <tr style="padding: 0px; margin: 0px">
                                    <td style="  width: 30%">Home District</td>
                                    <td style="">{{ ucwords($candidate->district_parmanents->nameEn) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row m-2">
                    <div class="col-md-12">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="">National ID</td>
                                    <td style="">{{ $candidate->nid_no }}</td>
                                    <td style="">Passport ID</td>
                                    <td style="">{{ $candidate->passport_no ?? "N/A" }}</td>
                                </tr>
                                <tr>
                                    <td style="">Birth Registration</td>
                                    <td style="">{{ $candidate->birth_certificate_no ?? "N/A" }}</td>
                                    <td style="">Marital Status</td>
                                    <td style="">{{ ucwords($candidate->marital_status) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row m-2">
                    <div class="col-md-12">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="mb-1">
                                    <td>
                                        <p>Care of: <span>{{ $user->candidate->care_of }}</span></p>
                                        <p>Village/Tow: <span>{{ $user->candidate->place }}</span></p>
                                        <p>Post Office: <span>{{ $user->candidate->post_office }}</span></p>
                                        <p>Post Code: <span>{{ $user->candidate->postcode }}</span></p>
                                        <p>Upazila/Thana: <span>{{ $user->candidate->thanas->name ?? '' }}</span></p>
                                        <p>District: <span>{{ $user->candidate->districts->name ?? '' }}</span></p>
                                    </td>
                                    <td>
                                        <p>Care of: <span>{{ $user->candidate->care_of_parmanent }}</span></p>
                                        <p>Village/Tow: <span>{{ $user->candidate->place_parmanent }}</span></p>
                                        <p>Post Office: <span>{{ $user->candidate->post_office_parmanent }}</span></p>
                                        <p>Post Code: <span>{{ $user->candidate->postcode_parmanent }}</span></p>
                                        <p>Upazila/Thana: <span>{{ $user->candidate->thana_parmanents->name ?? '' }}</span></p>
                                        <p>District: <span>{{ $user->candidate->district_parmanents->name ?? '' }}</span></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="row m-2">
                    <div class="col-md-12">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th colspan="7">Education Qualifications:</th>
                                </tr>
                                <tr>
                                    <th>Examination</th>
                                    <th>Board/Institude</th>
                                    <th>Group/Subject/Degree</th>
                                    <th>Result</th>
                                    <th>Year</th>
                                    <th>Role</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($user->candidate->educations) > 0)
                                    @foreach ($user->candidate->educations as $education)
                                        <tr>
                                            <td>{{ $education->level ?? '' }}</td>
                                            <td>{{ $education->board ? $education->board : ($education->institute ? $education->institute :  '')  }}</td>
                                            <td>{{ $education->group ? $education->group : ($education->subject ? $education->subject : ($education->degree ? $education->degree : '')) }}</td>
                                            <td>{{ $education->result_gpa ?? '' }}</td>
                                            <td>{{ $education->year ?? '' }}</td>
                                            <td>{{ $education->roll ?? '' }}</td>
                                            <td>{{ $education->course_duration ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="row m-2">
                    <div class="col-md-12">

                        <table class="ml-1 table table-striped     table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th colspan="6">Professional Experience:</th>
                                </tr>
                                <tr>
                                    <th>Organization Name</th>
                                    <th>Post Name</th>
                                    <th>Responsibilities</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Experience</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($user->candidate->experiences) > 0)
                                    @foreach ($user->candidate->experiences as $experience)
                                        <tr>
                                            <td>{{ $experience->company ?? '' }}</td>
                                            <td>{{ $experience->designation ?? '' }}</td>
                                            <td>{{ $experience->responsibilities ?? '' }}</td>
                                            <td>{{ $experience->start ?? '' }}</td>
                                            <td>{{ $experience->end ?? '' }}</td>
                                            <td>#</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title line-height-36">
                        {{ __('location') }}
                    </h3>
                </div>
                <div class="card-body">
                    <x-website.map.map-warning/>

                    @php
                        $map = setting('default_map');
                    @endphp
                    @if ($map == 'map-box')
                        <div class="map mymap" id='map-box'></div>
                    @elseif ($map == 'google-map')
                        <div class="map mymap" id="google-map"></div>
                    @else
                        <div id="leaflet-map"></div>
                    @endif
                </div>
            </div> --}}
            {{-- <x-admin.candidate.card-component title="{{ __('applied_jobs') }}" :jobs="$appliedJobs"
                link="website.job.apply" />
                 --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title line-height-36">
                        {{ __('applied_jobs') }}
                    </h3>
                </div>
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th width="2%">#</th>
                            <th width="15%">{{ __('title') }}</th>
                            <th width="10%">{{ __('experience') }}</th>
                            <th width="10%">{{ __('job_type') }}</th>
                            <th width="10%">{{ __('deadline') }}</th>
                            {{-- <th width="10%">{{ __('status') }}</th> --}}
                            <th width="10%">{{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($appliedJobs->count() > 0)
                            @foreach ($appliedJobs as $job)
                                <tr>
                                    <td class="text-center" tabindex="0">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ $job->title }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ $job->experience ? $job->experience->name : '' }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ $job->job_type ? $job->job_type->name : '' }}
                                    </td>
                                    <td class="text-center" tabindex="0">
                                        {{ date('j F, Y', strtotime($job->deadline)) }}
                                    </td>
                                    {{-- <td class="text-center" tabindex="0">
                                        <div class="d-flex justify-content-center input-group-prepend">
                                            <button type="button"
                                                class="btn-sm btn-{{ $job->status == 'active' ? 'success' : ($job->status == 'pending' ? 'info' : 'danger') }} dropdown-toggle"
                                                data-toggle="dropdown">
                                                {{ __($job->status) }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="{{ route('admin.job.status.change', $job->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="active">
                                                    <button type="submit" class="btn bg-white text-left w-100-p"><span
                                                            class="text-primary">{{ __('active') }}</span>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.job.status.change', $job->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="pending">
                                                    <button type="submit" class="btn bg-white text-left w-100-p"><span
                                                            class="text-primary">{{ __('pending') }}</span>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.job.status.change', $job->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="expired">
                                                    <button type="submit" class="btn bg-white text-left w-100-p"><span
                                                            class="text-primary">{{ __('expired') }}</span>
                                                    </button>
                                                </form>
                                            </ul>
                                        </div>
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('job.show', $job->id) }}" class="btn bg-info ml-1"><i
                                                class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ route($link, $job->slug) }}"
                                            onclick="return confirm('{{ __('are_you_sure_you_want_to_delete_this_item') }}');"
                                            class="d-inline btn btn-danger"><i class="fas fa-trash"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">{{ __('no_data_found') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <x-admin.candidate.card-component title="{{ __('bookmark_jobs') }}" :jobs="$bookmarkJobs"
                link="website.job.bookmark" />
        </div>
    </div>
@endsection

@section('style')
    <!-- >=>Leaflet Map<=< -->
    <x-map.leaflet.map_links />

    @include('map::links')
@endsection
@section('script')
    {{-- Leaflet  --}}
    <x-map.leaflet.map_scripts />
    <script>
        var oldlat = {!! $candidate->lat ? $candidate->lat : setting('default_lat') !!};
        var oldlng = {!! $candidate->long ? $candidate->long : setting('default_long') !!};

        // Map preview
        var element = document.getElementById('leaflet-map');

        // Height has to be set. You can do this in CSS too.
        element.style = 'height:300px;';

        // Create Leaflet map on map element.
        var leaflet_map = L.map(element);

        // Add OSM tile layer to the Leaflet map.
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(leaflet_map);

        // Target's GPS coordinates.
        var target = L.latLng(oldlat, oldlng);

        // Set map's center to target with zoom 14.
        const zoom = 14;
        leaflet_map.setView(target, zoom);

        // Place a marker on the same location.
        L.marker(target).addTo(leaflet_map);
    </script>
    <!-- >=>Mapbox<=< -->
    @include('map::scripts')
    <!-- >=>Mapbox<=< -->
    <!-- ================ mapbox map ============== -->
    <x-website.map.map-box-check />
    <script>
        mapboxgl.accessToken = "{{ $setting->map_box_key }}";
        const coordinates = document.getElementById('coordinates');

        var oldlat = {!! $candidate->lat ? $candidate->lat : setting('default_lat') !!};
        var oldlng = {!! $candidate->long ? $candidate->long : setting('default_long') !!};

        const map = new mapboxgl.Map({
            container: 'map-box',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [oldlng, oldlat],
            zoom: 6
        });
        var marker = new mapboxgl.Marker({
                draggable: false
            }).setLngLat([oldlng, oldlat])
            .addTo(map);

        function onDragEnd() {
            const lngLat = marker.getLngLat();
            let lat = lngLat.lat;
            let lng = lngLat.lng;
            $('#lat').val(lat);
            $('#lng').val(lng);
            document.getElementById('form').submit();
        }

        function add_marker(event) {
            var coordinates = event.lngLat;
            marker.setLngLat(coordinates).addTo(map);

        }
        // zoom in and out 
        <
        x - mapbox - zoom - control / >
    </script>
    <script>
        $('.mapboxgl-ctrl-logo').addClass('d-none');
        $('.mapboxgl-ctrl-attrib-inner').addClass('d-none');
    </script>
    <!-- ================ mapbox map ============== -->
    <!-- ================ google map ============== -->
    <x-website.map.google-map-check />
    <script>
        function initMap() {
            var token = "{{ $setting->google_map_key }}";

            var oldlat = {!! $candidate->lat ? $candidate->lat : setting('default_lat') !!};
            var oldlng = {!! $candidate->long ? $candidate->long : setting('default_long') !!};

            const map = new google.maps.Map(document.getElementById("google-map"), {
                zoom: 7,
                center: {
                    lat: oldlat,
                    lng: oldlng
                },
            });

            const image =
                "https://gisgeography.com/wp-content/uploads/2018/01/map-marker-3-116x200.png";
            const beachMarker = new google.maps.Marker({

                draggable: false,
                position: {
                    lat: oldlat,
                    lng: oldlng
                },
                map,
                // icon: image
            });
        }
        window.initMap = initMap;
    </script>
    <script>
        @php
            $link1 = 'https://maps.googleapis.com/maps/api/js?key=';
            $link2 = $setting->google_map_key;
            $Link3 = '&callback=initMap&libraries=places,geometry';
            $scr = $link1 . $link2 . $Link3;
        @endphp;
    </script>
    <script src="{{ $scr }}" async defer></script>
    <!-- ================ google map ============== -->
@endsection
