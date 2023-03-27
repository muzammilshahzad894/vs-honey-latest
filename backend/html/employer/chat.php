<!doctype html>
<html>

<head>
    <title>Chat - V & S</title>
    <?php require_once('../includes/site-master.php'); ?>
    
</head>

<body id="home-page" class="home_add_page">
   
<?php require_once('../includes/header-loged.php'); ?>
<main common="" inbox="">


<div class="contain-fluid">
    <div class="barBlk relative">
        <div class="srch relative">
            <input type="text" class="txtBox" placeholder="Search contact">
            <button type="button"><img src="<?=$baseurl?>images/search.svg" alt=""></button>
        </div>
        <ul class="frnds scrollbar">
            <li data-chat="person1" class="active">
                <div class="inner sms">
                    <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                    <div class="txt">
                        <h5>Jennifer Kem</h5>
                        <p>Welcome to Ticket Graze</p>
                    </div>
                </div>
            </li>
            <li data-chat="person2">
                <div class="inner unread">
                    <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                    <div class="txt">
                        <h5>Chris Gale</h5>
                        <p>Could you describe please</p>
                    </div>
                </div>
            </li>
            <li data-chat="person3">
                <div class="inner sms">
                    <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                    <div class="txt">
                        <h5>Sofia Safinaz</h5>
                        <p>Great, Thank You!</p>
                    </div>
                </div>
            </li>
            <li data-chat="person4">
                <div class="inner">
                    <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                    <div class="txt">
                        <h5>John Wick</h5>
                        <p>The best Innovative Chatbox</p>
                    </div>
                </div>
            </li>
            <li data-chat="person5">
                <div class="inner unread">
                    <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                    <div class="txt">
                        <h5>Alina Gill</h5>
                        <p>Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor?</p>
                    </div>
                </div>
            </li>
            
        </ul>
    </div>
    <div class="chatBlk relative">
        <div class="chatPerson">
            <div class="backBtn"><a href="javascript:void(0)" class="fi-arrow-left"></a></div>
            <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
            <h6>Samantha James</h6>
        </div>
        <div class="chat scrollbar active" data-chat="person1">
            <div class="buble you">
                <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                <div class="txt">
                    <div class="time">11:59 am</div>
                    <div class="cntnt">Hello</div>
                </div>
            </div>
            <div class="buble me">
                <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                <div class="txt">
                    <div class="time">11:59 am</div>
                    <div class="cntnt">it's me.</div>
                </div>
            </div>
            <div class="buble you">
                <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                <div class="txt">
                    <div class="time">11:59 am</div>
                    <div class="cntnt">I was wondering...</div>
                </div>
            </div>
            <div class="buble you">
                <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                <div class="txt">
                    <div class="time">11:59 am</div>
                    <div class="cntnt">
                    Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor?
                    </div>
                </div>
            </div>
            <div class="buble me">
                <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                <div class="txt">
                    <div class="time">11:59 am</div>
                    <div class="cntnt">About who we used to be. </div>
                </div>
            </div>
            <div class="buble you">
                <div class="ico"><img src="<?=$baseurl?>images/1.png" alt=""></div>
                <div class="txt">
                    <div class="time">11:59 am</div>
                    <div class="cntnt">Hello, can you hear me? </div>
                </div>
            </div>
            <div class="buble you">
                <div class="ico"><img src="<?=$baseurl?>images/2.png" alt=""></div>
                <div class="txt">
                    <div class="time">11:59 am</div>
                    <div class="cntnt">I'm in California dreaming </div>
                </div>
            </div>
            
        </div>
        <div class="write">
            <!-- <div class="filesAtch">
                <span><i class="fi-cross-circle"></i> words <em></em></span>
                <span class="fail"><i class="fi-cross-circle"></i> words <em></em></span>
            </div> -->
            <form class="relative">
                <textarea class="txtBox" placeholder="Type a message" onkeypress="textAreaAdjust(this)"></textarea>
                <div class="btm">
                    <button type="button" class="webBtn smBtn labelBtn arrowBtn upBtn" title="Upload Files"><img src="<?=$baseurl?>images/clip.png" alt=""></button>
                    
                    <button type="submit" class="webBtn smBtn labelBtn icoBtn">Send <img src="<?=$baseurl?>images/message.png" alt=""></button>
                </div>
            </form>
        </div>
        
    </div>
</div>



</main>
    <?php require_once('../includes/commonjs.php'); ?>
</body>

</html>