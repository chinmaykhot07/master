var Image = <? echo json_encode($image); ?>;	
var Image_Number = 0;
var Image_Length = 4;

function change_image(num) {
	Image_Number = Image_Number + num;
	if(Image_Number > Image_Length) {
		Image_Number = 0;
	}
	if(Image_Number < 0) {
		Image_Number = Image_Length;
	}
	document.slideshow.src= 'uploads/' + Image[Image_Number] + '.jpg';
	return false;
}	
setInterval("change_image(1)",3000);