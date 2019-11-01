var video = document.getElementById("selfview");

console.log(user_id);

var pusher = new Pusher("ed6c4e67e5c5bf35c1ef", {
    cluster: "ap1",
    encrypted: true,
    authEndpoint: `/pusher/auth/${user_id}/${user_id}`,
    auth: {
        params: user_id,
        headers: {
            "X-CSRF-Token": window.csrfToken
        }
    }
});

var usersOnline,
    id,
    users = [],
    sessionDesc,
    currentcaller,
    room,
    caller,
    localUserMedia;

function start() {
    getCam().then(stream => {
        try {
            document.getElementById("selfview").srcObject = stream;
            localUserMedia = stream;
        } catch (err) {
            document.getElementById("selfview").src = URL.createObjectURL(
                stream
            );
            localUserMedia = stream;
        }
    });
}

start();
const channel = pusher.subscribe("presence-videocall");

channel.bind("pusher:subscription_succeeded", members => {
    //set the member count
    usersOnline = members.count;
    id = channel.members.me.id;
    try {
        console.log(channel.members.me.info.name);
    } catch (err) {
        console.log("Syalalal");
    }
    // document.getElementById("myid").innerHTML = `ID anda adalah ${id}`;
    members.each(member => {
        if (member.id != channel.members.me.id) {
            users.push(member.id);
        }
    });

    render();
});

channel.bind("pusher:member_added", member => {
    users.push(member.id);
    render();
});

channel.bind("pusher:member_removed", member => {
    // for remove member from list:
    var index = users.indexOf(member.id);
    users.splice(index, 1);
    if (member.id == room) {
        endCall();
    }
    render();
});

function render() {
    var list = "";
    users.forEach(function(user) {
        list +=
            `<li class="list-group-item">` +
            `<div class="widget-content p-0">` +
            `<div class="widget-content-wrapper">` +
            `<div class="widget-content-left mr-3">` +
            `<img width="42" class="rounded-circle" src="http://192.168.8.100:8000/images/avatars/1.jpg" alt="">` +
            `</div>` +
            `<div class="widget-content-left">` +
            `<div class="widget-heading">${user}</div>` +
            `</div>` +
            `<div class="widget-content-right">` +
            `<div role="group" class="btn-group-sm btn-group">` +
            `<button class="btn-wide mb-2 mr-2 btn-icon btn btn-success btn-lg" style="float:right;"  onclick="callUser('${user}')" id="makeCall">` +
            `<i class="pe-7s-call btn-icon-wrapper"> </i> Hubungi</button>` +
            `</div>` +
            `</div>` +
            `</div>` +
            `</div>` +
            `</li>`;
    });
    document.getElementById("users").innerHTML = list;
}

//To iron over browser implementation anomalies like prefixes
GetRTCPeerConnection();
GetRTCSessionDescription();
GetRTCIceCandidate();
prepareCaller();
function prepareCaller() {
    var pCConfig = {
        iceServers: [{ urls: "stun:stun.l.google.com:19302" }]
    };
    //Initializing a peer connection
    caller = new window.RTCPeerConnection();
    //Listen for ICE Candidates and send them to remote peers
    caller.onicecandidate = function(evt) {
        if (!evt.candidate) return;
        console.log("onicecandidate called");
        onIceCandidate(caller, evt);
    };
    //onaddstream handler to receive remote feed and show in remoteview video element
    caller.onaddstream = function(evt) {
        toggleEndCallButton("block");
        console.log("onaddstream called");
        try {
            document.getElementById("remoteview").srcObject = evt.stream;
        } catch (err) {
            document.getElementById("remoteview").src = URL.createObjectURL(
                evt.stream
            );
        }
    };
}
function getCam() {
    //Get local audio/video feed and show it in selfview video element
    return navigator.mediaDevices.getUserMedia({
        video: true,
        audio: true
    });
}

function GetRTCIceCandidate() {
    window.RTCIceCandidate =
        window.RTCIceCandidate ||
        window.webkitRTCIceCandidate ||
        window.mozRTCIceCandidate ||
        window.msRTCIceCandidate;

    return window.RTCIceCandidate;
}

function GetRTCPeerConnection() {
    window.RTCPeerConnection =
        window.RTCPeerConnection ||
        window.webkitRTCPeerConnection ||
        window.mozRTCPeerConnection ||
        window.msRTCPeerConnection;
    return window.RTCPeerConnection;
}

function GetRTCSessionDescription() {
    window.RTCSessionDescription =
        window.RTCSessionDescription ||
        window.webkitRTCSessionDescription ||
        window.mozRTCSessionDescription ||
        window.msRTCSessionDescription;
    return window.RTCSessionDescription;
}

//Create and send offer to remote peer on button click
function callUser(user) {
    //   getCam()
    //     .then(stream => {
    //       try {
    //         document.getElementById("selfview").src = window.URL.createObjectURL(
    //           stream
    //         );
    //       } catch(err) {
    //         document.getElementById("selfview").src = stream;
    //       }

    //     })
    //     .catch(error => {
    //       console.log("an error occured", error);
    //     });
    caller.addStream(localUserMedia);
    caller.createOffer().then(function(desc) {
        caller.setLocalDescription(new RTCSessionDescription(desc));
        channel.trigger("client-sdp", {
            sdp: desc,
            room: user,
            from: id
        });
        room = user;
    });
}

function endCall() {
    room = undefined;
    caller.close();
    for (let track of localUserMedia.getTracks()) {
        track.stop();
    }
    prepareCaller();
    toggleEndCallButton("none");
}

function endCurrentCall() {
    channel.trigger("client-endcall", {
        room: room
    });

    endCall();
}

//Send the ICE Candidate to the remote peer
function onIceCandidate(peer, evt) {
    if (evt.candidate) {
        channel.trigger("client-candidate", {
            candidate: evt.candidate,
            room: room
        });
    }
}

function toggleEndCallButton() {
    if (document.getElementById("endCall").style.display == "block") {
        document.getElementById("endCall").style.display = "none";
    } else {
        document.getElementById("endCall").style.display = "block";
    }
}

function toggleEndCallButton(action) {
    document.getElementById("endCall").style.display = action;
}

//Listening for the candidate message from a peer sent from onicecandidate handler
channel.bind("client-candidate", function(msg) {
    if (msg.room == room) {
        console.log("candidate received");
        caller.addIceCandidate(new RTCIceCandidate(msg.candidate));
    }
});

//Listening for Session Description Protocol message with session details from remote peer
channel.bind("client-sdp", function(msg) {
    if (msg.room == id) {
        console.log("sdp received");
        // var answer = confirm(
        //     "You have a call from: " + msg.from + "Would you like to answer?"
        // );
        // if (!answer) {
        //     return channel.trigger("client-reject", { room: msg.room, rejected: id });
        // }
        room = msg.room;
        var sessionDesc = new RTCSessionDescription(msg.sdp);
        caller.addStream(localUserMedia);
        caller.setRemoteDescription(sessionDesc);

        caller.createAnswer().then(function(sdp) {
            caller.setLocalDescription(new RTCSessionDescription(sdp));
            channel.trigger("client-answer", {
                sdp: sdp,
                room: room
            });
        });
        // getCam()
        //   .then(stream => {
        //     localUserMedia = stream;
        //     toggleEndCallButton();
        //     try {
        //         document.getElementById("selfview").srcObject = stream;
        //     } catch(err) {
        //       document.getElementById("selfview").src = URL.createObjectURL(
        //         stream
        //       );
        //     }
        //     caller.addStream(stream);
        //     var sessionDesc = new RTCSessionDescription(msg.sdp);
        //     caller.setRemoteDescription(sessionDesc);
        //     caller.createAnswer().then(function(sdp) {
        //       caller.setLocalDescription(new RTCSessionDescription(sdp));
        //       channel.trigger("client-answer", {
        //         sdp: sdp,
        //         room: room
        //       });
        //     });
        //   })
        //   .catch(error => {
        //     console.log("an error occured", error);
        //   });
    }
});

//Listening for answer to offer sent to remote peer
channel.bind("client-answer", function(answer) {
    if (answer.room == room) {
        console.log("answer received");
        caller.setRemoteDescription(new RTCSessionDescription(answer.sdp));
    }
});

channel.bind("client-reject", function(answer) {
    if (answer.room == room) {
        console.log("Call declined");
        alert(
            "Panggilan ke " +
                answer.rejected +
                " ditolak! Coba beberapa saat lagi!"
        );
        endCall();
    }
});

channel.bind("client-endcall", function(answer) {
    if (answer.room == room) {
        console.log("Call Ended");
        endCall();
    }
});
