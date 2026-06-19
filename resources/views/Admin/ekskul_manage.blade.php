@extends('Admin.app')
@section('content')
<div class="card">
    <div class="header">
        <h4 class="title">Ekstrakulikuler</h4>
    </div>
    <div class="content">
        <form>
            <div class="row">
                <div class="col-md ">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="nama" value>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputKetua">Ketua</label>
                        <input type="text" class="form-control" name="ketua" placeholder="Ketua">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPembina">Pembina</label>
                        <input type="text" class="form-control" name="pembina" placeholder="Pembina">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" placeholder="Gambar" name="image">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <label>Kegiatan</label>
                    <div class="row">
                    <div class="form-group" id="activityContainer">
                            <div class="col-md">
                                <input type="text" class="form-control" placeholder="Kegiatan" id="activity"
                                    name="activity[]">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn" onclick="addActivityField()">Tambah Kegiatan</button>
                    <button type="button" class="btn btn-danger" onclick="removeLastActivityField()">Hapus Kegiatan
                        </button><br><br>
                </div>
            </div>

            <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
<script>
    function addActivityField() {
        // Get the container element for activity fields
        var activityContainer = document.getElementById("activityContainer");

        // Create a new div element for the activity field
        var activityField = document.createElement("div");
        activityField.className = "col-md";

        // Create an input element for the activity name
        var input = document.createElement("input");
        input.type = "text";
        input.className = "form-control";
        input.placeholder = "Kegiatan";
        input.id = "activity"
        input.name = "activity[]";  // Use an array name to capture multiple activities

        // Add the label and input to the activity field div
        activityField.appendChild(input);

        // Add the activity field div to the container
        activityContainer.appendChild(activityField);
    }
    function removeLastActivityField() {
        var activityContainer = document.getElementById("activityContainer");
        if (activityContainer.children.length > 1) {
            activityContainer.removeChild(activityContainer.lastChild);
        }
    }
</script>
@endsection