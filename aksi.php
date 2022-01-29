<?php
error_reporting(0);
include_once("koneksi.php");
$del = $_GET['del'];

	if(!empty($del)) 
	{

	mysqli_query($sambung, "DELETE FROM karyawan WHERE id=$del");
  header("Location: index.php");

	}

if (isset($_POST['edit']))
	{
	$id = $_POST['id'];
	$nama= $_POST['nama'];
	$jabatan= $_POST['jabatan'];
	$hari= $_POST['hari'];
	if ($_POST['jabatan']=='Staff') {

		$gaji=120000*$hari;
		
			}

	elseif ($_POST['jabatan']=='Pengawas') {
		
		$gaji=250000*$hari;
		
			}

	elseif ($_POST['jabatan']=='Cleaning') {
		
		$gaji=65000*$hari;
		
			}
	mysqli_query($sambung, "UPDATE karyawan SET nama='$nama',jabatan='$jabatan',gaji='$gaji' WHERE id=$id");
	 header("Location: index.php");

	}

	elseif (isset($_POST['tambah']))
	{
	$nama= $_POST['nama'];
	$jabatan= $_POST['jabatan'];
	$hari= $_POST['hari'];
	if ($_POST['jabatan']=='Staff') {

		$gaji=120000*$hari;
		
			}

	elseif ($_POST['jabatan']=='Pengawas') {
		
		$gaji=250000*$hari;
		
			}

	elseif ($_POST['jabatan']=='Cleaning') {
		
		$gaji=65000*$hari;
		
			}

	mysqli_query($sambung, "INSERT INTO karyawan(nama,jabatan,gaji) VALUES('$nama','$jabatan','$gaji')");
 
 header("Location: index.php");
	}

	else {
	 header("Location: index.php");
	}
?>