#include <stdio.h>
#include "cv.h"
#include "highgui.h"

 CvHaarClassifierCascade *cascade;
 CvMemStorage            *storage;
 char *face_cascade="/usr/local/share/OpenCV/haarcascades/haarcascade_frontalface_alt2.xml";

 void detectFacialFeatures( IplImage *img,IplImage *temp_img)
 {
 char image[100],msg[100],temp_image[100];
 float m[6];
 double factor = 1;
 CvMat M = cvMat( 2, 3, CV_32F, m );
 int w = (img)->width;
 int h = (img)->height;
 
 CvSeq* faces;
 CvRect *r;
 
 m[0] = (float)(factor*cos(0.0));
 m[1] = (float)(factor*sin(0.0));
 m[2] = w*0.5f;
 m[3] = -m[1];
 m[4] = m[0];
 m[5] = h*0.5f;
 
 cvGetQuadrangleSubPix(img, temp_img, &M);
 CvMemStorage* storage=cvCreateMemStorage(0);
 cvClearMemStorage( storage );
 
 if( cascade )
 faces = cvHaarDetectObjects(img,cascade, storage, 1.2, 2, CV_HAAR_DO_CANNY_PRUNING, cvSize(5, 5), cvSize(20, 20));
 else
  printf("\nFrontal face cascade not loaded\n");
 printf("\n no of faces detected are %d",faces->total);
 
 int i=0;
 
 while(i<faces->total)
 {        
 r = ( CvRect* )cvGetSeqElem( faces, i );
 cvRectangle( img,cvPoint( r->x, r->y ),cvPoint( r->x + r->width, r->y + r->height ),
 CV_RGB( 255, 0, 0 ), 1, 8, 0 );    
 printf("\n face_x=%d face_y=%d wd=%d ht=%d",r->x,r->y,r->width,r->height);
 cvResetImageROI(img);
 i++;
 }
 
 if(faces->total>0)
 {
 sprintf(image,"face_output%d.jpg");
 cvSaveImage( image, img ,0);
 }
 
 }

 int main( int argc, char *argv[])
 {
 char *dea;
 char *image;
printf("hello");
 dea=argv[1];
 printf("%c",argv[1]); 
 
 image=argv[1];
 IplImage  *img,*temp_img;
 
 storage = cvCreateMemStorage( 0 );
 cascade = ( CvHaarClassifierCascade* )cvLoad( face_cascade, 0, 0, 0 );
 if( !(cascade) )
 {
 fprintf( stderr, "ERROR: Could not load classifier cascade\n" );
 return -1;
 }
 sprintf("%c",argv[1]);
 img=cvLoadImage(dea,0);
 temp_img=cvLoadImage(dea,0);
 if(!img)
 {
 printf("Could not load image file and trying once again: %s\n",image);
 }
 printf("\n curr_image = %s",image);
 
 detectFacialFeatures(img,temp_img);
 cvReleaseHaarClassifierCascade( &cascade );
 cvReleaseMemStorage( &storage );
 cvReleaseImage(&img);
 cvReleaseImage(&temp_img);
 return 0;
 }