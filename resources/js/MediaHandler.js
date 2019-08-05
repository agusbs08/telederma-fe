import { Stream } from "stream";
import { resolve } from "url";

export default class MediaHandler {
    getPermissions() {
        return new Promise((res, rej) => {
            navigator.getUserMedia = (navigator.getUserMedia || navigator.
                webGetUserMedia || navigator.mozGetUserMedia || navigator.
                msgGetUserMedia);
            
            if(navigator.getUserMedia) {
                navigator.getUserMedia({ video : true, audio : true })
                .then((stream) => {
                    res(stream);
                })
                .catch(err => {
                    throw new Error(`Unable to fetch stream ${err}`);
                });
            } else {
                navigator.mediaDevices.getUserMedia({ video : true, audio : true })
                .then((stream) => {
                    res(stream);
                })
                .catch(err => {
                    throw new Error(`Unable to fetch stream ${err}`);
                });
            }
        }) ;
    }
}