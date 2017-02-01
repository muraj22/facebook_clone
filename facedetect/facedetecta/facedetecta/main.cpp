#include <stdio.h>
#include "cv.h"
#include "highgui.h"

CvHaarClassifierCascade *cascade;
CvHaarClassifierCascade *cascade2;
CvMemStorage            *storage;
CvMemStorage            *storage2;

int main( int argc, char *argv[])
{
    char *dea;
    char *image;
	
    IplImage  *img,*temp_img;

    storage = cvCreateMemStorage( 0 );

    img=cvLoadImage(argv[1],-1);
    temp_img=cvLoadImage(argv[1],-1);

	char temp_image[100];
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

	cascade = ( CvHaarClassifierCascade* )cvLoad( "C:/opencv/data/haarcascades/haarcascade_frontalface_alt2.xml", 0, 0, 0 );

    if( cascade ){
        faces = cvHaarDetectObjects(img,cascade, storage, 1.2, 2, CV_HAAR_DO_CANNY_PRUNING, cvSize(4, 4), cvSize(300, 300));
    }else{
        printf("\nFrontal face cascade not loaded\n");
}
    
	int i=0;
	while(i<faces->total)
    {        
        r=(CvRect*)cvGetSeqElem(faces,i);
      
	    printf("='';face->:");
        printf("%d,%d,%d,%d",r->width,r->height,r->x,r->y);
        
    
        cvResetImageROI(img);
i++;
    }



      if(faces->total>0)
        {
          
        
        }
		
		
	cvReleaseHaarClassifierCascade( &cascade );
    cvReleaseMemStorage( &storage );

		
	float m2[6];
    double factor2 = 1;
    CvMat M2 = cvMat( 2, 3, CV_32F, m );
    int w2 = (img)->width;
    int h2 = (img)->height;
    CvSeq* faces2;
    CvRect *r2;

    m2[0] = (float)(factor2*cos(0.0));
    m2[1] = (float)(factor2*sin(0.0));
    m2[2] = w2*0.5f;
    m2[3] = -m2[1];
    m2[4] = m2[0];
    m2[5] = h2*0.5f;
	
	    cvGetQuadrangleSubPix(img, temp_img, &M2);
		
		    storage2 = cvCreateMemStorage( 0 );
    CvMemStorage* storage2=cvCreateMemStorage(0);
cvClearMemStorage( storage2 );

		cascade2 = ( CvHaarClassifierCascade* )cvLoad( "C:/opencv/data/haarcascades/haarcascade_profileface.xml", 0, 0, 0 );

    if( cascade2 ){
        faces2 = cvHaarDetectObjects(img,cascade2, storage2, 1.2, 2, CV_HAAR_DO_CANNY_PRUNING, cvSize(4, 4), cvSize(300, 300));
    }else{
        printf("\nProfile face cascade not loaded\n");
}
    
	int j=0;
	while(j<faces2->total)
    {        
        r2=(CvRect*)cvGetSeqElem(faces2,j);
    
	    printf("='';facep->:");
        printf("%d,%d,%d,%d",r2->width,r2->height,r2->x,r2->y);
        
        cvResetImageROI(img);
j++;
    }



      if(faces2->total>0)
        {
          
        
        }
		
		

    cvReleaseHaarClassifierCascade( &cascade2 );
    cvReleaseMemStorage( &storage2 );

    cvReleaseImage(&img);
    cvReleaseImage(&temp_img);


    return 0;
}