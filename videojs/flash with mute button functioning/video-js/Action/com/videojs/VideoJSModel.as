package com.videojs
{
    import com.videojs.events.*;
    import com.videojs.structs.*;
    import flash.events.*;
    import flash.external.*;
    import flash.geom.*;
    import flash.media.*;
    import flash.net.*;
    import flash.utils.*;

    public class VideoJSModel extends EventDispatcher
    {
        private var _nc:NetConnection;
        private var _ns:NetStream;
        private var _ncRTMPRetryThreshold:int = 3;
        private var _ncRTMPCurrentRetry:int = 0;
        private var _rtmpRetryTimer:Timer;
        private var _masterVolume:SoundTransform;
        private var _currentPlaybackType:String;
        private var _videoReference:Video;
        private var _pauseOnStart:Boolean = false;
        private var _lastSetVolume:Number = 1;
        private var _loadCompleted:Boolean = false;
        private var _loadErrored:Boolean = false;
        private var _throughputTimer:Timer;
        private var _currentThroughput:int = 0;
        private var _loadStartTimestamp:int;
        private var _pausePending:Boolean = false;
        private var _canPlayThrough:Boolean = false;
        private var _stageRect:Rectangle;
        private var _jsEventProxyName:String = "";
        private var _jsErrorEventProxyName:String = "";
        private var _backgroundColor:Number = 0;
        private var _volume:Number = 1;
        private var _streamMetaData:Object;
        private var _rtmpConnectionURL:String = "";
        private var _rtmpStream:String = "";
        private var _loadStarted:Boolean = false;
        private var _isPlaying:Boolean = false;
        private var _isPaused:Boolean = true;
        private var _isBuffering:Boolean = false;
        private var _isSeeking:Boolean = false;
        private var _isLive:Boolean = false;
        private var _canSeekAhead:Boolean = false;
        private var _hasEnded:Boolean = false;
        private var _autoplay:Boolean = false;
        private var _preload:Boolean = false;
        private var _loop:Boolean = false;
        private var _src:String = "";
        private var _poster:String = "";
        private static var _instance:VideoJSModel;

        public function VideoJSModel(param1:SingletonLock)
        {
            if (!param1 is SingletonLock)
            {
                throw new Error("Invalid Singleton access.  Use VideoJSModel.getInstance()!");
            }
            this._streamMetaData = {};
            this._rtmpRetryTimer = new Timer(25, 1);
            this._rtmpRetryTimer.addEventListener(TimerEvent.TIMER, this.onRTMPRetryTimerTick);
            this._currentPlaybackType = PlaybackType.HTTP;
            this._masterVolume = new SoundTransform();
            this._stageRect = new Rectangle(0, 0, 100, 100);
            this._throughputTimer = new Timer(250, 0);
            this._throughputTimer.addEventListener(TimerEvent.TIMER, this.onThroughputTimerTick);
            return;
        }// end function

        public function get jsEventProxyName() : String
        {
            return this._jsEventProxyName;
        }// end function

        public function set jsEventProxyName(param1:String) : void
        {
            this._jsEventProxyName = param1;
            return;
        }// end function

        public function get jsErrorEventProxyName() : String
        {
            return this._jsErrorEventProxyName;
        }// end function

        public function set jsErrorEventProxyName(param1:String) : void
        {
            this._jsErrorEventProxyName = param1;
            return;
        }// end function

        public function get stageRect() : Rectangle
        {
            return this._stageRect;
        }// end function

        public function set stageRect(param1:Rectangle) : void
        {
            this._stageRect = param1;
            return;
        }// end function

        public function get backgroundColor() : Number
        {
            return this._backgroundColor;
        }// end function

        public function set backgroundColor(param1:Number) : void
        {
            if (param1 < 0)
            {
                this._backgroundColor = 0;
            }
            else
            {
                this._backgroundColor = param1;
                this.broadcastEvent(new VideoPlaybackEvent(VideoJSEvent.BACKGROUND_COLOR_SET, {}));
            }
            return;
        }// end function

        public function get videoReference() : Video
        {
            return this._videoReference;
        }// end function

        public function set videoReference(param1:Video) : void
        {
            this._videoReference = param1;
            return;
        }// end function

        public function get metadata() : Object
        {
            return this._streamMetaData;
        }// end function

        public function get volume() : Number
        {
            return this._volume;
        }// end function

        public function set volume(param1:Number) : void
        {
            if (param1 >= 0 && param1 <= 1)
            {
                this._volume = param1;
            }
            else
            {
                this._volume = 1;
            }
            this._masterVolume.volume = this._volume;
            SoundMixer.soundTransform = this._masterVolume;
            this._lastSetVolume = this._volume;
            this.broadcastEventExternally(ExternalEventName.ON_VOLUME_CHANGE, this._volume);
            return;
        }// end function

        public function get duration() : Number
        {
            if (this._streamMetaData != null && this._streamMetaData.duration != undefined)
            {
                return Number(this._streamMetaData.duration);
            }
            return 0;
        }// end function

        public function get autoplay() : Boolean
        {
            return this._autoplay;
        }// end function

        public function set autoplay(param1:Boolean) : void
        {
            this._autoplay = param1;
            return;
        }// end function

        public function get src() : String
        {
            return this._src;
        }// end function

        public function set src(param1:String) : void
        {
            this._src = param1;
            this._rtmpConnectionURL = "";
            this._rtmpStream = "";
            this._loadErrored = false;
            this._loadStarted = false;
            this._loadCompleted = false;
            this._currentPlaybackType = PlaybackType.HTTP;
            this.broadcastEventExternally(ExternalEventName.ON_SRC_CHANGE, this._src);
            if (this._autoplay)
            {
                this.play();
            }
            else if (this._preload)
            {
                this.load();
            }
            return;
        }// end function

        public function get rtmpConnectionURL() : String
        {
            return this._rtmpConnectionURL;
        }// end function

        public function set rtmpConnectionURL(param1:String) : void
        {
            this._rtmpConnectionURL = param1;
            return;
        }// end function

        public function get rtmpStream() : String
        {
            return this._rtmpStream;
        }// end function

        public function set rtmpStream(param1:String) : void
        {
            this._src = "";
            this._currentPlaybackType = PlaybackType.RTMP;
            this.broadcastEventExternally(ExternalEventName.ON_SRC_CHANGE, this._src);
            this._rtmpStream = param1;
            if (this._autoplay)
            {
                this.play();
            }
            return;
        }// end function

        public function set srcFromFlashvars(param1:String) : void
        {
            this._src = param1;
            this._loadErrored = false;
            this._loadStarted = false;
            this._loadCompleted = false;
            this._currentPlaybackType = PlaybackType.HTTP;
            if (this._autoplay)
            {
                this.play();
            }
            else if (this._preload)
            {
                this.load();
            }
            return;
        }// end function

        public function get poster() : String
        {
            return this._poster;
        }// end function

        public function set poster(param1:String) : void
        {
            this._poster = param1;
            this.broadcastEvent(new VideoJSEvent(VideoJSEvent.POSTER_SET));
            return;
        }// end function

        public function get hasEnded() : Boolean
        {
            return this._hasEnded;
        }// end function

        public function get time() : Number
        {
            if (this._ns != null)
            {
                return this._ns.time;
            }
            return 0;
        }// end function

        public function get muted() : Boolean
        {
            return this._volume == 0;
        }// end function

    	public function set muted(pValue:Boolean):void{
            if(pValue){
                var __lastSetVolume = _lastSetVolume;
                volume = 0;
                _lastSetVolume = __lastSetVolume;
            }
            else{
                volume = _lastSetVolume;
            }
        }}// end function

        public function get seeking() : Boolean
        {
            return this._isSeeking;
        }// end function

        public function get networkState() : int
        {
            if (!this._loadStarted)
            {
                return 0;
            }
            if (this._loadCompleted)
            {
                return 1;
            }
            if (this._loadErrored)
            {
                return 3;
            }
            return 2;
        }// end function

        public function get readyState() : int
        {
            if (this._streamMetaData != null && this._streamMetaData.duration != undefined)
            {
                if (this._isPlaying)
                {
                    if (this._canPlayThrough)
                    {
                        return 4;
                    }
                    if (this._ns.bufferLength >= this._ns.bufferTime)
                    {
                        return 3;
                    }
                    return 2;
                }
                else
                {
                    return 1;
                }
            }
            else
            {
                return 0;
            }
        }// end function

        public function get preload() : Boolean
        {
            return this._preload;
        }// end function

        public function set preload(param1:Boolean) : void
        {
            this._preload = param1;
            return;
        }// end function

        public function get loop() : Boolean
        {
            return this._loop;
        }// end function

        public function set loop(param1:Boolean) : void
        {
            this._loop = param1;
            return;
        }// end function

        public function get buffered() : Number
        {
            if (this.duration > 0)
            {
                if (this._currentPlaybackType == PlaybackType.HTTP)
                {
                    return this._ns.bytesLoaded / this._ns.bytesTotal * this.duration;
                }
                return this.duration;
            }
            else
            {
                return 0;
            }
        }// end function

        public function get bufferedBytesEnd() : int
        {
            if (this._loadStarted)
            {
                return this._ns.bytesLoaded;
            }
            return 0;
        }// end function

        public function get bytesTotal() : int
        {
            if (this._loadStarted)
            {
                return this._ns.bytesTotal;
            }
            return 0;
        }// end function

        public function get videoWidth() : int
        {
            if (this._videoReference != null)
            {
                return this._videoReference.videoWidth;
            }
            return 0;
        }// end function

        public function get videoHeight() : int
        {
            if (this._videoReference != null)
            {
                return this._videoReference.videoHeight;
            }
            return 0;
        }// end function

        public function get playing() : Boolean
        {
            return this._isPlaying;
        }// end function

        public function get paused() : Boolean
        {
            return this._isPaused;
        }// end function

        public function broadcastEvent(event:Event) : void
        {
            dispatchEvent(event);
            return;
        }// end function

        public function broadcastEventExternally(... args) : void
        {
            args = undefined;
            var _loc_3:Array = null;
            if (this._jsEventProxyName != "")
            {
                if (ExternalInterface.available)
                {
                    args = args as Array;
                    _loc_3 = [this._jsEventProxyName, ExternalInterface.objectID].concat(args);
                    ExternalInterface.call.apply(null, _loc_3);
                }
            }
            return;
        }// end function

        public function broadcastErrorEventExternally(... args) : void
        {
            args = undefined;
            var _loc_3:Array = null;
            if (this._jsErrorEventProxyName != "")
            {
                if (ExternalInterface.available)
                {
                    args = args as Array;
                    _loc_3 = [this._jsErrorEventProxyName, ExternalInterface.objectID].concat(args);
                    ExternalInterface.call.apply(null, _loc_3);
                }
            }
            return;
        }// end function

        public function load() : void
        {
            this._pauseOnStart = true;
            this._isPlaying = false;
            this._isPaused = true;
            this.initNetConnection();
            return;
        }// end function

        public function play() : void
        {
            if (!this._loadStarted)
            {
                this._pauseOnStart = false;
                this._isPlaying = false;
                this._isPaused = false;
                this._streamMetaData = {};
                this.initNetConnection();
            }
            else
            {
                ExternalInterface.call("console.log", "Trying to resume!");
                this._pausePending = false;
                this._ns.resume();
                this._isPaused = false;
                this.broadcastEventExternally(ExternalEventName.ON_RESUME);
                this.broadcastEventExternally(ExternalEventName.ON_START);
                this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_STREAM_START, {}));
            }
            return;
        }// end function

        public function pause() : void
        {
            if (this._isPlaying && !this._isPaused)
            {
                this._ns.pause();
                this._isPaused = true;
                this.broadcastEventExternally(ExternalEventName.ON_PAUSE);
                if (this._isBuffering)
                {
                    this._pausePending = true;
                }
            }
            return;
        }// end function

        public function resume() : void
        {
            if (this._isPlaying && this._isPaused)
            {
                this._ns.resume();
                this._isPaused = false;
                this.broadcastEventExternally(ExternalEventName.ON_RESUME);
                this.broadcastEventExternally(ExternalEventName.ON_START);
            }
            return;
        }// end function

        public function seekBySeconds(param1:Number) : void
        {
            if (this._isPlaying)
            {
                this._isSeeking = true;
                this._throughputTimer.stop();
                this._ns.seek(param1);
                this._isBuffering = true;
            }
            else if (this._hasEnded)
            {
                this._ns.seek(param1);
                this._isPlaying = true;
                this._hasEnded = false;
                this._isBuffering = true;
            }
            return;
        }// end function

        public function seekByPercent(param1:Number) : void
        {
            if (this._isPlaying && this._streamMetaData.duration != undefined)
            {
                this._isSeeking = true;
                if (param1 < 0)
                {
                    this._ns.seek(0);
                }
                else if (param1 > 1)
                {
                    this._throughputTimer.stop();
                    this._ns.seek(param1 / 100 * this._streamMetaData.duration);
                }
                else
                {
                    this._throughputTimer.stop();
                    this._ns.seek(param1 * this._streamMetaData.duration);
                }
            }
            return;
        }// end function

        public function stop() : void
        {
            return;
        }// end function

        public function hexToNumber(param1:String) : Number
        {
            var _loc_2:Number = 0;
            if (param1.indexOf("#") != -1)
            {
                param1 = param1.slice((param1.indexOf("#") + 1));
            }
            if (param1.length == 6)
            {
                _loc_2 = Number("0x" + param1);
            }
            return _loc_2;
        }// end function

        public function humanToBoolean(param1) : Boolean
        {
            if (String(param1) == "true" || String(param1) == "1")
            {
                return true;
            }
            return false;
        }// end function

        private function initNetConnection() : void
        {
            if (this._nc == null)
            {
                this._nc = new NetConnection();
                this._nc.client = this;
                this._nc.addEventListener(NetStatusEvent.NET_STATUS, this.onNetConnectionStatus);
            }
            if (this._currentPlaybackType == PlaybackType.HTTP)
            {
                this._nc.connect(null);
            }
            else if (this._currentPlaybackType == PlaybackType.RTMP)
            {
                if (this._rtmpConnectionURL != "")
                {
                    this._nc.connect(this._rtmpConnectionURL);
                }
            }
            return;
        }// end function

        private function initNetStream() : void
        {
            if (this._ns != null)
            {
                this._ns.removeEventListener(NetStatusEvent.NET_STATUS, this.onNetStreamStatus);
                this._ns = null;
            }
            this._ns = new NetStream(this._nc);
            this._ns.addEventListener(NetStatusEvent.NET_STATUS, this.onNetStreamStatus);
            this._ns.client = this;
            this._ns.bufferTime = 0.5;
            if (this._currentPlaybackType == PlaybackType.HTTP)
            {
                this._ns.play(this._src);
            }
            else if (this._currentPlaybackType == PlaybackType.RTMP)
            {
                this._ns.play(this._rtmpStream);
            }
            this._videoReference.attachNetStream(this._ns);
            dispatchEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_STREAM_READY, {ns:this._ns}));
            return;
        }// end function

        private function calculateThroughput() : void
        {
            var _loc_1:Number = NaN;
            if (this._ns.bytesLoaded == this._ns.bytesTotal)
            {
                this._canPlayThrough = true;
                this._loadCompleted = true;
                this._throughputTimer.stop();
                this._throughputTimer.reset();
                this.broadcastEventExternally(ExternalEventName.ON_CAN_PLAY_THROUGH);
            }
            else if (this._ns.bytesTotal > 0 && this._streamMetaData != null && this._streamMetaData.duration != undefined)
            {
                this._currentThroughput = this._ns.bytesLoaded / ((getTimer() - this._loadStartTimestamp) / 1000);
                _loc_1 = (this._ns.bytesTotal - this._ns.bytesLoaded) * this._currentThroughput;
                if (_loc_1 <= this._streamMetaData.duration)
                {
                    this._throughputTimer.stop();
                    this._throughputTimer.reset();
                    this._canPlayThrough = true;
                    this.broadcastEventExternally(ExternalEventName.ON_CAN_PLAY_THROUGH);
                }
            }
            return;
        }// end function

        private function onRTMPRetryTimerTick(event:TimerEvent) : void
        {
            this.initNetConnection();
            return;
        }// end function

        private function onNetConnectionStatus(event:NetStatusEvent) : void
        {
            switch(event.info.code)
            {
                case "NetConnection.Connect.Success":
                {
                    if (this._currentPlaybackType == PlaybackType.RTMP)
                    {
                        this.broadcastEventExternally(ExternalEventName.ON_RTMP_CONNECT_SUCCESS);
                    }
                    this.initNetStream();
                    break;
                }
                case "NetConnection.Connect.Failed":
                {
                    if (this._ncRTMPCurrentRetry < this._ncRTMPRetryThreshold)
                    {
                        var _loc_2:String = this;
                        var _loc_3:* = this._ncRTMPCurrentRetry + 1;
                        _loc_2._ncRTMPCurrentRetry = _loc_3;
                        this.broadcastErrorEventExternally(ExternalErrorEventName.RTMP_CONNECT_FAILURE);
                        this._rtmpRetryTimer.start();
                        this.broadcastEventExternally(ExternalEventName.ON_RTMP_RETRY);
                    }
                    break;
                }
                default:
                {
                    break;
                }
            }
            this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_NETCONNECTION_STATUS, {info:event.info}));
            return;
        }// end function

        private function onNetStreamStatus(event:NetStatusEvent) : void
        {
            switch(event.info.code)
            {
                case "NetStream.Play.Start":
                {
                    this._streamMetaData = null;
                    this._canPlayThrough = false;
                    this._hasEnded = false;
                    this._isBuffering = true;
                    this._currentThroughput = 0;
                    this._loadStartTimestamp = getTimer();
                    this._throughputTimer.reset();
                    this._throughputTimer.start();
                    this.broadcastEventExternally(ExternalEventName.ON_LOAD_START);
                    this.broadcastEventExternally(ExternalEventName.ON_BUFFER_EMPTY);
                    if (this._pauseOnStart && this._loadStarted == false)
                    {
                        this._ns.pause();
                        this._isPaused = true;
                    }
                    else
                    {
                        this.broadcastEventExternally(ExternalEventName.ON_START);
                        this.broadcastEventExternally(ExternalEventName.ON_RESUME);
                        this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_STREAM_START, {info:event.info}));
                    }
                    this._loadStarted = true;
                    break;
                }
                case "NetStream.Buffer.Full":
                {
                    this._isBuffering = false;
                    this._isPlaying = true;
                    this.broadcastEventExternally(ExternalEventName.ON_BUFFER_FULL);
                    this.broadcastEventExternally(ExternalEventName.ON_CAN_PLAY);
                    if (this._pausePending)
                    {
                        this._pausePending = false;
                        this._ns.pause();
                        this._isPaused = true;
                    }
                    break;
                }
                case "NetStream.Buffer.Empty":
                {
                    this._isBuffering = true;
                    this.broadcastEventExternally(ExternalEventName.ON_BUFFER_EMPTY);
                    break;
                }
                case "NetStream.Play.Stop":
                {
                    if (!this._loop)
                    {
                        this._isPlaying = false;
                        this._hasEnded = true;
                        this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_STREAM_CLOSE, {info:event.info}));
                        this.broadcastEventExternally(ExternalEventName.ON_PLAYBACK_COMPLETE);
                    }
                    else
                    {
                        this._ns.seek(0);
                    }
                    this._throughputTimer.stop();
                    this._throughputTimer.reset();
                    break;
                }
                case "NetStream.Seek.Notify":
                {
                    this._isPlaying = true;
                    this._isSeeking = false;
                    this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_STREAM_SEEK_COMPLETE, {info:event.info}));
                    this.broadcastEventExternally(ExternalEventName.ON_SEEK_COMPLETE);
                    this.broadcastEventExternally(ExternalEventName.ON_BUFFER_EMPTY);
                    this._currentThroughput = 0;
                    this._loadStartTimestamp = getTimer();
                    this._throughputTimer.reset();
                    this._throughputTimer.start();
                    break;
                }
                case "NetStream.Play.StreamNotFound":
                {
                    this._loadErrored = true;
                    this.broadcastErrorEventExternally(ExternalErrorEventName.SRC_404);
                    break;
                }
                default:
                {
                    break;
                }
            }
            this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_NETSTREAM_STATUS, {info:event.info}));
            return;
        }// end function

        private function onThroughputTimerTick(event:TimerEvent) : void
        {
            this.calculateThroughput();
            return;
        }// end function

        public function onMetaData(param1:Object) : void
        {
            this._streamMetaData = param1;
            if (param1.duration != undefined)
            {
                this._isLive = false;
                this._canSeekAhead = true;
                this.broadcastEventExternally(ExternalEventName.ON_DURATION_CHANGE, this._streamMetaData.duration);
            }
            else
            {
                this._isLive = true;
                this._canSeekAhead = false;
            }
            this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_META_DATA, {metadata:param1}));
            this.broadcastEventExternally(ExternalEventName.ON_METADATA, this._streamMetaData);
            return;
        }// end function

        public function onCuePoint(param1:Object) : void
        {
            this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_CUE_POINT, {cuepoint:param1}));
            return;
        }// end function

        public function onXMPData(param1:Object) : void
        {
            this.broadcastEvent(new VideoPlaybackEvent(VideoPlaybackEvent.ON_XMP_DATA, {cuepoint:param1}));
            return;
        }// end function

        public function onPlayStatus(param1:Object) : void
        {
            return;
        }// end function

        public static function getInstance() : VideoJSModel
        {
            if (_instance === null)
            {
                _instance = new VideoJSModel(new SingletonLock());
            }
            return _instance;
        }// end function

    }
}
