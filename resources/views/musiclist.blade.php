<link rel="stylesheet" href="../css/musiclist.css" />
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>

<div id="sidebarContainer"></div>

<div class="page">
    <div class="musiclist">
        <div class="top"></div>
        <div class="content">
            <h1>Electro House</h1>
            <div class="add-btn" onclick="togglePopup()">
                <button class="btn btn-add">
                    <i class="ri-add-line"></i>
                </button>
            </div>
            <table>
                <tbody>
                        @foreach($user_request as $musicitem)
                                        <tr>
                                        <td><img src="./asset/dummyimage.svg" /></td>
                                        <td>Electro house 1</td>
                                        <td>3:27</td>
                                            <td>
                                                @empty($musicitem->audio)
                                                kosong
                                                @else
                                                <audio controls>
                                                    <source src="{{$musicitem->audio}}" width='90' height='90' alt='audio error' />
                                                </audio>
                                                @endempty
                                            </td>
                                            <td class="table-btn">
                            <button class="btn btn-download">
                                <i class="ri-download-2-line"> </i>
                            </button>
                            <button class="btn btn-detail">
                                <i class="ri-more-line"></i>
                            </button>

                        </td> 
                                        @endforeach
                        
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
        <form id="musicForm" method="POST" action='addmusic' enctype="multipart/form-data">
            @csrf
            <div class="file">
                <img src="./asset/icon-upload.svg" />
                <p>For image</p>
                <label for="fileimg">Choose</label>
                <input type="file" id="fileimg" name="img" accept="img/*" />
            </div>
            <div class="file">
                <img src="./asset/icon-upload.svg" />
                <p>For Music</p>
                <label for="fileaudio">Choose</label>
                <input type="file" id="fileaudio" name="audio" accept="audio/*" />
            </div>
            <div class="title">
                <label for="musicTitle">Title</label>
                <input type="text" id="musicTitle" name="title" />
            </div>
            <div class="title">
                <label for="musicTitle">Time</label>
                <input type="text" id="musicTime" name="time" />
            </div>
            <div class="title">
                <label for="musicTitle">Genre</label>
                <input type="text" id="musicGenre" name="genre" />
</div>
            <div class="title">
                <label for="musicTitle">Price</label>
                <input type="text" id="musicprice" name="price" />
            </div>    
            <div class="title">
                <label for="musicTitle">Link</label>
                <input type="text" id="musicLink" name="link" />
            </div>
            <div class="popup-btn">
                <button
                    type="button"
                    class="btn btn-cancel"
                    onclick="closePopup()"
                >
                    <img src="./asset/btn-cancel.png" />
                </button>
                <button type="submit" class="btn btn-add" onclick="closePopup()">
                    <img src="./asset/btn-add.png" />
                </button>
            </div>
        </form>
    </div>
</div>

<script src="./js/musiclist.js"></script>

<script src="./js/global.js"></script>
