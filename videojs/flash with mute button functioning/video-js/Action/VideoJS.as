package 
{
    import com.videojs.*;
    import com.videojs.events.*;
    import com.videojs.structs.*;
    import flash.display.*;
    import flash.events.*;
    import flash.external.*;
    import flash.geom.*;
    import flash.system.*;
    import flash.ui.*;
    import flash.utils.*;

    public class VideoJS extends Sprite
    {
        private var _app:VideoJSApp;
        private var _stageSizeTimer:Timer;

        public function VideoJS()
        {
            this._stageSizeTimer = new Timer(250);
            this._stageSizeTimer.addEventListener(TimerEvent.TIMER, this.onStageSizeTimerTick);
            addEventListener(Event.ADDED_TO_STAGE, this.onAddedToStage);
            return;
        }// end function

        private function init() : void
        {
            Security.allowDomain("*");
            Security.allowInsecureDomain("*");
            if (loaderInfo.hasOwnProperty("uncaughtErrorEvents"))
            {
            }
            if (ExternalInterface.available)
            {
                this.registerExternalMethods();
            }
            this._app = new VideoJSApp();
            addChild(this._app);
            this._app.model.stageRect = new Rectangle(0, 0, stage.stageWidth, stage.stageHeight);
            var _loc_1:* = new ContextMenuItem("VideoJS Flash Component v3.0", false, false);
            var _loc_2:* = new ContextMenuItem("Copyright © 2012 Zencoder, Inc.", false, false);
            var _loc_3:* = new ContextMenu();
            _loc_3.hideBuiltInItems();
            _loc_3.customItems.push(_loc_1, _loc_2);
            this.contextMenu = _loc_3;
            return;
        }// end function

        private function registerExternalMethods() : void
        {
            try
            {
                ExternalInterface.addCallback("vjs_echo", this.onEchoCalled);
                ExternalInterface.addCallback("vjs_getProperty", this.onGetPropertyCalled);
                ExternalInterface.addCallback("vjs_setProperty", this.onSetPropertyCalled);
                ExternalInterface.addCallback("vjs_autoplay", this.onAutoplayCalled);
                ExternalInterface.addCallback("vjs_src", this.onSrcCalled);
                ExternalInterface.addCallback("vjs_load", this.onLoadCalled);
                ExternalInterface.addCallback("vjs_play", this.onPlayCalled);
                ExternalInterface.addCallback("vjs_pause", this.onPauseCalled);
                ExternalInterface.addCallback("vjs_resume", this.onResumeCalled);
                ExternalInterface.addCallback("vjs_stop", this.onStopCalled);
            }
            catch (e:SecurityError)
            {
                if (loaderInfo.parameters.debug != undefined && loaderInfo.parameters.debug == "true")
                {
                    throw new SecurityError(e.message);
                }
                ;
            }
            catch (e:Error)
            {
                if (loaderInfo.parameters.debug != undefined && loaderInfo.parameters.debug == "true")
                {
                    throw new Error(e.message);
                }
            }
            finally
            {
            }
            setTimeout(this.finish, 50);
            return;
        }// end function

        private function finish() : void
        {
            if (loaderInfo.parameters.eventProxyFunction != undefined)
            {
                this._app.model.jsEventProxyName = loaderInfo.parameters.eventProxyFunction;
            }
            if (loaderInfo.parameters.errorEventProxyFunction != undefined)
            {
                this._app.model.jsErrorEventProxyName = loaderInfo.parameters.errorEventProxyFunction;
            }
            if (loaderInfo.parameters.autoplay != undefined && loaderInfo.parameters.autoplay == "true")
            {
                this._app.model.autoplay = true;
            }
            if (loaderInfo.parameters.preload != undefined && loaderInfo.parameters.preload == "true")
            {
                this._app.model.preload = true;
            }
            if (loaderInfo.parameters.poster != undefined && loaderInfo.parameters.poster != "")
            {
                this._app.model.poster = String(loaderInfo.parameters.poster);
            }
            if (loaderInfo.parameters.src != undefined && loaderInfo.parameters.src != "")
            {
                this._app.model.srcFromFlashvars = String(loaderInfo.parameters.src);
            }
            else
            {
                if (loaderInfo.parameters.RTMPConnection != undefined && loaderInfo.parameters.RTMPConnection != "")
                {
                    this._app.model.rtmpConnectionURL = loaderInfo.parameters.RTMPConnection;
                }
                if (loaderInfo.parameters.RTMPStream != undefined && loaderInfo.parameters.RTMPStream != "")
                {
                    this._app.model.rtmpStream = loaderInfo.parameters.rtmpStream;
                }
            }
            if (loaderInfo.parameters.readyFunction != undefined)
            {
                try
                {
                    ExternalInterface.call(loaderInfo.parameters.readyFunction, ExternalInterface.objectID);
                }
                catch (e:Error)
                {
                    if (loaderInfo.parameters.debug != undefined && loaderInfo.parameters.debug == "true")
                    {
                        throw new Error(e.message);
                    }
                }
            }
            return;
        }// end function

        private function onAddedToStage(event:Event) : void
        {
            stage.addEventListener(Event.RESIZE, this.onStageResize);
            stage.scaleMode = StageScaleMode.NO_SCALE;
            stage.align = StageAlign.TOP_LEFT;
            this._stageSizeTimer.start();
            return;
        }// end function

        private function onStageSizeTimerTick(event:TimerEvent) : void
        {
            if (stage.stageWidth > 0 && stage.stageHeight > 0)
            {
                this._stageSizeTimer.stop();
                this._stageSizeTimer.removeEventListener(TimerEvent.TIMER, this.onStageSizeTimerTick);
                this.init();
            }
            return;
        }// end function

        private function onStageResize(event:Event) : void
        {
            if (this._app != null)
            {
                this._app.model.stageRect = new Rectangle(0, 0, stage.stageWidth, stage.stageHeight);
                this._app.model.broadcastEvent(new VideoJSEvent(VideoJSEvent.STAGE_RESIZE, {}));
            }
            return;
        }// end function

        private function onEchoCalled(param1 = null)
        {
            return param1;
        }// end function

        private function onGetPropertyCalled(param1:String = "")
        {
            switch(param1)
            {
                case "autoplay":
                {
                    return this._app.model.autoplay;
                }
                case "loop":
                {
                    return this._app.model.loop;
                }
                case "preload":
                {
                    return this._app.model.preload;
                }
                case "metadata":
                {
                    return this._app.model.metadata;
                }
                case "duration":
                {
                    return this._app.model.duration;
                }
                case "eventProxyFunction":
                {
                    return this._app.model.jsEventProxyName;
                }
                case "errorEventProxyFunction":
                {
                    return this._app.model.jsErrorEventProxyName;
                }
                case "currentSrc":
                {
                    return this._app.model.src;
                }
                case "currentTime":
                {
                    return this._app.model.time;
                }
                case "time":
                {
                    return this._app.model.time;
                }
                case "initialTime":
                {
                    return 0;
                }
                case "defaultPlaybackRate":
                {
                    return 1;
                }
                case "ended":
                {
                    return this._app.model.hasEnded;
                }
                case "volume":
                {
                    return this._app.model.volume;
                }
                case "muted":
                {
                    return this._app.model.muted;
                }
                case "paused":
                {
                    return this._app.model.paused;
                }
                case "seeking":
                {
                    return this._app.model.seeking;
                }
                case "networkState":
                {
                    return this._app.model.networkState;
                }
                case "readyState":
                {
                    return this._app.model.readyState;
                }
                case "buffered":
                {
                    return this._app.model.buffered;
                }
                case "bufferedBytesStart":
                {
                    return 0;
                }
                case "bufferedBytesEnd":
                {
                    return this._app.model.bufferedBytesEnd;
                }
                case "bytesTotal":
                {
                    return this._app.model.bytesTotal;
                }
                case "videoWidth":
                {
                    return this._app.model.videoWidth;
                }
                case "videoHeight":
                {
                    return this._app.model.videoHeight;
                }
                default:
                {
                    break;
                }
            }
            return null;
        }// end function

        private function onSetPropertyCalled(param1:String = "", param2 = null) : void
        {
            switch(param1)
            {
                case "loop":
                {
                    this._app.model.loop = this._app.model.humanToBoolean(param2);
                }
                case "background":
                {
                    this._app.model.backgroundColor = this._app.model.hexToNumber(String(param2));
                    break;
                }
                case "eventProxyFunction":
                {
                    this._app.model.jsEventProxyName = String(param2);
                    break;
                }
                case "errorEventProxyFunction":
                {
                    this._app.model.jsErrorEventProxyName = String(param2);
                    break;
                }
                case "preload":
                {
                    this._app.model.preload = this._app.model.humanToBoolean(param2);
                    break;
                }
                case "poster":
                {
                    this._app.model.poster = String(param2);
                    break;
                }
                case "src":
                {
                    this._app.model.src = String(param2);
                    break;
                }
                case "currentTime":
                {
                    this._app.model.seekBySeconds(Number(param2));
                    break;
                }
                case "currentPercent":
                {
                    this._app.model.seekByPercent(Number(param2));
                    break;
                }
                case "muted":
                {
                    this._app.model.muted = this._app.model.humanToBoolean(param2);
                    break;
                }
                case "volume":
                {
                    this._app.model.volume = Number(param2);
                    break;
                }
                case "RTMPConnection":
                {
                    this._app.model.rtmpConnectionURL = String(param2);
                    break;
                }
                case "RTMPStream":
                {
                    this._app.model.rtmpStream = String(param2);
                    break;
                }
                default:
                {
                    this._app.model.broadcastErrorEventExternally(ExternalErrorEventName.PROPERTY_NOT_FOUND, param1);
                    break;
                    break;
                }
            }
            return;
        }// end function

        private function onAutoplayCalled(param1 = false) : void
        {
            this._app.model.autoplay = this._app.model.humanToBoolean(param1);
            return;
        }// end function

        private function onSrcCalled(param1 = "") : void
        {
            this._app.model.src = String(param1);
            return;
        }// end function

        private function onLoadCalled() : void
        {
            this._app.model.load();
            return;
        }// end function

        private function onPlayCalled() : void
        {
            this._app.model.play();
            return;
        }// end function

        private function onPauseCalled() : void
        {
            this._app.model.pause();
            return;
        }// end function

        private function onResumeCalled() : void
        {
            this._app.model.resume();
            return;
        }// end function

        private function onStopCalled() : void
        {
            this._app.model.stop();
            return;
        }// end function

        private function onUncaughtError(event:Event) : void
        {
            event.preventDefault();
            return;
        }// end function

    }
}
