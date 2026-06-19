<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>SMA-MAU BP Amanatul Ummah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
                <table class="table">
			    	<tbody>
                        <tr>
			    			<td width="10%" align="center">
			    				<img align="center" width="100" height="100" src="images\10624348411701277576.png">
			    			</td>
			    			<td width="80%" align="center">
			    				<font style="font-size:20px; line-height: 30px; font-weight:bold; font-family:Times New Roman;">PENERIMAAN PESERTA DIDIK BARU</font>
					    		<br><font style="font-size:22px; line-height: 1.0; font-weight:bold; font-family:Times New Roman; text-transform: uppercase;">
					    			Madrasah Aliyah Unggulan Amanatul Ummah<br>
								Program Madrasah Bertaraf Internasional (MBI) Amanatul Ummah &nbsp;<br>TERAKREDITASI A</font>
								    <br><font style="font-size:18px; line-height: 1.1; font-weight:bold; font-family:Times New Roman;">Jl. Tirtowening No. 2 Ds. Kembangbelor, Pacet, Kab. Mojokerto Kel. Siwalankerto								    	<br> Kec. Wonocolo, Kota Surabaya  Telp/Fax. 03216855506</font>
								    <br>
								    <font style="font-size:12px; line-height: 1.2; font-weight:bold; font-family:Times New Roman;">Email: info@mbi-au.sch.id | Website: mbi-au.sch.id</font>
			    			</td>
			    			<td width="10%" align="center">&nbsp;</td>
			    		</tr>
			    	</tbody>
                </table>
                    <div class="panel-body" style="display: flex; align-items: center; justify-content: center; margin: 15px;">
						<table class="table table-content" style="border: none; width: 90%;">
							<tbody><tr>
								<td class="content-label" align="right" style="border: none;"><strong>Jalur Pendaftaran</strong>&nbsp;</td>
								<td>
									<span id="div_jalur"><select name="id_jalur" id="id_jalur" class="form-control select2" required="" onchange="CheckHarga(this.form);" onkeypress="return tabOnEnter(this, event);">
                                    <option value="" selected="">-- PILIH JALUR --</option>

                                    <option value="27">Jalur Tes Tulis</option>

                                    <option value="28">Jalur Prestasi</option>

                                    </select>
                                    </span> <font color="red">* Harus Dipilih</font>
								</td>
							</tr>
							<tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Nama Lengkap</strong>&nbsp;</td>
							     <td>
							     	<input name="form_nama" id="form_nama" size="50" maxlength="150" value="" autocomplete="off" class="form-control" placeholder="Isi sesuai nama di kartu keluarga" onfocus="this.select()" onkeypress="return tabOnEnter(this, event);" type="text"> <font color="red"> * Harus diisi sesuai nama di kartu keluarga</font>
							     </td>
						     </tr>

							 <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Email</strong>&nbsp;</td>
							     <td>
							     	<input name="form_email" id="form_email" size="50" maxlength="150" value="" autocomplete="off" class="form-control" placeholder="Isi email anda" onfocus="this.select()" onkeypress="return tabOnEnter(this, event);" type="text"> <font color="red"> * Harus diisi</font>
							     </td>
						     </tr> 
						     <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Tempat Lahir</strong>&nbsp;</td>
							     <td>
								   <input name="form_tempat_lahir" id="form_tempat_lahir" size="50" maxlength="100" value="" autocomplete="off" class="form-control" placeholder="Pastikan tempat lahir sama dg di kartu keluarga" onfocus="this.select()" onkeypress="return tabOnEnter(this, event);" type="text"> <font color="red"> * Harus diisi sesuai dg di kartu keluarga</font>
							   </td>
						     </tr>
						     <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Tanggal Lahir</strong>&nbsp;</td>
							     <td width="30%">
							       <div class="input-group">
								        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							        	<input class="form-control  datepicker" id="form_tanggal_lahir" name="form_tanggal_lahir" value="" placeholder="dd-mm-yyyy" maxlength="20" size="15" type="text"> <font color="red">  * Harus diisi sesuai dg di kartu keluarga</font>
							       </div>
							   </td>
						     </tr>
						     <tr>
							     <td class="content-label" align="right" style="border: none;"><strong>Jenis Kelamin</strong>&nbsp;</td>
							     <td colspan="2">
								     <select name="form_jenis_kelamin" id="form_jenis_kelamin" class="form-control select2" onkeypress="return tabOnEnter(this, event);">
                                        <option value="L">Laki - Laki</option>

                                        <option value="P">Perempuan</option>

                                        </select>
                                        <font color="red"> * Harus Dipilih</font>
							     </td>
						     </tr>
						     <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Nomor Induk Siswa Nasional (NISN)</strong>&nbsp;</td>
							     <td width="60%">
							     	<input name="form_nisn" id="form_nisn" size="10" maxlength="10" value="" autocomplete="off" class="form-control" onfocus="this.select()" onkeypress="return tabOnEnter(this, event)" type="text">
									<font color="red">* (isi dengan tanda - jika tidak ada)</font>
							     </td> 
						     </tr>
							 						     <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Nama Sekolah Asal</strong>&nbsp;</td>
							     <td width="60%">
							     	<input name="form_nama_sltp" id="form_nama_sltp" size="70" maxlength="200" value="" autocomplete="off" class="form-control" onfocus="this.select()" onkeypress="return tabOnEnter(this, event)" type="text">
									<font color="red">* (Wajib diisi)</font>
							     </td> 
						     </tr>
							 						     <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Alamat Sekarang</strong>&nbsp;</td>
							     <td>
								     <input id="form_alamat_sini" class="form-control" type="text" onkeypress="return tabOnEnter(this, event);" onfocus="this.select()" autocomplete="off" value="" maxlength="200" size="70" name="form_alamat_sini" placeholder="isi sesuai alamat tempat tinggal sekarang">	<font color="red"> * Harus Diisi</font>					     
							     </td>
						     </tr>
						     <tr>
							     <td align="right" class="content-label blockcontent" width="30%" style="border: none;"><strong>No HP</strong>&nbsp;</td>
							     <td width="60%">
								     <input type="tel" pattern="\d*" name="ortu_ayah_hp" id="ortu_ayah_hp" size="15" minlength="10" maxlength="15" value="" autocomplete="off" class="input-sm form-control number-only" onfocus="this.select()" onkeypress="return hanyaAngka(event)"> <font color="red">* (Isi dengan No. HP Ayah atau Ibu, isian berupa angka minimal 10 digit)</font>
							     </td> 
						     </tr>
						     <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Nama Ayah</strong>&nbsp;</td>
							     <td>
								     <input id="ortu_ayah_nama" class="form-control" type="text" onkeypress="return tabOnEnter(this, event);" onfocus="this.select()" autocomplete="off" value="" maxlength="100" size="60" name="ortu_ayah_nama" placeholder="Isi lengkap dengan gelar, jika ada. contoh: Andi, M.Si"> <font color="red"> * Harus Diisi</font>					     
							     </td>
						     </tr>
						     <tr>
							     <td align="right" class="content-label" width="30%" style="border: none;"><strong>Nama Ibu</strong>&nbsp;</td>
							     <td>
								     <input id="ortu_ibu_nama" class="form-control" type="text" onkeypress="return tabOnEnter(this, event);" onfocus="this.select()" autocomplete="off" value="" maxlength="100" size="60" name="ortu_ibu_nama" placeholder="Isi lengkap dengan gelar, jika ada. contoh: Suliana, M.Si"> <font color="red"> * Harus Diisi</font>					     
							     </td>
						     </tr>
							 <tr>
							     <td class="content-label" align="right" style="border: none;"><strong>Pilihan 1</strong>&nbsp;</td>
							     <td colspan="2">
								     <select name="form_pilihan_1" id="form_pilihan_1" class="form-control select2" onkeypress="return tabOnEnter(this, event);">
                                        <option value="MBI Amanatul Ummah Pacet Mojokerto" selected="">MBI Amanatul Ummah Pacet Mojokerto</option>

                                    </select>
                                    <font color="red"> * Harus Diisi</font>
							     </td>
						     </tr>
							 <tr class="no-display">
							     <td class="content-label" align="right" style="border: none;"><strong>Pilihan 2</strong>&nbsp;</td>
							     <td colspan="2">
								     <select name="form_pilihan_2" id="form_pilihan_2" class="form-control select2" onkeypress="return tabOnEnter(this, event);">
                                        <option value="Tidak Memilih">Tidak Memilih</option>

                                        <option value="MA Unggulan Amanatul Ummah Surabaya">MA Unggulan Amanatul Ummah Surabaya</option>

                                        <option value="MBI Amanatul Ummah Surabaya">MBI Amanatul Ummah Surabaya</option>

                                        <option value="SMA BP AMANATUL UMMAH">SMA BP AMANATUL UMMAH</option>

                                    </select>
                                    <font color="red"> * Optional</font>
							     </td>
						     </tr>
							 <tr>
							     <td align="center" width="30%" colspan="2"><font style="color: red; font-weight: bold; text-transform: uppercase;">Isian Bertanda merah wajib diisi</font></td>
						     </tr>
                             <tr>
                                <td align="center" colspan="2">
                                    <input type="hidden" name="btnSave" value="1">
				    		        <button type="button" name="btnSave" id="btnSave" class="btn btn-lg btn-primary center-block" value="Daftar"><i class="fa fa-send-o"></i> Daftar Sekarang</button>
                                </td>
                             </tr>
						</tbody>
                    </table>
				</div>
    
</body>
</html>