<?php
/*
- P/S: Đây là bản TEST V15.0.1 Gồm các chức năng:   
+ Viplike Đa luồng bằng Cookie
+ Sell Cookie | Clone | Hotmail | Token ...
+ Key F5 liên tục không giới hạn.
+ Công Cụ Tiện Ích Facebook Chuyên Dụng!
========================================================================
- CẢNH BÁO: CHỈNH SỬA FILE config CÓ THỂ GÂY ẢNH HƯỞNG TỚI HOẠT ĐỘNG CỦA WEB.
- CHÚNG TÔI ĐÃ MÃ HÓA 1 VÀI PHẦN TỬ ĐỂ TRÁNH KẺ XẤU BUG - KHAI THÁC WEB!
========================================================================
- CÀI ĐẶT CONFIG THEO THỨ TỰ:
+ DÒNG #1: TÊN DATABASE
+ DÒNG #2: TÊN USER
+ DÒNG #3: MẬT KHẨU 
*/
header("Content-type: text/html; charset=utf-8");
define( 'WP_USE_EXT_MYSQL', false );
session_start();
$db_username = "eduvninf_tdl"; //Database Username
$db_password = "eduvninf_tdl"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'eduvninf_tdl'; //Database Name
$kunloc = new mysqli($host_name, $db_username, $db_password, $db_name);
mysqli_set_charset($kunloc, 'UTF8');
if ($kunloc->connect_error) 
{
die('Error : ('. $kunloc->connect_errno .') '. $kunloc->connect_error);
} 
#------- INFOMATION WEB-------------
$idfb = "100007117447134"; 
$chat = "messages/t/100007117447134"; 
$tieude = "Trao Đổi Like | Hệ Thống TDL Mới Nhất 2020 ";
$name = "Hệ Thống Bot Like 2020";
$domain = "http://traodoilike.net";
$url = "TraoDoiLike";
#$verify = '<img src="/img/verify.png" data-toggle="tooltip" title="Tài khoản đã được xác minh" style="margin-top:-3px;width:13px;height:13px">';
$verify = '<i class="flaticon2-correct text-success font-size-h5"></i>';
$link_logo = 'assets/media/logos/logo-letter-6.png';
#------ Get Image Profile ----------
$select_image = "SELECT * FROM setting";
$reurn_imgae = mysqli_fetch_assoc(mysqli_query($kunloc,$select_image));
$image1 = $reurn_imgae['image1'];
$image2 = $reurn_imgae['image2'];
$image3 = $reurn_imgae['image3'];
$image4 = $reurn_imgae['image4'];
$background = $reurn_imgae['background'];
$logo = $reurn_imgae['logo'];
$macdinh = $logo;
#---------------------------INFO USER---------------------------------------------
$select = "SELECT * FROM account WHERE username = '".$_SESSION['username']."'";
$reurn_data = mysqli_fetch_assoc(mysqli_query($kunloc,$select));
$id_user = $reurn_data['id'];
$username = $reurn_data['username'];
$image = $reurn_data['url'];
$hoten = $reurn_data['fullname'];
$level = $reurn_data['level'];
$trangthai = $reurn_data['kichhoat'];
$vnd = $reurn_data['VND'];
$phone = $reurn_data['sdt'];
$email = $reurn_data['gmail'];
#------ GIÁ TƯƠNG TÁC ------
$gialike = 100;
$giacamxuc = 200;
$giasub = 500;
$giacmt = 300;
$giashare = 400;
?>