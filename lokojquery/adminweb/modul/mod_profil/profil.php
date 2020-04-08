<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='37'");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Profil</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=profil&act=update>
          <input type=hidden name=id value=$r[id_modul]>
          <table>
          <tr><td><img src=../foto_banner/$r[gambar]></td></tr>
         <tr><td>Ganti Foto : <input type=file size=30 name=fupload></td></tr>
         <tr><td><textarea name='isi' style='width: 600px; height: 350px;'>$r[static_content]</textarea></td></tr>
         <tr><td><input type=submit value=Update></td></tr>
         </form></table>";
    break;  
}
}
?>
