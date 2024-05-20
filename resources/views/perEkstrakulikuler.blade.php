@extends('app')
@section('content')
<div class="container">
    <h3 class="titleEkstrakulikuler">Ekstrakulikuler Basket</h3>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        1. Pembina Ekstrakulikuler
                    </button>
                </h2>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="pembinaEkstrakulikuler">

                        <div class="perPembina">
                            <img src="images/pelatihJerman.jpg" alt="Pembina Ekstrakulikuler">
                            <h5>Jabut Martono</h5>
                        </div>

                        <div class="perPembina">
                            <img src="images/pelatihJerman.jpg" alt="Pembina Ekstrakulikuler">
                            <h5>Jabut Martono</h5>
                        </div>

                        <div class="perPembina">
                            <img src="images/pelatihJerman.jpg" alt="Pembina Ekstrakulikuler">
                            <h5>Jabut Martono</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        2. Visi, Misi, Fasilitas Ekstrakulikuler
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>Visi Ekstrakulikuler</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio officia enim veniam unde
                        eius laudantium modi voluptatibus, impedit nam quibusdam!
                    </p>
                    <h4>Misi Ekstrakulikuler</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas nemo animi fugit libero,
                        velit, provident pariatur quidem soluta fuga saepe rerum doloremque aliquid voluptate
                        consequuntur, officiis nostrum omnis vitae ipsa beatae et? Perspiciatis in aliquam, nemo
                        sequi consequatur officiis possimus doloremque nam magni velit ea eveniet et. Dolores
                        recusandae eum nulla beatae asperiores, nisi aspernatur consequatur, iure fugiat aliquam
                        optio minima animi. Quasi laudantium ipsam quos nulla in facere neque.
                    </p>

                    <h4>Fasilitas Ekstrakulikuler</h4>
                    <div class="fasilitas d-flex my-4">
                        <ul class="mx-3">
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                        </ul>

                        <ul class="mx-3">
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                        </ul>

                        <ul class="mx-3">
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                        </ul>

                        <ul class="mx-3">
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                            <li>Rumput Sistetis</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Piala Yang Pernah Diraih
                    </button>
                </h2>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table-bordered table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kejuaraan</th>
                                <th>Atas Nama</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Juara 1 Lomba Mancing</td>
                                <td>Kimak Bersaudara</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Juara 1 Lomba Mancing</td>
                                <td>Kimak Bersaudara</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Juara 1 Lomba Mancing</td>
                                <td>Kimak Bersaudara</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Juara 1 Lomba Mancing</td>
                                <td>Kimak Bersaudara</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Juara 1 Lomba Mancing</td>
                                <td>Kimak Bersaudara</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- sosmed icon -->
<div class="iconBox">
    <a href="" class="perIconBox wa">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="" class="perIconBox fb">
        <i class="fab fa-facebook-f"></i>
    </a>

    <a href="" class="perIconBox ig">
        <i class="fab fa-instagram"></i>
    </a>

    <a href="" class="perIconBox yt">
        <i class="fab fa-youtube"></i>
    </a>

    <a href="" class="perIconBox linkin">
        <i class="fab fa-linkedin-in"></i>
    </a>
</div>
@endsection