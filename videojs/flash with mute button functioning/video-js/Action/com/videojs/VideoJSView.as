package com.videojs
{
    import com.videojs.events.*;
    import com.videojs.structs.*;
    import flash.display.*;
    import flash.events.*;
    import flash.media.*;
    import flash.net.*;
    import flash.system.*;

    public class VideoJSView extends Sprite
    {
        private var _uiVideo:Video;
        private var _uiPosterContainer:Sprite;
        private var _uiPosterImage:Loader;
        private var _uiBackground:Sprite;
        private var _model:VideoJSModel;

        public function VideoJSView()
        {
            this._model = VideoJSModel.getInstance();
            this._model.addEventListener(VideoJSEvent.POSTER_SET, this.onPosterSet);
            this._model.addEventListener(VideoJSEvent.BACKGROUND_COLOR_SET, this.onBackgroundColorSet);
            this._model.addEventListener(VideoJSEvent.STAGE_RESIZE, this.onStageResize);
            this._model.addEventListener(VideoPlaybackEvent.ON_STREAM_START, this.onStreamStart);
            this._model.addEventListener(VideoPlaybackEvent.ON_META_DATA, this.onMetaData);
            this._uiBackground = new Sprite();
            this._uiBackground.graphics.beginFill(this._model.backgroundColor, 1);
            this._uiBackground.graphics.drawRect(0, 0, this._model.stageRect.width, this._model.stageRect.height);
            this._uiBackground.graphics.endFill();
            addChild(this._uiBackground);
            this._uiPosterContainer = new Sprite();
            this._uiPosterImage = new Loader();
            this._uiPosterImage.visible = false;
            this._uiPosterContainer.addChild(this._uiPosterImage);
            addChild(this._uiPosterContainer);
            this._uiVideo = new Video();
            this._uiVideo.width = this._model.stageRect.width;
            this._uiVideo.height = this._model.stageRect.height;
            this._uiVideo.smoothing = true;
            addChild(this._uiVideo);
            this._model.videoReference = this._uiVideo;
            return;
        }// end function

        private function loadPoster() : void
        {
            var _loc_1:URLRequest = null;
            var _loc_2:LoaderContext = null;
            if (this._model.poster != "")
            {
                if (this._uiPosterImage != null)
                {
                    this._uiPosterImage.contentLoaderInfo.removeEventListener(Event.COMPLETE, this.onPosterLoadComplete);
                    this._uiPosterImage.contentLoaderInfo.removeEventListener(IOErrorEvent.IO_ERROR, this.onPosterLoadError);
                    this._uiPosterImage.contentLoaderInfo.removeEventListener(SecurityErrorEvent.SECURITY_ERROR, this.onPosterLoadSecurityError);
                    this._uiPosterImage.parent.removeChild(this._uiPosterImage);
                    this._uiPosterImage = null;
                }
                _loc_1 = new URLRequest(this._model.poster);
                this._uiPosterImage = new Loader();
                this._uiPosterImage.visible = false;
                _loc_2 = new LoaderContext();
                this._uiPosterImage.contentLoaderInfo.addEventListener(Event.COMPLETE, this.onPosterLoadComplete);
                this._uiPosterImage.contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, this.onPosterLoadError);
                this._uiPosterImage.contentLoaderInfo.addEventListener(SecurityErrorEvent.SECURITY_ERROR, this.onPosterLoadSecurityError);
                try
                {
                    this._uiPosterImage.load(_loc_1, _loc_2);
                }
                catch (e:Error)
                {
                }
            }
            return;
        }// end function

        private function sizeVideoObject() : void
        {
            var _loc_1:int = 0;
            var _loc_2:int = 0;
            var _loc_3:* = this._model.stageRect.width;
            var _loc_4:* = this._model.stageRect.height;
            var _loc_5:int = 100;
            if (this._model.metadata.width != undefined)
            {
                _loc_5 = Number(this._model.metadata.width);
            }
            if (this._uiVideo.videoWidth != 0)
            {
                _loc_5 = this._uiVideo.videoWidth;
            }
            var _loc_6:int = 100;
            if (this._model.metadata.width != undefined)
            {
                _loc_6 = Number(this._model.metadata.height);
            }
            if (this._uiVideo.videoWidth != 0)
            {
                _loc_6 = this._uiVideo.videoHeight;
            }
            _loc_1 = _loc_3;
            _loc_2 = _loc_1 * (_loc_6 / _loc_5);
            if (_loc_2 > _loc_4)
            {
                _loc_1 = _loc_1 * (_loc_4 / _loc_2);
                _loc_2 = _loc_4;
            }
            this._uiVideo.width = _loc_1;
            this._uiVideo.height = _loc_2;
            this._uiVideo.x = Math.round((this._model.stageRect.width - this._uiVideo.width) / 2);
            this._uiVideo.y = Math.round((this._model.stageRect.height - this._uiVideo.height) / 2);
            return;
        }// end function

        private function sizePoster() : void
        {
            var _loc_1:int = 0;
            var _loc_2:int = 0;
            var _loc_3:int = 0;
            var _loc_4:int = 0;
            var _loc_5:int = 0;
            var _loc_6:int = 0;
            try
            {
                if (this._uiPosterImage.content != null)
                {
                    _loc_3 = this._model.stageRect.width;
                    _loc_4 = this._model.stageRect.height;
                    _loc_5 = this._uiPosterImage.content.width;
                    _loc_6 = this._uiPosterImage.content.height;
                    _loc_1 = _loc_3;
                    _loc_2 = _loc_1 * (_loc_6 / _loc_5);
                    if (_loc_2 > _loc_4)
                    {
                        _loc_1 = _loc_1 * (_loc_4 / _loc_2);
                        _loc_2 = _loc_4;
                    }
                    this._uiPosterImage.width = _loc_1;
                    this._uiPosterImage.height = _loc_2;
                    this._uiPosterImage.x = Math.round((this._model.stageRect.width - this._uiPosterImage.width) / 2);
                    this._uiPosterImage.y = Math.round((this._model.stageRect.height - this._uiPosterImage.height) / 2);
                }
            }
            catch (e:Error)
            {
            }
            return;
        }// end function

        private function onBackgroundColorSet(event:VideoPlaybackEvent) : void
        {
            this._uiBackground.graphics.clear();
            this._uiBackground.graphics.beginFill(this._model.backgroundColor, 1);
            this._uiBackground.graphics.drawRect(0, 0, this._model.stageRect.width, this._model.stageRect.height);
            this._uiBackground.graphics.endFill();
            return;
        }// end function

        private function onStageResize(event:VideoJSEvent) : void
        {
            this._uiBackground.graphics.clear();
            this._uiBackground.graphics.beginFill(this._model.backgroundColor, 1);
            this._uiBackground.graphics.drawRect(0, 0, this._model.stageRect.width, this._model.stageRect.height);
            this._uiBackground.graphics.endFill();
            this.sizePoster();
            this.sizeVideoObject();
            return;
        }// end function

        private function onPosterSet(event:VideoJSEvent) : void
        {
            this.loadPoster();
            return;
        }// end function

        private function onPosterLoadComplete(event:Event) : void
        {
            var e:* = event;
            try
            {
                (this._uiPosterImage.content as Bitmap).smoothing = true;
            }
            catch (e:Error)
            {
                if (loaderInfo.parameters.debug != undefined && loaderInfo.parameters.debug == "true")
                {
                    throw new Error(e.message);
                }
            }
            this._uiPosterContainer.addChild(this._uiPosterImage);
            this.sizePoster();
            if (!this._model.playing)
            {
                this._uiPosterImage.visible = true;
            }
            return;
        }// end function

        private function onPosterLoadError(event:IOErrorEvent) : void
        {
            this._model.broadcastErrorEventExternally(ExternalErrorEventName.POSTER_IO_ERROR, event.text);
            return;
        }// end function

        private function onPosterLoadSecurityError(event:SecurityErrorEvent) : void
        {
            this._model.broadcastErrorEventExternally(ExternalErrorEventName.POSTER_SECURITY_ERROR, event.text);
            return;
        }// end function

        private function onStreamStart(event:VideoPlaybackEvent) : void
        {
            this._uiPosterImage.visible = false;
            return;
        }// end function

        private function onMetaData(event:VideoPlaybackEvent) : void
        {
            this.sizeVideoObject();
            return;
        }// end function

    }
}
