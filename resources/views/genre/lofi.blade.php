<link rel="stylesheet" href="./css/musiclist.css" />
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>

<div id="sidebarContainer"></div>

<div class="page">
    <div class="musiclist">
        <div class="top"></div>
        <div class="content">
            <h1>Lo-fi</h1>
            <table>
                <tbody>
                @if($list_music->where('genre', 'lofi')->count() < 1)
    <tr>
        <td colspan="5"><h1>Musik Masih Belum Release</h1></td>
        </tr>
        <tr>
        <td colspan="5"><h1>Jika Butuh musik genre ini</h1></td>
        </tr>
        <tr>
        <td colspan="5"><h1>Silahkan request di <a href="/form-request"> Form Request </a></h1></td>
        </tr>
    
@else
                        @foreach($list_music->where('genre', 'lofi') as $musicitem)
                                        <tr>
                                        <td><img src="{{$musicitem->img}}" /></td>
                                        <td>{{$musicitem->title}}</td>
                                        <td>{{$musicitem->time}}</td>
                                            <td>
                                                @empty($musicitem->audio)
                                                kosong
                                                @else
                                                <audio controls>
                                                    <source src="{{$musicitem->audio}}" width='90' height='90' alt='audio error' />
                                                </audio>
                                                @endempty
                                            </td>
                                            <td>
                                                Rp. {{$musicitem->price}}
                                            </td>
                                            <td>                                           
                                             <form action="/beli" method="POST">
                                                @csrf
                                            <input type="hidden" name="title" value="{{ $musicitem->title }}">
                                            <button class="beli">Beli</button>
                                            </td>                                            
                                        </form>
                        @endforeach
                        @endif
                        <!--
                        <td><i class="ri-eye-line"></i>793</td>
                        <td class="table-btn">
                            <button class="btn btn-download">
                                <i class="ri-download-2-line"> </i>
                            </button>
                            <button class="btn btn-detail">
                                <i class="ri-more-line"></i>
                            </button>

                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="popup" id="popup">
    <div class="popup-content">
        <h2>Upload an instrument</h2>
        <form id="musicForm">
            <div class="file">
                <img src="./asset/icon-upload.svg" />
                <p>Drag or Drop your file here</p>
                <label for="file">Choose</label>
                <input type="file" id="file" name="file" accept="audio/*" />
            </div>
            <div class="title">
                <label for="musicTitle">Title</label>

                <input type="text" id="musicTitle" name="musicTitle" />
            </div>
            <div class="popup-btn">
                <button
                    type="button"
                    class="btn btn-cancel"
                    onclick="closePopup()"
                >
                    <img src="./asset/btn-cancel.png" />
                </button>
                <button type="submit" class="btn btn-add">
                    <img src="./asset/btn-add.png" />
                </button>
            </div>
        </form>
    </div>
</div>

<script src="./js/musiclist.js"></script>

<script src="./js/global.js"></script>
