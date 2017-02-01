package com.videojs
{
    import flash.display.*;

    public class VideoJSApp extends Sprite
    {
        private var _uiView:VideoJSView;
        private var _model:VideoJSModel;

        public function VideoJSApp()
        {
            this._model = VideoJSModel.getInstance();
            this._uiView = new VideoJSView();
            addChild(this._uiView);
            return;
        }// end function

        public function get model() : VideoJSModel
        {
            return this._model;
        }// end function

    }
}
