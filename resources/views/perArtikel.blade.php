@extends('app')
@section('content')
<div class="container detailArtikel">
    <h2>{{$artikel->judul}}</h2>
</div>
<!-- <figure class="mb-4"> -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @isset($gambar)
                @foreach ($gambar as $img)
                    <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                        <img src="{{url('/uploads/' . $img->gambar)}}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            @endisset
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
<!-- </figure> -->
<div class="container mainDetailArtikel">
    <div class="row">
        <div class="col-md-8">
            <div class="post-content" id="comment-container">
                {!!$artikel->artikel!!}
                <hr>
                <h3>Komentar</h3>
                <br>
                <div class="post-content">
                    <form method="post" enctype="multipart/form-data" id="form-comment">
                        @method('POST')
                        @csrf
                        <div class="post-container">
                            <div class="form">
                                <!-- <div class="form-group">
                                        <input type="text" id="name" class="form-control" name="name" required
                                            placeholder="Nama">
                                    </div> -->
                                <input type="hidden" name="id_artikel" value="{{$artikel->id}}">
                                <input type="text" id="name" class="form-control" name="name" required
                                    placeholder="Nama">
                                <input type="email" id="email" class="form-control" placeholder="Email" required
                                    name="email">
                                <textarea class="form-control" placeholder="Post a Comment" id="floatingTextarea2"
                                    style="height: 100px" name="comment"></textarea>
                                <!-- <label for="floatingTextarea2">Post a Comment</label> -->
                                <div class="submit-comment">
                                    <button class="btn btn-primary btn-sm" type="submit" style="height:30px;"><i
                                            class='fas fa-paper-plane' style='font-size:10px'></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-4 infoPenulis ">
            <div class="">
                <hr>



                <div class="penulis">
                    <p class="mt-3 mb-4">PUBLISHED BY</p>
                    <h4>{{$artikel->penulis}}</h4>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    counter = 0;
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "{{url('/get_comment'.$comment_url.'/' . $artikel->id)}}",
            processData: false,
            contentType: false,
            cache: false,
            success: function (results) {
                var constructHtml = '';
                $.each(results, function (index, data) {
                    container = document.getElementById('comment-container')

                    postContainer = document.createElement("div")
                    postContainer.className = "post-container"
                    postContainer.style = "margin-top: 5px;"

                    postContent = document.createElement('div')
                    postContent.className = ("post-content")

                    image = document.createElement("img")
                    image.src = "{{url("images/default-avatar-icon-of-social-media-user-vector.jpg")}}"
                    image.className = "profile-photo-md pull-left"

                    postDetail = document.createElement("div")
                    postDetail.className = "post-detail"
                    postDetail.id = "post-detail-" + data.id

                    userInfo = document.createElement("div")
                    userInfo.className = "user-info"

                    h5 = document.createElement("h5")

                    profileLink = document.createElement("a")
                    profileLink.className = "profile-link"
                    profileLink.innerHTML = data.name

                    lineDivider = document.createElement("div")
                    lineDivider.className = "line-divider"

                    postText = document.createElement("div")
                    postText.className = "post-text"

                    p = document.createElement("p")
                    p.innerHTML = data.comment
                    p.style = "margin-bottom : 0"

                    reply = document.createElement("a")
                    reply.style = "cursor: pointer;"
                    reply.id = "reply-" + data.id
                    reply.className = "profile-link reply"
                    reply.onclick = function () {
                        const elementsToRemove = document.querySelectorAll('.form-reply'); // Replace '.x' with your class name
                        elementsToRemove.forEach(
                            element => element.remove()
                        );
                        console.log(document)
                        if (counter > 0) {
                            counter--
                        }
                        // const removeOnClickReply = document.querySelectorAll('.reply'); // Replace '.x' with your class name
                        // elementsToRemove.forEach(
                        //     element => element.onclick = 
                        // );

                        form = document.createElement("form")
                        form.id = "form-reply"
                        form.className = "form-reply"

                        postComment = document.createElement("div")
                        postComment.className = "post-comment"

                        divForm = document.createElement("div")
                        divForm.className = "form"

                        nama = document.createElement("input")
                        nama.type = "text"
                        nama.id = "name"
                        nama.className = "form-control"
                        nama.name = "name"
                        nama.required = true
                        nama.placeholder = "Nama"

                        email = document.createElement("input")
                        email.type = "email"
                        email.className = "form-control"
                        email.placeholder = "email"
                        email.required = true
                        email.name = "email"

                        comment = document.createElement("textarea")
                        comment.className = "form-control"
                        comment.placeholder = "Post a Reply"
                        comment.id = "floatingTextarea2"
                        comment.style = "height: 100px"
                        comment.name = "comment"

                        id = document.createElement("input")
                        id.type = "hidden"
                        id.name = "id_comment"
                        id.value = data.id

                        id_artikel = document.createElement("input")
                        id_artikel.type = "hidden"
                        id_artikel.name = "id_artikel"
                        id_artikel.value = data.id_artikel

                        submitComment = document.createElement("div")
                        submitComment.className = "submit-comment"

                        submit = document.createElement("button")
                        submit.type = "submit"
                        submit.className = "btn btn-primary btn-sm"
                        submit.style = "height:30px;"
                        submit.innerHTML = "<i class='fas fa-paper-plane' style='font-size:10px'></i>"

                        submitComment.appendChild(submit)

                        divForm.appendChild(nama)
                        divForm.appendChild(email)
                        divForm.appendChild(comment)
                        divForm.appendChild(id)
                        divForm.appendChild(id_artikel)
                        divForm.appendChild(submitComment)

                        postComment.appendChild(divForm)

                        form.appendChild(postComment)

                        console.log(data.id)

                        form.onsubmit = function (e) {
                            event.preventDefault();
                            let formData = new FormData(this);
                            $.ajax({
                                type: "POST",
                                url: "{{url('/post_comment'.$comment_url.'')}}",
                                processData: false,
                                contentType: false,
                                cache: false,
                                data: formData,
                                beforeSend: function (xhr) {
                                    xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                                },
                                success: function (data, status, xhr) {
                                    if (xhr.status == 200) {
                                        // alert("Successfully sent to database");
                                        postComment = document.createElement("div")
                                        postComment.className = "post-comment"

                                        image2 = document.createElement("img")
                                        image2.src = "{{url("images/default-avatar-icon-of-social-media-user-vector.jpg")}}"
                                        image2.className = "profile-photo-sm"

                                        p2 = document.createElement("p")

                                        p2.innerHTML = "<a href='timeline.html' class='profile-link'>" + data.name + " </a> " + data.comment

                                        postComment.appendChild(image2)
                                        postComment.appendChild(p2)

                                        postDetail = document.getElementById("post-detail-" + data.id_comment)

                                        postDetail.appendChild(postComment)
                                        postDetail.removeChild(form)
                                        counter--
                                    }
                                },
                                error: function () {
                                    alert("Could not send to database");
                                }
                            })
                        }

                        // if (counter == 0) {
                        postDetail = document.getElementById("post-detail-" + data.id)

                        // console.log(postDetail.id)
                        // }
                        // removeReply = document.getElementById("reply-" + data.id)
                        // removeReply.onclick = function () {
                        //     return false;
                        // }
                        // postDetail.appendChild(form)

                        if (counter == 0) {
                            postDetail.appendChild(form)
                        }

                        counter++


                        // postDetail = document.getElementById("post-detail-" + data.id)

                    }
                    reply.innerHTML = "reply"

                    lineDivider2 = document.createElement("div")
                    lineDivider2.className = "line-divider"

                    postText.appendChild(p)
                    postText.appendChild(reply)
                    h5.appendChild(profileLink)
                    userInfo.appendChild(h5)

                    postDetail.appendChild(userInfo)
                    postDetail.appendChild(lineDivider)
                    postDetail.appendChild(postText)

                    $.each(data.reply, function (index, data) {
                        postComment = document.createElement("div")
                        postComment.className = "post-comment"

                        image2 = document.createElement("img")
                        image2.src = "{{url("images/default-avatar-icon-of-social-media-user-vector.jpg")}}"
                        image2.className = "profile-photo-sm"

                        p2 = document.createElement("p")

                        p2.innerHTML = "<a href='timeline.html' class='profile-link'>" + data.name + " </a> " + data.comment

                        postComment.appendChild(image2)
                        postComment.appendChild(p2)

                        postDetail.appendChild(postComment)
                    })

                    postContainer.appendChild(image)
                    postContainer.appendChild(postDetail)

                    container.appendChild(postContainer)
                })

            }
        })
    });
    $('#form-comment').on('submit', (function (e) {
        console.log("masuk sini")
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{url('/post_comment'.$comment_url.'')}}",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
            },
            success: function (data, status, xhr) {
                if (xhr.status == 200) {
                    // alert("Successfully sent to database");
                    // $.each(data, function (index, data) {
                    container = document.getElementById('comment-container')

                    postContainer = document.createElement("div")
                    postContainer.className = "post-container"

                    postContent = document.createElement('div')
                    postContent.className = ("post-content")

                    image = document.createElement("img")
                    image.src = "{{url("images/default-avatar-icon-of-social-media-user-vector.jpg")}}"
                    image.className = "profile-photo-md pull-left"

                    postDetail = document.createElement("div")
                    postDetail.className = "post-detail"
                    postDetail.id = "post-detail-" + data.id

                    userInfo = document.createElement("div")
                    userInfo.className = "user-info"

                    h5 = document.createElement("h5")

                    profileLink = document.createElement("a")
                    profileLink.className = "profile-link"
                    profileLink.innerHTML = data.name

                    lineDivider = document.createElement("div")
                    lineDivider.className = "line-divider"

                    postText = document.createElement("div")
                    postText.className = "post-text"

                    p = document.createElement("p")
                    p.innerHTML = data.comment
                    p.style = "margin-bottom : 0"

                    reply = document.createElement("a")
                    reply.style = "cursor: pointer;"
                    reply.className = "profile-link"
                    reply.onclick = function () {
                        const elementsToRemove = document.querySelectorAll('.form-reply'); // Replace '.x' with your class name
                        elementsToRemove.forEach(
                            element => element.remove()
                        );
                        if (counter > 0) {
                            counter--
                        }

                        form = document.createElement("form")
                        form.id = "form-reply"
                        form.class = "form-reply"

                        postComment = document.createElement("div")
                        postComment.className = "post-comment"

                        divForm = document.createElement("div")
                        divForm.className = "form"

                        nama = document.createElement("input")
                        nama.type = "text"
                        nama.id = "name"
                        nama.className = "form-control"
                        nama.name = "name"
                        nama.required = true
                        nama.placeholder = "Nama"

                        email = document.createElement("input")
                        email.type = "email"
                        email.className = "form-control"
                        email.placeholder = "email"
                        email.required = true
                        email.name = "email"

                        comment = document.createElement("textarea")
                        comment.className = "form-control"
                        comment.placeholder = "Post a Reply"
                        comment.id = "floatingTextarea2"
                        comment.style = "height: 100px"
                        comment.name = "comment"

                        id = document.createElement("input")
                        id.type = "hidden"
                        id.name = "id_comment"
                        id.value = data.id

                        id_artikel = document.createElement("input")
                        id_artikel.type = "hidden"
                        id_artikel.name = "id_artikel"
                        id_artikel.value = data.id_artikel

                        submitComment = document.createElement("div")
                        submitComment.className = "submit-comment"

                        submit = document.createElement("button")
                        submit.type = "submit"
                        submit.className = "btn btn-primary btn-sm"
                        submit.style = "height:30px;"
                        submit.innerHTML = "<i class='fas fa-paper-plane' style='font-size:10px'></i>"

                        submitComment.appendChild(submit)

                        divForm.appendChild(nama)
                        divForm.appendChild(email)
                        divForm.appendChild(comment)
                        divForm.appendChild(id_artikel)
                        divForm.appendChild(id)
                        divForm.appendChild(submitComment)

                        postComment.appendChild(divForm)

                        form.appendChild(postComment)

                        form.onsubmit = function (e) {
                            event.preventDefault();
                            let formData = new FormData(this);
                            $.ajax({
                                type: "POST",
                                url: "{{url('/post_comment'.$comment_url.'')}}",
                                processData: false,
                                contentType: false,
                                cache: false,
                                data: formData,
                                beforeSend: function (xhr) {
                                    xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                                },
                                success: function (data, status, xhr) {
                                    if (xhr.status == 200) {
                                        // alert("Successfully sent to database");
                                        postComment = document.createElement("div")
                                        postComment.className = "post-comment"

                                        image2 = document.createElement("img")
                                        image2.src = "{{url("images/default-avatar-icon-of-social-media-user-vector.jpg")}}"
                                        image2.className = "profile-photo-sm"

                                        p2 = document.createElement("p")

                                        p2.innerHTML = "<a href='timeline.html' class='profile-link'>" + data.name + " </a> " + data.comment

                                        postComment.appendChild(image2)
                                        postComment.appendChild(p2)

                                        postDetail = document.getElementById("post-detail-" + data.id_comment)

                                        postDetail.appendChild(postComment)
                                        postDetail.removeChild(form)
                                        counter--
                                    }
                                },
                                error: function () {
                                    alert("Could not send to database");
                                }
                            })
                        }

                        console.log(data.id)

                        if (counter == 0) {
                            postDetail.appendChild(form)
                        }

                        counter++


                        // postDetail = document.getElementById("post-detail-" + data.id)

                    }
                    reply.innerHTML = "reply"

                    lineDivider2 = document.createElement("div")
                    lineDivider2.className = "line-divider"

                    postText.appendChild(p)
                    postText.appendChild(reply)
                    h5.appendChild(profileLink)
                    userInfo.appendChild(h5)

                    postDetail.appendChild(userInfo)
                    postDetail.appendChild(lineDivider)
                    postDetail.appendChild(postText)

                    postContainer.appendChild(image)
                    postContainer.appendChild(postDetail)

                    container.appendChild(postContainer)

                    existNama = document.getElementById("name")
                    existEmail = document.getElementById("email")
                    existComment = document.getElementById("floatingTextarea2")

                    existNama.value = ""
                    existEmail.value = ""
                    existComment.value = ""
                    // })
                }
            },
            error: function () {
                alert("Could not send to database");
            }
        })
    }))


</script>

@endsection