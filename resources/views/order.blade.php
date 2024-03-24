
@include('global')



                    <div>
                        <div>
                        <link rel="stylesheet" href="../css/order.css" />

<link rel="stylesheet" href="../css/global.css" />

<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>

<div id="sidebarContainer"></div>

<div class="page">
    <div id="overview" class="overview">
        <h1>Overview</h1>

        <div class="statistics">
            <div class="box">
                <div class="statistic">
                    <div class="stat-data">
                        <h3>Orders</h3>
                        <p>{{ $user_request->count() }}</p>
                    </div>

                    <div class="stat-icon">
                        <i class="ri-shopping-cart-2-line"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="statistic">
                    <div class="stat-data">
                        <h3>Requests</h3>
                        <p>{{ $user_request->where('proccess', 'request')->count() }}</p>
                    </div>

                    <div class="stat-icon">
                        <i class="ri-mail-add-line"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="statistic">
                    <div class="stat-data">
                        <h3>Process</h3>
                        <p >{{ $user_request->where('proccess', 'processing')->count() }}</p>
                    </div>

                    <div class="stat-icon">
                        <i class="ri-music-2-fill"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="statistic">
                    <div class="stat-data">
                        <h3>Done</h3>
                        <p>{{ $user_request->where('proccess', 'done')->count() }}</p>
                    </div>

                    <div class="stat-icon">
                        <i class="ri-check-line"></i>
                    </div>
                </div>

                <div id="table-order"></div>
            </div>
        </div>

        <div class="accounts-table">
            <div class="table-top">
                <h2>Accounts Table</h2>

                <div class="searchbar">
                    <i class="ri-search-line"></i>
                    <input type="text" placeholder="Search..." />
                </div>
            </div>
                            @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            @if(Session::get('fail'))
                            <div class="alert alert-success">
                                {{ Session::get('fail') }}
                            </div>
                            @endif
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>BPM</th>
                                            <th>Genre</th>
                                            <th>Instruments</th>
                                            <th>Chord</th>
                                            <th>Audio</th>
                                            <th>Company</th>
                                            <th>Notes</th>
                                            <th>Proccess</th>
                                            <th>First Payment</th>
                                            <th>Final Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_request as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->bpm }}</td>
                                            <td>{{ $item->genre }}</td>
                                            <td>{{ $item->instrument }}</td>
                                            <td>{{ $item->chord }}</td>
                                            <td>
                                                @empty($item->audio)
                                                kosong
                                                @else
                                                <audio controls>
                                                    <source src="{{$item->audio}}" width='90' height='90' alt='audio error' />
                                                </audio>
                                                @endempty
                                            </td>
                                            <td>{{ $item->company }}</td>
                                            <td>{{ $item->notes }}</td>
                                    
                                            <td>{{ $item->proccess }}</td>
                                            <td>
                                            @empty($item->first_payment)
                                                kosong
                                                @else
                                                <img src="{{$item->first_payment}}" width='90' height='90' alt='gambar error' />
                                                @endempty
                                                </td>
                                            <td>
                                                @empty($item->final_payment)
                                                kosong
                                                @else
                                                <audio controls>
                                                <img src="{{ asset($item->final_payment) }}" width='90' height='90' alt='gambar error ' />
                                                </audio>
                                                @endempty
                                            </td>
                                            <td>
    <form method="POST" action='proccess'>
        @csrf
        <input type="hidden" name="record_id" value="{{ $item->id }}">
        <select name="status" id="statusSelect">
        <option value="request"></option>
            <option value="request">Requet</option>
            <option value="tolak"> Ditolak</option>
            <option value="proccessing">Processing</option>
            <option value="demo">Demo</option>
            <option value="done">Finished</option>
        </select>
        <input type="text" name="link">
        <button type="submit">Submit</button>
    </form>
</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<script src="../js/order.js"></script>

<script src="../js/global.js"></script>       