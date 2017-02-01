package com.videojs.events
{
    import flash.events.*;

    public class VideoJSEvent extends Event
    {
        private var _data:Object;
        public static const STAGE_RESIZE:String = "VideoJSEvent.STAGE_RESIZE";
        public static const BACKGROUND_COLOR_SET:String = "VideoJSEvent.BACKGROUND_COLOR_SET";
        public static const POSTER_SET:String = "VideoJSEvent.POSTER_SET";

        public function VideoJSEvent(param1:String, param2:Object = null)
        {
            super(param1, true, false);
            this._data = param2;
            return;
        }// end function

        public function get data() : Object
        {
            return this._data;
        }// end function

    }
}
