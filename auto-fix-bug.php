<meta charset="utf-8">
<?php
require_once 'config.php';
set_time_limit(0);
#============ token check ==================
$token = mysqli_fetch_assoc(mysqli_query($kunloc,"SELECT token FROM token ORDER BY RAND() LIMIT 0,1"))['token'];
$live = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$active = $live['id'];
    if(empty($active))
    {
    exit('Token CRON Die Rồi');
    }else if(isset($active)){ 
        
?>
<p align="left">TỔNG : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM acccheo")); ?></b> Danh sách Tài Khoản Chéo Like.<br>
                                    <?php
                                        $check_account = mysqli_query($kunloc,"SELECT * FROM acccheo");
                                        while($a = mysqli_fetch_object($check_account)){
                                       	$idfb = $a->idfb;
                                       	$use = $a->username;
                                      	$avatar = json_decode(auto('https://graph.facebook.com/'.$idfb.'/?access_token='.$token),true);
                                     	 if($avatar['id']){
                                              echo '+ ID Tồn Tại: -> <a target="blank" href="//m.facebook.com/'.$avatar[id].'" style="color:red">'.$avatar[id].'</a> - bởi: <h stlye="color:red">'.$use.'</h>'."<br>";
                                         }else{
                                            mysqli_query($kunloc,"DELETE FROM acccheo WHERE idfb = '$idfb' ");    
                                            echo '+ ID Không tồn tại: -> '.$idfb.' - bởi: <h stlye="color:red">'.$use.'</h>' ."<br>";
                                            continue;  
                                         }
                                        }
                                        ?>
</p>
<hr>
<p align="left">Xóa Bài Viết Không Tồn Tại.<br>
                                    <?php
                                       #====== Xóa LIKE ==============================
                                        $xoa_like = mysqli_query($kunloc,"SELECT * FROM mualike ORBER BY RAND() LIMIT 0,50");
                                        while($a = mysqli_fetch_object($xoa_like)){
                                          $check_post = json_decode(auto('https://graph.facebook.com/'.$a->idpost.'/?access_token='.$token),true);
                                           if(isset($active) && !isset($check_post[id])){
                                             mysqli_query($kunloc,"DELETE FROM mualike WHERE idpost = '".$a->idpost."' AND username = 'kunloc' ");
                                             echo '<h style="color:red">+ Đã Xóa Bài Viết LIKE:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a>'."<br>";
                                           }
                                            if($a->trangthai == 'success'){
                                              $trangthai = '<h style="color:green">Hoàn Thành</h>';
                                           }else if($a->trangthai == 'fail'){
                                              $trangthai = '<h style="color:red">Chưa xong</h>';
                                           }
                                           echo ''.$trangthai.' + ID Tồn Tại: -> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:red">'.$a->idpost.'</a> - bởi: <h stlye="color:red">'.$a->username.'</h>'."<br>";
                                        }
                                        #====== Xóa CMT ==============================
                                        $xoa_camxuc = mysqli_query($kunloc,"SELECT * FROM muacamxuc ORBER BY RAND() LIMIT 0,50");
                                        while($a = mysqli_fetch_object($xoa_camxuc)){
                                           $check_post = json_decode(auto('https://graph.facebook.com/'.$a->idpost.'/?access_token='.$token.'&method=get'),true); 
                                           if(isset($active) && !isset($check_post['id'])){ 
                                            mysqli_query($kunloc,"DELETE FROM muacmt WHERE idpost = '".$a->idpost."' AND username = 'kunloc' ");
                                             echo '<h style="color:red">+ Đã Xóa Bài Viết CAM XUC:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a>'."<br>";
                                           }
                                            if($a->trangthai == 'success'){
                                              $trangthai = '<h style="color:green">Hoàn Thành</h>';
                                           }else if($a->trangthai == 'fail'){
                                              $trangthai = '<h style="color:red">Chưa xong</h>';
                                           }
                                           echo ''.$trangthai.' + ID Tồn Tại: -> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:red">'.$a->idpost.'</a> - bởi: <h stlye="color:red">'.$a->username.'</h>'."<br>";
                                        }
                                        #====== Xóa CMT ==============================
                                        $xoacmt = mysqli_query($kunloc,"SELECT * FROM muacmt ORBER BY RAND() LIMIT 0,50");
                                        while($a = mysqli_fetch_object($xoacmt)){
                                           $check_post = json_decode(auto('https://graph.facebook.com/'.$a->idpost.'/?access_token='.$token.'&method=get'),true); 
                                            if(isset($active) && !isset($check_post['id'])){ 
                                          mysqli_query($kunloc,"DELETE FROM muacmt WHERE idpost = '".$a->idpost."' AND username = 'kunloc' ");
                                             echo '<h style="color:red">+ Đã Xóa Bài Viết CMT:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a>'."<br>";
                                           }
                                           if($a->trangthai == 'success'){
                                              $trangthai = '<b style="color:green">Hoàn Thành">';
                                           }else if($a->trangthai == 'fail'){
                                              $trangthai = '<b style="color:red">Chưa xong">';
                                           }
                                           echo ''.$trangthai.' + ID Tồn Tại: -> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:red">'.$a->idpost.'</a> - bởi: <h stlye="color:red">'.$a->username.'</h>'."<br>";
                                        }
                                        #====== Xóa SHARE ==============================
                                        $xoa_share = mysqli_query($kunloc,"SELECT * FROM muashare ORBER BY RAND() LIMIT 0,50");
                                        while($a = mysqli_fetch_object($xoa_share)){
                                           $check_post = json_decode(auto('https://graph.facebook.com/'.$a->idpost.'/?access_token='.$token_buff.'&method=get'),true); 
                                            if(isset($active) && !isset($check_post['id'])){
                                             mysqli_query($kunloc,"DELETE FROM muashare WHERE idpost = '".$a->idpost."' AND username = 'kunloc' ");
                                             echo '<h style="color:red">+ Đã Xóa Bài Viết SHARE:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a>'."<br>";
                                           }
                                           if($a->trangthai == 'success'){
                                              $trangthai = '<h style="color:green">Hoàn Thành</h>';
                                           }else if($a->trangthai == 'fail'){
                                              $trangthai = '<h style="color:red">Chưa xong</h>';
                                           }
                                           echo ''.$trangthai.' + ID Tồn Tại: -> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:red">'.$a->idpost.'</a> - bởi: <h stlye="color:red">'.$a->username.'</h>'."<br>";
                                        }
                                       ?>
                                     </p>
<hr>                            
<p align="left">TỔNG : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM account")); ?></b> - Danh sách Tài Khoản BUG.<br>
                             <?php
                               $SQL = mysqli_query($kunloc,'SELECT * FROM account');
                               while($r = mysqli_fetch_object($SQL)){
                                    $VND= $r->VND;
                                    $id= $r->id;
                                    $idfb= $r->idfb;
                                    $username= $r->username;
                                    $level= $r->level; 
                                    $kichhoat= $r->kichhoat; 
                                    $value = 'Chưa kích hoạt';
                                    $url = $r->url; 
                                    $link = '/data/avata%20trong.jpeg';
                                    $value2 = 'none';
                                if(($level != 'admin' || $level != 'ctv') && $kichhoat == $value && $VND >= 100000)
                                {
                                    $BANNED = mysqli_query($kunloc,"UPDATE account SET  kichhoat = 'Vô Hiệu Hoá' WHERE id = '".$id."'");
                                    echo '+ Banned: '.$id.' '."<br>";
                                }
                               if($username == null)
                               {
                                $DETELE_ACCOUNT_NULL = mysqli_query($kunloc,"DELETE FROM account WHERE id = '".$id."'");    
                                echo 'User trống(không tồn tại): '.$id.' '."<br>";
                               }
                               $sql = mysqli_fetch_assoc(mysqli_query("SELECT * FROM uploads WHERE username = '$username'"));
                               if($username != $sql['username']){
                                    echo unlink($sql['img_url']);
                                    $DETELE_ACCOUNT_NULL = mysqli_query($kunloc,"DELETE FROM uploads WHERE username = '$username'");   
                               }
                               }
                               echo 'Cập nhật hoàn thành';
                              ?>
</p>
<?php
    }
    function auto($url){
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
    }
?>