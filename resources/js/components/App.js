import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import MediaHandler from "../MediaHandler";
import Pusher from "pusher-js";
import Peer from "simple-peer";

const APP_KEY = 'd39c0affa9d55257c0c1';

export default class App extends Component {
    constructor() {
        super();

        this.state = {
            hasMedia: false,
            otherUserId: null
        };

        this.howCallUserId = null;
        this.user = window.user;
        this.user.stream = null;
        this.peers = {};

        this.mediaHandler = new MediaHandler();
        this.setupPusher();

        this.callTo = this.callTo.bind(this);
        this.setupPusher = this.setupPusher.bind(this);
        this.startPeer = this.startPeer.bind(this);
    }

    componentWillMount() {
        this.mediaHandler.getPermissions()
            .then((stream) => {
                this.setState({hasMedia: true});
                this.user.stream = stream;
                try {
                    this.myVideo.srcObject = stream;
                } catch (e) {
                    this.myVideo.src = URL.createObjectURL(stream);
                }

                this.myVideo.play();
            });
    }

    setupPusher() {
        this.pusher = new Pusher(APP_KEY, {
            authEndpoint: `/pusher/auth/${this.user.id}`,
            cluster: 'ap1',
            auth: {
                params: this.user.id,
                headers: {
                    'X-CSRF-Token': window.csrfToken
                }
            }
        });

        this.channel = this.pusher.subscribe('presence-video-channel');

        this.channel.bind(`client-signal-${this.user.id}`, (signal) => {
            console.log(this.howCallUserId);
            // if(this.howCallUserId === null){
            //     if(confirm(`Anda mendapat panggilan dari ${signal.howCallUserId}`)) {
            //         let peer = this.peers[signal.userId];

            //         if(peer === undefined) {
            //             this.setState({otherUserId: signal.userId});
            //             peer = this.startPeer(signal.userId, false);
            //         }
            //         peer.signal(signal.data);
            //         this.peers[signal.userId] = peer;
            //     } else {
            //         alert('Anda menolak panggilan');
            //     }
            //} else {
                let peer = this.peers[signal.userId];
                    if(peer === undefined) {
                        this.setState({otherUserId: signal.userId});
                        peer = this.startPeer(signal.userId, false);
                    }
                    peer.signal(signal.data);
                    this.peers[signal.userId] = peer;
            //}
            
        });
    }

    startPeer(userId, initiator = true) {
        const peer = new Peer({
            initiator,
            stream: this.user.stream,
            trickle: false
        });

        peer.on('signal', (data) => {
            console.log('on signal');
            const signal = {
                    type: 'signal',
                    userId: this.user.id,
                    userName: this.howCallUserId,
                    data: data
                };
            this.channel.trigger(`client-signal-${userId}`, signal);
        });

        peer.on('stream', (stream) => {
            console.log('on stream');
            try {
                this.userVideo.srcObject = stream;
            } catch (e) {
                this.userVideo.src = URL.createObjectURL(stream);
            }
            this.userVideo.play();
        });

        peer.on('close', () => {
            console.log('on close');
            let peer = this.peers[userId];
            try {
                if(peer !== undefined) {
                    peer.destroy();
                }
            } catch (error) {
                
            } finally {
                this.peers[userId] = undefined;
            }
        });

        return peer;
    }

    callTo(userId) {
        this.howCallUserId = userId;
        this.peers[userId] = this.startPeer(userId);
    }

    render() {
        return (
            <div className="App">

                {["kola","lala"].map((userId) => {
                    return this.user.id !== userId ? <button key={userId} onClick={() => this.callTo(userId)}>Call {userId}</button> : null;
                })}

                <div className="video-container">
                    <video className="my-video" ref={ (ref) => { this.myVideo = ref ; }}></video>
                    <video className="user-video" ref={ (ref) => { this.userVideo = ref ; }}></video>
                </div>
            </div>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}