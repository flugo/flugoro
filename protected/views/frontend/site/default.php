<?php
/* @var $this SiteController */

/* set new Title to page */
$this->pageTitle = Yii::t("main", 'Bilete de avion') . " - " . Yii::app()->name;
/* st new Description */
$this->pageDescription = 'prima gegina';
$this->cssRun = array('styles-homepage');
$this->jsRun = array('default');

//  echo "<pre>";
//  print_r($search);
//  exit;
?>




<div id="section-content" class="clearfix">
    <div id="section-content-wrapper">
        <div id="content-sidebar-left">
            <div class="block-socialization-left">
                -Empty-
            </div>
        </div>


        <div id="content-main">
            <div class="main">
                <div class="main-block">
                    <div class="content-main-tabs">
                        <div class="tab-bilete">
                            <div class="gradient">
                                <div class="tab-text">
                                    <?php echo Yii::t("main", 'Bilete de avion'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-hoteluri">
                            <div class="gradient inactive">
                                <div class="tab-text">
                                    <?php echo Yii::t("main", 'Hoteluri'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="flights-search" >
                    
                        <input type="hidden"  name="code_from" value="<?php echo $search->code_from; ?>"/>
                        <input type="hidden"  name="code_to" value="<?php echo $search->code_to; ?>"/>
     
                        <input type="hidden"  name="date_from" value="<?php echo $search->date_from_d.'-'.$search->date_from_m.'-'.$search->date_from_y; ?>"/>
                        <input type="hidden"  name="date_to" value="<?php echo $search->date_to_d.'-'.$search->date_to_m.'-'.$search->date_to_y; ?>"/>
                        
                        <input type="hidden"  name="code_from_2" value="<?php echo $search->code_from_2; ?>"/>
                        <input type="hidden"  name="code_to_2" value="<?php echo $search->code_to_2; ?>"/>
                        
                        <input type="hidden"  name="code_from_3" value="<?php echo $search->code_from_3; ?>"/>
                        <input type="hidden"  name="code_to_3" value="<?php echo $search->code_to_3; ?>"/>
                        
                        <input type="hidden"  name="multicity" value="<?php echo $search->multicity; ?>"/>
                        
                        <input type="hidden"  name="one_way" value="<?php echo $search->one_way; ?>"/>
                        
                        <input type="hidden"  name="pref_class" value="<?php echo $search->pref_class; ?>"/>
                        <input type="hidden"  name="flights_group" value="<?php echo $search->flights_group; ?>"/>
                        
                        
                    <div id="content" class="content">
                        <div class="ticket-type-choice">							
                            <div class="ticket-radio first"><input class="radio-one-way" type="radio" name="ticket-type" value="one-way-ticket"> <?php echo Yii::t("main", 'Într-o direcţie'); ?></div>
                            <div class="ticket-radio second"><input class="return-t radio-return" type="radio" name="ticket-type" value="return-ticket"> <?php echo Yii::t("main", 'Dus - întors'); ?></div>	
                            <div class="ticket-radio third"><input class="multi-direction-type" type="radio" name="ticket-type" value="multi-ticket"> <?php echo Yii::t("main", 'Destinații multiple'); ?></div>							
                        </div>
                        <div class="one-direction">  
                            <div class="one-way-ticket ticket-type active-ticket">
                                <div class="ticket-field first">
                                    
                                    <input id="name_from" class="validate[required] ticket-to-field" type="text" name="name_from" value="<?php echo $search->name_from; ?>"></div>
                                <div id="date_from_1" class="calendar" data-default='<?php echo ($search->date_from_y.','.($search->date_from_m - 1).','.$search->date_from_d); ?>'></div>
                            </div>
                            <div class="return-ticket ticket-type">
                                <div class="ticket-field first"><input id="name_to" class="ticket-from-field" type="text" name="name_to" value="<?php echo $search->name_to; ?>"></div>
                                <div id="date_from_2" class="return-t calendar" data-default='<?php echo ($search->date_to_y.','.($search->date_to_m - 1).','.$search->date_to_d); ?>'></div>
                            </div>
                            <div class="disable-box"></div>
                        </div>
                        <div class="multi-direction">
                            <div class="direction-1 directions">
                                <div class="input-field">
                                 <input class="ticket-to-field" type="text" name="name_from" placeholder="<?php echo Yii::t("main", 'Din'); ?>">
                                </div>
                                <div class="input-field second">
                                 <input class="ticket-from-field" type="text" name="name_to" placeholder="<?php echo Yii::t("main", 'Spre'); ?>:">
                                 </div>
                                <div class="input-field">
                                  <input class="date-select" type="text" name="flight-date" placeholder="<?php echo Yii::t("main", 'Data'); ?>">
                                </div>
                            </div>
                            <div class="new-direction">
                                <div class="buttons-new-direction">
                                    <div class="in-button">
                                        <span class="text">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="remove-direction">
                                <div class="buttons-remove-direction">
                                    <div class="in-button">
                                        <span class="text">-</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="buttons-ticket">
                            <div class="buttons-select">
                                <div class="people-number">
                                    <div class="button-text">
                                        <span class="text"><?php echo Yii::t("main", 'Persoane'); ?>: 0</span><img src="images/button-arrow-grey.png">
                                    </div>
                                    <ul class="people-select button-select">
                                        <li>
                                            <div class="text">
                                                <div class="adulti category"><?php echo Yii::t("main", 'Adulti'); ?></div>
                                                <div class="age"><?php echo Yii::t("main", 'peste 24 ani'); ?></div>
                                            </div>
                                            <select class="adults">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </li>
                                        <li>
                                            <div class="text">
                                                <div class="adulti category"><?php echo Yii::t("main", 'Tineri'); ?></div>
                                                <div class="age"><?php echo Yii::t("main", '12 - 24 ani'); ?></div>
                                            </div>
                                            <select class="teenagers">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </li>
                                        <li>
                                            <div class="text">
                                                <div class="copii category"><?php echo Yii::t("main", 'Copii'); ?></div>
                                                <div class="age"><?php echo Yii::t("main", '2 - 12 ani'); ?></div>
                                            </div>
                                            <select class="kids">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </li>
                                        <li>
                                            <div class="text">
                                                <div class="bebelusi category"><?php echo Yii::t("main", 'Bebelusi'); ?></div>
                                                <div class="age"><?php echo Yii::t("main", 'pina la 2 ani'); ?></div>
                                            </div>
                                            <select class="toddlers">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ticket-class button-dropdown">
                                    <div class="button-text">
                                        <span class="text" tabindex="0"><?php echo Yii::t("main", 'Bussines'); ?></span>
                                        <img src="images/button-arrow-grey.png">
                                    </div>
                                    <ul class="class-select button-select">
                                        <li><?php echo Yii::t("main", 'Bussines'); ?></li>
                                        <li><?php echo Yii::t("main", 'Regular'); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="buttons-search-ticket red-button">
                                <div class="in-button">
                                    <span class="text"><?php echo Yii::t("main", 'Caută bilet'); ?></span><img src="images/search-button-arrow.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>    
                    <div class="hotel">
                        <div class="destination"><div class="title"><?php echo Yii::t("main", 'Destinatia'); ?></div><input type="text" class="destination" name="destination" placeholder="<?php echo Yii::t("main", 'adresa, hotel specific'); ?>"></div>
                        <span class="check-date"><span class="check-in-date"><div class="title"><?php echo Yii::t("main", 'Data de check-in'); ?></div><input class="check-ind-field" type="text" name="departure" placeholder="<?php echo Yii::t("main", 'Data plecării'); ?>:"></span>
                            <span class="check-out-date"><div class="title"><?php echo Yii::t("main", 'Data de check-out'); ?></div><input class="check-outd-field" type="text" name="departure" placeholder="<?php echo Yii::t("main", 'Data plecării'); ?>:"></span></span>
                        <div class="checkbox"><input class="checkbox" type="checkbox" name="date-unknown" value="date-unk"><?php echo Yii::t("main", 'Nu cunosc data specifica'); ?></div>
                        <div class="guest-data">
                            <div class="main-option">
                                <div>
                                    <span><?php echo Yii::t("main", 'Camere'); ?></span>
                                    <select class="rooms">
                                        <option selected>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>
                                <div>
                                    <span><?php echo Yii::t("main", 'Adulti'); ?></span>
                                    <input class="adults-main" type="text" value="1" disabled>
                                </div>
                                <div>
                                    <span><?php echo Yii::t("main", 'Copii'); ?></span>
                                    <input class="children-main" type="text" value="0" disabled>
                                </div>
                            </div>
                            <div class="rooms-quantity">
                                <div class="room room-1">
                                    <span class="room-nr"><?php echo Yii::t("main", 'Camere'); ?></span>
                                    <span class="adults">
                                        <select class="adults-s">
                                            <option selected>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </span>
                                    <span class="children">
                                        <select class="children-s">
                                            <option selected>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="buttons-search-ticket red-button">
                                <div class="in-button">
                                    <span class="text"><?php echo Yii::t("main", 'Caută'); ?></span><img src="images/search-button-arrow.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>						
            </div>
        </div>

        <!-- right -->
        <div id="content-sidebar-right">
            <div class="block-socialization-right">
                <div class="title">
                    -Get in touch-
                </div>
                <div class="block-socialization-right-icons">
                    <img class="facebook" src="images/socialization-icons/facebook.png">
                    <img class="google" src="images/socialization-icons/google.png">
                    <img class="twitter" src="images/socialization-icons/twitter.png">
                </div>
            </div>
            <div class="block-recent-search">
                <div class="title">
                    <?php echo Yii::t("main", 'Căutări recente'); ?>
                </div>
                <div class="recent-searches">
                    <?php $array = array();
                    $counter = 1;
                    foreach ($array as $i) {
                        ?>

                        <div class="searches search-<?php echo $counter; ?>">
                            <div class="search-description">
                                <div class="search-description-place">
                                    KIV <img class="arrow-left" src="images/search-arrow-left.png"><img class="arrow-right" src="images/search-arrow-right.png"> MIL
                                </div>
                                <div class="search-description-time">
                                    Jan09 - Jan 18
                                </div>
                            </div><div class="search-image-link"></div>
                        </div>
                    <?php  }  ?>
                      <div class="searches search-2">
                      <div class="search-description">
                      <div class="search-description-place">
                      KIV <img class="arrow-left" src="images/search-arrow-left.png"><img class="arrow-right" src="images/search-arrow-right.png"> MIL
                      </div>
                      <div class="search-description-time">
                      Jan09 - Jan 18
                      </div>
                      </div><div class="search-image-link"></div>
                      </div>
                      <div class="searches search-3">
                      <div class="search-description">
                      <div class="search-description-place">
                      KIV <img class="arrow-left" src="images/search-arrow-left.png"><img class="arrow-right" src="images/search-arrow-right.png"> MIL
                      </div>
                      <div class="search-description-time">
                      Jan09 - Jan 18
                      </div>
                      </div><div class="search-image-link"></div>
                      </div>
                      <div class="searches search-4">
                      <div class="search-description">
                      <div class="search-description-place">
                      KIV <img class="arrow-left" src="images/search-arrow-left.png"><img class="arrow-right" src="images/search-arrow-right.png"> MIL
                      </div>
                      <div class="search-description-time">
                      Jan09 - Jan 18
                      </div>
                      </div><div class="search-image-link"></div>
                      </div>
                      <?php /* */ ?>
                </div>
            </div>
        </div>
        <!-- end right -->
    </div>
</div>


