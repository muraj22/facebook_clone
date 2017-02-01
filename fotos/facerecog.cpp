// Let's say we want to keep 10 Eigenfaces and have a threshold value of 10.0
int num_components = 10;
double threshold = 10.0;
// Then if you want to have a cv::FaceRecognizer with a confidence threshold,
// create the concrete implementation with the appropiate parameters:
Ptr<FaceRecognizer> model = createEigenFaceRecognizer(num_components, threshold);

// The following line reads the threshold from the Eigenfaces model:
double current_threshold = model->getDouble("threshold");
// And this line sets the threshold to 0.0:
model->set("threshold", 0.0);

// Create a FaceRecognizer:
Ptr<FaceRecognizer> model = createEigenFaceRecognizer();
// And here's how to get its name:
String name = model->name();

// holds images and labels
vector<Mat> images;
vector<int> labels;
// images for first person
images.push_back(imread("/var/www/html/fotos/1.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/2.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/3.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/4.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/5.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/6.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/7.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/8.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/9.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/10.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/11.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/12.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/13.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/14.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/15.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/16.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/17.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/19.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/20.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/21.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/22.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/23.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/24.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/25.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/26.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/27.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/28.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/29.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/30.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/31.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/32.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/33.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/34.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/35.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/36.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/37.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);
images.push_back(imread("/var/www/html/fotos/38.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);

// Create a new Fisherfaces model and retain all available Fisherfaces,
// this is the most common usage of this specific FaceRecognizer:
//
Ptr<FaceRecognizer> model =  createFisherFaceRecognizer();

// This is the common interface to train all of the available cv::FaceRecognizer
// implementations:
//
model->train(images, labels);

FaceRecognizer::save("/var/www/html/fotos/salvado.txt");