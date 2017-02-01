#include <opencv2/objdetect/objdetect.hpp> 
#include<stdio.h>
#include<cv.h>
#include<highgui.h>

CvHaarClassifierCascade *cascade;
CvMemStorage *Membuffer;

void detectfaces(IplImage *frame)
{
int i;
CvSeq *faces=cvHaarDetectObjects(frame,cascade,Membuffer,1.1,3,0,cvSize(30,30));//Maximum 3 neighbourhood images and the last cvsize gives minimum size of face
for(i=0;i<(faces?faces->total:0);i++)
{CvRect *r=(CvRect *)cvGetSeqElem(faces,i);
cvRectangle(frame,cvPoint(r->x,r->y),cvPoint(r->x+r->width,r->y+r->height),CV_RGB(255,0,0),1,8,0);

}



}


int main(int argc,char *argv[])

{IplImage *frame;
CvCapture *capture;
int key;
char filename[]="haarcascade_frontalface_alt.xml";

cascade=(CvHaarClassifierCascade *)cvLoad(filename,0,0,0);


Membuffer=cvCreateMemStorage(0);


while(key!='q')

{frame=cvQueryFrame(capture);
if(!frame)
break;

frame->origin=0;



detectfaces(frame);
key=cvWaitKey(10);
}
cvReleaseCapture(&capture);
cvDestroyWindow("Video");
cvReleaseHaarClassifierCascade(&cascade);
cvReleaseMemStorage(&Membuffer);
}