<div class="popup-box chat-popup" id="qnimate">
    <div class="popup-head">
        <div class="popup-head-left pull-left">
            <div class="popup-head-right pull-right">
                <div class="btn-group">
                    <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                        <i class="fa fa-cog"></i></button>

                </div>

                <button data-widget="remove" id="removeClass" class="chat-header-button  " type="button"
                        style="allign:rightk"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="popup-messages mt-3">


            <div class="direct-chat-messages">


                <div class="chat-box-single-line">
                    <abbr class="timestamp">October 8th, 2015</abbr>
                </div>


                <!-- Message. Default to the left -->
                <div class="direct-chat-msg doted-border">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img alt="message user image"
                         src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg"
                         class="direct-chat-img"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                    </div>
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                    </div>
                    <div class="direct-chat-info clearfix">
<span class="direct-chat-img-reply-small pull-left">

</span>
                        <span class="direct-chat-reply-name">Singh</span>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->


                <!-- /.direct-chat-msg -->


            </div>


        </div>
        <div class="popup-messages-footer ">
            <form method="POST" action='/message/store/{{  $post->id }}'>
                <div class="row mt-3">
                    <div class="col-sm-9 ">
                        <textarea id="status_message" placeholder="Type a message..." name="message"></textarea>
                    </div>
                    <div class="col-sm-3">

                        <button class="btn-primary small mr-0" type="submit" id="messagebtn">Send</button>
                    </div>
                    <button class="bg_none"><i class="glyphicon glyphicon-camera"></i></button>
                    <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i></button>
                    <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i></button>
                </div>
            </form>
        </div>
    </div>


</div>
