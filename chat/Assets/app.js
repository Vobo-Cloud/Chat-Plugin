$(function () {

    let snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");


    function beep() {
        snd.play();
    }


    const pleaseWait = () => {

        swal("PROCESSING", "Please Wait","/assets/images/ajax-loader.gif", {
            buttons: {},
            closeOnClickOutside:false,
            closeOnEsc:false,
            showLoaderOnConfirm:true
        })

    };

    
    function getChatHistory() {

        $.ajax({
            type: "POST",
            url: "/ajax/plugin/chat/history",
            data: $(".chatFormPlugin").serialize(),
            dataType: "json",
            success: function (response) {


                if(response.status === "success" ){

                    $(".lastId").val(response.data.lastMessageId);

                    $(".msg_history").html("");
                    $.each(response.data.result, function (a,b) {

                        if(b.type === "sender"){

                            $(".msg_history").append('<div data-id="2" class="chatId outgoing_msg"> <div class="sent_msg"> <p>'+b.v_message+'</p> <span class="time_date">'+b.v_time+'</span></div> </div>');

                        }

                        if(b.type === "receiver"){

                            $(".msg_history").append('<div data-id="1" class=" chatId incoming_msg"> <div class="received_msg"> <div class="received_withd_msg"> <p>'+b.v_message+'</p> <span class="time_date">'+b.v_time+'</span></div> </div> </div>');

                        }

                    });


                    if(response.data.result === undefined){

                        $(".msg_history").html('<div class=" notFoundMessage noti  mt-4 mt-lg-0 mb-0"> <div class="card-body"> <div class="text-center"> <div class="icons-xl uim-icon-warning my-4"> <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-tertiary" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" class="uim-primary"></circle><path class="uim-primary" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span> </div> <h4 class="alert-heading font-size-20">MESSAGE NOT FOUND</h4> <p class="text-muted">Write something to start the conversation</p> </div> </div> </div>');

                    }

                    $(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);

                    swal.close();

                }else{
                    $(".lastId").val("0");
                }

            }
        });

    }

    function loadFriendShip() {

        $.ajax({
            type: "POST",
            url: "/ajax/plugin/chat/check",
            data: {},
            dataType: "json",
            success: function (response) {

                if(response.status === "success"){

                    $(".inbox_chat").html("");

                    $.each(response.data.result, function (a,b) {

                        $(".inbox_chat").append('<div data-uuid="'+b.v_uuid+'" class="chat_list "> <div class="chat_people"> <div class="chat_ib"> <h5> '+b.fullName+'  '+(b.v_notify === "active" ? " <span style='margin-left: 5px;' class='badge badge-pill badge-primary'>New Message</span>" : "") + '  <span data-chatstatus="'+b.v_uuid+'" class="chat_date"> '+(b.v_online === "active" ? "<span class='badge badge-pill badge-success'>Online</span>" : "<span class='badge badge-pill badge-danger'>Offline</span>")+' </span></h5> </div> </div> </div>');

                    });

                    if(response.data.newMessage !== 0){

                        if(window.location.search !== "?page=chat@screen"){
                            beep();
                            swal("NEW NOTICE", "New message received","info", {
                                buttons: {
                                    cancel: {
                                        text: "Close",
                                        value: false,
                                        visible: true
                                    },
                                    yes: {
                                        text: "Show Messages",
                                        value: true
                                    }
                                }
                            }).then((x)=>{
                                if(x){

                                    location.href ="/app/plugin?page=chat@screen";

                                }
                            });

                        }

                    }



                }

            }
        });

    }


    function getChatHistoryId() {

        if($(".lastId").val() === undefined)
            return false;

        if($(".lastId").val() === "")
            return false;

        $.ajax({
            type: "POST",
            url: "/ajax/plugin/chat/history/id",
            data: $(".chatFormPlugin").serialize(),
            dataType: "json",
            success: function (response) {


                if(response.status === "success" ){

                    $(".lastId").val(response.data.lastMessageId);



                    $.each(response.data.result, function (a,b) {

                        if(b.type === "sender"){

                            $(".msg_history").append('<div data-id="2" class="chatId outgoing_msg"> <div class="sent_msg"> <p>'+b.v_message+'</p> <span class="time_date">'+b.v_time+'</span></div> </div>');

                        }

                        if(b.type === "receiver"){

                            $(".msg_history").append('<div data-id="1" class=" chatId incoming_msg"> <div class="received_msg"> <div class="received_withd_msg"> <p>'+b.v_message+'</p> <span class="time_date">'+b.v_time+'</span></div> </div> </div>');

                        }

                    });


                    if(response.data.result !== undefined){

                        if(response.data.result.length > 0){

                            getChatHistorySeen();

                            $(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);

                        }
                    }

                }else{
                    $(".lastId").val("0");
                }




            }
        });

    }


    function getChatHistorySeen() {

        $.ajax({
            type: "POST",
            url: "/ajax/plugin/chat/history/seen",
            data: $(".chatFormPlugin").serialize(),
            dataType: "json",
            success: function (response) {

                if(response.status === "success" ){ }else{}

            }
        });

    }


    setInterval(function () {

        $("[data-chatstatus]").each(function (a,b) {

            if(JSON.parse(localStorage.getItem("onlineList")).data[$(b).data("chatstatus")] !== undefined){

                $("[data-chatstatus="+$(b).data("chatstatus")+"]").html("<span class='badge badge-pill badge-success'>AKTİF</span>");

            }else{
                $("[data-chatstatus="+$(b).data("chatstatus")+"]").html("<span class='badge badge-pill badge-danger'>PASİF</span>");
            }

        })

    },500);



    $(document).on("click",".chat_list",function () {


        if(!$(this).hasClass("active_chat")){

            let getUserId = $(this).data("uuid");

            pleaseWait();

            $(".mesgs").show();

            $(".receiver").val(getUserId);

            $(".chat_list").removeClass("active_chat");

            $(this).addClass("active_chat");


            getChatHistory();
            getChatHistorySeen();

        }





    });


    $(".chatFormPlugin").submit(function () {

        let getReceiver = $(".receiver").val();

        $.ajax({
            type: "POST",
            url: "/ajax/plugin/chat/send",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {

                if(response.status === "success"){

                    $(".notFoundMessage").hide();

                    getChatHistoryId();

                    if(response.data.lastId === "first"){
                        getChatHistory();
                    }else{
                        $(".lastId").val(response.data.lastId);
                    }

                    $(".write_msg").val("");
                }

            }
        });

    });

    setInterval(getChatHistoryId,2500);


    loadFriendShip();
    setInterval(loadFriendShip,5000);


    $(".clearChatHistory").click(function () {

        swal("İŞLEM ONAYI","Konuşma geçmişini temizlemek istiyor musunuz?","info", {
            buttons: {
                cancel: {
                    text: "Hayır",
                    value: false,
                    visible: true
                },
                yes: {
                    text: "Evet",
                    value: true
                }
            }
        }).then((x)=>{
            if(x){

                $.ajax({
                    type: "POST",
                    url: "/ajax/plugin/chat/history/clear",
                    data: {},
                    dataType: "json",
                    success: function (response) {

                        swal(response.title,response.message,response.status, {
                            buttons: {
                                cancel: {
                                    text: "Tamam",
                                    value: false,
                                    visible: true
                                }
                            }
                        });

                    }
                });
            }
        });


    });


    setInterval(function () {

        if($(".receiver").val() !== ""){

            $(".chat_list[data-uuid="+$(".receiver").val()+"]").addClass("active_chat");

        }

    },200);

});