<meta charset="utf-8">
<?php
   require_once 'config.php';
   set_time_limit(0);
   #=========== get token clone ===============
   $token = mysqli_fetch_assoc(mysqli_query($kunloc,"SELECT token FROM token ORDER BY RAND() LIMIT 0,1"))['token'];
   #============ token check ==================
   $live = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
   $active = $live['id'];
    if(empty($active))
    {
    exit('Token Die Rồi');
    }else if(isset($active)){ 
    ?>
                                        <hr>
                                        => TỔNG LIKE : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM mualike")); ?></b><br>
                                        => TỔNG CMT : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muacmt")); ?></b><br>
                                        => TỔNG SUB : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muasub")); ?></b><br>
                                        => TỔNG SHARE : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muashare")); ?></b><br>
                                        => TỔNG REACTION: <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muacamxuc")); ?></b><br>
                                        <hr>
                                        <p align="left">BUFF và Thống Kê Số LIKE Trên hệ thống.<br>
                                           	<?php
                                           #====== BUFFT LIKE ==============================
                                            $success_like = mysqli_query($kunloc,"SELECT * FROM mualike ORBER BY RAND() LIMIT 0,50");
                                            while($a = mysqli_fetch_object($success_like)){
                                             if($a->username != 'kunloc' && $a->done == $a->soluong){
                                                     mysqli_query($kunloc,"UPDATE mualike SET trangthai = 'success' WHERE idpost = '".$a->idpost."'");
                                                    echo '<h style="color:green">+ Done:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                    continue;  
                                                }else if($a->username != 'kunloc' && $a->done < $a->soluong){
                 #XÓA <= xóa chỗ này đi               echo $like = auto('https://graph.facebook.com/'.$a->idpost.'/likes?access_token='.$token_buff.'&method=post');
                                                    if($like == true){
                                                        $values = 1;
                                                         $insert_update = mysqli_query($kunloc,"UPDATE mualike SET done= done +  ".$values." WHERE idpost = '".$a->idpost."'");
                                                    }
                                                    mysqli_query($kunloc,"UPDATE mualike SET trangthai = 'fail' WHERE  idpost = '".$a->idpost."' ");
                                                   echo '<h style="color:red">+ Chưa xong:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                   continue;
                                                }else if($a->username != 'kunloc' && $a->idpost == null){
                                                  echo 'Chưa có bài viết mới...' ; 
                                                }
                                            }
                                           ?>
                                           BUFF và Thống Kê Số Cảm xúc trên hệ thống.<br>
                                           <?php
                                           #====== BUFF CẢM XÚC ==============================
                                            $success_camxuc = mysqli_query($kunloc,"SELECT * FROM muacamxuc ORBER BY RAND() LIMIT 0,50");
                                            while($a = mysqli_fetch_object($success_camxuc)){
                                             if($a->username != 'kunloc' && $a->done == $a->soluong){
                                                     mysqli_query($kunloc,"UPDATE muacamxuc SET trangthai = 'success' WHERE idpost = '".$a->idpost."'");
                                                    echo '<h style="color:green">+ Done:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                    continue;  
                                                }else if($a->username != 'kunloc' && $a->done < $a->soluong){
              #XÓA <= xóa chỗ này đi               echo $cam_xuc = auto('https://graph.facebook.com/'.$a->idpost.'/reactions?type='.$a->loai.'&access_token='.$token_buff.'&method=post');
                                                    if($cam_xuc == true){
                                                        $values = 1;
                                                         $insert_update = mysqli_query($kunloc,"UPDATE muacamxuc SET done= done +  ".$values." WHERE idpost = '".$a->idpost."'");
                                                    }
                                                    mysqli_query($kunloc,"UPDATE muacamxuc SET trangthai = 'fail' WHERE  idpost = '".$a->idpost."' ");
                                                   echo '<h style="color:red">+ Chưa xong:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                   continue;
                                                }else if($a->username != 'kunloc' && $a->idpost == null){
                                                  echo 'Chưa có bài viết mới...' ; 
                                                }
                                            }
                                           ?>
                                           BUFF và Thống Kê Số Share Trên Hệ Thống.<br>
                                           	<?php
                                           #====== BUFF SHARE ==============================
                                            $success_share = mysqli_query($kunloc,"SELECT * FROM muashare ORBER BY RAND() LIMIT 0,50");
                                            while($a = mysqli_fetch_object($success_share)){
                                             if($a->username != 'kunloc' && $a->done >= $a->soluong){
                                                     mysqli_query($kunloc,"UPDATE muashare SET trangthai = 'success' WHERE idpost = '".$a->idpost."'");
                                                    echo '<h style="color:green">+ Done:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                    continue;  
                                                }else if($a->username != 'kunloc' && $a->done < $a->soluong){
              #XÓA <= xóa chỗ này đi               echo $shares = auto('https://graph.facebook.com/'.$a->idpost.'/sharedposts?access_token='.$token_buff.'&method=post');
                                                    if($shares->true){
                                                        $values = 1;
                                                         $insert_update = mysqli_query($kunloc,"UPDATE muashare SET done= done + ".$values." WHERE idpost = '".$a->idpost."'");
                                                    }
                                                    mysqli_query($kunloc,"UPDATE muashare SET trangthai = 'fail' WHERE  idpost = '".$a->idpost."' ");
                                                   echo '<h style="color:red">+ Chưa xong:</h> <a target="blank" href="//m.facebook.com/'.$a->idpost.'" style="color:blue">'.$a->idpost.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                   continue;
                                                }else if($a->username != 'kunloc' && $a->idpost == null){
                                                  echo 'Chưa có bài viết mới...' ; 
                                                }
                                            }
                                           ?>
                                         BUFF và Thống Kê Số SUB trên hệ thống.<br>
                                         <?php
                                           #====== BUFF SUB ==============================
                                            $success_sub = mysqli_query($kunloc,"SELECT * FROM muasub ORBER BY RAND() LIMIT 0,50");
                                            while($a = mysqli_fetch_object($success_sub)){
                                             if($a->username != 'kunloc' && $a->done >= $a->soluong){
                                                     mysqli_query($kunloc,"UPDATE muasub SET trangthai = 'success' WHERE idfb = '".$a->idfb."'");
                                                    echo '<h style="color:green">+ Done:</h> <a target="blank" href="//m.facebook.com/'.$a->idfb.'" style="color:blue">'.$a->idfb.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                    continue;  
                                                }else if($a->username != 'kunloc' && $a->done < $a->soluong){
                 #XÓA <= xóa chỗ này đi               echo $sub = auto('https://graph.facebook.com/'.$a->idfb.'/subscribers?access_token='.$token_buff.'&method=post');
                                                    if($sub->true){
                                                         $values = 1;
                                                         $insert_update = mysqli_query($kunloc,"UPDATE muasub SET done= done + ".$values." WHERE idfb = '".$a->idfb."'");
                                                    }
                                                    mysqli_query($kunloc,"UPDATE muasub SET trangthai = 'fail' WHERE  idfb = '".$a->idfb."' ");
                                                   echo '<h style="color:red">+ Chưa xong:</h> <a target="blank" href="//m.facebook.com/'.$a->idfb.'" style="color:blue">'.$a->idfb.' </a> -> '.$a->soluong.' -> '.$a->done.' - bởi: <h stlye="color:red">'.$a->username.'</h>' ."<br>";
                                                   continue;
                                                }else if($a->username != 'kunloc' && $a->idfb == null){
                                                  echo 'Chưa có ID mới...' ; 
                                                }
                                            }
                                        }
                                        echo 'Cập nhật hoàn thành';
                                        ?>
                                </p>
                   <?php
                          function auto($url){
                          $data = curl_init();
                          curl_setopt($data, CURLOPT_RETURNTRANSFER,1);
                          curl_setopt($data, CURLOPT_URL, $url);
                          $hasil = curl_exec($data);
                          curl_close($data);
                          return $hasil;
                          }
                          ?>