@include('global')

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
                        <p>{{ $user_data->count() }}</p>
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
                        <p>{{ $user_data->where('proccess', 'request')->count() }}</p>
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
                        <p >{{ $user_data->where('proccess', 'processing')->count() }}</p>
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
                        <p>{{ $user_data->where('proccess', 'done')->count() }}</p>
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

            <table >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_data as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->usertype}}</td>
                        <td><form method="POST" action='usertype'>
        @csrf
        <input type="hidden" name="id_user" value="{{ $user->id }}">
        <select name="type" id="statusSelect">
        <option value=""></option>
            <option value="client">Request Ditolak</option>
            <option value="admin">Processing</option>
            <option value="done">Finished</option>
        </select>
        <button type="submit">change</button>
    </form>
                            <button><i class="ri-pencil-line"></i></button>
                            <button><i class="ri-delete-bin-line"></i></button>
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
