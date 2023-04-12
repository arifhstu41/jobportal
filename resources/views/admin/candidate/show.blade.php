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
                        <img src="{{ asset($candidate->photo) }}" alt="image" class="image-fluid" height="350px"
                            width="350px">
                    </div>
                    <div class="col-md-8">
                        <table id="datatable-responsive"
                            class="ml-1 table table-striped     table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <tbody>
                                <tr class="">
                                    <th width="30%">{{ __('name') }}</th>
                                    <td width="70%">{{ $user->name }}</td>
                                </tr>
                                <tr class="">
                                    <th width="30%">Candidate Name(বাংলা)</th>
                                    <td width="70%">{{ $user->candidate->name_bn }}</td>
                                </tr>
                                <tr class="">
                                    <th width="30%">Father's Name</th>
                                    <td width="70%">{{ $user->candidate->father_name }}</td>
                                </tr>
                                <tr class="">
                                    <th width="30%">Father's Name(বাংলা)</th>
                                    <td width="70%">{{ $user->candidate->father_name_bn }}</td>
                                </tr>
                                <tr class="">
                                    <th width="30%">Mother's Name</th>
                                    <td width="70%">{{ $user->candidate->mother_name }}</td>
                                </tr>
                                <tr class="">
                                    <th width="30%">Mother's Name(বাংলা)</th>
                                    <td width="70%">{{ $user->candidate->mother_name_bn }}</td>
                                </tr>
                                <tr class="">
                                    <th width="30%">Date of Birth</th>
                                    <td width="70%">{{ date('Y-m-d', strtotime($user->candidate->birth_date)) }}</td>
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
                            <tbody>
                                <tr class="mb-1">
                                    <th width="20%">NID No</th>
                                    <td width="30%">{{ $user->candidate->nid_no }}</td>
                                    <th width="20%">Contact No</th>
                                    <td width="30%">{{ $user->phone }}</td>
                                </tr>
                                <tr class="mb-1">
                                    <th width="20%">Gender</th>
                                    <td width="30%">{{ $user->candidate->gender }}</td>
                                    <th width="20%">Marital Status</th>
                                    <td width="30%">{{ $user->candidate->marital_status }}</td>
                                </tr>
                                <tr class="mb-1">
                                    <th width="20%">Religion</th>
                                    <td width="30%">{{ $user->candidate->religion }}</td>
                                    <th width="20%">Quota</th>
                                    <td width="30%">{{ $user->candidate->quota }}</td>
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
                                        <p>Upazila/Thana: <span>{{ $user->candidate->thana }}</span></p>
                                        <p>District: <span>{{ $user->candidate->district }}</span></p>
                                    </td>
                                    <td>
                                        <p>Care of: <span>{{ $user->candidate->care_of_parmanent }}</span></p>
                                        <p>Village/Tow: <span>{{ $user->candidate->place_parmanent }}</span></p>
                                        <p>Post Office: <span>{{ $user->candidate->post_office_parmanent }}</span></p>
                                        <p>Post Code: <span>{{ $user->candidate->postcode_parmanent }}</span></p>
                                        <p>Upazila/Thana: <span>{{ $user->candidate->thana_parmanent }}</span></p>
                                        <p>District: <span>{{ $user->candidate->district_parmanent }}</span></p>
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
                                            <td>{{ $education->institute ?? '' }}</td>
                                            <td>{{ $education->group ?? '' }}</td>
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
            <x-admin.candidate.card-component title="{{ __('applied_jobs') }}" :jobs="$appliedJobs"
                link="website.job.apply" />
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
