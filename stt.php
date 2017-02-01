<?php
//aca necesito grabar con flash un mp3, convertirlo con ajax en .flac usando ffmpeg,
//teniendo el nombre de el resultado de la conversion tengo
//que enviarlo con ajax a stt2.php y recibir la respuesta.

echo'
<script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript">
var mediaCaptureMgr = null;
var captureInitSettings = null;
var encodingProfile = null;
var storageFile = null;
// This is called when the page is loaded
function initCaptureSettings() {
		captureInitSettings = null;
		captureInitSettings = new Windows.Media.Capture.MediaCaptureInitializationSettings();
		captureInitSettings.audioDeviceId = "";
		captureInitSettings.videoDeviceId = "";
		captureInitSettings.streamingCaptureMode = Windows.Media.Capture.StreamingCaptureMode.audio;
}
function startDevice() {
		mediaCaptureMgr = new Windows.Media.Capture.MediaCapture();
		mediaCaptureMgr.initializeAsync(captureInitSettings).done(function (result) {
				// ...
		});
}
function startRecord() {
		// ...
		// Start recording.
		Windows.Storage.KnownFolders.videosLibrary.createFileAsync("cameraCapture.m4a",
				Windows.Storage.CreationCollisionOption.generateUniqueName).done(function (newFile) {
				storageFile = newFile;
				encodingProfile = Windows.Media.MediaProperties.MediaEncodingProfile.createM4a(
						Windows.Media.MediaProperties.AudioEncodingQuality.auto);
				mediaCaptureMgr.startRecordToStorageFileAsync(encodingProfile, storageFile)
			.done(function (result) {
						// ...
				});
		});
}
function stopRecord() {
		mediaCaptureMgr.stopRecordAsync().done(function (result) {
				displayStatus("Record Stopped.  File " + storageFile.path + "  ");
				// Playback the recorded audio
				var audio = id("capturePlayback" + scenarioId);
				audio.src = URL.createObjectURL(storageFile, { oneTimeOnly: true });
				audio.play();
		});
}

$(document).ready(function(){
initCaptureSettings();

$(".start").bind("click",function(){
startDevice();
startRecord();
});

$(".end").bind("click",function(){
stopRecord();
});

});

</script>
<div class="start" style="background:green;color:black;width:60px;height:60px;">START</div>
<div class="end" style="background:red;color:black;width:60px;height:60px;">END</div>
<script type="text/javascript">
function writeSpeeech(v){
$("[data-speech]").val(v);
}
$(document).ready(function(){


});
</script>
<input id="jeje" data-speech="t" type="text" speech x-webkit-speech onspeechchange="writeSpeech(this.value)" />
<script type="text/javascript">

</script>
';

?>