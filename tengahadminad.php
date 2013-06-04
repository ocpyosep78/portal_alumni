<?
$id_user=$barisadmin['ID_USER'];
$nip = $barisadmin['NIP'];
$nama = $barisadmin['NAMA'];
$tmp = $barisadmin['TEMPAT_LAHIR'];
$tgll = $barisadmin['TGL_LAHIR'];
$agama = $barisadmin['AGAMA'];
$tlp = $barisadmin['NO_TELP'];
$alamat = $barisadmin['ALAMAT'];
$jk = $barisadmin['JENIS_KELAMIN'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title >Homepage</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="resource/css/style.css">
    <link rel="stylesheet" type="text/css" href="resource/style.css">
    <script type="text/javascript" src="resource/jquery.1.4.2.min.js"></script>
    <script type="text/javascript" src="updatead.js"></script>
    <script type="text/javascript" src="pagingad.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <?
        include('navbaradmin.php');
        ?>
    </div>
    <div class="row">
        <div class="span3">
            <div class="well" style="padding: 8px 0;">
                <ul class="nav nav-list">
                    <li class="nav-header">List header</li>
                    <!-- ambil foto -->
                    <?
                    //$username = $_SESSION['username'];
                    $query_foto = "select foto from admin where id_user = '$id_user'";
                    //echo "</br>",$query_foto,"</br>";
                    $stat_foto = oci_parse($c, $query_foto);
                    oci_execute($stat_foto);
                    $foto = oci_fetch_array ($stat_foto, OCI_BOTH);
                    if($foto[0] == "belum upload")
                    {
                        echo    "<li><a href='#' class='thumbnail'><img src='resource/img/default.png' alt=''></a></li><br>";
                        //echo 	"</br>",$foto[0],"</br>";
                    }
                    else
                    {
                        echo 	"<li><a href='#' class='thumbnail'><img src='photo/",$foto[0],"' alt=''></a></li><br>";
                        //echo 	"</br>sudah upload</br>";
                    }
                    ?>
                    <!--            <li><a href="#" class="thumbnail"><img src="resource/img/default.png" alt=""></a></li><br>		-->
                    <li><a href="homeadmin.php"><i class="icon-file"></i> News Feed</a></li>
                    <?
                    if($id_user==$id){?>
                        <li class="active"><a href="profilad.php?namauser=<?=$nama;?>"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="infouserad.php?namauser=<?=$nama;?>""><i class="icon-list-alt"></i> Info</a></li>
                        <?
                    }
                    else {
                        ?>
                        <li><a href="profilad.php?namauser=<?=$namauser;?>"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="infouserad.php?namauser=<?=$namauser;?>"><i class="icon-list-alt"></i> Info</a></li>
                        <?
                    }
                    ?>
                    <li><a href="paneladmin.php"><i class="icon-check"></i> Administrator</a></li>
                </ul>
            </div>
        </div>
        <div class="span6">
            <h2><?php echo  $nama;?></h2>
            <p><i class="icon-user"></i> NIP <?php echo  $nip;?>&nbsp &nbsp
                <i class="icon-home"></i> Address <?php echo  $alamat;?>&nbsp &nbsp
                <i class="icon-volume-up"></i> Phone Number <?php echo  $tlp;?>&nbsp &nbsp
                <a href="infouserad.php?namauser=<?=$nama;?>">See more info...</a>
            </p>
            <form>
                <label><h3>Update Status</h3></label>
                <textarea class="span6" id="update" rows="4" style="width: 100%" placeholder='Write Somethings...'></textarea>
                <button type="submit" class="btn" id="update_button">Post</button>
                <input type='hidden' name='id_tujuan' id='id_tujuan' value='<?echo $id_user;?>' />
                <input type='hidden' name='id_tujuan' id='namausr' value='<?echo $nama;?>' />
                <!--                <div id="flashmessage">-->
                <div id="flash" align="left"></div>
                <!--                </div>-->
            </form>
            <div id="status">
                <?php include('buka_statusprofil.php'); ?>
            </div>
        </div>
        <!--        </div>-->
        <div class="span3">
            <?

            include('siperusahaan.php');
            ?>
        </div>
        <!---->
    </div></div></div></div>

</div></div>

<footer>
    <p>&copy; Ika Kartika Sari 2012</p>
</footer>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
</body>

</html>