<div class="login">
    <form action="?" method="post" enctype="multipart/form-data">
    <div class="selectAll">
        <p>請選擇分類</p>
        <select class="loginInput" name="cat">
            <?
            if(!empty($cat))
            {
                for($i=0; $i<count($cat);$i++)
                {
                    ?>
                    <option value="<?echo $cat[$i]["id"];?>" <? if(isset($service["cat"]) && $service["cat"] == $cat[$i]["id"]){echo "selected";}?>><?echo $cat[$i]["name"];?></option>
                    <?
                }
            }
            ?>
        </select>
    </div>
    <div class="upload">
        <p>上傳服務封面照片</p>
        <div class="uploadbox"><img id="blah"
        <?
            if(!empty($service["img"]))
            {
                echo 'src="'.$base_url.'service_img/'.$service["img"].'"';
            }else
            {
                echo 'src=""';
            }
            ?>
         alt="圖片預覽">
            <label id="upload" for="imgInp" class="choose-file">上傳檔案圖片</label>
            <input id="imgInp" type="file" class="id_image_large" name="imgInp">
        </div>
    </div>
        <div class="upload">
            <p>輪播圖片2</p>
            <div class="uploadbox"><img id="blah2"
                    <?
                    if(!empty($service["img2"]))
                    {
                        echo 'src="'.$base_url.'service_img/'.$service["img2"].'"';
                    }else
                    {
                        echo 'src=""';
                    }
                    ?>
                                        alt="圖片預覽" style="max-width: 100%">
                <label id="upload" for="imgInp2" class="choose-file">上傳檔案圖片</label>
                <input id="imgInp2" type="file" class="id_image_large" name="imgInp2">
            </div>
        </div>
        <div class="upload">
            <p>服務人大頭貼</p>
            <div class="uploadbox"><img id="blah3"
                    <?
                    if(!empty($service["img3"]))
                    {
                        echo 'src="'.$base_url.'service_img/'.$service["img3"].'"';
                    }else
                    {
                        echo 'src=""';
                    }
                    ?>
                                        alt="圖片預覽" style="max-width: 100%">
                <label id="upload" for="imgInp3" class="choose-file">上傳檔案圖片</label>
                <input id="imgInp3" type="file" class="id_image_large" name="imgInp3">
            </div>
        </div>
        <div class="inputAll">
        <input placeholder="服務名稱(必填)" type="text" value="<?if(!empty($service["name"])){echo $service["name"];}?>" name="name" class="loginInput">
        <input placeholder="服務員姓名(必填)" type="text" value="<?if(!empty($service["attendant"])){echo $service["attendant"];}?>" name="attendant" class="loginInput">
        <textarea placeholder="服務簡介(必填)" type="text" value="" name="intro" class="loginInput"><?if(!empty($service["intro"])){echo $service["intro"];}?></textarea>
        <textarea placeholder="服務人介紹(必填)" type="text" value="" name="attendant_intro" class="loginInput"><?if(!empty($service["attendant_intro"])){echo $service["attendant_intro"];}?></textarea>
    </div>
    <div class="selectAll">
        <p>服務時間設定</p>
        <select class="loginInput" id="week_date" onchange="change_week_date(this)">
            <option value="1">周一</option>
            <option value="2">周二</option>
            <option value="3">周三</option>
            <option value="4">週四</option>
            <option value="5">週五</option>
            <option value="6">週六</option>
            <option value="7">週日</option>
        </select>
        <div id="week_1">
            <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_1))
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            if($service_time_arr_1[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="1_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="1_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            echo '<span class="timezone"  id="1_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_1))
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            if($service_time_arr_1[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="1_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="1_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            echo '<span class="timezone"  id="1_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_1))
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            if($service_time_arr_1[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="1_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="1_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            echo '<span class="timezone"  id="1_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="week_2" style="display: none;">
            <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_2))
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            if($service_time_arr_2[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="2_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="2_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            echo '<span class="timezone"  id="2_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_2))
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            if($service_time_arr_2[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="2_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="2_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            echo '<span class="timezone"  id="2_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_2))
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            if($service_time_arr_2[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="2_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="2_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            echo '<span class="timezone"  id="2_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="week_3" style="display: none;">
            <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_3))
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            if($service_time_arr_3[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="3_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="3_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            echo '<span class="timezone"  id="3_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_3))
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            if($service_time_arr_3[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="3_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="3_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            echo '<span class="timezone"  id="3_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_3))
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            if($service_time_arr_3[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="3_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="3_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            echo '<span class="timezone"  id="3_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="week_4" style="display: none;">
            <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_4))
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            if($service_time_arr_4[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="4_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="4_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            echo '<span class="timezone"  id="4_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_4))
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            if($service_time_arr_4[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="4_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="4_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            echo '<span class="timezone"  id="4_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_4))
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            if($service_time_arr_4[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="4_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="4_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            echo '<span class="timezone"  id="4_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="week_5" style="display: none;">
            <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_5))
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            if($service_time_arr_5[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="5_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="5_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            echo '<span class="timezone"  id="5_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_5))
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            if($service_time_arr_5[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="5_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="5_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            echo '<span class="timezone"  id="5_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_5))
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            if($service_time_arr_5[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="5_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="5_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            echo '<span class="timezone"  id="5_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="week_6" style="display: none;">
            <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_6))
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            if($service_time_arr_6[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="6_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="6_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            echo '<span class="timezone"  id="6_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_6))
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            if($service_time_arr_6[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="6_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="6_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            echo '<span class="timezone"  id="6_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_6))
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            if($service_time_arr_6[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="6_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="6_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            echo '<span class="timezone"  id="6_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="week_7" style="display: none;">
            <div class="detailTimeL"><span>24</span><span class="line"></span><span>1</span><span class="line"></span><span>2</span><span class="line"></span><span>3</span><span class="line"></span><span>4</span><span class="line"></span><span>5</span><span class="line"></span><span>6</span><span class="line"></span><span>7</span><span class="line"></span><span>8</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_7))
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            if($service_time_arr_7[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="7_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="7_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=1; $i<=16; $i++)
                        {
                            echo '<span class="timezone"  id="7_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>8</span><span class="line"></span><span>9</span><span class="line"></span><span>10</span><span class="line"></span><span>11</span><span class="line"></span><span>12</span><span class="line"></span><span>13</span><span class="line"></span><span>14</span><span class="line"></span><span>15</span><span class="line"></span><span>16</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_7))
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            if($service_time_arr_7[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="7_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="7_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=17; $i<=32; $i++)
                        {
                            echo '<span class="timezone"  id="7_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="detailTimeL"><span>16</span><span class="line"></span><span>17</span><span class="line"></span><span>18</span><span class="line"></span><span>19</span><span class="line"></span><span>20</span><span class="line"></span><span>21</span><span class="line"></span><span>22</span><span class="line"></span><span>23</span><span class="line"></span><span>24</span></div>
            <div class="detailTimeL">
                <div class="timeLine">
                    <?
                    if(!empty($service_time_arr_7))
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            if($service_time_arr_7[$i] == 1)
                            {
                                echo '<span class="timezone timeLineOn"  id="7_'.$i.'">&nbsp;</span>';
                            }else
                            {
                                echo '<span class="timezone"  id="7_'.$i.'">&nbsp;</span>';
                            }
                        }
                    }else
                    {
                        for($i=33; $i<=48; $i++)
                        {
                            echo '<span class="timezone"  id="7_'.$i.'">&nbsp;</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="service_time_1" id="service_time_1" value="">
        <input type="hidden" name="service_time_2" id="service_time_2" value="">
        <input type="hidden" name="service_time_3" id="service_time_3" value="">
        <input type="hidden" name="service_time_4" id="service_time_4" value="">
        <input type="hidden" name="service_time_5" id="service_time_5" value="">
        <input type="hidden" name="service_time_6" id="service_time_6" value="">
        <input type="hidden" name="service_time_7" id="service_time_7" value="">
        <p>課程時間</p>
        <select class="loginInput" name="time">
            <option value="0.5">30分鐘</option>
            <option value="1">1小時</option>
            <option value="2">2小時</option>
            <option value="3">3小時</option>
            <option value="4">4小時</option>
            <option value="5">5小時</option>
        </select>
        <p>請選擇服務方式</p>
        <select class="loginInput" name="way" onchange="changeway(this)">
            <option value="1" <? if(isset($service["way"]) && $service["way"] == 1){echo "selected";}?>>到府服務</option>
            <option value="2" <? if(isset($service["way"]) && $service["way"] == 2){echo "selected";}?>>店內服務</option>
            <option value="3" <? if(isset($service["way"]) && $service["way"] == 3){echo "selected";}?>>兩者皆有</option>
        </select>
        <p id="city_title" style="display: <? if(isset($service["way"]) && $service["way"] == 1){echo "none";}else{echo "block";}?>;">請選擇所在區域</p>
        <select class="loginInput" name="city" id="city" style="display: <? if(isset($service["way"]) && $service["way"] == 1){echo "none";}else{echo "block";}?>;">
            <?
                if(isset($city))
                {
                    foreach($city as $key=>$item)
                    {
                        ?>
                        <option value="<?echo $item["id"]?>" <? if(isset($service["city"]) && $service["city"] == $item["id"]){echo "selected";}?>><?echo $item["city"]?></option>
            <?
                    }
                }
            ?>
        </select>
        <select class="loginInput" name="zone" id="zone" style="display: <? if(isset($service["way"]) && $service["way"] == 1){echo "none";}else{echo "block";}?>;">
            <?
            if(isset($area))
            {
                foreach($area as $key=>$item)
                {
                    ?>
                    <option value="<?echo $item["id"]?>" <? if(isset($service["zone"]) && $service["zone"] == $item["id"]){echo "selected";}?>><?echo $item["area"]?></option>
                    <?
                }
            }
            ?>
        </select>
        <div class="inputAll">
            <input placeholder="店址(必填)" type="text" value="<?if(!empty($service["address"])){echo $service["address"];}?>" name="address" class="loginInput" id="address" style="display: <? if(isset($service["way"]) && $service["way"] == 1){echo "none";}else{echo "block";}?>;">
        </div>
        <p>是否停止服務</p>
        <select class="loginInput" name="ready" id="ready">
            <option value="1" <? if(isset($service["ready"]) && $service["ready"] == 1){echo "selected";}?>>否</option>
            <option value="2" <? if(isset($service["ready"]) && $service["ready"] == 2){echo "selected";}?>>是</option>
        </select>

    </div>

    <div class="inputAll">
        <input placeholder="價格(必填)" type="text" value="<?if(!empty($service["fee"])){echo $service["fee"];}?>" id="fee" name="fee" class="loginInput">
        <input placeholder="彩虹價格(必填)" type="text" value="<?if(!empty($service["special_fee"])){echo $service["special_fee"];}?>" id="special_fee" name="special_fee" class="loginInput">
    </div>

        <?
            if(!empty($service)){
                echo '<div class="buttonOne"><button name="update" value="'.$service["id"].'" onclick="return  servicetime(this)">更新並且預覽</button></div>';
                echo '<div class="buttonOne"><button name="back" value="1">返回服務列表</button></div>';
                //echo '<div class="buttonOne"><button name="del" value="'.$service["id"].'" onclick="servicetime(this)">刪除</button></div>';
            }else
            {
                echo '<div class="buttonOne"><button name="save" value="1" onclick="return servicetime(this)">更新預覽</button></div>';
                echo '<div class="buttonOne"><button name="back" value="1" >返回服務列表</button></div>';
            }
        ?>


        </form>
</div>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>
<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp2").change(function(){
        readURL2(this);
    });
</script>
<script type="text/javascript">
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp3").change(function(){
        readURL3(this);
    });
</script>
<script type="text/javascript">
    /*
    $(".timezone").click(function () {
        var select_time = document.getElementsByClassName("timeLineOn");
        for(var i= 0; i<select_time.length; i++)
        {
            alert(select_time[i].id);
        }

    });
    */
    function servicetime()
    {
        var select_time = document.getElementsByClassName("timeLineOn");
        var servicetime_1 = [];
        var servicetime_2 = [];
        var servicetime_3 = [];
        var servicetime_4 = [];
        var servicetime_5 = [];
        var servicetime_6 = [];
        var servicetime_7 = [];
        for(var i= 0; i<select_time.length; i++)
        {
            var time_id = select_time[i].id.split("_");
            var week_day = time_id[0];
            var day_time = time_id[1];
            if(week_day == 1)
            {
                servicetime_1.push(day_time);
            }else if(week_day == 2)
            {
                servicetime_2.push(day_time);
            }else if(week_day == 3)
            {
                servicetime_3.push(day_time);
            }else if(week_day == 4)
            {
                servicetime_4.push(day_time);
            }else if(week_day == 5)
            {
                servicetime_5.push(day_time);
            }else if(week_day == 6)
            {
                servicetime_6.push(day_time);
            }else if(week_day == 7)
            {
                servicetime_7.push(day_time);
            }

        }
        var service_time_1 = document.getElementById("service_time_1");
        var service_time_2 = document.getElementById("service_time_2");
        var service_time_3 = document.getElementById("service_time_3");
        var service_time_4 = document.getElementById("service_time_4");
        var service_time_5 = document.getElementById("service_time_5");
        var service_time_6 = document.getElementById("service_time_6");
        var service_time_7 = document.getElementById("service_time_7");
        service_time_1.value = JSON.stringify(servicetime_1);
        service_time_2.value = JSON.stringify(servicetime_2);
        service_time_3.value = JSON.stringify(servicetime_3);
        service_time_4.value = JSON.stringify(servicetime_4);
        service_time_5.value = JSON.stringify(servicetime_5);
        service_time_6.value = JSON.stringify(servicetime_6);
        service_time_7.value = JSON.stringify(servicetime_7);

        var ready = document.getElementById("ready");
        var ready = document.getElementById("ready");
        if(ready.value == 2)
        {
            if (confirm('請問是否暫停本服務?')) {
                // Save it!
                return true;
            } else {
                // Do nothing!
                return false;
            }
        }else
        {
            if($("#special_fee").val())
            {
                if (confirm('請再次確認本服務彩虹價格'+$("#special_fee").val()+'是否正確')) {
                    // Save it!
                    return true;
                } else {
                    // Do nothing!
                    return false;
                }
            }

        }

    }
    function changeway(obj)
    {
        var city_title = document.getElementById("city_title");
        var address = document.getElementById("address");
        var city = document.getElementById("city");
        var zone = document.getElementById("zone");
        if(obj.value == 1)
        {
            city_title.style.display = "none";
            address.style.display = "none";
            city.style.display = "none";
            zone.style.display = "none";
        }else
        {
            city_title.style.display = "block";
            address.style.display = "block";
            city.style.display = "block";
            zone.style.display = "block";
        }
    }

    function change_week_date(item)
    {
        for(var i=1; i<=7; i++)
        {
            var time_item = document.getElementById("week_"+i);
            if(i == item.value)
            {
                time_item.style.display = "block";
            }else
            {
                time_item.style.display = "none";
            }
        }
    }

</script>

<script type="text/javascript">
    $("#city").change(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Index/get_city'); ?>",
            data: { city: $("#city").val()},
            success: function(data) {
                var step1 = data.split("-");
                var area = step1[0].split(",");
                var id = step1[1].split(",");
                var zone = document.getElementById("zone");
                $('#zone').find('option').remove().end();
                var new_option;
                //alert(selected);
                for (var i=0;i<area.length;i++)
                {
                    new_option = new Option(area[i], id[i]);
                    zone.options.add(new_option);
                }
            }
        });
    });
</script>